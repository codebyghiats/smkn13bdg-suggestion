<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('home');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Form siswa
Route::get('/siswa', function () {
    return view('siswa');
});

// Kehadiran guru
Route::get('/guru', function () {
    return view('guru');
});

// Pengumuman (ini sebelumnya typo "pengumunman")
Route::get('/pengumuman', function () {
    return view('pengumuman');
});

// Arsip
Route::get('/arsip', function () {
    return view('arsip');
});

// Shift piket
Route::get('/piket', function () {
    return view('piket');
});
