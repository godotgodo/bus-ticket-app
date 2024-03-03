<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoutesTicketsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'route_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'ticket_id' => [
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

        $this->forge->addForeignKey('route_id', 'routes', 'route_id', '', 'CASCADE');
        $this->forge->addForeignKey('ticket_id', 'tickets', 'ticket_id', '', 'CASCADE');
        $this->forge->createTable('routestickets');
    }

    public function down()
    {
        $this->forge->dropTable('routestickets');
    }
}
