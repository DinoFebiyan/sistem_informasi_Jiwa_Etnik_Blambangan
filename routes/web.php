<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;      
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

 

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route verifikasi OTP
Route::get('/auth/verifikasi_otp', function () {
    return view('auth.verifikasi_otp');
})->name('verifikasi.otp');

// ======================= ROUTE UNTUK SUPER ADMIN =======================
// Dashboard Super Admin menggunakan controller
Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');

// Kelola Admin
Route::get('/superadmin/kelola-admin', [SuperAdminController::class, 'kelolaAdmin'])->name('superadmin.kelola-admin');
Route::get('/superadmin/tambah-admin', [SuperAdminController::class, 'tambahAdmin'])->name('superadmin.tambah-admin');

// Kelola Katalog (resource controller)
Route::resource('/superadmin/katalog', KatalogController::class)->parameters([
    'katalog' => 'katalog'
])->names([
    'index'   => 'superadmin.kelola-katalog',
    'create'  => 'superadmin.tambah-katalog',
    'store'   => 'superadmin.katalog.store',
    'show'    => 'superadmin.katalog.show',
    'edit'    => 'superadmin.katalog.edit',
    'update'  => 'superadmin.katalog.update',
    'destroy' => 'superadmin.katalog.destroy',
]);


// KELOLA ADMIN
Route::get('/superadmin/kelola-admin', [SuperAdminController::class, 'kelolaAdmin'])->name('superadmin.kelola-admin');
Route::get('/superadmin/tambah-admin', [SuperAdminController::class, 'tambahAdmin'])->name('superadmin.tambah-admin');
Route::post('/superadmin/store-admin', [SuperAdminController::class, 'storeAdmin'])->name('superadmin.store-admin');
Route::get('/superadmin/kelola-admin/edit/{id}', [SuperAdminController::class, 'editAdmin'])->name('superadmin.edit-admin');
Route::put('/superadmin/kelola-admin/update/{id}', [SuperAdminController::class, 'updateAdmin'])->name('superadmin.update-admin');
Route::delete('/superadmin/kelola-admin/delete/{id}', [SuperAdminController::class, 'deleteAdmin'])->name('superadmin.delete-admin');

// KELOLA LAINNYA
Route::resource('/superadmin/katalog', KatalogController::class)->parameters([
    'katalog' => 'katalog'
])->names([
    'index'   => 'superadmin.kelola-katalog',
    'create'  => 'superadmin.tambah-katalog',
    'store'   => 'superadmin.katalog.store',
    'show'    => 'superadmin.katalog.show',
    'edit'    => 'superadmin.katalog.edit',
    'update'  => 'superadmin.katalog.update',
    'destroy' => 'superadmin.katalog.destroy',
]);


Route::get('/superadmin/log-aktivitas', [SuperAdminController::class, 'logAktivitas'])->name('superadmin.log-aktivitas');

// Kelola Event


Route::resource('/superadmin/event', EventController::class)->parameters([
    'event' => 'event'
])->names([
    'index'   => 'superadmin.kelola-event',
    'create'  => 'superadmin.tambah-event',
    'store'   => 'superadmin.event.store',
    'show'    => 'superadmin.event.show',
    'edit'    => 'superadmin.event.edit',
    'update'  => 'superadmin.event.update',
    'destroy' => 'superadmin.event.destroy',
]);

// Kelola Berita
// ======================= HALAMAN PUBLIK (FRONTEND) =======================
Route::get('/superadmin/kelola-berita', [SuperAdminController::class, 'kelolaBerita'])->name('superadmin.kelola-berita');
Route::get('/superadmin/tambah-berita', [SuperAdminController::class, 'tambahBerita'])->name('superadmin.tambah-berita');
Route::post('/superadmin/store-berita', [SuperAdminController::class, 'storeBerita'])->name('superadmin.store-berita');
Route::get('/superadmin/berita/edit/{id}', [SuperAdminController::class, 'editBerita'])->name('superadmin.berita.edit');
Route::put('/superadmin/berita/update/{id}', [SuperAdminController::class, 'updateBerita'])->name('superadmin.berita.update');
Route::delete('/superadmin/berita/delete/{id}', [SuperAdminController::class, 'deleteBerita'])->name('superadmin.berita.delete');

// Kelola Profil Sanggar
Route::get('/superadmin/profil', [SuperAdminController::class, 'kelolaProfil'])->name('superadmin.kelola-profil');
Route::get('/superadmin/edit-profil', [SuperAdminController::class, 'editProfil'])->name('superadmin.edit-profil');
Route::get('/superadmin/tambah-pengurus', [SuperAdminController::class, 'tambahPengurus'])->name('superadmin.tambah-pengurus');
Route::get('/superadmin/tambah-pelatih', [SuperAdminController::class, 'tambahPelatih'])->name('superadmin.tambah-pelatih');

// Pengaturan
Route::get('/superadmin/pengaturan', [SuperAdminController::class, 'pengaturan'])->name('superadmin.pengaturan');

// ======================= ROUTE UNTUK ADMIN BIASA =======================
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/events', function () {
    return view('admin.events.index');
})->name('admin.events.index');

Route::get('/admin/news', function () {
    return view('admin.news.index');
})->name('admin.news.index');

Route::get('/admin/profile', function () {
    return view('admin.profile.index');
})->name('admin.profile.index');

// ======================= HALAMAN PUBLIK (FRONTEND) =======================
Route::get('/semua-event', function () {
    return view('semua-event');
})->name('event.index');

Route::get('/berita', function () { 
    return view('umum.berita'); 
})->name('berita.index');  // 

Route::get('/katalog', [KatalogController::class, 'publicIndex'])->name('katalog.index');
Route::get('/katalog/{id}', [KatalogController::class, 'publicShow'])->name('katalog.detail');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/profile', function () {
    return view('profile');
})->name('profile.view');

// ======================= ROUTE UNTUK EDIT PROFIL PENGGUNA (AUTH) =======================
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/edit', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ======================= INCLUDE ROUTE AUTH BAWAAN LARAVEL =======================
require __DIR__.'/auth.php';