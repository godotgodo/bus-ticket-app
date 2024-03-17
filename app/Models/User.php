<?php

namespace App\Models;

use CodeIgniter\Model;
use Faker\Core\DateTime;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['name', 'email', 'password','identity_number','phone_number','gender','age','job', 'is_admin', 'passport_number', 'created_at','updated_at'];
    protected $useTimestamps = true;

    public function getWallet($user_id)
    {
        $walletModel = new Wallet();
        return $walletModel->where('user_id', $user_id)->first();
    }
    public function getTickets($user_id) : array
    {
        $ticketModel = new Ticket();
        return $ticketModel->where('user_id', $user_id)->findAll();
    }
    public function getReservations($user_id) : array
    {
        $reservationModel = new Reservation();
        return $reservationModel->where('user_id', $user_id)->findAll();
    }
    public function createWallet($user_id)
    {
        $walletModel = new Wallet();
        $wallet = $walletModel->where('user_id', $user_id)->first();
        if($wallet != null) return;
        $data = ['user_id' => $user_id];
        $walletModel->save($data);
    }
}
