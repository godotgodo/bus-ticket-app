<?php

namespace App\Controllers;

use function PHPSTORM_META\type;

class ProcessController extends BaseController
{
    public function getSelectGoingSeats()
    {
        // Sessiondan id alınıp dbden sorgulama yapılıp bilgiler viewe iletilecek;
        $data = [
            'event' => 'select_going_seats',
            'freeSeats' => [1, 2, 3, 4, 5, 10]
        ];
        return view('process', $data);
    }

    public function getSelectReturningSeats()
    {
        $data = [
            'route_id' => '5',
            'datetime' => '2023-01-01',
            'event' => 'select_returning_seats',
        ];
        return view('process', $data);
    }

    public function getPayment()
    {
        $data = [
            'event' => 'payment',
            'tickets' => [
                [
                    'startingDestination' => 'İstanbul',
                    'endingDestination' => 'Ankara',
                    'datetime' => '2024-01-01',
                    'busPlate' => '34 XYZ 34',
                    'price' => 300,
                    'roundTrip' => false
                ],
                [
                    'startingDestination' => 'Kocaeli',
                    'endingDestination' => 'Ankara',
                    'datetime' => '2024-01-02',
                    'busPlate' => '34 XYZ 41',
                    'price' => 500,
                    'roundTrip' => true
                ]
            ],
            'discountPercentage' => 15
            //     // session ile totalPrice kaydedilmeli ve aşağıdaki payment metodunda kullanılmalı
            //     return $this->getPayment();
        ];
        $data['subTotal'] = $this->calculateSubTotal($data);
        $data['discountAmount'] = $this->applyDiscount($data);
        $data['totalPrice'] = $data['subTotal'] - $data['discountAmount'];

        return view('process', $data);
    }

    public function selectGoingSeats()
    {
        $selectedSeatsString = $this->request->getPost('selectGoingSeats');
        if ($selectedSeatsString != null && is_string($selectedSeatsString)) {
            $selectedSeats = explode('-', $selectedSeatsString);
            //sessiona kaydedildi
        }

        return $this->getSelectReturningSeats();
    }

    public function selectReturningSeats()
    {
        $selectedSeatsString = $this->request->getPost('selectReturningSeats');
        if ($selectedSeatsString != null && is_string($selectedSeatsString)) {
            $selectedSeats = explode('-', $selectedSeatsString);
            //sessiona kaydedildi
        }

        return $this->getPayment();
    }

    public function payment()
    {
        $card = [
            'name' => $this->request->getPost('name'),
            'number' => $this->request->getPost('number'),
            'expiration' => $this->request->getPost('expiration'),
            'cvv' => $this->request->getPost('cvv'),
        ];
        // session
        if ($this->validateCreditCard($card['number']) && $this->validateExpiration($card['expiration']) && $this->validateCVV($card['cvv'])) {
            $totalPrice = 300;
            return "Kart numarası " . $card['number'] . " olan karttan $totalPrice kadar tutar çekilecek.";
        } else {
            return "Geçersiz kredi kartı bilgileri.";
        }
    }

    function calculateSubTotal($data)
    {
        $subTotal = 0;
        foreach ($data['tickets'] as $ticket) {
            $subTotal += $ticket['price'];
        }
        return $subTotal;
    }

    function applyDiscount($data)
    {
        $subTotal = $data['subTotal'];
        $discountPercentage = $data['discountPercentage'];
        $discountAmount = $subTotal * ($discountPercentage / 100);
        return $discountAmount;
    }

    //Luhn Algorithm
    private function validateCreditCard($cardNumber)
    {
        $cardNumber = preg_replace('/\D/', '', $cardNumber);
        $sum = 0;
        $numDigits = strlen($cardNumber);
        $parity = $numDigits % 2;

        for ($i = 0; $i < $numDigits; $i++) {
            $digit = $cardNumber[$i];
            if ($i % 2 == $parity) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
            $sum += $digit;
        }
        return ($sum % 10 == 0);
    }

    private function validateExpiration($expiration)
    {
        $today = date("m/Y");
        $expiration = str_replace(' ', '', $expiration);
        return (strtotime($expiration) > strtotime($today));
    }

    private function validateCVV($cvv)
    {
        return (strlen($cvv) == 3);
    }
}
