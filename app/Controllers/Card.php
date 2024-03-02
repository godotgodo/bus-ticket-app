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
            ],
            'discountPercentage'=>15
        ];
        $data['subTotal'] = $this->calculateSubTotal($data);
        $data['discountAmount'] = $this->applyDiscount($data);    
        $data['totalPrice'] = $data['subTotal'] - $data['discountAmount'];

        // session ile totalPrice kaydedilmeli ve aşağıdaki payment metodunda kullanılmalı
        return view('card', $data);
    }

    public function payment() :string {
        $card = [
            'name' => $this->request->getPost('name'),
            'number' => $this->request->getPost('number'),
            'expiration' => $this->request->getPost('expiration'),
            'cvv' => $this->request->getPost('cvv'),
        ];
        // $totalPrice=$_SESSION['totalPrice'];
        $totalPrice=300;
        return "Kart numarası " . $card['number'] . " olan karttan $totalPrice kadar tutar çekilecek.";
    }

    function calculateSubTotal($data){
        $subTotal = 0;
        foreach ($data['tickets'] as $ticket) {
            $subTotal += $ticket['price'];
        }    
        return $subTotal;
    }
    function applyDiscount($data){
        $subTotal = $data['subTotal'];
        $discountPercentage = $data['discountPercentage'];
        
        // İndirim yüzdesini hesapla ve indirim yap
        $discountAmount = $subTotal * ($discountPercentage / 100);
        
        return $discountAmount;
    }
}