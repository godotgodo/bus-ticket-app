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

        return view('ticket_search_results', [
            'starting_destination' => $starting_destination,
            'ending_destination' => $ending_destination,
            'going_date' => $going_date,
            'returning_date' => $returning_date,
            'tickets' => $tickets,
        ]);
    }
}
