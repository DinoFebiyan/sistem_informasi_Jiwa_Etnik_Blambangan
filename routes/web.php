<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::get('/', function () {
    return view('umum.landing_page');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// Route::get('/auth/reset_password', function () {
//     return view('auth.reset_password');
// })->name('password.reset');

// Route::get('/auth/verifikasi_otp', function () {
//     return view('auth.verifikasi_otp');
// })->name('verifikasi.otp');

// Route::get('/superadmin/dashboard', function () {
//     return view('superadmin.dashboard');
// })->name('superadmin.dashboard');

// Route::get('/superadmin/kelola-admin', function () {
//     return view('superadmin.kelola-admin');
// });

// Route::get('/superadmin/kelola-katalog', function () {
//     return view('superadmin.kelola-katalog');
// });

// Route::get('/superadmin/kelola-event', function () {
//     return view('superadmin.kelola-event');
// });

// Route::get('/superadmin/publikasi-berita', function () {
//     return view('superadmin.publikasi-berita');
// });

// Route::get('/superadmin/profil', function () {
//     return view('superadmin.kelola-profil');
// });

// Route::get('/superadmin/pengaturan', function () {
//     return view('superadmin.pengaturan');
// });

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');

// Route::get('/admin/events', function () {
//     return view('admin.events.index');
// })->name('admin.events.index');

// Route::get('/admin/news', function () {
//     return view('admin.news.index');
// })->name('admin.news.index');

// Route::get('/admin/profile', function () {
//     return view('admin.profile.index');
// })->name('admin.profile.index');

// Route::get('/semua-event', function () {
//     return view('semua-event'); 
// })->name('event.index');

// Route::get('/profil', function () {
//     return view('profil'); 
// })->name('profil'); 

// Route::get('/superadmin/tambah-admin', function () {
//     return view('superadmin.tambah-admin');
// });

// Route::get('/superadmin/tambah-katalog', function () {
//     return view('superadmin.tambah-katalog');
// });

// Route::get('/superadmin/tambah-event', function () {
//     return view('superadmin.tambah-event');
// });

Route::get('/superadmin/kelola-berita', function () {
    return view('superadmin.kelola-berita');
})->name('superadmin.kelola-berita');