<?php

namespace App\Controllers;

class TicketController extends BaseController
{
    public function searchTickets() {
        $queries=$this->request->getVar();
        return $queries['starting_destination']."'den ".$queries['ending_destination']."'e bilet araması yapıldı";
    }
}