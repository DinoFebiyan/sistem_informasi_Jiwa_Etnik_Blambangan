<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\KatalogController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('dashboard');
});

// Route default dashboard Laravel Breeze (bisa dihapus jika tidak dipakai)
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

// Jika KatalogController belum dibuat, gunakan closure sementara (komentar di atas dan aktifkan di bawah):
// Route::get('/superadmin/kelola-katalog', function () {
//     return view('superadmin.kelola-katalog');
// })->name('superadmin.kelola-katalog');
// Route::get('/superadmin/tambah-katalog', function () {
//     return view('superadmin.tambah-katalog');
// })->name('superadmin.tambah-katalog');

// Kelola Event
Route::get('/superadmin/kelola-event', [SuperAdminController::class, 'kelolaEvent'])->name('superadmin.kelola-event');
Route::get('/superadmin/tambah-event', [SuperAdminController::class, 'tambahEvent'])->name('superadmin.tambah-event');

// Kelola Berita
Route::get('/superadmin/kelola-berita', [SuperAdminController::class, 'kelolaBerita'])->name('superadmin.kelola-berita');
Route::get('/superadmin/publikasi-berita', [SuperAdminController::class, 'publikasiBerita'])->name('superadmin.publikasi-berita');

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