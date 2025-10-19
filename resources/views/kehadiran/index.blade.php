<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kehadiran - EduPiket</title>
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
                <h2>Kehadiran</h2>
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

        <!-- Content -->
        <section>
            <h3>Data Kehadiran Hari Ini</h3>
            <div class="box">
                <p>Halaman kehadiran akan segera tersedia.</p>
                <p>Tanggal: {{ now()->format('d F Y') }}</p>
            </div>
        </section>
    </main>
    </div>
</body>
</html>
