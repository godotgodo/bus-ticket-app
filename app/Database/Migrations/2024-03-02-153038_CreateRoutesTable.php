<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoutesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'route_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'arrival_date' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'destination_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'bus_id' => [
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

        $this->forge->addPrimaryKey('route_id');
        $this->forge->addForeignKey('destination_id', 'destinations', 'destination_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('bus_id', 'buses', 'bus_id');
        $this->forge->createTable('routes');
    }

    public function down()
    {
        $this->forge->dropTable('routes');
    }
}
