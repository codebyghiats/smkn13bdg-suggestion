<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPiket Pengumuman</title>
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
    <link rel="stylesheet" href="css/pengumuman.css">
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
            <h2>Pengumuman</h2>
            <div class="right-header">
                <input type="text" placeholder="Cari Disini" class="search-bar">
                <div class="profile">
                    <span>👤</span>
                    <div>
                        <p><b>Ghiats Abdurahman R</b></p>
                        <p>ghiatsabdurahman@gmail.com</p>
                    </div>
                </div>
            </div>
        </header>
         <!-- Create Announcement Form -->
      <div class="form-container">
        <h3>Buat Pengumuman</h3>
        <div class="form-group">
          <input type="text" placeholder="Judul Pengumuman" />
        </div>
        <div class="form-group">
          <select>
            <option>Kategori</option>
            <option value="1">Umum</option>
            <option value="2">Penting</option>
            <option value="3">Khusus</option>
          </select>
        </div>
        <div class="form-group">
          <textarea placeholder="Isi Pengumuman"></textarea>
        </div>
        <button class="btn-save">Simpan</button>
      </div>
      <!-- Recent Announcements -->
      <div class="recent-announcements">
        <h3>Pengumuman Terbaru</h3>
        <div class="announcement-item">
          <div class="announcement-title">Barang Hilang Di Lapangan</div>
          <div class="announcement-desc">Seorang Siswa Kehilangan Jaket Di Lapangan.</div>
          <div class="announcement-time">Dibuat: 26 Juni 2025, 08:35</div>
        </div>
        <div class="announcement-item">
          <div class="announcement-title">Orang Tua Ananda Budi Datang</div>
          <div class="announcement-desc">Orang Tua</div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
