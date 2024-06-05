<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getUser(){

        $user = \Auth::user();

        if($user){

            return $user->only(['first_name', 'last_name', 'phone', 'email', 'image']);

        }else{
            return null;
        }


    }


}
