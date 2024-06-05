<?php


namespace App\Http\Controllers;


class UserAppointments extends Controller
{


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