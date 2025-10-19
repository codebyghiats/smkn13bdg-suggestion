image.png<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPiket Form Siswa</title>
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
    <link rel="stylesheet" href="{{ asset('css/siswa.css') }}">
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
            <a href="{{ route('siswa') }}"><i class="ph ph-user"></i> Form Siswa</a>
            <a href="{{ route('kehadiran.index') }}"><i class="ph ph-users"></i> Kehadiran Guru</a>
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
                <h2>Form Siswa</h2>
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

        <!-- Form Siswa & Dashboard Real-Time -->
        <div class="form-section">
            <div class="form-card">
                <h3>Formulir Izin Siswa</h3>
                <form action="{{ route('surat-izin.store') }}" method="POST">
                    @csrf
                    <input type="text" name="nama_siswa" placeholder="Masukkan Nama" required>
                    <input type="text" name="kelas" placeholder="Masukkan Kelas" required>
                    <input type="text" name="keperluan" placeholder="Masukkan Alasan" required>
                    <div style="display: flex; gap: 132px; align-items: center; margin-top: 10px;">
                        <button type="submit" class="btn-submit">Submit</button>
                        <a href="#" class="export-link">Export ke Excel/PDF</a>
                    </div>
                </form>
            </div>

            <div class="dashboard-card">
                <h3>Dashboard Izin Real-Time</h3>
                <div class="stats-grid">
                    <div class="stat-item">
                        <h4>{{ $totalIzinHariIni ?? 0 }}</h4>
                        <p>Jumlah Izin Hari ini</p>
                    </div>
                    <div class="stat-item">
                        <h4>{{ $disetujui ?? 0 }}</h4>
                        <p>Disetujui</p>
                    </div>
                    <div class="stat-item">
                        <h4>{{ $ditolak ?? 0 }}</h4>
                        <p>Ditolak</p>
                    </div>
                    <div class="stat-item">
                        <h4>{{ $menunggu ?? 0 }}</h4>
                        <p>Menunggu</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Riwayat & Daftar Izin Hari Ini -->
        <div class="row">
            <div class="riwayat-card">
                <h3>Riwayat</h3>
                @if(isset($riwayatIzin) && $riwayatIzin->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Alasan</th>
                            <th>Status</th>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="box">
                    <p>Tidak ada riwayat izin</p>
                </div>
                @endif
            </div>

            <div class="daftar-izin-card">
                <h3>Daftar Izin Hari Ini</h3>
                @if(isset($izinHariIni) && $izinHariIni->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Alasan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($izinHariIni as $izin)
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
            </div>
        </div>
    </main>
</div>

</body>
</html>