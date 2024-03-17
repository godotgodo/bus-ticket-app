<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;


class Ticket extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'ticket_id';
    protected $allowedFields = ['user_id', 'pnr_number', 'status', 'price', 'is_round_trip', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getUser($ticket_id)
    {
       $user_id = $this->find($ticket_id)['user_id'];
       $userModel = new User();
       return $userModel->find($ticket_id);
    }
    public function getSeats($ticket_id) : array
    {
        $seatModel = new Seat();
        return $seatModel->where('ticket_id', $ticket_id)->findAll();
    }
    public function generatePnr($ticket_id)
    {
        $plates = ['antalya'=>'07', 'izmir'=>'35', 'ankara'=>'06','istanbul'=>'34'];
        $ticketRoutes = new RouteTicket();
        $route_id = $ticketRoutes->where('ticket_id', $ticket_id)->first()['route_id'];
        $routeModel = new Route();
        $destination = $routeModel->getDestination($route_id);
        $bus = $routeModel->getBus($route_id);
        $dateTime = new DateTime();
        $ampm = $dateTime->format('a') == 'pm' ? 'ÖS' : 'ÖÖ';
        $formattedDateTime = $dateTime->format('dmYHis');
        $cityCode = $plates[$destination['starting_destination']];
        $plate = str_replace(' ', '', $bus['plate']);
        $pnrCode = $cityCode . $ampm . $formattedDateTime . 'D' . $plate;
        $ticketToUpdate = $this->find($ticket_id);
        $ticketToUpdate['pnr_number'] = $pnrCode;
        $this->save($ticketToUpdate);
        return $pnrCode;
    }
}
