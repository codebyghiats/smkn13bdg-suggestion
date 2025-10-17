<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KehadiranSiswa extends Model
{
    use HasFactory;

    protected $table = 'kehadiran_siswa';
    
    protected $fillable = [
        'nama',
        'kelas',
        'status',
        'alasan',
        'tanggal',
        'waktu_masuk',
        'waktu_keluar'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'waktu_masuk' => 'datetime',
        'waktu_keluar' => 'datetime',
    ];
}