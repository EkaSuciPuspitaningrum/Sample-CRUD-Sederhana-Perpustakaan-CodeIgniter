<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarBukuModel extends Model{
    protected $table        = "daftarbuku";
    protected $primaryKey   = "id";
    protected $returnType   = "object";
    protected $useAutoIncrement   = true;
    protected $allowedFields = ['id', 'judul_buku', 'nama_penulis', 'penerbit', 'jumlah_halaman', 'tahun_terbit', 'jenis_buku'];

public function search ($keyword){
    // $builder = $this->table('daftarbuku');
    // $builder -> like('judul_buku', $keyword);
    // return $builder;

    return $this->table("daftarbuku")->like('judul_buku', $keyword);
}

}

?>