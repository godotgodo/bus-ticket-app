<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

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
    public function getSeats($route_id): array
    {
        $seatModel = new Seat();
        return $seatModel->where('route_id', $route_id)->findAll();
    }
    public function searchTickets($starting_destination, $ending_destination, $going_date, $returning_date = null)
    {
        $going_query = $this->select('*')
            ->join('destinations', 'routes.destination_id = destinations.destination_id')
            ->where('destinations.starting_destination', $starting_destination)
            ->where('destinations.ending_destination', $ending_destination)
            ->where('DATE(routes.arrival_date)', $going_date)
            ->findAll();

        $returning_query = [];
        if ($returning_date) {
            $returning_query = $this->select('*')
                ->join('destinations', 'routes.destination_id = destinations.destination_id')
                ->where('destinations.starting_destination', $ending_destination)
                ->where('destinations.ending_destination', $starting_destination)
                ->where('DATE(routes.arrival_date)', $returning_date)
                ->findAll();
        }

       // $results = array_merge($going_query, $returning_query ?? []);

        foreach ($going_query as &$going) {
            $dateTime = DateTime::createFromFormat("Y-m-d H:i:s", $going['arrival_date']);
            $going['time'] = $dateTime->format("H") . ":" . $dateTime->format("i");
            $going['arrival_date'] = date('d.m.Y', strtotime($going['arrival_date']));
        }
        foreach ($returning_query as &$returning) {
            $dateTime = DateTime::createFromFormat("Y-m-d H:i:s", $returning['arrival_date']);
            $returning['time'] = $dateTime->format("H") . ":" . $dateTime->format("i");
            $returning['arrival_date'] = date('d.m.Y', strtotime($returning['arrival_date']));
        }
        session()->set('going_query', $going_query);
        session()->set('returning_query', $returning_query);
        return ['going_query'=>$going_query, 'returning_query'=>$returning_query];
    }
}
