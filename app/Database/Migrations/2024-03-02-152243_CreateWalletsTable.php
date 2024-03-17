<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWalletsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'wallet_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'unique' => true
            ],
            'balance' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false,
                'default'=> 0
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

        $this->forge->addPrimaryKey('wallet_id');
        $this->forge->addForeignKey('user_id', 'users', 'user_id', '', 'CASCADE');
        $this->forge->createTable('wallets');
        $this->forge->addUniqueKey('user_id');
    }

    public function down()
    {
        $this->forge->dropTable('wallets');
    }
}
