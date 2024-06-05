<?php


namespace App\Http\Controllers;


class UserController extends Controller
{


    public function profile(){

        $data = request()->all();
        if(request()->method() === 'GET'){
            $appointments = parent::get_appointments();
            $user = parent::getUser();
            return view('profile', [
                'data' => json_encode([
                    'user' => $user,
                    'appointments' => $appointments

                ])
            ]);
        }


    }



}