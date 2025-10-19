<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = now()->toDateString();
        
        // Initialize with empty collections
        $siswaKehadiran = collect();
        $guruKehadiran = collect();
        
        try {
            // Check if tables exist before querying
            if (DB::getSchemaBuilder()->hasTable('kehadiran_siswa')) {
                $siswaKehadiran = DB::table('kehadiran_siswa')
                    ->where('tanggal', $today)
                    ->get();
            }
            
            if (DB::getSchemaBuilder()->hasTable('kehadiran_guru')) {
                $guruKehadiran = DB::table('kehadiran_guru')
                    ->where('tanggal', $today)
                    ->get();
            }
        } catch (\Exception $e) {
            // Keep empty collections if error occurs
        }
        
        return view('kehadiran.index', compact('siswaKehadiran', 'guruKehadiran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeSiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'status' => 'required|in:hadir,tidak_hadir,izin,sakit',
            'alasan' => 'nullable|string|max:255',
            'waktu_masuk' => 'nullable|date_format:H:i',
        ]);

        try {
            DB::table('kehadiran_siswa')->insert([
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'status' => $request->status,
                'alasan' => $request->alasan,
                'tanggal' => now()->toDateString(),
                'waktu_masuk' => $request->waktu_masuk,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            return redirect()->back()->with('success', 'Data kehadiran siswa berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data kehadiran siswa.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeGuru(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'status' => 'required|in:hadir,tidak_hadir,izin,sakit',
            'alasan' => 'nullable|string|max:255',
            'waktu_masuk' => 'nullable|date_format:H:i',
        ]);

        try {
            DB::table('kehadiran_guru')->insert([
                'nama' => $request->nama,
                'mata_pelajaran' => $request->mata_pelajaran,
                'status' => $request->status,
                'alasan' => $request->alasan,
                'tanggal' => now()->toDateString(),
                'waktu_masuk' => $request->waktu_masuk,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            return redirect()->back()->with('success', 'Data kehadiran guru berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data kehadiran guru.');
        }
    }
}