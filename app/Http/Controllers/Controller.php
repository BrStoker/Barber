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

    public function get_appointments()
    {
        $currentUser = \Auth::user();
        if($currentUser){
            $appointments = $currentUser->appointments()->orderBy('appointment_date', 'ASC')->get();
            if($appointments){
                $appointments->map(function ($record) {
                    $service = \App\Models\Service::where('id', $record->service_id)->first();
                    $record->service_name = $service->name;
                });
            }

            return json_encode([
                'appointments' => $appointments,
            ]);

        }else{
            return json_encode([
                'appointments' => []
            ]);
        }
    }


}
