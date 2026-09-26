<?php

namespace Config;

// Import the required controller classes to resolve namespace errors
use App\Controllers\ApiTest;
use App\Controllers\Dashboard;
use App\Controllers\DataInstansi;
use App\Controllers\Diklat;
use App\Controllers\Fakultas;
use App\Controllers\JenisInstansi;
use App\Controllers\Kegiatan;
use App\Controllers\Laporan;
use App\Controllers\PelatihanEksternal;
use App\Controllers\PelatihanInternal;
use App\Controllers\Ruangan;
use App\Controllers\TempatTidur;

// ... (rest of your Routes.php file remains unchanged)
/**
 * @var RouteCollection $routes
 */

// ===============================
// DEFAULT
// ===============================
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);
$routes->get('admin/user/edit/(:num)', '\App\Modules\Admin\Controllers\User::edit/$1');
$routes->post('admin/user/update/(:num)', '\App\Modules\Admin\Controllers\User::update/$1');
$routes->get('admin/user/delete/(:num)', '\App\Modules\Admin\Controllers\User::delete/$1');;
$routes->get('dashboard', '\App\Modules\Dashboard\Controllers\Dashboard::index');
$routes->get('/', '\App\Modules\Auth\Controllers\Auth::login');

// ===============================
// ROOT Api
// ===============================

$routes->group('api', function($routes) {

    $routes->get('diklat', '\App\Modules\Diklat\Controllers\Api\DiklatApi::index');

    $routes->get('diklat/(:num)', '\App\Modules\Diklat\Controllers\Api\DiklatApi::show/$1');

    $routes->post('diklat', '\App\Modules\Diklat\Controllers\Api\DiklatApi::create');

    $routes->put('diklat/(:num)', '\App\Modules\Diklat\Controllers\Api\DiklatApi::update/$1');

    $routes->delete('diklat/(:num)', '\App\Modules\Diklat\Controllers\Api\DiklatApi::delete/$1');

});

$routes->get('api-test', 'ApiTest::index');



// ===============================
// ===============================
// DASHBOARD (MODULE)
// ===============================



// ===============================
// LOGIN
// ===============================

$routes->get('user', 'User::index');
$routes->get('user/create', 'User::create');
$routes->post('user/store', 'User::store');

$routes->group('admin', ['namespace' => 'App\Modules\Admin\Controllers'], function($routes) {
    $routes->get('user', 'User::index');
    $routes->get('user/create', 'User::create');
    $routes->post('user/store', 'User::store');
});




// ===============================
// MASTER DATA
// ===============================
$routes->group('master', ['namespace' => 'App\Modules\Master\Controllers'], function ($routes) {

    // Jenis Instansi
    $routes->get('jenis-instansi', 'JenisInstansi::index');
    $routes->get('jenis-instansi/create', 'JenisInstansi::create');
    $routes->post('jenis-instansi/store', 'JenisInstansi::store');
    $routes->get('jenis-instansi/edit/(:num)', 'JenisInstansi::edit/$1');
    $routes->post('jenis-instansi/update/(:num)', 'JenisInstansi::update/$1');
    $routes->get('jenis-instansi/delete/(:num)', 'JenisInstansi::delete/$1');

    // Data Instansi
    $routes->get('data-instansi', 'DataInstansi::index');
    $routes->add('data-instansi/create', 'DataInstansi::create');
    $routes->add('data-instansi/store', 'DataInstansi::store');
    $routes->add('data-instansi/edit/(:num)', 'DataInstansi::edit/$1');
    $routes->add('data-instansi/update/(:num)', 'DataInstansi::update/$1');
    $routes->get('data-instansi/delete/(:num)', 'DataInstansi::delete/$1');

   // Data Fakultas
    $routes->get('data-fakultas', 'Fakultas::index');
    $routes->post('data-fakultas/store', 'Fakultas::store');
    $routes->post('data-fakultas/update/(:num)', 'Fakultas::update/$1');
    $routes->get('data-fakultas/delete/(:num)', 'Fakultas::delete/$1');

    // Data Ruangan
    $routes->get('ruangan', 'Ruangan::index');
    $routes->post('ruangan/store', 'Ruangan::store');
    $routes->post('ruangan/update/(:num)', 'Ruangan::update/$1');
    $routes->get('ruangan/delete/(:num)', 'Ruangan::delete/$1');



    // Tempat Tidur
    $routes->get('tempat-tidur', 'TempatTidur::index');
    $routes->post('tempat-tidur/store', 'TempatTidur::store');
    $routes->post('tempat-tidur/update/(:num)', 'TempatTidur::update/$1');
    $routes->get('tempat-tidur/delete/(:num)', 'TempatTidur::delete/$1');


    // Kegiatan
    $routes->get('kegiatan', 'Kegiatan::index');
    $routes->post('kegiatan/store', 'Kegiatan::store');
    $routes->post('kegiatan/update/(:num)', 'Kegiatan::update/$1');
    $routes->get('kegiatan/delete/(:num)', 'Kegiatan::delete/$1');

});
$routes->group('master', ['namespace' => 'App\Modules\Master\Controllers'], function ($routes) {

    // INTERNAL
    $routes->get('pelatihan_internal', 'PelatihanInternal::index');
    $routes->post('pelatihan_internal/store', 'PelatihanInternal::store');
    $routes->post('pelatihan_internal/update/(:num)', 'PelatihanInternal::update/$1');
    $routes->get('pelatihan_internal/delete/(:num)', 'PelatihanInternal::delete/$1');

    // EKSTERNAL
    $routes->get('pelatihan_eksternal', 'PelatihanEksternal::index');
    $routes->post('pelatihan_eksternal/store', 'PelatihanEksternal::store');
    $routes->post('pelatihan_eksternal/update/(:num)', 'PelatihanEksternal::update/$1');
    $routes->get('pelatihan_eksternal/delete/(:num)', 'PelatihanEksternal::delete/$1');
});
    // ================= LAPORAN =================
$routes->group('master', ['namespace' => 'App\Modules\Master\Controllers'], function ($routes) {

    $routes->get('laporan/internal', 'Laporan::internal');
    $routes->get('laporan/eksternal', 'Laporan::eksternal');
    $routes->get('laporan/export_excel', 'Laporan::export_excel');
    $routes->get('laporan/export_internal', 'Laporan::export_internal');
    $routes->get('laporan/export_eksternal', 'Laporan::export_eksternal');
    // alias URL lama (biar tidak 404)
    $routes->get('laporan_internal', 'Laporan::internal');
    $routes->get('laporan_eksternal', 'Laporan::eksternal');

});

$routes->group('master', ['namespace' => 'App\Modules\Master\Controllers'], function ($routes) {
    $routes->get('laporan', 'Laporan::index');
    $routes->get('laporan/export_excel', 'Laporan::export_excel');
});




///Diklat
// ================= DIKLAT =================

$routes->group('diklat',['namespace'=>'App\Modules\Diklat\Controllers'],function($routes){

    $routes->get('/', 'Diklat::index');
    $routes->post('store', 'Diklat::store');

    $routes->get('proses/(:num)', 'Diklat::proses/$1');
    $routes->post('simpanProses/(:num)', 'Diklat::simpanProses/$1');

    $routes->get('cetak/(:num)', 'Diklat::cetak/$1');
    $routes->get('delete/(:num)', 'Diklat::delete/$1');

});



$routes->group('', ['namespace' => 'App\Modules\Auth\Controllers'], function($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::processLogin');
    $routes->get('register', 'Auth::register');
    $routes->post('register', 'Auth::processRegister');
    $routes->get('logout', 'Auth::logout');
});

// $routes->group('admin', function($routes){
//     $routes->get('user', 'Admin\User::index');
//     $routes->get('user/create', 'Admin\User::create');
//     $routes->post('user/store', 'Admin\User::store');
//     $routes->get('user/delete/(:num)', 'Admin\User::delete/$1');
// });

$routes->get('admin/dashboard', '\App\Modules\Admin\Controllers\Dashboard::index');
$routes->get('user/dashboard', '\App\Modules\User\Controllers\Dashboard::index');




$routes->group('admin', ['filter' => 'role:admin'], function($routes){

    $routes->get('dashboard', 'Admin\Dashboard::index');

    $routes->group('diklat', function($routes){
        $routes->get('/', 'Diklat::index');
        $routes->post('store', 'Diklat::store');
        $routes->get('delete/(:num)', 'Diklat::delete/$1');
        $routes->get('proses/(:num)', 'Diklat::proses/$1');
        $routes->post('simpanProses/(:num)', 'Diklat::simpanProses/$1');
    });

    // MASTER
    $routes->group('master', ['namespace'=>'App\Modules\Master\Controllers'], function($routes){

        $routes->get('jenis-instansi', 'JenisInstansi::index');
        $routes->add('jenis-instansi/create', 'JenisInstansi::create');
        $routes->post('jenis-instansi/store', 'JenisInstansi::store');
        $routes->add('jenis-instansi/edit/(:num)', 'JenisInstansi::edit/$1');
        $routes->post('jenis-instansi/update/(:num)', 'JenisInstansi::update/$1');
        $routes->get('jenis-instansi/delete/(:num)', 'JenisInstansi::delete/$1');

        $routes->get('data-instansi', 'DataInstansi::index');
        $routes->add('data-instansi/create', 'DataInstansi::create');
        $routes->post('data-instansi/store', 'DataInstansi::store');
        $routes->add('data-instansi/edit/(:num)', 'DataInstansi::edit/$1');
        $routes->post('data-instansi/update/(:num)', 'DataInstansi::update/$1');
        $routes->get('data-instansi/delete/(:num)', 'DataInstansi::delete/$1');
    });

    // USER MANAGEMENT
    $routes->group('user', ['namespace'=>'App\Modules\Admin\Controllers'], function($routes){
        $routes->get('/', 'User::index');
        $routes->get('create', 'User::create');
        $routes->post('store', 'User::store');
        $routes->get('delete/(:num)', 'User::delete/$1');
    });

});

$routes->group('', ['filter' => 'role:user'], function($routes){

    $routes->get('user/dashboard', '\App\Modules\User\Controllers\Dashboard::index');

    $routes->group('master', ['namespace'=>'App\Modules\Master\Controllers'], function($routes){
        $routes->get('jenis-instansi', 'JenisInstansi::index');
        $routes->get('data-instansi', 'DataInstansi::index');
    });

    $routes->group('diklat', ['namespace'=>'App\Modules\Diklat\Controllers'], function($routes){
        $routes->get('/', 'Diklat::index');
        $routes->get('cetak/(:num)', 'Diklat::cetak/$1');
    });

});


///////// PROFIL ///////////

$routes->get('profil', function () {
    if (session()->get('role') == 'admin') {
        return redirect()->to('/admin/profil');
    }

    if (session()->get('role') == 'user') {
        return redirect()->to('/user/profil');
    }

    return redirect()->to('/login');
});

$routes->group('admin', ['namespace' => 'App\Modules\Admin\Controllers'], function($routes){
    $routes->get('profil', 'Profil::index');
    $routes->post('profil/update', 'Profil::update');
});

$routes->group('user', ['namespace' => 'App\Modules\User\Controllers'], function($routes){
    $routes->get('profil', 'Profil::index');
    $routes->post('profil/update', 'Profil::update');
});