<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRezervationSeatsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'reservation_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'seat_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => TRUE
            ]
        ]);

        $this->forge->addForeignKey('reservation_id', 'reservations', 'reservation_id', '', 'CASCADE');
        $this->forge->addForeignKey('seat_id', 'seats', 'seat_id', '', 'CASCADE');
        $this->forge->createTable('reservationseats');
    }

    public function down()
    {
        $this->forge->dropTable('reservationseats');
    }
}
