<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Http\Requests\RegisterUserRequest;
use Backpack\CRUD\Tests\Unit\Http\Requests\UserRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register()
    {
        $data = request()->all();
        $validatorData = new RegisterUserRequest();
        $validator = Validator::make(
            $data,
            $validatorData->rules(),
            $validatorData->messages(),
            $validatorData->attributes()
        );

        if (!$validator->fails()){
            $request_data = $validator->safe()->only(['first_name', 'last_name', 'email', 'phone', 'password']);

            $fields = [];
            foreach($request_data as $itemKey => $item)
            {
                if($itemKey == 'password')
                {
                    $fields[$itemKey] = Hash::make($item);
                }else if ($itemKey == 'phone'){
                    $fields[$itemKey] = preg_replace('/^8/', '+7', $item, 1);
                }else
                {
                    $fields[$itemKey] = $item;
                }
            }

            $user = User::create(array_merge($fields,[
                'is_admin' => 0
            ]));

            if(\Auth::attempt(['email' => $request_data['email'], 'password' => $request_data['password']])){
                $user = \Auth::user();
                return response()->json( ['code' => 0, 'location' =>  '/' ]  );
            }


        }else{
            $messages = $validator->messages()->toArray();

            $errorMessages = array();

            foreach ($messages as $key=>$value){

                $errorMessages[$key] = $value[0];

            }

            return response()->json( [ 'code' => 1, 'desc' => $errorMessages ] );
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
