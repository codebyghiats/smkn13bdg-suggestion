<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="css/style.css">
    <title>EduPiket13</title>

    <style>
        /* Tambahan kecil agar tombolnya nyatu sama style existing */
        .navbar-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .navbar-btn {
            background-color: #FDFBEE;
            color: black;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }

        .navbar-btn:hover {
            background-color: #848484;
            color: white;
        }

        /* Kalau pengen tombol Register beda warna dikit */
        .navbar-btn.register {
            background-color: #FDFBEE;
            color: black;
        }

        .navbar-btn.register:hover {
            background-color: #848484;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="Navbar">
        <div class="navbar-container" style="display:flex; justify-content:space-between; align-items:center;">
            <div class="navbar-logo">
                <img src="img/LogoPutih.png" alt="Logo" style="height:40px;" class="navbar-logo"/>
            </div>

            <!-- Tombol Login & Register -->
            <div class="navbar-buttons">
                <a href="{{ route('login') }}"><button class="navbar-btn">Login</button></a>
                <a href="{{ route('register') }}"><button class="navbar-btn register">Register</button></a>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <section class="landing">
        <div class="text-section">
            <h1>Selamat Datang</h1>
            <p>Di Website Piket SMKN 13 Bandung</p>
            <form action="dashboard">
                <button class="btn">Masuk →</button>
            </form>
        </div>

        <div class="image-section">
            <img src="img/BigImage.png" alt="Sekolah" class="big-img">
            <img src="img/Smallimage.png" alt="Upacara" class="small-img">
        </div>
    </section>  

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-left">
                <img src="img/SMKN13BANDUNG.png" alt="SMKN 13 Bandung" class="footer-logo">
            </div>

            <div class="footer-right">
                <h3>SMKN 13 Bandung</h3>
                <p>
                    Jl. Soekarno-Hatta No.KM. 10, Jatisari, Kec. Buahbatu, <br>
                    Kota Bandung, Jawa Barat 40286
                </p>
                <div class="footer-social">
                    <a href="#"><i class="ph-fill ph-youtube-logo"></i></a>
                    <a href="#"><i class="ph-fill ph-facebook-logo"></i></a>
                    <a href="#"><i class="ph-fill ph-instagram-logo"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© 2025 SMKN 13 Bandung. All rights reserved</p>  
        </div>
    </footer>
</body>
</html>
