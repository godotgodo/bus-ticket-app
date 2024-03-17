<?php

namespace App\Models;

use CodeIgniter\Model;

class Route extends Model
{
    protected $table = 'routes';
    protected $primaryKey = 'route_id';
    protected $allowedFields = ['arrival_date', 'destination_id', 'bus_id', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getBus($route_id)
    {
        $busId = $this->find($route_id)['bus_id'];
        $busModel = new Bus();
        return $busModel->find($busId);
    }
    public function getDestination($route_id)
    {
        $destinationId = $this->find($route_id)['destination_id'];
        $destinationModel = new Destination();
        return $destinationModel->find($destinationId);
    }
    public function getSeats($route_id) : array
    {
        $seatModel = new Seat();
        return $seatModel->where('route_id', $route_id)->findAll();
    }
}
