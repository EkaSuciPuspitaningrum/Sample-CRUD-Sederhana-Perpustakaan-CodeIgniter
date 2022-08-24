<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarHadirModel extends Model{
    protected $table        = "daftarhadir";
    protected $primaryKey   = "id";
    protected $returnType   = "object";
    protected $useAutoIncrement   = true;
    protected $useTimestamps   = true;
    protected $allowedFields = ['nama_lengkap', 'email', 'created_at'];
}

?>