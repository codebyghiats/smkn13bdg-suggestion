<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPiket - Shift Piket</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css">
    <link rel="stylesheet" href="{{ asset('css/piket.css') }}">
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
                <h2>Shift Piket</h2>
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

        <!-- Daftar Shift Piket -->
        <section>
            <div class="shift-container">
                <h2>Jadwal Piket</h2>

                <div class="table-container">
                    <div class="table-header">
                        <span>Nama</span>
                        <span>Tanggal</span>
                        <span>Shift</span>
                        <span>Kehadiran</span>
                    </div>
                    <div class="table-body">
                        <div class="table-row">
                            <span>Guru A</span>
                            <span>19/08/2025</span>
                            <span>Pagi</span>
                        </div>
                        <div class="table-row">
                            <span>Guru B</span>
                            <span>19/08/2025</span>
                            <span>Siang</span>
                        </div>
                        <div class="table-row">
                            <span>Guru C</span>
                            <span>20/08/2025</span>
                            <span>Pagi</span>
                        </div>
                        <div class="table-row">
                            <span>Guru D</span>
                            <span>20/08/2025</span>
                            <span>Siang</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifikasi & Tukar Jadwal -->
            <div class="bottom-section">
                <div class="notification-box">
                    <h3>Notifikasi</h3>
                    <div class="notification-content">
                        <p><strong>Pengingat:</strong> Jadwal Piket Guru C, Besok 20/08/2025</p>
                    </div>
                </div>

                <div class="swap-box">
                    <h3>Tukar Jadwal</h3>
                    <form class="swap-form">
                        <select>
                            <option value="" disabled selected>Guru</option>
                            <option value="guru-a">Guru A</option>
                            <option value="guru-b">Guru B</option>
                            <option value="guru-c">Guru C</option>
                            <option value="guru-d">Guru D</option>
                        </select>
                        <select>
                            <option value="" disabled selected>Tanggal</option>
                            <option value="19-08-2025">19/08/2025</option>
                            <option value="20-08-2025">20/08/2025</option>
                            <option value="21-08-2025">21/08/2025</option>
                        </select>
                        <button>Tukar Jadwal</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</div>

</body>
</html>