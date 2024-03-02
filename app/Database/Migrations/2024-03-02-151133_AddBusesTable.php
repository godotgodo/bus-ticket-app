<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBusesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'bus_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'plate' => [
                'type'       => 'VARCHAR',
                'constraint' => 255
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
        $this->forge->addPrimaryKey('bus_id');
        $this->forge->createTable('buses');
    }

    public function down()
    {
        $this->forge->dropTable('buses');
    }
}
