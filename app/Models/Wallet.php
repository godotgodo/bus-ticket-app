<?php

namespace App\Models;

use CodeIgniter\Model;
use Faker\Core\DateTime;

class Wallet extends Model
{
    protected $table = 'wallets';
    protected $primaryKey = 'wallet_id';
    protected $allowedFields = ['user_id', 'balance', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getUser($wallet_id)
    {
        $user_id = $this->find($wallet_id)['user_id'];
        $userModel = new User();
        return $userModel->find($user_id);
    }
}
