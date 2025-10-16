<?php
namespace App\Http\Controllers;

use App\Models\SuratIzin;
use App\Models\User;
use App\Notifications\NewSuratIzinNotification;
use Illuminate\Http\Request;

class SuratIzinController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->isGuru()) {
            $surats = SuratIzin::where('created_by', $user->id)->latest()->get();
        } elseif ($user->isSatpam()) {
            $surats = SuratIzin::where('status','pending')->latest()->get();
        } else {
            abort(403);
        }

        return view('surat.index', compact('surats'));
    }

    public function create()
    {
        $this->authorize('create', SuratIzin::class); // optional
        return view('surat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa'=>'required|string',
            'kelas'=>'nullable|string',
            'keperluan'=>'required|string',
            'tanggal_izin'=>'required|date',
            'lampiran'=>'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['nama_siswa','kelas','keperluan','tanggal_izin']);
        $data['created_by'] = auth()->id();

        if ($request->hasFile('lampiran')) {
            $data['lampiran_path'] = $request->file('lampiran')->store('lampiran_surat','public');
        }

        $surat = SuratIzin::create($data);

        // notify all satpams
        $satpams = User::where('role','satpam')->get();
        foreach($satpams as $s) {
            $s->notify(new NewSuratIzinNotification($surat));
        }

        return redirect()->route('surat.index')->with('success','Surat izin berhasil dibuat. Notifikasi dikirim ke satpam.');
    }

    public function show(SuratIzin $surat)
    {
        return view('surat.show', compact('surat'));
    }

    public function approve(Request $request, SuratIzin $surat)
    {
        if ($surat->status !== 'pending') {
            return redirect()->back()->with('error','Surat sudah diproses.');
        }

        $surat->update([
            'status'=>'approved',
            'approved_by'=>auth()->id(),
            'approved_at'=>now(),
        ]);

        // mark notifications that refer to this surat as read for the satpam
        auth()->user()->unreadNotifications->where('data.surat_id',$surat->id)->each->markAsRead();

        // notify creator
        $surat->creator->notify(new \App\Notifications\SuratApprovedNotification($surat));

        return redirect()->route('surat.index')->with('success','Surat disetujui.');
    }
}
