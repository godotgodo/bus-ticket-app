<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSeatsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'seat_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'ticket_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'null'           => TRUE
            ],
            'reservation_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'null'           => TRUE
            ],
            'route_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],
            'seat_no' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'status' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0,
            ],
            'gender' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => TRUE
            ],
        ]);

        $this->forge->addPrimaryKey('seat_id');
        $this->forge->createTable('seats');
        $this->forge->addForeignKey('ticket_id', 'tickets', 'ticket_id', "", "SET NULL");
        $this->forge->addForeignKey('reservation_id', 'reservations', 'reservation_id', "", "SET NULL");
        $this->forge->addForeignKey('route_id', 'routes', 'route_id', "", "CASCADE");
    }

    public function down()
    {
        $this->forge->dropTable('seats');
    }
}
