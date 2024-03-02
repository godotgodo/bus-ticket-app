<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTicketSeatsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ticket_id' => [
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
            ],
        ]);

        $this->forge->addForeignKey('ticket_id', 'tickets', 'ticket_id', '', 'CASCADE');
        $this->forge->addForeignKey('seat_id', 'seats', 'seat_id', '', 'CASCADE');
        $this->forge->createTable('ticketseats');
    }

    public function down()
    {
        $this->forge->dropTable('ticketseats');
    }
}
