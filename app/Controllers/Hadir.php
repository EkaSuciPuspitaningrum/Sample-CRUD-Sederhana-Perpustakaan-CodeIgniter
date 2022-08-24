<?php

namespace App\Controllers;

use App\Models\DaftarHadirModel;

class Hadir extends BaseController
{
    
    protected $daftarhadir;

    public function prosesHadir()
    {
       if(!$this->validate([
        'nama_lengkap' => [
            'rules' => 'required|min_length[4]|max_length[100]',
            'errors' => [
                'required' => '{field} Harus Diisi',
                'min_length' => '{field} Minimal 4 Karakter',
                'max_length' => '{field} Maximal 100 Karakter'
            ]
        ], 
        'email' => [
            'rules' => 'required|min_length[4]|max_length[100]',
            'errors' => [
                'required' => '{field} Harus Diisi'
            ]
        ],
                
       ])) {
           session()->setFlashdata('error', $this->validator->listErrors());
           return redirect()->back()->withInput();
       }
       $daftarhadir = new DaftarHadirModel();
       $daftarhadir -> insert([
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email')
       ]);
       return view ('user/home_user');
    }

    public function index(){
        $pager = \Config\Services::pager();
        $model = new \App\Models\DaftarHadirModel();
        
        $currentPage = $this->request->getVar('homeAdmin') ? $this->request->getVar('homeAdmin') : 1;
  
        $data = [
            'daftarhadir'   => $this->$model->paginate(5, 'daftarhadir'),
            'pager'         => $this->$model->pager,
            'currentPage'   => $currentPage
        ];

        return view('admin/admin_layout', $data);
    }

}