<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPiket Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css"
    />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="wrapper">
    
    <!-- Sidebar -->
    <aside class="sidebar">
        <div>
        <div class="logo">
            <img src="{{ asset('img/LogoMerah.png') }}" alt="Logo" width="200">
        </div>
        <nav>
            <a href="{{ route('dashboard') }}"><i class="ph ph-house"></i> Home</a>
            @if(Auth::user()->isGuru())
            <a href="{{ route('kehadiran.index') }}"><i class="ph ph-user"></i> Form Siswa</a>
            <a href="{{ route('kehadiran.index') }}"><i class="ph ph-users"></i> Kehadiran Guru</a>
            @else
            <a href="#" class="text-gray-500 cursor-not-allowed"><i class="ph ph-user"></i> Form Siswa (Hanya Guru)</a>
            <a href="#" class="text-gray-500 cursor-not-allowed"><i class="ph ph-users"></i> Kehadiran Guru (Hanya Guru)</a>
            @endif
            <a href="#"><i class="ph ph-megaphone"></i> Pengumuman</a>
            <a href="#"><i class="ph ph-archive"></i> Arsip</a>
            <a href="#"><i class="ph ph-calendar"></i> Shift Piket</a>
        </nav>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout"><i class="ph ph-sign-out"></i> Logout</button>
        </form>
    </aside>

    <!-- Main Content -->
    <main class="main">
        <header class="header">
            <div class="header-content">
                <h2>Dashboard</h2>
                    <div class="search-bar">
                        <i class="ph ph-magnifying-glass"></i>
                        <input type="text" placeholder="Cari Disini">
                        </div>
                        <div class="profile">
                        <span><i class="ph ph-user"></i></span>
                        <div>
                        <p><b>{{ Auth::user()->name }}</b></p>
                        <p>{{ Auth::user()->email }}</p>
                        <p style="font-size: 0.8rem; color: #666;">Role: {{ ucfirst(Auth::user()->role) }}{{ Auth::user()->nip ? ' (NIP: ' . Auth::user()->nip . ')' : '' }}</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Cards -->
        <div class="cards">
        <div class="card green">
            <p class="number">{{ $siswaTidakHadir }}</p>
            <p>Siswa Tidak Hadir</p>
        </div>
        <div class="card blue">
            <p class="number">{{ $guruHadir }}</p>
            <p>Guru Hadir</p>
        </div>
        <div class="card red">
            <p class="number">{{ $guruTidakHadir }}</p>
            <p>Guru Tidak Hadir</p>
        </div>
        </div>

        <!-- Announcement -->
        <section class="announcement">
        <h3>Pengumuman Terbaru</h3>
        <div class="box">
            @if($pengumumanTerbaru)
                <p><b>{{ $pengumumanTerbaru->judul }}</b></p>
                <p>{{ $pengumumanTerbaru->isi }}</p>
                <p class="date">Dibuat : {{ $pengumumanTerbaru->created_at->format('d F Y') }}</p>
            @else
                <p><b>Tidak ada pengumuman</b></p>
                <p>Belum ada pengumuman untuk hari ini.</p>
                <p class="date">-</p>
            @endif
        </div>
        </section>

        <!-- Table -->
        <section>
        <h3>Daftar Siswa Izin Hari ini</h3>
        <table>
            <thead>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jenis Izin</th>
                <th>Alasan</th>
                <th>Waktu</th>
            </tr>
            </thead>
            <tbody>
            @if($siswaIzin->count() > 0)
                @foreach($siswaIzin as $siswa)
                <tr>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $siswa->status)) }}</td>
                    <td>{{ $siswa->alasan ?? '-' }}</td>
                    <td>{{ $siswa->waktu_masuk ? $siswa->waktu_masuk->format('H:i') : '-' }}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px; color: #666;">
                        Tidak ada siswa yang izin hari ini
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        </section>
    </main>
    </div>
</body>
</html>