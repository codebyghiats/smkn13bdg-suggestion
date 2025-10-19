<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\PiketController;
use App\Http\Controllers\SuratIzinController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('home');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Form siswa
Route::get('/siswa', [SuratIzinController::class, 'index'])->name('siswa');

// Kehadiran guru
Route::get('/guru', function () {
    return view('guru');
});

// Pengumuman
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');

// Arsip
Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip');

// Shift piket
Route::get('/piket', [PiketController::class, 'index'])->name('piket');

// Kehadiran routes
Route::get('/kehadiran', [KehadiranController::class, 'index'])->name('kehadiran.index');

// Surat Izin routes
Route::post('/surat-izin', [SuratIzinController::class, 'store'])->name('surat-izin.store');
Route::patch('/surat-izin/{id}/approve', [SuratIzinController::class, 'approve'])->name('surat-izin.approve');
Route::patch('/surat-izin/{id}/reject', [SuratIzinController::class, 'reject'])->name('surat-izin.reject');

// Auth routes (login, register, password reset, etc.)
require __DIR__.'/auth.php';
