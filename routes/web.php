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