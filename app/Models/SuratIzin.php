<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratIzin extends Model
{
    protected $fillable = [
        'nomor','created_by','nama_siswa','kelas','keperluan','tanggal_izin','lampiran_path','approved_by','approved_at','status'
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
