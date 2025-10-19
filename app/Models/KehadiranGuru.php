<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KehadiranGuru extends Model
{
    use HasFactory;

    protected $table = 'kehadiran_guru';
    
    protected $fillable = [
        'nama',
        'mata_pelajaran',
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