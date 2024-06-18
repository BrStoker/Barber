<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }

    public function login(\Illuminate\Http\Request $request){
        if($request->method() == 'POST'){

            $validatorData = new \App\Http\Requests\UserAuthRequest();
            $remember = $request->input('rememberMe');
            $validator = \Illuminate\Support\Facades\Validator::make(
                $request->all(),
                $validatorData->rules(),
                $validatorData->messages(),
                $validatorData->attributes()
            );

            if (!$validator->fails()){
                $request_data = $validator->safe()->only(['email', 'password']);
                $remember = $remember ?? false;

                $user_model = new \App\Models\User();

                $login = $request->input('email');

                if (\Auth::attempt(['email' => $login, 'password' => $request_data['password']], $remember)){

                    $user = \Auth::user();
                    return response()->json( ['code' => 0, 'location' =>  '/' ]  );


                }else{
                    $userLogin = \App\Models\User::where('email', $login)->first();

                    $errors = array();

                    if($userLogin){
                        $errors = [
                            'password' => __('error.login_fail_password')
                        ];
                    }else{
                        $errors = [
                            'email' => __('error.login_fail_email')
                        ];
                    }
                    return response()->json( [ 'code' => 2, 'desc' => $errors ]);

                }
            }else
            {

                return response()->json( [ 'code' => 1, 'desc' => $validator->messages() ] );

            }

        }else if($request->method() == 'GET')
        {

            return view('auth.login');

        }

    }

    public function logout($redirect = true)
    {

        \Auth::logout();

        if($redirect)
        {
            return redirect('/');
        }

    }


}
