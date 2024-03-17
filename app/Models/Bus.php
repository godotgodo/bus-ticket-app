<?php

namespace App\Models;

use CodeIgniter\Model;


class Bus extends Model
{
    protected $table = 'buses';
    protected $primaryKey = 'bus_id';
    protected $allowedFields = ['plate', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getRoutes($bus_id) : array
    {
        $routeModel = new Route();
        return $routeModel->where('bus_id', $bus_id)->findAll();
    }

}
