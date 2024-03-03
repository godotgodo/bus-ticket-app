<?php

namespace App\Controllers;

class RouteController extends BaseController
{
    public function getRoutes(){
        return view('routes');
    }
}
// $data=[
        //     'currentTickets'=>[
        //         [
        //             'startingDestination'=>'İstanbul',
        //             'endingDestination'=>'Ankara',
        //             'datetime'=>'2024-01-01',
        //             'busPlate'=>'34 XYZ 34',
        //             'price'=> 300,
        //             'roundTrip'=>false
        //         ],
        //         [
        //             'startingDestination'=>'Kocaeli',
        //             'endingDestination'=>'Ankara',
        //             'datetime'=>'2024-01-02',
        //             'busPlate'=>'34 XYZ 41',
        //             'price'=> 500,
        //             'roundTrip'=>true
        //         ]
        //     ],
        //     'oldTickets'=>[
        //         [
        //             'startingDestination'=>'İstanbul',
        //             'endingDestination'=>'Ankara',
        //             'datetime'=>'2024-01-01',
        //             'busPlate'=>'34 XYZ 34',
        //             'price'=> 300,
        //             'roundTrip'=>false
        //         ],
        //         [
        //             'startingDestination'=>'Kocaeli',
        //             'endingDestination'=>'Ankara',
        //             'datetime'=>'2024-01-02',
        //             'busPlate'=>'34 XYZ 41',
        //             'price'=> 500,
        //             'roundTrip'=>true
        //         ]
        //     ],
        // ];