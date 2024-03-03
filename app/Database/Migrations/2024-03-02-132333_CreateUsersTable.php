<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'identity_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'gender' => [
                'type' => 'TINYINT',
                'constraint' => 1,
            ],
            'age' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'job' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'passport_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('user_id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
