<?php
namespace App\Notifications;

use App\Models\SuratIzin;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewSuratIzinNotification extends Notification
{
    use Queueable;

    public function __construct(protected SuratIzin $surat) {}

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'surat_id' => $this->surat->id,
            'message' => 'Surat izin baru: '.$this->surat->nama_siswa,
            'nama_siswa' => $this->surat->nama_siswa,
            'tanggal' => $this->surat->tanggal_izin,
            'created_by' => $this->surat->created_by,
        ];
    }
}
