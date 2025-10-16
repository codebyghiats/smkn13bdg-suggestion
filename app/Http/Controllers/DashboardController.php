<?php

namespace App\Http\Controllers;

use App\Models\KehadiranSiswa;
use App\Models\KehadiranGuru;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();
        
        // Statistik kehadiran siswa hari ini
        $siswaTidakHadir = KehadiranSiswa::where('tanggal', $today)
            ->where('status', 'tidak_hadir')
            ->count();
            
        // Statistik kehadiran guru hari ini
        $guruHadir = KehadiranGuru::where('tanggal', $today)
            ->where('status', 'hadir')
            ->count();
            
        $guruTidakHadir = KehadiranGuru::where('tanggal', $today)
            ->where('status', 'tidak_hadir')
            ->count();
        
        // Pengumuman terbaru
        $pengumumanTerbaru = Pengumuman::where('status', 'aktif')
            ->where('tanggal_mulai', '<=', $today)
            ->where(function($query) use ($today) {
                $query->whereNull('tanggal_selesai')
                      ->orWhere('tanggal_selesai', '>=', $today);
            })
            ->orderBy('created_at', 'desc')
            ->first();
        
        // Daftar siswa izin hari ini
        $siswaIzin = KehadiranSiswa::where('tanggal', $today)
            ->whereIn('status', ['izin', 'sakit'])
            ->orderBy('waktu_masuk', 'asc')
            ->get();
        
        return view('dashboard', compact(
            'siswaTidakHadir',
            'guruHadir', 
            'guruTidakHadir',
            'pengumumanTerbaru',
            'siswaIzin'
        ));
    }
}
