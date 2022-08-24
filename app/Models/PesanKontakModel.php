<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanKontakModel extends Model{
    protected $table        = "pesankontak";
    protected $primaryKey   = "id";
    protected $returnType   = "object";
    protected $useAutoIncrement   = true;
    protected $useTimestamps   = true;
    protected $allowedFields = ['id','nama_lengkap', 'email', 'pesan'];
}

?>