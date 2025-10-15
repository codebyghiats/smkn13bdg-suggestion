<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPiket - Pengumuman</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css">
    <link rel="stylesheet" href="{{ asset('css/pengumuman.css') }}">
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
                <h2>Pengumuman</h2>
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

        <section>
            <div class="form-pengumuman">
                <h4>Buat Pengumuman</h4>
                <input type="text" placeholder="Judul Pengumuman">
                <select>
                    <option value="" disabled selected>Kategori</option>
                    <option value="informasi">Informasi</option>
                    <option value="peringatan">Peringatan</option>
                    <option value="kegiatan">Kegiatan</option>
                </select>
                <textarea rows="4" placeholder="Isi Pengumuman"></textarea>
                <button>Simpan</button>
            </div>

            <div class="pengumuman-list">
                <h4>Pengumuman Terbaru</h4>

                <div class="pengumuman-item">
                    <h5>Barang Hilang Di Lapangan</h5>
                    <p>Seorang Siswa Kehilangan Jaket Di Lapangan.</p>
                    <div class="date">Dibuat: 26 Juni 2025, 08:35</div>
                </div>

                <div class="pengumuman-item">
                    <h5>Orang Tua Ananda Budi Datang</h5>
                    <p>Orang Tua</p>
                    <div class="date">Dibuat: 25 Juni 2025, 14:20</div>
                </div>
            </div>
        </section>
    </main>
</div>

</body>
</html>