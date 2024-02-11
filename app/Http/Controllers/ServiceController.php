<?php


namespace App\Http\Controllers;


class ServiceController extends Controller
{

    public function index(){

        $user = parent::getUser();

        $services = \App\Models\Service::where('active', 2)->get();
        if($services->count() != 0){
            $services->only(['id', 'name', 'image', 'preview', 'description', 'cost']);
        }

        return view('service', [
            'data' => json_encode([
                'user' => $user,
                'services' => $services
            ])
        ]);


    }

}
