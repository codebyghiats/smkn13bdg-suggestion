<?php

namespace App\Http\Controllers;

use App\Models\SuratIzin;
use App\Models\User;
use App\Notifications\NewSuratIzinNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class SuratIzinController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();
        
        // Initialize variables with default values
        $totalIzinHariIni = 0;
        $disetujui = 0;
        $ditolak = 0;
        $menunggu = 0;
        $riwayatIzin = collect();
        $izinHariIni = collect();
        
        try {
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
                
                // Izin hari ini
                $izinHariIni = DB::table('surat_izins')
                    ->where('tanggal_izin', $today)
                    ->orderBy('created_at', 'desc')
                    ->get();
            }
        } catch (\Exception $e) {
            // Keep default values if error occurs
        }
        
        return view('siswa', compact(
            'totalIzinHariIni',
            'disetujui',
            'ditolak', 
            'menunggu',
            'riwayatIzin',
            'izinHariIni'
        ));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'nullable|string|max:50',
            'keperluan' => 'required|string|max:500',
        ]);
        
        try {
            $suratIzin = DB::table('surat_izins')->insertGetId([
                'created_by' => auth()->id(),
                'nama_siswa' => $request->nama_siswa,
                'kelas' => $request->kelas,
                'keperluan' => $request->keperluan,
                'tanggal_izin' => now()->toDateString(),
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            // Kirim notifikasi ke semua satpam
            $satpamUsers = DB::table('users')
                ->where('role', 'satpam')
                ->get();
                
            foreach ($satpamUsers as $satpam) {
                $user = User::find($satpam->id);
                if ($user) {
                    $user->notify(new NewSuratIzinNotification([
                        'nama_siswa' => $request->nama_siswa,
                        'kelas' => $request->kelas,
                        'keperluan' => $request->keperluan,
                        'tanggal_izin' => now()->toDateString(),
                    ]));
                }
            }
            
            return redirect()->back()->with('success', 'Surat izin berhasil diajukan!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengajukan surat izin.');
        }
    }
    
    public function approve($id)
    {
        try {
            DB::table('surat_izins')
                ->where('id', $id)
                ->update([
                    'status' => 'approved',
                    'updated_at' => now()
                ]);
                
            return redirect()->back()->with('success', 'Surat izin berhasil disetujui!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyetujui surat izin.');
        }
    }
    
    public function reject($id)
    {
        try {
            DB::table('surat_izins')
                ->where('id', $id)
                ->update([
                    'status' => 'rejected',
                    'updated_at' => now()
                ]);
                
            return redirect()->back()->with('success', 'Surat izin berhasil ditolak!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menolak surat izin.');
        }
    }
}