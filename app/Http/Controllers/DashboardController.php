<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();
        
        // Initialize variables with default values
        $siswaTidakHadir = 0;
        $guruHadir = 0;
        $guruTidakHadir = 0;
        $pengumumanTerbaru = null;
        $siswaIzinHariIni = collect();
        
        // Student permission statistics
        $totalIzinHariIni = 0;
        $disetujui = 0;
        $ditolak = 0;
        $menunggu = 0;
        $riwayatIzin = collect();
        
        try {
            // Check if tables exist before querying
            if (DB::getSchemaBuilder()->hasTable('kehadiran_siswa')) {
                $siswaTidakHadir = DB::table('kehadiran_siswa')
                    ->where('tanggal', $today)
                    ->where('status', 'tidak_hadir')
                    ->count();
            }
            
            if (DB::getSchemaBuilder()->hasTable('kehadiran_guru')) {
                $guruHadir = DB::table('kehadiran_guru')
                    ->where('tanggal', $today)
                    ->where('status', 'hadir')
                    ->count();
                    
                $guruTidakHadir = DB::table('kehadiran_guru')
                    ->where('tanggal', $today)
                    ->where('status', 'tidak_hadir')
                    ->count();
            }
            
            if (DB::getSchemaBuilder()->hasTable('pengumuman')) {
                $pengumumanTerbaru = DB::table('pengumuman')
                    ->where('status', 'aktif')
                    ->where('tanggal_mulai', '<=', $today)
                    ->where(function($query) use ($today) {
                        $query->whereNull('tanggal_selesai')
                              ->orWhere('tanggal_selesai', '>=', $today);
                    })
                    ->orderBy('created_at', 'desc')
                    ->first();
            }
            
            if (DB::getSchemaBuilder()->hasTable('surat_izins')) {
                // Statistik izin hari ini
                $totalIzinHariIni = DB::table('surat_izins')
                    ->where('tanggal_izin', $today)
                    ->count();
                    
                $disetujui = DB::table('surat_izins')
                    ->where('tanggal_izin', $today)
                    ->where('status', 'approved')
                    ->count();
                    
                $ditolak = DB::table('surat_izins')
                    ->where('tanggal_izin', $today)
                    ->where('status', 'rejected')
                    ->count();
                    
                $menunggu = DB::table('surat_izins')
                    ->where('tanggal_izin', $today)
                    ->where('status', 'pending')
                    ->count();
                
                // Riwayat izin (semua data)
                $riwayatIzin = DB::table('surat_izins')
                    ->orderBy('created_at', 'desc')
                    ->limit(10)
                    ->get();
                
                // Izin hari ini (semua status)
                $siswaIzinHariIni = DB::table('surat_izins')
                    ->where('tanggal_izin', $today)
                    ->orderBy('created_at', 'desc')
                    ->limit(10)
                    ->get();
            }
                
        } catch (\Exception $e) {
            // Keep default values if any error occurs
        }
        
        return view('dashboard', compact(
            'siswaTidakHadir',
            'guruHadir', 
            'guruTidakHadir',
            'pengumumanTerbaru',
            'siswaIzinHariIni',
            'totalIzinHariIni',
            'disetujui',
            'ditolak',
            'menunggu',
            'riwayatIzin'
        ));
    }
}