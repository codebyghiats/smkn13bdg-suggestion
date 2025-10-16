<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KehadiranSiswa extends Model
{
    protected $table = 'kehadiran_siswa';
    
    protected $fillable = [
        'nama',
        'kelas',
        'status',
        'alasan',
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'waktu_masuk' => 'datetime:H:i',
        'waktu_keluar' => 'datetime:H:i',
    ];
}
