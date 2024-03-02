<?php

namespace App\Controllers;

class Card extends BaseController
{
    public function index(): string
    {
        $data=[
            'tickets'=>[
                [
                    'startingDestination'=>'İstanbul',
                    'endingDestination'=>'Ankara',
                    'datetime'=>'2024-01-01',
                    'busPlate'=>'34 XYZ 34',
                    'price'=> 300,
                    'roundTrip'=>false
                ],
                [
                    'startingDestination'=>'Kocaeli',
                    'endingDestination'=>'Ankara',
                    'datetime'=>'2024-01-02',
                    'busPlate'=>'34 XYZ 41',
                    'price'=> 500,
                    'roundTrip'=>true
                ]
            ]
        ];
        return view('card', $data);
    }
}