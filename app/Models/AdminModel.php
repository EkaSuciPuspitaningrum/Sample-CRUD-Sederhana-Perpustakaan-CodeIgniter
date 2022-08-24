<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model{
    protected $table        = "admin";
    protected $primaryKey   = "username";
    protected $returnType   = "object";
    protected $allowedFields = ['nomor_keanggotaan', 'nama_lengkap', 'email', 'username', 'password'];
}

?>