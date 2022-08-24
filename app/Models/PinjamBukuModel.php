<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamBukuModel extends Model{
    protected $table        = "pinjambuku";
    protected $primaryKey   = "id";
    protected $returnType   = "object";
    protected $useAutoIncrement   = true;
    protected $useTimestamps   = true;
    protected $allowedFields = ['id', 'nama_lengkap', 'email', 'buku_satu', 'buku_dua', 'created_at', 'updated_at'];

    public function search ($keyword){
        // $builder = $this->table('daftarbuku');
        // $builder -> like('judul_buku', $keyword);
        // return $builder;
    
        return $this->table("pinjambuku")->like('nama_lengkap', $keyword);
    }
}

?>