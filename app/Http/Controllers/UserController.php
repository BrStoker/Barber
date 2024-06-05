<?php


namespace App\Http\Controllers;


class UserController extends Controller
{


    public function profile(){

        if(request()->method() === 'POST'){
            return null;
        }else{
            return view('profile', [
                'data' => json_encode([
                    'user' => parent::getUser(),
                    'appointments' => parent::get_appointments()

                ])
            ]);

        }


    }



}