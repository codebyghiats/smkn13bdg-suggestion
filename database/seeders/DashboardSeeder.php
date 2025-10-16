<?php

namespace Database\Seeders;

use App\Models\KehadiranSiswa;
use App\Models\KehadiranGuru;
use App\Models\Pengumuman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $today = now()->toDateString();
        
        // Data kehadiran siswa hari ini
        KehadiranSiswa::create([
            'nama' => 'Andi',
            'kelas' => 'XI RPL 2',
            'status' => 'izin',
            'alasan' => 'Lomba',
            'tanggal' => $today,
            'waktu_masuk' => '10:15',
        ]);
        
        KehadiranSiswa::create([
            'nama' => 'Uya',
            'kelas' => 'XI KA 1',
            'status' => 'izin',
            'alasan' => 'Acara Keluarga',
            'tanggal' => $today,
            'waktu_masuk' => '12:45',
        ]);
        
        KehadiranSiswa::create([
            'nama' => 'Budi',
            'kelas' => 'X TKJ 1',
            'status' => 'tidak_hadir',
            'alasan' => 'Sakit',
            'tanggal' => $today,
        ]);
        
        // Data kehadiran guru hari ini
        KehadiranGuru::create([
            'nama' => 'Pak Ahmad',
            'mata_pelajaran' => 'Matematika',
            'status' => 'hadir',
            'tanggal' => $today,
            'waktu_masuk' => '07:30',
        ]);
        
        KehadiranGuru::create([
            'nama' => 'Bu Siti',
            'mata_pelajaran' => 'Bahasa Indonesia',
            'status' => 'hadir',
            'tanggal' => $today,
            'waktu_masuk' => '08:00',
        ]);
        
        KehadiranGuru::create([
            'nama' => 'Pak Rudi',
            'mata_pelajaran' => 'Fisika',
            'status' => 'tidak_hadir',
            'alasan' => 'Izin',
            'tanggal' => $today,
        ]);
        
        // Data pengumuman
        Pengumuman::create([
            'judul' => 'Kehilangan Barang',
            'isi' => 'Seorang siswa kehilangan dompet di Perpustakaan sekolah. Mohon untuk menghubungi guru piket jika menemukannya.',
            'status' => 'aktif',
            'tanggal_mulai' => $today,
        ]);
    }
}
