<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $user = null;
        $user = parent::getUser();
        $currentUser = \Auth::user();
        $services = \App\Models\Service::where('active', 2)->get();
        if($services->count() != 0){
            $services->only(['id', 'name', 'image', 'preview', 'description', 'cost']);
        }
        if($currentUser){
            $user = [
                'id' => $currentUser->id,
                'first_name' => $currentUser->first_name,
                'last_name' => $currentUser->last_name,
                'phone' => $currentUser->phone,
                'email' => $currentUser->email,
                'image' => $currentUser->image
            ];
        }


        return view('main', [
            'data' => json_encode([
                'user' => $user,
                'services' => $services
            ])
        ]);
    }
}
