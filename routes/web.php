<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/auth/forgot_password', function () {
    return view('auth.forgot_password');
})->name('forgot_password');

Route::get('/auth/verifikasi_otp', function () {
    return view('auth.verifikasi_otp');
})->name('verifikasi.otp');

Route::get('/superadmin/dashboard', function () {
    return view('superadmin.dashboard');
})->name('superadmin.dashboard');

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