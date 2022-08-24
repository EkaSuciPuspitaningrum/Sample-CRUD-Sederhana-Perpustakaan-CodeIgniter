<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PinjamBuku extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'  => [
                'type'          => 'int',
                'constraint'    =>  5,
                'unsigned'      => true,
                'auto_increment'=> true
            ],
            'nama_lengkap'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'email'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'buku_satu'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'buku_dua'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'created_at'  => [
                'type'          => 'DATETIME',
                'null'    => true,
            ],
            'updated_at'  => [
                'type'          => 'DATETIME',
                'null'    => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pinjambuku', true);
    }

    public function down()
    {
        $this->forge->dropTable('pinjambuku');
    }
}
