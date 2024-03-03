<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ticket_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
            ],
            'pnr_number' => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ],
            'status' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => TRUE
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2'
            ],
            'is_round_trip' => [
                'type' => 'TINYINT',
                'constraint' => 1,
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
        $this->forge->addPrimaryKey('ticket_id');
        $this->forge->addForeignKey('user_id', 'users', 'user_id', "", "CASCADE");
        $this->forge->createTable('tickets');
    }

    public function down()
    {
        $this->forge->dropTable('tickets');
    }
}
