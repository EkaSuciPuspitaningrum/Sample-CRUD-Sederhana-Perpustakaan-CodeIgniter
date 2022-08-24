<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Hadir extends Controller
{
    public function index(){
        $pager = \Config\Services::pager();
        $model = new \App\Models\DaftarHadirModel();

        $data = [
            "daftarhadir" => $model ->paginate(5, 'bootstrap'),
            "pager"       => $model ->pager
        ];
        return view('admin/admin_layout', $data);
    }

}