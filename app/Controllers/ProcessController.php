<?php

namespace App\Controllers;

use App\Models\Route;
use App\Models\RouteTicket;
use App\Models\Seat;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Models\Ticket;

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
        $basePrice = 300;
        $userModel = new User();
        $user = $userModel->find(session()->get('user_id'));
        $discountPercentage = $user['job'] != 'other' ? '15' : '0';
        $tickets = [];
        $routeModel = new Route();
        $onGoingRouteId = session()->get('on_going_route');
        $onGoingRoute = $routeModel->find($onGoingRouteId);
        $goingDestination = $routeModel->getDestination($onGoingRouteId);
        $goingBus = $routeModel->getBus($onGoingRouteId);
        array_push($tickets, [
            'startingDestination' => ucfirst($goingDestination['starting_destination']),
            'endingDestination' => ucfirst($goingDestination['ending_destination']),
            'datetime' => $onGoingRoute['arrival_date'],
            'busPlate' => $goingBus['plate'],
            'price' => $basePrice
        ]);
        if(session()->has('isRoundTrip'))
        {
            $returningRouteId = session()->get('returning_route');
            $returningRoute = $routeModel->find($returningRouteId);
            $returningDestination = $routeModel->getDestination($returningRouteId);
            $returningBus = $routeModel->getBus($returningRouteId);
            array_push($tickets, [
                'startingDestination' => ucfirst($returningDestination['starting_destination']),
                'endingDestination' => ucfirst($returningDestination['ending_destination']),
                'datetime' => $returningRoute['arrival_date'],
                'busPlate' => $returningBus['plate'],
                'price' => $basePrice
            ]);
        }
        $data = [
            'event' => 'payment',
            'tickets' => $tickets,
            'discountPercentage' => $discountPercentage
            //     session ile totalPrice kaydedilmeli ve aşağıdaki payment metodunda kullanılmalı
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
            $selectedSeats = explode('|', $selectedSeatsString);
            //sessiona kaydedildi
        }

        return $this->getSelectReturningSeats();
    }

    public function selectReturningSeats()
    {
        $selectedSeatsString = $this->request->getPost('selectReturningSeats');
        if ($selectedSeatsString != null && is_string($selectedSeatsString)) {
            $selectedSeats = explode('|', $selectedSeatsString);
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
            $totalPrice = $this->request->getPost('totalPrice');
            // PNR oluşturma işlemi
            $ticketModel = new Ticket();
            $ticket = [
                'user_id'=>session()->get('user_id'),
                'status'=>'0',
                'price' => $totalPrice,
                'is_round_trip'=>session()->has('isRoundTrip') ? 1 : 0
            ];
            $ticket_id = $ticketModel->insert($ticket, true);

            $routeTicketModel = new RouteTicket();
            $going_route = session()->get('on_going_route');
            $goingRouteTicket = ['route_id'=>$going_route, 'ticket_id'=>$ticket_id];
            $routeTicketModel->insert($goingRouteTicket);

            $routeModel = new Route();
            $goingSeats = $routeModel->getSeats(session()->get('on_going_route'));
            $goingPeople = session()->get('onGoingPeople');
            $seatModel = new Seat();
            foreach ($goingPeople as $goingPerson) {
                foreach ($goingSeats as $goingSeat) {
                    if ($goingSeat['seat_no'] == $goingPerson['seat_no'])
                    {
                        $data = ['status' => 1, 'gender' => $goingPerson['gender'], 'ticket_id' => $ticket_id];
                        $seatModel->update($goingSeat['seat_id'], $data);
                    }
                }
            }
            if($ticket['is_round_trip'] == 1)
            {
                $returning_route = session()->get('returning_route');
                $returningRouteTicket = ['route_id'=>$returning_route, 'ticket_id'=>$ticket_id];
                $routeTicketModel->insert($returningRouteTicket);

                $returningSeats = $routeModel->getSeats(session()->get('returning_route'));
                $returningPeople = session()->get('returningPeople');

                foreach ($returningPeople as $returningPerson) {
                    foreach ($returningSeats as $returningSeat) {
                        if ($returningSeat['seat_no'] == $returningPerson['seat_no'])
                        {
                            $data = ['status' => 1, 'gender' => $returningPerson['gender'], 'ticket_id' => $ticket_id];
                            $seatModel->update($returningSeat['seat_id'], $data);
                        }
                    }
                }
            }

            $pnrCode = $ticketModel->generatePnr($ticket_id);

            // E-posta gönderme işlemi
            $mail = new PHPMailer(true); // Exceptionları yakalamak için true kullanın

            try {
                // SMTP ayarları
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'yyazlab@gmail.com';
                $mail->Password = 'owtx ypxr tevp xokl';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Alıcı ve gönderici bilgileri
                $mail->setFrom('yyazlab@gmail.com', 'Yazlab');
                $mail->addAddress('serhat.akcadag@gmail.com', 'Serhat Akçadağ');

                // E-posta içeriği
                $mail->isHTML(true); // HTML içerik kullanılacaksa true
                $mail->Subject = 'PNR Numarası';
                $mail->Body    = 'Ödemeniz başarıyla gerçekleştirildi. PNR Numaranız: ' . $pnrCode;

                $mail->send();

                return view('success', ['pnrCode' => $pnrCode]);
            } catch (Exception $e) {
                return "E-posta gönderilemedi. Hata: {$mail->ErrorInfo}";
            }
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
