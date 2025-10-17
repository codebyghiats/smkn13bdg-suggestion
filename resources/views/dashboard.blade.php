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
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/logout-modal.css">
</head>
<body>
    <div class="wrapper">
    
    <!-- Sidebar -->
    <aside class="sidebar">
        <div>
        <div class="logo">
            <img src="img/LogoMerah.png" alt="Logo" width="200">
        </div>
        <nav>
            <a href="dashboard"><i class="ph ph-house"></i> Home</a>
            <a href="siswa"><i class="ph ph-user"></i> Form Siswa</a>
            <a href="guru"><i class="ph ph-users"></i> Kehadiran Guru</a>
            <a href="pengumuman"><i class="ph ph-megaphone"></i> Pengumuman</a>
            <a href="arsip"><i class="ph ph-archive"></i> Arsip</a>
            <a href="piket"><i class="ph ph-calendar"></i> Shift Piket</a>
        </nav>
        </div>
        <a href="#" class="logout logout-link"><i class="ph ph-sign-out"></i> Logout</a>
    </aside>

    <!-- Main Content -->
    <main class="main">
        <header class="header">
        <h2>Dashboard</h2>
        <div class="right-header">
            <input type="text" placeholder="Cari Disini">
            <div class="profile">
            <span>👤</span>
            <div>
                <p><b>Ghiats Abdurahman R</b></p>
                <p>ghiatsabdurahman@gmail.com</p>
            </div>
            </div>
        </div>
        </header>

        <!-- Cards -->
        <div class="cards">
        <div class="card green">
            <p class="number">15</p>
            <p>Siswa Tidak Hadir</p>
        </div>
        <div class="card blue">
            <p class="number">25</p>
            <p>Guru Hadir</p>
        </div>
        <div class="card red">
            <p class="number">5</p>
            <p>Guru Tidak Hadir</p>
        </div>
        </div>

        <!-- Announcement -->
        <section class="announcement">
        <h3>Pengumuman Terbaru</h3>
        <div class="box">
            <p><b>Kehilangan Barang</b></p>
            <p>Seorang siswa kehilangan dompet di Perpustakaan sekolah. Mohon untuk menghubungi guru piket jika menemukannya.</p>
            <p class="date">Dibuat : 18 Agustus 2025</p>
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
            <tr>
                <td>Andi</td>
                <td>XI RPL 2</td>
                <td>Keluar</td>
                <td>Lomba</td>
                <td>10:15</td>
            </tr>
            <tr>
                <td>Uya</td>
                <td>XI KA 1</td>
                <td>Keluar</td>
                <td>Acara Keluarga</td>
                <td>12:45</td>
            </tr>
            </tbody>
        </table>
        </section>
    </main>
    </div>

    <!-- Include Logout Modal -->
    @include('partials.logout-modal')

    <!-- Include JavaScript -->
    <script src="js/logout-modal.js"></script>
</body>
</html>
