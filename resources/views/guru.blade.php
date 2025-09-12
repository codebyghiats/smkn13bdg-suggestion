<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPiket - Kehadiran Guru</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css">
    <link rel="stylesheet" href="{{ asset('css/guru.css') }}">
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
                <h2>Kehadiran Guru</h2>
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

        <!-- Table -->
        <section>
            <h3>Kehadiran Guru</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Hari</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>James</td>
                        <td>20/6/2025</td>
                        <td>Jum'at</td>
                        <td>Izin</td>
                    </tr>
                    <tr>
                        <td>Khidir</td>
                        <td>20/6/2025</td>
                        <td>Jum'at</td>
                        <td>Sakit</td>
                    </tr>
                    <tr>
                        <td>Ismail</td>
                        <td>20/6/2025</td>
                        <td>Jum'at</td>
                        <td>Izin</td>
                    </tr>
                    <tr>
                        <td>Ahmad</td>
                        <td>20/6/2025</td>
                        <td>Jum'at</td>
                        <td>Sakit</td>
                    </tr>
                </tbody>
            </table>
            <button class="btn-add">Tambah Data <i class="ph ph-plus"></i></button>        
        </section>
    </main>
</div>

</body>
</html>