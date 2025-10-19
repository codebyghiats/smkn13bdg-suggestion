@extends('layouts.app')
@section('content')
<h2>Daftar Surat</h2>
@if(session('success')) <div>{{ session('success') }}</div> @endif

@foreach($surats as $s)
    <div style="border:1px solid #ddd;padding:8px;margin-bottom:8px;">
        <strong>{{ $s->nama_siswa }}</strong> - {{ $s->tanggal_izin }} - status: {{ $s->status }}
        <div>{{ Str::limit($s->keperluan,120) }}</div>
        <a href="{{ route('surat.show', $s->id) }}">Detail</a>
        @if(auth()->user()->isSatpam() && $s->status=='pending')
            <form action="{{ route('surat.approve', $s->id) }}" method="POST" style="display:inline;">
                @csrf
                <button onclick="return confirm('Approve surat ini?')">Approve</button>
            </form>
        @endif
    </div>
@endforeach
@endsection
