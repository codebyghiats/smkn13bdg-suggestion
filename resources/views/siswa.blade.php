<!DOCTYPE html>
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
    <link rel="stylesheet" href="css/siswa.css">
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
        <a href="/" class="logout"><i class="ph ph-sign-out"></i> Logout</a>
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
                        <p><b>Ghiats Abdurahman R</b></p>
                        <p>ghiatsabdurahman@gmail.com</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Form Siswa & Dashboard Real-Time -->
        <div class="form-section">
            <div class="form-card">
                <h3>Formulir Izin Siswa</h3>
                <form action="#" method="POST">
    <input type="text" placeholder="Masukkan Nama" required>
    <input type="text" placeholder="Masukkan Kelas" required>
    <input type="text" placeholder="Masukkan Alasan" required>
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
                        <h4>5</h4>
                        <p>Jumlah Izin Hari ini</p>
                    </div>
                    <div class="stat-item">
                        <h4>2</h4>
                        <p>Disetujui</p>
                    </div>
                    <div class="stat-item">
                        <h4>1</h4>
                        <p>Ditolak</p>
                    </div>
                    <div class="stat-item">
                        <h4>2</h4>
                        <p>Menunggu</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Riwayat & Daftar Izin Hari Ini -->
        <div class="row">
            <div class="riwayat-card">
                <h3>Riwayat</h3>
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
                        <tr>
                            <td>Yuda</td>
                            <td>XI RPL 2</td>
                            <td>Ambil Ijazah</td>
                            <td>Disetujui</td>
                        </tr>
                        <tr>
                            <td>Luthfi</td>
                            <td>XI RPL 2</td>
                            <td>Ambil Misting</td>
                            <td>Ditolak</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="daftar-izin-card">
                <h3>Daftar Izin Hari Ini</h3>
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
                        <tr>
                            <td>Yuda</td>
                            <td>XI RPL 2</td>
                            <td>Ambil Ijazah</td>
                            <td>Disetujui</td>
                        </tr>
                        <tr>
                            <td>Luthfi</td>
                            <td>XI RPL 2</td>
                            <td>Ambil Misting</td>
                            <td>Ditolak</td>
                        </tr>
                        <tr>
                            <td>Ghiats</td>
                            <td>XI RPL 2</td>
                            <td>Ke Rumah Sakit</td>
                            <td>Menunggu</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

</body>
</html>