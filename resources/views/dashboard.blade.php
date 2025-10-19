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
            
            @if(Auth::user()->role === 'guru')
                <a href="{{ route('siswa') }}"><i class="ph ph-user"></i> Form Siswa</a>
                <a href="{{ route('kehadiran.index') }}"><i class="ph ph-users"></i> Kehadiran Guru</a>
            @else
                <a href="#" class="text-gray-500 cursor-not-allowed">
                    <i class="ph ph-user"></i> Form Siswa (Hanya Guru)
                </a>
                <a href="#" class="text-gray-500 cursor-not-allowed">
                    <i class="ph ph-users"></i> Kehadiran Guru (Hanya Guru)
                </a>
            @endif
            
            <a href="{{ route('pengumuman') }}"><i class="ph ph-megaphone"></i> Pengumuman</a>
            <a href="{{ route('arsip') }}"><i class="ph ph-archive"></i> Arsip</a>
            <a href="{{ route('piket') }}"><i class="ph ph-calendar"></i> Shift Piket</a>
        </nav>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout" style="background: none; border: none; color: #8b8000; text-decoration: none; font-size: 20px; margin-left: 15px; margin-bottom: 35px; transition: 0.3s; cursor: pointer;">
                <i class="ph ph-sign-out"></i> Logout
            </button>
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
                    </div>
                </div>
            </div>
        </header>

        <!-- Alert Messages -->
        @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
            {{ session('error') }}
        </div>
        @endif

        <!-- Cards -->
        <div class="cards">
        <div class="card green">
            <p class="number">{{ $siswaTidakHadir ?? 0 }}</p>
            <p>Siswa Tidak Hadir</p>
        </div>
        <div class="card blue">
            <p class="number">{{ $guruHadir ?? 0 }}</p>
            <p>Guru Hadir</p>
        </div>
        <div class="card red">
            <p class="number">{{ $guruTidakHadir ?? 0 }}</p>
            <p>Guru Tidak Hadir</p>
        </div>
        <div class="card green">
            <p class="number">{{ $disetujui ?? 0 }}</p>
            <p>Disetujui</p>
        </div>
        <div class="card red">
            <p class="number">{{ $ditolak ?? 0 }}</p>
            <p>Ditolak</p>
        </div>
        <div class="card orange">
            <p class="number">{{ $menunggu ?? 0 }}</p>
            <p>Menunggu</p>
        </div>
        </div>

        <!-- Notifikasi untuk Satpam -->
        @if(Auth::user()->role === 'satpam')
        <section class="announcement">
        <h3>Notifikasi Terbaru</h3>
        @if(auth()->user()->unreadNotifications->count() > 0)
            @foreach(auth()->user()->unreadNotifications->take(3) as $notification)
            <div class="box" style="background: #fff3cd; border-left: 4px solid #ffc107;">
                <p><b>{{ $notification->data['title'] ?? 'Notifikasi' }}</b></p>
                <p>{{ $notification->data['message'] ?? 'Ada notifikasi baru' }}</p>
                <p class="date">{{ $notification->created_at->format('d F Y H:i') }}</p>
            </div>
            @endforeach
        @else
        <div class="box">
            <p>Tidak ada notifikasi baru</p>
        </div>
        @endif
        </section>
        @endif

        <!-- Announcement -->
        <section class="announcement">
        <h3>Pengumuman Terbaru</h3>
        @if(isset($pengumumanTerbaru) && $pengumumanTerbaru)
        <div class="box">
            <p><b>{{ $pengumumanTerbaru->judul }}</b></p>
            <p>{{ $pengumumanTerbaru->isi }}</p>
            <p class="date">Dibuat : {{ \Carbon\Carbon::parse($pengumumanTerbaru->created_at)->format('d F Y') }}</p>
        </div>
        @else
        <div class="box">
            <p>Tidak ada pengumuman terbaru</p>
        </div>
        @endif
        </section>

        <!-- Student Permission Tables -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 20px;">
            <!-- Daftar Izin Hari Ini -->
            <section>
            <h3>Daftar Izin Hari Ini</h3>
            @if(isset($siswaIzinHariIni) && $siswaIzinHariIni && $siswaIzinHariIni->count() > 0)
            <table>
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Alasan</th>
                    <th>Status</th>
                    <th>Waktu</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($siswaIzinHariIni as $izin)
                <tr>
                    <td>{{ $izin->nama_siswa }}</td>
                    <td>{{ $izin->kelas ?? '-' }}</td>
                    <td>{{ $izin->keperluan }}</td>
                    <td>
                        @if($izin->status == 'approved')
                            <span style="color: green;">Disetujui</span>
                        @elseif($izin->status == 'rejected')
                            <span style="color: red;">Ditolak</span>
                        @else
                            <span style="color: orange;">Menunggu</span>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($izin->created_at)->format('H:i') }}</td>
                    <td>
                        @if($izin->status == 'pending')
                            <div style="display: flex; gap: 5px;">
                                <form action="{{ route('surat-izin.approve', $izin->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" style="background: #4CAF50; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; font-size: 12px;">
                                        ✓ Setujui
                                    </button>
                                </form>
                                <form action="{{ route('surat-izin.reject', $izin->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" style="background: #f44336; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; font-size: 12px;">
                                        ✗ Tolak
                                    </button>
                                </form>
                            </div>
                        @else
                            <span style="color: #666; font-size: 12px;">
                                @if($izin->status == 'approved')
                                    Sudah Disetujui
                                @else
                                    Sudah Ditolak
                                @endif
                            </span>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <div class="box">
                <p>Tidak ada izin hari ini</p>
            </div>
            @endif
            </section>

            <!-- Riwayat Izin Terbaru -->
            <section>
            <h3>Riwayat Izin Terbaru</h3>
            @if(isset($riwayatIzin) && $riwayatIzin && $riwayatIzin->count() > 0)
            <table>
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Alasan</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($riwayatIzin as $izin)
                <tr>
                    <td>{{ $izin->nama_siswa }}</td>
                    <td>{{ $izin->kelas ?? '-' }}</td>
                    <td>{{ $izin->keperluan }}</td>
                    <td>
                        @if($izin->status == 'approved')
                            <span style="color: green;">Disetujui</span>
                        @elseif($izin->status == 'rejected')
                            <span style="color: red;">Ditolak</span>
                        @else
                            <span style="color: orange;">Menunggu</span>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($izin->created_at)->format('d/m/Y') }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <div class="box">
                <p>Tidak ada riwayat izin</p>
            </div>
            @endif
            </section>
        </div>
    </main>
    </div>
</body>
</html>
