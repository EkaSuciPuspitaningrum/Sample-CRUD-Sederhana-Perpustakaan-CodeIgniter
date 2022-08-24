<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->post('/prosesPesan', 'Home::prosesPesan');


$routes->get('/loginAdmin', 'Admin::login');
$routes->get('/homeAdmin', 'Admin::home');
$routes->post('/login/admin', 'Admin::prosesLogin');
$routes->get('/signUpAdmin', 'Admin::signUp');
$routes->post('/Admin/prosesDaftar', 'Admin::prosesDaftar');
$routes->get('/keluar', 'Admin::logout');
$routes->get('/admin/kontakMasuk', 'Admin::kontakMasuk');
$routes->get('/admin/tambahpinjam', 'Admin::tambahpinjam');


$routes -> group('admin', function($routes){
    $routes -> add('kontak/(:segment)/edit', 'Admin::edit/$1');
    $routes -> get('kontak/(:segment)/delete', 'Admin::delete/$1');
});

$routes -> group('koleksi', function($routes){
    $routes -> add('bukunya/(:segment)/edit', 'Koleksi::edit/$1');
    $routes -> get('bukunya/(:segment)/delete', 'Koleksi::delete/$1');
    $routes -> get('pinjam/(:segment)/hapus', 'Koleksi::hapus/$1');
});

$routes->add('/koleksi/edit', 'Koleksi::edit');
$routes->get('/update', 'Koleksi::update');
$routes->get('/admin/kontak', 'Admin::kontakMasuk');

$routes->get('/koleksi/editData', 'Koleksi::editData');
$routes->get('/koleksi/tambah', 'Koleksi::tambah');
$routes->get('/koleksi/buku', 'Koleksi::buku');
$routes->post('/koleksi/prosesTambahBuku', 'Koleksi::prosesTambahBuku');



$routes->get('/kehadiran', 'User::kehadiran');
$routes->get('/homeUser', 'User::home');
$routes->get('/signUpUser', 'User::signUp');
$routes->post('/User/prosesDaftar', 'User::prosesDaftar');
$routes->get('/loginUser', 'User::login');
$routes->post('/login/user', 'User::prosesLogin');
$routes->get('/user/bukuuser', 'user::bukuuser');
$routes->post('/prosesPesanUser', 'User::prosesPesanUser');
$routes->get('/user/tambahpinjambuku', 'User::tambahpinjambuku');
$routes->get('/user/pinjam', 'User::pinjam');

$routes->post('/Hadir/prosesHadir', 'Hadir::prosesHadir');
$routes->post('/index/hadir', 'Hadir::index');

$routes->get('/pinjam/pinjam', 'Pinjam::pinjam');
$routes->get('/pinjam/tambahpinjam', 'Pinjam::tambahpinjam');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
