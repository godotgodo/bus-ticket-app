<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function index()
    { 
    }
    public function getTickets() :string {
        $data=[
            'currentTickets'=>[
                [
                    'ticket_id'=>1,
                    'startingDestination'=>'İstanbul',
                    'endingDestination'=>'Ankara',
                    'datetime'=>'2024-01-01',
                    'busPlate'=>'34 XYZ 34',
                    'price'=> 300,
                    'roundTrip'=>false
                ],
                [
                    'ticket_id'=>2,
                    'startingDestination'=>'Kocaeli',
                    'endingDestination'=>'Ankara',
                    'datetime'=>'2024-01-02',
                    'busPlate'=>'34 XYZ 41',
                    'price'=> 500,
                    'roundTrip'=>true
                ]
            ],
            'oldTickets'=>[
                [
                    'ticket_id'=>3,
                    'startingDestination'=>'İstanbul',
                    'endingDestination'=>'Ankara',
                    'datetime'=>'2024-01-01',
                    'busPlate'=>'34 XYZ 34',
                    'price'=> 300,
                    'roundTrip'=>false
                ],
                [
                    'ticket_id'=>4,
                    'startingDestination'=>'Kocaeli',
                    'endingDestination'=>'Ankara',
                    'datetime'=>'2024-01-02',
                    'busPlate'=>'34 XYZ 41',
                    'price'=> 500,
                    'roundTrip'=>true
                ]
            ],
        ];
        return view('user/tickets', $data);
    }
    public function getReservations() :string {
        $data=[
            'reservations'=>[
                [
                    'reservation_id'=>10,
                    'startingDestination'=>'İstanbul',
                    'endingDestination'=>'Ankara',
                    'datetime'=>'2024-01-01',
                    'busPlate'=>'34 XYZ 34',
                    'price'=> 300,
                    'roundTrip'=>false,
                    'seats'=>[3,4]
                ],
                [
                    'reservation_id'=>15,
                    'startingDestination'=>'Kocaeli',
                    'endingDestination'=>'Ankara',
                    'datetime'=>'2024-01-02',
                    'busPlate'=>'34 XYZ 41',
                    'price'=> 500,
                    'roundTrip'=>true,
                    'seats'=>[10]
                ]
            ],
        ];
        return view('user/reservations', $data);
    }
    public function deleteReservation($reservation_id){
        return $reservation_id;
    }
    public function addToReservation(){
        $data=[
            'going'=>[
                'route_id'=>$this->request->getPost('route-id'),
                'seats'=>[1,2]
            ],
            'returning'=>[
                'route_id'=>$this->request->getPost('route-id'),
                'seats'=>[1,2]
            ]
        ];
        return $data['going']['route_id'];
    }

    public function releaseTheTicket($ticket_id){
        return $ticket_id.'idli ticket açığa alınmak isteniyor';
    }
}