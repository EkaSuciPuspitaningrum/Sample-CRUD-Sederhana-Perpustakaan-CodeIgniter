<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nomor_keanggotaan'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '10',
            ],
            'nama_lengkap'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'email'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'username'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'password'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ]
        ]);
        $this->forge->addPrimaryKey('username', true);
        $this->forge->createTable('admin', true);
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}
