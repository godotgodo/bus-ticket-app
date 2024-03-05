<?php

namespace App\Controllers;

class TicketController extends BaseController
{
    public function searchTickets() {
        $queries=$this->request->getVar();
        return $queries['startingDestination']."'den ".$queries['endingDestination']."'e bilet araması yapıldı";
    }
}