<?php

namespace App\Controllers;

use App\Models\PinjamBukuModel;

class Pinjam extends BaseController
{
    
    protected $pinjamBukuModel;

    public function __construct(){
        $this->pinjamBukuModel = new PinjamBukuModel();
    }

    public function pinjam()
    {
           $pager = \Config\Services::pager();
           $model = new PinjamBukuModel();
           
           $currentPage = $this->request->getVar('page_boot') ? $this->request->getVar('page_boot') : 1;

           $keyword = $this->request->getVar('keyword');
           if($keyword){
               $buku = $this->pinjamBukuModel->search($keyword);
           }else{
               $buku = $this->pinjamBukuModel;
           }

           $data = [
               'pinjambuku'   => $this->pinjamBukuModel->paginate(5, 'boot'),
               'pager'         => $this->pinjamBukuModel->pager,
               'currentPage'   => $currentPage
           ];

           return view('admin/admin_datapinjam', $data);
        }


    public function tambahpinjam()
    {
    if(!$this->validate([
        'nama_lengkap' => [
            'rules' => 'required|min_length[1]|max_length[100]',
            'errors' => [
                'required' => '{field} Harus Diisi',
                'min_length' => '{field} Minimal 1 Karakter',
                'max_length' => '{field} Maximal 100 Karakter'
            ]
        ], 
        'email' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Harus Diisi'
            ]
        ], 
        'buku_satu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi'
                    
                ]
        ]
                
       ])) {
           session()->setFlashdata('error', $this->validator->listErrors());
           return redirect()->back()->withInput();
       }
       $daftarbuku = new PinjamBukuModel();
       $daftarbuku -> insert([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'email' => $this->request->getVar('email'),
            'penerbit' => $this->request->getVar('penerbit'),
            'buku_satu' => $this->request->getVar('buku_satu'),
            'buku_dua' => $this->request->getVar('buku_dua')
       ]);

       return view('admin/admin_tambahpeminjam');
    }

}