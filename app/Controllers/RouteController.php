<?php

namespace App\Controllers;

class RouteController extends BaseController
{
    public function getRoutes(){
        $data=[
                'routes'=>[[
                    'route-id'=>1,
                    'startingDestination'=>'Ankara',
                    'endingDestination'=>'İstanbul',
                    'datetime'=>'2023-01-01',
                    'freeSeats'=>25,
                ],
                [
                    'route-id'=>2, 
                    'startingDestination'=>'Kocaeli',
                    'endingDestination'=>'Ankara',
                    'datetime'=>'2023-01-02',
                    'freeSeats'=>10,
                ],
                [
                    'route-id'=>3,
                    'startingDestination'=>'Ankara',
                    'endingDestination'=>'Kocaeli',
                    'datetime'=>'2023-01-02',
                    'freeSeats'=>10,
                ]
                ]
        ];
        return view('routes',$data);
    }

    public function getRouteSeats(){
        $route_id=$this->request->getVar('route-id');
        return $route_id;
    }

    public function selectRoute(){
        $route_id=$this->request->getVar('route-id');
        // Session starting
        return redirect()->to('/process/selectGoingSeats');
    }
};