<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HistoryController extends Controller
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

        return view('history', [
            'data' => json_encode([
                'user' => $user
            ])
        ]);
    }


}
