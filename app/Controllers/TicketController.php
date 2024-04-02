<?php

namespace App\Controllers;

use App\Models\Route;

class TicketController extends BaseController
{
    public function searchTickets()
    {
        $starting_destination = $this->request->getGet('starting_destination');
        $ending_destination = $this->request->getGet('ending_destination');
        $going_date = $this->request->getGet('going_date');
        $returning_date = $this->request->getGet('returning_date');

        $routeModel = new Route();
        $tickets = $routeModel->searchTickets($starting_destination, $ending_destination, $going_date, $returning_date);

        $onGoingTickets = $tickets['going_query'];
        $returningTickets = $tickets['returning_query'];

        if($returning_date != "")
        {
            session()->set('isRoundTrip', true);
            session()->set('returning_date', $returning_date);
            session()->set('going_date', $going_date);
            session()->set('starting_destination', $starting_destination);
            session()->set('ending_destination', $ending_destination);
        }
        else{
            if(session()->has('isRoundTrip')){
                session()->remove('isRoundTrip');
            }
        }

        if(session()->has('on_going_route'))
        {
            $onGoingTickets = [];
        }
        else{
            $returningTickets = [];
        }

        return view('ticket_search_results', [
            'starting_destination' => $starting_destination,
            'ending_destination' => $ending_destination,
            'going_date' => $going_date,
            'returning_date' => $returning_date,
            'onGoingTickets' => $onGoingTickets,
            'returningTickets' => $returningTickets
        ]);
    }
}
