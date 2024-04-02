<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeatSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++)
        {
            $data = [
                        'route_id' => 3,
                        'seat_no' => $i,
                        'status' => 0
                    ];
            $this->db->table('seats')->insertBatch($data);
        }

    }
}
