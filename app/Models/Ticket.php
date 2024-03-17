<?php

namespace App\Models;

use CodeIgniter\Model;
use Faker\Core\DateTime;

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
}
