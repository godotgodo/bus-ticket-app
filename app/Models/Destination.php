<?php

namespace App\Models;

use CodeIgniter\Model;


class Destination extends Model
{
    protected $table = 'destinations';
    protected $primaryKey = 'destination_id';
    protected $allowedFields = ['starting_destination', 'ending_destination', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getRoutes($destination_id) : array
    {
        $routeModel = new Route();
        return $routeModel->where('destination_id', $destination_id)->findAll();
    }

}
