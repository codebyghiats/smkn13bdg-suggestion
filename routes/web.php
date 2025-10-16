<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Routes untuk guru (hanya guru yang bisa akses)
    Route::middleware('role.guru')->group(function () {
        Route::get('/kehadiran', [KehadiranController::class, 'index'])->name('kehadiran.index');
        Route::post('/kehadiran/siswa', [KehadiranController::class, 'storeSiswa'])->name('kehadiran.siswa.store');
        Route::post('/kehadiran/guru', [KehadiranController::class, 'storeGuru'])->name('kehadiran.guru.store');
    });
});

require __DIR__.'/auth.php';
