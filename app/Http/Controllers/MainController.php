<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $user = null;
        $currentUser = \Auth::user();
        if($currentUser){
            $user = [
                'first_name' => $currentUser->first_name,
                'last_name' => $currentUser->last_name,
                'phone' => $currentUser->phone,
                'email' => $currentUser->email
            ];
        }


        return view('main', [
            'data' => json_encode([
                'user' => $user
            ])
        ]);
    }
}
