<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\DaftarBukuModel;
use App\Models\PesanKontakModel;
use App\Models\PinjamBukuModel;

class User extends BaseController
{
    protected $daftarBukuModel;

    public function __construct(){
        $this->daftarBukuModel = new DaftarBukuModel();
    }

    public function login()
    {
        return view ('user/login_user');
    }

    public function home()
    {
        return view ('user/home_user');
    }

    public function tambahpinjam()
    {
        return view ('user/pinjam_buku');
    }

    public function prosesPesanUser()
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
           return view ('user/home_user');
       }
       $pesankontak = new PesanKontakModel();
       $pesankontak -> insert([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'email' => $this->request->getVar('email'),
            'pesan' => $this->request->getVar('pesan')
       ]);
       return view ('user/home_user');
    }

    public function bukuuser()
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

           return view('user/daftar_buku', $data);
        }

    public function prosesLogin()
    {
        $users = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();
        if ($dataUser){
            if (password_verify($password, $dataUser->password)){
                session()->set([
                    'username' =>$dataUser->username,
                    'nama_lengkap' => $dataUser->nama_lengkap,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('user/kehadiran'));
            }else{
                session()->setFlashdata('error', 'Username atau Password salah');
                return redirect()->back();
            }
        }else{
            session()->setFlashdata('error', 'Username dan Password salah');
            return redirect()->back();
        }
    }

    public function kehadiran()
    {
        return view ('user/kehadiran');
    }

    public function pinjam()
    {
        return view ('user/pinjam_buku');
    }


    public function signUp()
    {
        return view ('user/signup_user');
    }

    public function prosesDaftar()
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
        'username' => [
                'rules' => 'required|min_length[4]|max_length[10]|is_unique[users.username]',
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
       $users = new UserModel();
       $users -> insert([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
       ]);
       return view ('user/login_user');
    }

    public function tambahpinjambuku()
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
       $pinjambuku = new PinjamBukuModel();
       $pinjambuku -> insert([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'email' => $this->request->getVar('email'),
            'buku_satu' => $this->request->getVar('buku_satu'),
            'buku_dua' => $this->request->getVar('buku_dua')
       ]);

       return view('user/pinjam_buku');
    }

    

}