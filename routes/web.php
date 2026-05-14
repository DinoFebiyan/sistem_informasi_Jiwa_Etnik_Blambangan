<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/auth/verifikasi_otp', function () {
    return view('auth.verifikasi_otp');
})->name('verifikasi.otp');

// Route::get('/auth/reset_password', function () {
//     return view('auth.reset_password');
// })->name('password.reset'); // Dihapus karena bentrok dengan auth bawaan

// ======================= ROUTE UNTUK SUPER ADMIN =======================
Route::get('/superadmin/dashboard', function () {
    return view('superadmin.dashboard');
})->name('superadmin.dashboard');

Route::get('/superadmin/kelola-admin', function () {
    return view('superadmin.kelola-admin');
});

Route::get('/superadmin/kelola-katalog', function () {
    return view('superadmin.kelola-katalog');
});

Route::get('/superadmin/kelola-event', function () {
    return view('superadmin.kelola-event');
});

Route::get('/superadmin/publikasi-berita', function () {
    return view('superadmin.publikasi-berita');
});

Route::get('/superadmin/profil', function () {
    return view('superadmin.kelola-profil');
});

Route::get('/superadmin/pengaturan', function () {
    return view('superadmin.pengaturan');
});

Route::get('/superadmin/tambah-admin', function () {
    return view('superadmin.tambah-admin');
});

Route::get('/superadmin/tambah-katalog', function () {
    return view('superadmin.tambah-katalog');
});

Route::get('/superadmin/tambah-event', function () {
    return view('superadmin.tambah-event');
});

Route::get('/superadmin/kelola-berita', function () {
    return view('superadmin.kelola-berita');
})->name('superadmin.kelola-berita');

Route::get('/superadmin/edit-profil', function () {
    return view('superadmin.edit-profil');
});

Route::get('/superadmin/tambah-pengurus', function () {
    return view('superadmin.tambah-pengurus');
});

Route::get('/superadmin/tambah-pelatih', function () {
    return view('superadmin.tambah-pelatih');
});

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
// Ini yang akan menyelesaikan error "Route [profile.edit] not defined"
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/edit', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ======================= INCLUDE ROUTE AUTH BAWAAN LARAVEL =======================
require __DIR__.'/auth.php';