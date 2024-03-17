<?php

namespace App\Models;

use CodeIgniter\Model;
use Faker\Core\DateTime;

class RouteTicket extends Model
{
    protected $table = 'routestickets';
    protected $allowedFields = ['route_id', 'ticket_id', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
