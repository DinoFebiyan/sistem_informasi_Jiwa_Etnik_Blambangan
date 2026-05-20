<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;

// =========================================================================
// 1. HALAMAN UTAMA & PUBLIK (FRONTEND - Folder: views/umum)
// =========================================================================
Route::get('/', [LandingPageController::class, 'index'])->name('home');

Route::get('/event', [LandingPageController::class, 'allEvents'])->name('event.index');
Route::get('/event/{id}', [LandingPageController::class, 'eventDetail'])->name('event.detail');
Route::get('/berita', function () { return view('umum.berita'); })->name('berita.index');
Route::get('/katalog', [KatalogController::class, 'publicIndex'])->name('katalog.index');
Route::get('/katalog/{id}', [KatalogController::class, 'publicShow'])->name('katalog.detail');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/profil', function () { return view('umum.profil'); })->name('profil');


// =========================================================================
// 2. AUTH DEFAULT & OTP (Folder: views/auth)
// =========================================================================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/auth/verifikasi_otp', function () {
    return view('auth.verifikasi_otp');
})->name('verifikasi.otp');


// =========================================================================
// 3. ROUTE UNTUK ADMIN BIASA (Folder: views/admin)
// =========================================================================
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () { return view('admin.dashboard.index'); })->name('admin.dashboard');
    Route::get('/kelola-event', function () { return view('admin.kelola_event.index'); })->name('admin.events.index');
    Route::get('/kelola-berita', function () { return view('admin.kelola_berita.index'); })->name('admin.news.index');
    Route::get('/kelola-profil', function () { return view('admin.kelola_profil.index'); })->name('admin.profile.index');
    
    // Menu tambahan pelengkap admin biasa sesuai struktur folder lokal
    Route::get('/kelola-katalog', function () { return view('admin.kelola_katalog.index'); })->name('admin.katalog.index');
    Route::get('/log-aktivitas', function () { return view('admin.log_aktivitas'); })->name('admin.log-aktivitas');
    Route::get('/pengaturan', function () { return view('admin.pengaturan'); })->name('admin.pengaturan');
});


// =========================================================================
// 4. ROUTE UNTUK SUPER ADMIN (Folder: views/superadmin)
// =========================================================================
Route::prefix('superadmin')->middleware(['auth'])->group(function () {
    
    // Dashboard -> views/superadmin/dashboard.blade.php
    Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');

    // Kelola Berita -> folder: views/superadmin/berita
    Route::get('/kelola-berita', [SuperAdminController::class, 'kelolaBerita'])->name('superadmin.kelola-berita');
    Route::get('/tambah-berita', [SuperAdminController::class, 'tambahBerita'])->name('superadmin.tambah-berita');
    // Route::post('/store-berita', [SuperAdminController::class, 'storeBerita'])->name('superadmin.store-berita');
    Route::get('/berita/edit/{id}', [SuperAdminController::class, 'editBerita'])->name('superadmin.berita.edit');
    Route::put('/berita/update/{id}', [SuperAdminController::class, 'updateBerita'])->name('superadmin.berita.update');
    Route::delete('/berita/delete/{id}', [SuperAdminController::class, 'deleteBerita'])->name('superadmin.berita.delete');

    // Kelola Profil Sanggar -> folder: views/superadmin/profil
    Route::get('/profil', [SuperAdminController::class, 'kelolaProfil'])->name('superadmin.kelola-profil');
    Route::get('/edit-profil', [SuperAdminController::class, 'editProfil'])->name('superadmin.edit-profil');
    Route::put('/profil/update', [SuperAdminController::class, 'updateProfil'])->name('superadmin.profil.update'); 
    Route::get('/tambah-pengurus', [SuperAdminController::class, 'tambahPengurus'])->name('superadmin.tambah-pengurus');
    Route::get('/tambah-pelatih', [SuperAdminController::class, 'tambahPelatih'])->name('superadmin.tambah-pelatih');

    // Log Aktivitas -> folder: views/superadmin/log-aktivitas
    Route::get('/log-aktivitas', [SuperAdminController::class, 'logAktivitas'])->name('superadmin.log-aktivitas');

    // Pengaturan Akun -> folder: views/superadmin/pengaturan (Sinkron dengan redirect baru di SuperAdminController)
    Route::get('/pengaturan', [SuperAdminController::class, 'pengaturan'])->name('superadmin.pengaturan.index');
    Route::put('/pengaturan/update', [SuperAdminController::class, 'updateProfil'])->name('superadmin.pengaturan.update');
    Route::put('/pengaturan/password', [SuperAdminController::class, 'updatePassword'])->name('superadmin.pengaturan.password');
});

// Kelola Admin (Resource) -> folder: views/superadmin/admin
Route::resource('/superadmin/admin', App\Http\Controllers\AdminController::class)->parameters([
    'admin' => 'id'
])->names([
    'index'   => 'superadmin.admin.index',
    'create'  => 'superadmin.admin.create',
    'store'   => 'superadmin.admin.store',
    'show'    => 'superadmin.admin.show',
    'edit'    => 'superadmin.admin.edit',
    'update'  => 'superadmin.admin.update',
    'destroy' => 'superadmin.admin.destroy',
]);

// Kelola Katalog (Resource) -> folder: views/superadmin/katalog (Sinkron dengan KatalogController baru)
Route::resource('/superadmin/katalog', KatalogController::class)->parameters([
    'katalog' => 'katalog'
])->names([
    'index'   => 'superadmin.katalog.index',
    'create'  => 'superadmin.katalog.create',
    'store'   => 'superadmin.katalog.store',
    'show'    => 'superadmin.katalog.show',
    'edit'    => 'superadmin.katalog.edit',
    'update'  => 'superadmin.katalog.update',
    'destroy' => 'superadmin.katalog.destroy',
]);

// Kelola Event (Resource) -> folder: views/superadmin/event (Sinkron dengan EventController baru)
Route::resource('/superadmin/event', EventController::class)->parameters([
    'event' => 'event'
])->names([
    'index'   => 'superadmin.event.index',
    'create'  => 'superadmin.event.create',
    'store'   => 'superadmin.event.store',
    'show'    => 'superadmin.event.show',
    'edit'    => 'superadmin.event.edit',
    'update'  => 'superadmin.event.update',
    'destroy' => 'superadmin.event.destroy',
]);


// =========================================================================
// 5. ROUTE EDIT PROFIL USER / AUTH BREEZE (Folder: views/profile)
// =========================================================================
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/edit', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';