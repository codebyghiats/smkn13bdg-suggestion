<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Icon Phosphor -->
    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css"
    >

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <aside>
        <aside class="sidebar">
            <div class="logo">
                <img src="{{ asset('img/LogoMerah.png') }}" alt="Logo" width="200">
            </div>
            <nav>
                <a href="{{ route('dashboard') }}"><i class="ph ph-house"></i> Home</a>

                @if(Auth::user()->isGuru())
                    <a href="{{ route('kehadiran.index') }}"><i class="ph ph-user"></i> Form Siswa</a>
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

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout">
                    <i class="ph ph-sign-out"></i> Logout
                </button>
            </form>
        </aside>
    </aside>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
</body>
</html>
