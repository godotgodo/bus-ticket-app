<?php

namespace App\Models;

use CodeIgniter\Model;

class Seat extends Model
{
    protected $table = 'seats';
    protected $primaryKey = 'seat_id';
    protected $allowedFields = ['ticket_id', 'reservation_id', 'route_id','seat_no', 'status', 'gender', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getRoute($seat_id)
    {
        $seat = $this->find($seat_id);
        $routeModel = new Route();
        return $routeModel->find($seat['route_id']);
    }
    public function getReservation($seat_id)
    {
        $seat = $this->find($seat_id);
        $reservationModel = new Reservation();
        return $reservationModel->find($seat['reservation_id']);
    }
    public function getTicket($seat_id)
    {
        $seat = $this->find($seat_id);
        $ticketModel = new Ticket();
        return $ticketModel->find($seat['ticket_id']);
    }
}
