@extends('layouts.app')

@section('content')
<h2>Buat Surat Izin</h2>
<form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Nama Siswa</label>
    <input name="nama_siswa" value="{{ old('nama_siswa') }}" required>
    <label>Kelas</label>
    <input name="kelas" value="{{ old('kelas') }}">
    <label>Keperluan</label>
    <textarea name="keperluan" required>{{ old('keperluan') }}</textarea>
    <label>Tanggal Izin</label>
    <input type="date" name="tanggal_izin" value="{{ old('tanggal_izin') }}" required>
    <label>Lampiran (opsional)</label>
    <input type="file" name="lampiran">
    <button type="submit">Buat Surat</button>
</form>
@endsection
