<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSeatRoutesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'route_id' => [
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

        $this->forge->addForeignKey('route_id', 'routes', 'route_id', '', 'CASCADE');
        $this->forge->addForeignKey('seat_id', 'seats', 'seat_id', '', 'CASCADE');
        $this->forge->createTable('seatroutes');
    }

    public function down()
    {
        $this->forge->dropTable('seatroutes');
    }
}
