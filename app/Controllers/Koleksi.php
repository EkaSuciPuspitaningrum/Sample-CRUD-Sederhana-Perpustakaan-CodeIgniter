<?php

namespace App\Controllers;
use App\Models\DaftarBukuModel;
use App\Models\PinjamBukuModel;

class Koleksi extends BaseController
{

    protected $daftarBukuModel;

    public function __construct(){
        $this->daftarBukuModel = new DaftarBukuModel();
    }
    
    public function tambah()
    {
           return view('admin/admin_tambahbuku');
        }

        public function editData()
        {
               return view('admin/admin_editdata');
            } 
    
    public function buku()
    {
           $pager = \Config\Services::pager();
           $model = new DaftarBukuModel();
           
           $currentPage = $this->request->getVar('page_boot') ? $this->request->getVar('page_boot') : 1;
     
           $keyword = $this->request->getVar('keyword');
           if($keyword){
               $buku = $this->daftarBukuModel->search($keyword);
           }else{
               $buku = $this->daftarBukuModel;
           }

           $data = [
            'daftarbuku'   => $this->daftarBukuModel->paginate(5, 'boot'),
            'pager'         => $this->daftarBukuModel->pager,
            'currentPage'   => $currentPage
        ];

           return view('admin/admin_buku', $data);
        }

        public function dataPinjam()
        {
               $pager = \Config\Services::pager();
               $model = new PinjamBukuModel();
               
               $currentPage = $this->request->getVar('page_boot') ? $this->request->getVar('page_boot') : 1;
         
               $data = [
                   'pinjambuku'   => $model->paginate(5, 'boot'),
                   'pager'         => $model->pager,
                   'currentPage'   => $currentPage
               ];
    
               return view('admin/admin_datapinjam', $data);
            }


        public function prosesTambahBuku()
        {
        if(!$this->validate([
            'judul_buku' => [
                'rules' => 'required|min_length[1]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'min_length' => '{field} Minimal 1 Karakter',
                    'max_length' => '{field} Maximal 100 Karakter'
                ]
            ], 
            'nama_penulis' => [
                'rules' => 'required|min_length[1]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'min_length' => '{field} Minimal 1 Karakter',
                    'max_length' => '{field} Maximal 100 Karakter'
                ]
            ], 
            'penerbit' => [
                    'rules' => 'required|min_length[1]|max_length[1000]',
                    'errors' => [
                        'required' => '{field} Harus Diisi',
                        'min_length' => '{field} Minimal 1 Karakter',
                        'max_length' => '{field} Maximal 100 Karakter'
                        
                    ]
            ],
            'jumlah_halaman' => [
                    'rules' => 'required|min_length[1]|max_length[1000]',
                    'errors' => [
                    'required' => '{field} Harus Diisi',
                    'min_length' => '{field} Minimal 1 Karakter',
                    'max_length' => '{field} Maximal 100 Karakter'
                            
                    ]
            ],
            'tahun_terbit' => [
                'rules' => 'required|min_length[1]|max_length[1000]',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'min_length' => '{field} Minimal 1 Karakter',
                    'max_length' => '{field} Maximal 100 Karakter'
                    
                ]
            ],
            'jenis_buku' => [
                    'rules' => 'required|min_length[1]|max_length[1000]',
                    'errors' => [
                    'required' => '{field} Harus Diisi',
                    'min_length' => '{field} Minimal 1 Karakter',
                    'max_length' => '{field} Maximal 100 Karakter'
                            
                    ]
            ]    
                    
           ])) {
               session()->setFlashdata('error', $this->validator->listErrors());
               return redirect()->back()->withInput();
           }
           $daftarbuku = new DaftarBukuModel();
           $daftarbuku -> insert([
                'judul_buku' => $this->request->getVar('judul_buku'),
                'nama_penulis' => $this->request->getVar('nama_penulis'),
                'penerbit' => $this->request->getVar('penerbit'),
                'jumlah_halaman' => $this->request->getVar('jumlah_halaman'),
                'tahun_terbit' => $this->request->getVar('tahun_terbit'),
                'jenis_buku' => $this->request->getVar('jenis_buku'),
           ]);

           return view('admin/admin_tambahbuku');
        }


        public function delete ($id){
            $daftarbuku = new DaftarBukuModel();
            $daftarbuku->delete($id);
            return redirect()->to('/koleksi/buku');
        }

        public function hapus ($id){
            $daftarbuku = new PinjamBukuModel();
            $daftarbuku->delete($id);
            return redirect()->to('/koleksi/dataPinjam');
        }


        public function edit ($id){
            $daftarbuku = new DaftarBukuModel();
            $data['daftarbuku'] = $daftarbuku->where('id', $id)->first();
            
            $validation = \Config\Services::validation();
            $validation->setRules([
                'id' => 'required',
                'judul_buku' => 'required',
                'nama_penulis' => 'required',
                'penerbit' => 'required'
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();

            if($isDataValid){
                $daftarbuku->update($id, [
                    'judul_buku' => $this->request->getPost('judul_buku'),
                    'nama_penulis' => $this->request->getPost('nama_penulis'),
                    'penerbit' => $this->request->getPost('penerbit'),
                    'jumlah_halaman' => $this->request->getPost('jumlah_halaman'),
                    'tahun_terbit' => $this->request->getPost('tahun_terbit'),
                    'jenis_buku' => $this->request->getPost('jenis_buku'),
                ]);

            }

                echo view ('admin/admin_editdata', $data);
        }
}