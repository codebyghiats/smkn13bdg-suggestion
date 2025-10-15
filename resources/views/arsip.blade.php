<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPiket - Arsip</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css">
    <link rel="stylesheet" href="{{ asset('css/arsip.css') }}">
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
                <a href="/dashboard"><i class="ph ph-house"></i> Home</a>
                <a href="/siswa"><i class="ph ph-user"></i> Form Siswa</a>
                <a href="/guru"><i class="ph ph-users"></i> Kehadiran Guru</a>
                <a href="/pengumuman"><i class="ph ph-megaphone"></i> Pengumuman</a>
                <a href="/arsip"><i class="ph ph-archive"></i> Arsip</a>
                <a href="/piket"><i class="ph ph-calendar"></i> Shift Piket</a>
            </nav>
        </div>
        <a href="/" class="logout"><i class="ph ph-sign-out"></i> Logout</a>
    </aside>

    <!-- Main Content -->
    <main class="main">
        <header class="header">
            <div class="header-content">
                <h2>Arsip</h2>
                    <div class="search-bar">
                        <i class="ph ph-magnifying-glass"></i>
                        <input type="text" placeholder="Cari Disini">
                        </div>
                        <div class="profile">
                        <span><i class="ph ph-user"></i></span>
                        <div>
                        <p><b>Ghiats Abdurahman R</b></p>
                        <p>ghiatsabdurahman@gmail.com</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Riwayat & Arsip -->
        <section>
            <div class="arsip-container">
                <h2>Riwayat & Arsip</h2>

                <!-- Search Bar -->
                <input type="text" class="search-box" placeholder="Cari">

                <!-- Filter Row -->
                <div class="filter-row">
                    <div class="input-group">
                        <label>Nama</label>
                        <input type="text" placeholder="">
                    </div>
                    <div class="input-group">
                        <label>Kelas</label>
                        <input type="text" placeholder="">
                    </div>
                    <div class="input-group calendar-icon">
                        <label>Tanggal</label>
                        <input type="date" placeholder="">
                    </div>
                </div>

                <!-- Table -->
                <div class="table-container">
                    <div class="table-header">
                        <span>Tanggal</span>
                        <span>Nama</span>
                        <span>Kelas</span>
                        <span>Status</span>
                    </div>
                    <div class="table-body">
                        <div class="table-row">
                            <span>30 Juni 2025</span>
                            <span>Aji</span>
                            <span>XII AK 1</span>
                            <span>Izin</span>
                        </div>
                        <div class="table-row">
                            <span>30 Juni 2025</span>
                            <span>Budi</span>
                            <span>XII TKJ 3</span>
                            <span>Hadir</span>
                        </div>
                        <div class="table-row">
                            <span>30 Juni 2025</span>
                            <span>Cici</span>
                            <span>XI RPL 2</span>
                            <span>Izin</span>
                        </div>
                        <div class="table-row">
                            <span>29 Juni 2025</span>
                            <span>Ali</span>
                            <span>X RPL 1</span>
                            <span>Izin</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

</body>
</html>