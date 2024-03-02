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
    }

    public function down()
    {
        $this->forge->dropTable('seats');
    }
}
