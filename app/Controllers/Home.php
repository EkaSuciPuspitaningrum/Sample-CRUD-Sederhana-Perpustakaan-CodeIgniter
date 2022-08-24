<?php

namespace App\Controllers;
use App\Models\PesanKontakModel;

class Home extends BaseController
{
    public function index()
    {
        return view('home');
    }

    public function login()
    {
        return view ('login');
    }

    public function prosesPesan()
    {
       if(!$this->validate([
        'nama_lengkap' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Harus Diisi'
            ]
        ], 
        'email' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Harus Diisi'
            ]
        ], 
        'pesan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ]
                
       ])) {
           session()->setFlashdata('error', $this->validator->listErrors());
           return view ('home')->withInput();
       }
       $pesankontak = new PesanKontakModel();
       $pesankontak -> insert([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'email' => $this->request->getVar('email'),
            'pesan' => $this->request->getVar('pesan')
       ]);
       return view ('home');
    }
}
