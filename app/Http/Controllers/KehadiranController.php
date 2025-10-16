<?php

namespace App\Http\Controllers;

use App\Models\KehadiranSiswa;
use App\Models\KehadiranGuru;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function __construct()
    {
        $this->middleware('role.guru');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = now()->toDateString();
        
        $siswaKehadiran = KehadiranSiswa::where('tanggal', $today)->get();
        $guruKehadiran = KehadiranGuru::where('tanggal', $today)->get();
        
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

        KehadiranSiswa::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'status' => $request->status,
            'alasan' => $request->alasan,
            'tanggal' => now()->toDateString(),
            'waktu_masuk' => $request->waktu_masuk,
        ]);

        return redirect()->back()->with('success', 'Data kehadiran siswa berhasil ditambahkan.');
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

        KehadiranGuru::create([
            'nama' => $request->nama,
            'mata_pelajaran' => $request->mata_pelajaran,
            'status' => $request->status,
            'alasan' => $request->alasan,
            'tanggal' => now()->toDateString(),
            'waktu_masuk' => $request->waktu_masuk,
        ]);

        return redirect()->back()->with('success', 'Data kehadiran guru berhasil ditambahkan.');
    }
}
