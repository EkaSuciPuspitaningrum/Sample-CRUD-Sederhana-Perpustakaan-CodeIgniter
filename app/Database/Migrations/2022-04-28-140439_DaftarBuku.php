<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarBuku extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'  => [
                'type'          => 'int',
                'constraint'    =>  5,
                'auto_increment'=> true,
                'unsigned'      => true
            ],
            'judul_buku'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'nama_penulis'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'penerbit'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'jumlah_halaman'  => [
                'type'          => 'int',
                'constraint'    =>  5,
            ],
            'tahun_terbit'  => [
                'type'          => 'int',
                'constraint'    =>  5,
            ],
            'jenis_buku'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('daftarbuku', true);
    }

    public function down()
    {
        $this->forge->dropTable('daftarbuku');
    }
}
