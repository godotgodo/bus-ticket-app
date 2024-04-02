<?php

namespace App\Controllers;

use App\Models\Bus;
use App\Models\Route;
use App\Models\RouteTicket;
use App\Models\Seat;
use App\Models\Ticket;

class HomeController extends BaseController
{
    public function index(): string
    {
        session()->remove('on_going_route');
        session()->remove('returning_route');
        return view('home');
    }
    public function seats()
    {

        if($this->request->getPost('returning_route'))
        {
            session()->set('returning_route', $this->request->getPost('returning_route'));
            $routeModel = new Route();
            $seats = $routeModel->getSeats($this->request->getPost('returning_route'));
            $selectedSeats = [];
            foreach ($seats as $seat) {
                if($seat['status'] == 1)
                {
                    array_push($selectedSeats, $seat['seat_no']);
                }
            }
            return view('seats', ['seats'=>$seats, 'selectedSeats'=>$selectedSeats, 'trip_type'=>'returning']);
        }
        else if($this->request->getPost('on_going_route'))
        {
            session()->set('on_going_route', $this->request->getPost('on_going_route'));
            $routeModel = new Route();
            $seats = $routeModel->getSeats($this->request->getPost('on_going_route'));
            $selectedSeats = [];
            foreach ($seats as $seat) {
                if($seat['status'] == 1)
                {
                    array_push($selectedSeats, $seat['seat_no']);
                }
            }
            return view('seats', ['seats'=>$seats, 'selectedSeats'=>$selectedSeats, 'trip_type'=>'going']);
        }
    }
    public function seatSelect()
    {
       // echo $this->request->getPost('seatNumbers');
        if ($this->request->getPost('trip_type') == "going")
        {
            session()->set('goingSeats', $this->request->getPost('seatNumbers'));
            $seats = explode('|', $this->request->getPost('seatNumbers'));
            return view('ticketInfo', ['seats' => $seats, 'trip_type' => 'going']);
        }
        else
        {
            session()->set('returningSeats', $this->request->getPost('seatNumbers'));
            $seats = explode('|', $this->request->getPost('seatNumbers'));
            return view('ticketInfo', ['seats' => $seats, 'trip_type' => 'returning']);
        }
    }

    public function ticketInfo()
    {
        return view('ticketInfo');
    }

    public function checkTicketInfo()
    {
        $routeModel = new Route();
        $people = [];
        //round trip and request came from going part.
        if($this->request->getPost('trip_type') == 'going' && session()->has('isRoundTrip'))
        {
            $seats = explode('|',session()->get('goingSeats'));
            for ($i = 0; $i<count($seats); $i++)
            {
               $data = [
                           'name' => $this->request->getPost('name'.($i+1)),
                           'gender' => $this->request->getPost('gender'.($i+1)),
                           'seat_no' => $seats[$i],
                       ];
               array_push($people, $data);
            }
            session()->set('onGoingPeople', $people);
            $goingRoute = session()->get('on_going_route');
            $seatsInRoute = $routeModel->getSeats($goingRoute);
            for ($i = 0; $i<count($people); $i++)
            {
                for ($j = 0; $j<count($seatsInRoute); $j++)
                {
                    if ($people[$i]['seat_no'] == $seatsInRoute[$j]['seat_no'])
                    {
                        if($people[$i]['seat_no'] % 2 == 0 && $seatsInRoute[$j-1]['status'] == 1 && $people[$i]['gender'] != $seatsInRoute[$j-1]['gender'])
                        {
                            session()->setFlashdata('seats', $seats);
                            session()->setFlashdata('trip_type', $this->request->getPost('trip_type'));
                            return redirect()->back()->withInput()->with('errors', "You cannot travel next to an opposite gender.");
                        }
                        else if($people[$i]['seat_no'] % 2 == 1 && $seatsInRoute[$j+1]['status'] == 1 &&  $people[$i]['gender'] != $seatsInRoute[$j+1]['gender'])
                        {
                            session()->setFlashdata('seats', $seats);
                            session()->setFlashdata('trip_type', $this->request->getPost('trip_type'));
                            return redirect()->back()->withInput()->with('errors', "You cannot travel next to an opposite gender.");
                        }
                    }
                }
            }
            return redirect()->to("searchTickets?starting_destination=".session()->get('starting_destination')."&ending_destination=".session()->get('ending_destination')."&going_date=".session()->get('going_date')."&returning_date=".session()->get('returning_date'));
            //Süreci baştan başlatmak için searchTickets sayfasına yönlendir.
        }
        else if($this->request->getPost('trip_type') == "going")  //Request came from going and it is a one way trip.
        {
            $seats = explode('|',session()->get('goingSeats'));
            for ($i = 0; $i<count($seats); $i++)
            {
                $data = [
                    'name' => $this->request->getPost('name'.($i+1)),
                    'gender' => $this->request->getPost('gender'.($i+1)),
                    'seat_no' => $seats[$i],
                ];
                array_push($people, $data);
            }
            session()->set('onGoingPeople', $people);
            $goingRoute = session()->get('on_going_route');
            $seatsInRoute = $routeModel->getSeats($goingRoute);
            for ($i = 0; $i<count($people); $i++)
            {
                for ($j = 0; $j<count($seatsInRoute); $j++)
                {
                    if ($people[$i]['seat_no'] == $seatsInRoute[$j]['seat_no'])
                    {
                        if($people[$i]['seat_no'] % 2 == 0 && $seatsInRoute[$j-1]['status'] == 1 &&  $people[$i]['gender'] != $seatsInRoute[$j-1]['gender'])
                        {
                            session()->setFlashdata('seats', $seats);
                            session()->setFlashdata('trip_type', $this->request->getPost('trip_type'));
                            return redirect()->back()->withInput()->with('errors', "You cannot travel next to an opposite gender.");
                        }
                        else if($people[$i]['seat_no'] % 2 == 1 && $seatsInRoute[$j+1]['status'] == 1 &&  $people[$i]['gender'] != $seatsInRoute[$j+1]['gender'])
                        {
                            session()->setFlashdata('seats', $seats);
                            session()->setFlashdata('trip_type', $this->request->getPost('trip_type'));
                            return redirect()->back()->withInput()->with('errors', "You cannot travel next to an opposite gender.");
                        }
                    }
                }
            }

            return redirect()->to('process/payment');
        }
        else if($this->request->getPost('trip_type') == "returning")
        {
            $seats = explode('|',session()->get('returningSeats'));
            for ($i = 0; $i<count($seats); $i++)
            {
                $data = [
                    'name' => $this->request->getPost('name'.($i+1)),
                    'gender' => $this->request->getPost('gender'.($i+1)),
                    'seat_no' => $seats[$i],
                ];
                array_push($people, $data);
            }
            session()->set('returningPeople', $people);
            $returningRoute = session()->get('returning_route');
            $seatsInRoute = $routeModel->getSeats($returningRoute);
            for ($i = 0; $i<count($people); $i++)
            {
                for ($j = 0; $j<count($seatsInRoute); $j++)
                {
                    if ($people[$i]['seat_no'] == $seatsInRoute[$j]['seat_no'])
                    {
                        if($people[$i]['seat_no'] % 2 == 0 && $seatsInRoute[$j-1]['status'] == 1 &&  $people[$i]['gender'] != $seatsInRoute[$j-1]['gender'])
                        {
                            session()->setFlashdata('seats', $seats);
                            session()->setFlashdata('trip_type', $this->request->getPost('trip_type'));
                            return redirect()->back()->withInput()->with('errors', "You cannot travel next to an opposite gender.");
                        }
                        else if($people[$i]['seat_no'] % 2 == 1 && $seatsInRoute[$j+1]['status'] == 1 &&  $people[$i]['gender'] != $seatsInRoute[$j+1]['gender'])
                        {
                            session()->setFlashdata('seats', $seats);
                            session()->setFlashdata('trip_type', $this->request->getPost('trip_type'));
                            return redirect()->back()->withInput()->with('errors', "You cannot travel next to an opposite gender.");
                        }
                    }
                }
            }

            return redirect()->to('process/payment');
        }
    }
}
