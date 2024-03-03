<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDestinationsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'destination_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'starting_destination' => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ],
            'ending_destination' => [
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
        $this->forge->addPrimaryKey('destination_id');
        $this->forge->createTable('destinations');
    }

    public function down()
    {
        $this->forge->dropTable('destinations');
    }
}
