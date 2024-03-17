<?php

namespace App\Controllers;

use App\Models\Bus;
use App\Models\Route;
use App\Models\RouteTicket;
use App\Models\Ticket;

class HomeController extends BaseController
{
    public function index(): string
    {
        return view('home');
    }
    public function seats()
    {
        return view('seats');
    }
    public function seatSelect()
    {
       // echo $this->request->getPost('seatNumbers');
        if($this->request->getPost('isRoundTrip'))
        {
            if(!session()->has('goingSeats'))
            {
                echo "çalıştı";
                session()->set('goingSeats', $this->request->getPost('seatNumbers'));
                return redirect()->back()->with('return',"Dönüş İçin Koltuk Seçiniz.");
            }
            else{
                echo "Gidiş Numaraları: ".session()->get('goingSeats'). " Dönüş Numaraları: ".$this->request->getPost('seatNumbers');
                return;
            }
        }
        echo "arıza var";
        return;
    }
}
