<?php

namespace App\Models;

use CodeIgniter\Model;
use Faker\Core\DateTime;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'reservation_id';
    protected $allowedFields = ['route_id', 'user_id', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getRoute($reservation_id)
    {
        $reservation = $this->find($reservation_id);
        $routeModel = new Route();
        return $routeModel->find($reservation['route_id']);
    }
    public function getSeats($reservation_id) : array
    {
        $seatModel = new Seat();
        return $seatModel->where('reservation_id', $reservation_id)->findAll();
    }
    public function getUser($reservation_id)
    {
        $user_id = $this->find($reservation_id)['user_id'];
        $userModel = new User();
        return $userModel->find($reservation_id);
    }
}
