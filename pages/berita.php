<?php
require_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita & Pengumuman | Kementerian Lingkungan Hidup</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS Utama -->
    <link rel="stylesheet" href="<?= $base_url ?>css/style.css">

    <!-- CSS Berita -->
    <link rel="stylesheet" href="<?= $base_url ?>css/berita.css">
</head>
<body>

    <!-- Navbar -->
    <?php include __DIR__ . '/../partials/navbar.php'; ?>

    <!-- Header Halaman -->
    <section class="page-header">
        <div class="container">
            <h1>Berita & Pengumuman</h1>
            <p>Informasi terbaru seputar kegiatan, kebijakan, dan pengumuman resmi</p>
        </div>
    </section>

    <!-- Konten Berita -->
    <section class="section">
        <div class="container berita-layout">

            <!-- Daftar Berita -->
            <div class="berita-list">

                <article class="berita-card">
                    <img src="<?= $base_url ?>assets/news1.jpeg" alt="Berita 1">
                    <div class="berita-content">
                        <span class="berita-date">12 Desember 2025</span>
                        <h3>Penegakan Hukum Lingkungan di Wilayah Sumatera</h3>
                        <p>
                            Balai Penegakan Hukum Lingkungan Hidup Wilayah Sumatera
                            terus meningkatkan pengawasan dan penindakan terhadap
                            pelanggaran lingkungan hidup.
                        </p>
                        <a href="#" class="btn-read">Baca Selengkapnya</a>
                    </div>
                </article>

                <article class="berita-card">
                    <img src="<?= $base_url ?>assets/news2.jpeg" alt="Berita 2">
                    <div class="berita-content">
                        <span class="berita-date">5 Desember 2025</span>
                        <h3>Pengumuman Layanan Pengaduan Online</h3>
                        <p>
                            Masyarakat kini dapat menyampaikan pengaduan lingkungan
                            secara online melalui sistem layanan terpadu.
                        </p>
                        <a href="#" class="btn-read">Baca Selengkapnya</a>
                    </div>
                </article>

                <article class="berita-card">
                    <img src="<?= $base_url ?>assets/news3.jpg" alt="Berita 3">
                    <div class="berita-content">
                        <span class="berita-date">28 November 2025</span>
                        <h3>Sosialisasi Perlindungan Lingkungan Hidup</h3>
                        <p>
                            Kegiatan sosialisasi dilakukan untuk meningkatkan
                            kesadaran masyarakat dalam menjaga kelestarian lingkungan.
                        </p>
                        <a href="#" class="btn-read">Baca Selengkapnya</a>
                    </div>
                </article>

            </div>

            <!-- Sidebar -->
            <aside class="berita-sidebar">

                <div class="sidebar-box">
                    <h4>Cari Berita</h4>
                    <input type="text" placeholder="Ketik kata kunci...">
                </div>

                <div class="sidebar-box">
                    <h4>Kategori</h4>
                    <ul>
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">Pengumuman</a></li>
                        <li><a href="#">Kegiatan</a></li>
                        <li><a href="#">Siaran Pers</a></li>
                    </ul>
                </div>

                <div class="sidebar-box">
                    <h4>Arsip</h4>
                    <ul>
                        <li><a href="#">Desember 2025</a></li>
                        <li><a href="#">November 2025</a></li>
                        <li><a href="#">Oktober 2025</a></li>
                    </ul>
                </div>

            </aside>

        </div>
    </section>

    <!-- Footer -->
    <?php include __DIR__ . '/../partials/footer.php'; ?>

    <!-- JavaScript -->
    <script src="<?= $base_url ?>js/berita.js"></script>
    <script src="<?= $base_url ?>js/script.js"></script>

</body>
</html>
