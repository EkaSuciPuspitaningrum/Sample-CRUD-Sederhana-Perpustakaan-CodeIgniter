<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\PesanKontakModel;


class Admin extends BaseController
{


    public function login()
    {
        return view ('admin/login_admin');
    }

    public function signUp()
    {
        return view ('admin/signup_admin');
    }

    public function tambahpinjam()
    {
        return view ('admin/admin_tambahpeminjam');
    }

    public function home(){
        $pager = \Config\Services::pager();
        $model = new \App\Models\DaftarHadirModel();
        
        $currentPage = $this->request->getVar('page_bootstrap') ? $this->request->getVar('page_bootstrap') : 1;
  
        
        $data = [
            'daftarhadir'   => $model->paginate(5, 'bootstrap'),
            'pager'         => $model->pager,
            'currentPage'   => $currentPage
        ];

        return view('admin/admin_layout', $data);
    }

    public function kontakMasuk()
    {
        $pager = \Config\Services::pager();
        $model = new \App\Models\PesanKontakModel();
        
        $currentPage = $this->request->getVar('page_bootstrap') ? $this->request->getVar('page_bootstrap') : 1;

        $data = [
            'pesankontak'   => $model->paginate(5, 'bootstrap'),
            'pager'         => $model->pager,
            'currentPage'   => $currentPage
        ];

        return view('admin/admin_kontak', $data);
    }

    public function prosesDaftar()
    {
       if(!$this->validate([
        'nomor_keanggotaan' => [
            'rules' => 'required|max_length[10]',
            'errors' => [
                'required' => '{field} Harus Diisi',
                'max_length' => '{field} Maximal 10 Karakter'
            ]
        ], 
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
        'username' => [
                'rules' => 'required|min_length[4]|max_length[10]|is_unique[Users.username]',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maximal 10 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[10]',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maximal 10 Karakter'
                ]
            ],
                
       ])) {
           session()->setFlashdata('error', $this->validator->listErrors());
           return redirect()->back()->withInput();
       }
       $Users = new AdminModel();
       $Users -> insert([
            'nomor_keanggotaan' => $this->request->getVar('nomor_keanggotaan'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
       ]);
       return view ('admin/login_admin');
    }

    
    public function prosesLogin()
    {
        $users = new AdminModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUsers = $users->where([
            'username' => $username,
        ])->first();
        if ($dataUsers){
            if (password_verify($password, $dataUsers->password)){
                session()->set([
                    'username' =>$dataUsers->username,
                    'nama_lengkap' => $dataUsers->nama_lengkap,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('/homeAdmin'));
            }else{
                session()->setFlashdata('error', 'Username atau Password salah');
                return redirect()->back();
            }
        }else{
            session()->setFlashdata('error', 'Username dan Password salah');
            return redirect()->back();
        }
    }

    public function delete ($id){
        $pesankontak = new PesanKontakModel();
        $pesankontak->delete($id);
        return redirect()->to('/admin/kontak');
    }

    

    function logout (){
        session()->destroy();
        return redirect()-> to('');
    }



}