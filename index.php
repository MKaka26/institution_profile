<?php
require_once __DIR__ . '/config/config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website resmi Balai GAKKUM LH Seksi Wilayah II Palembang">
    <meta name="keywords" content="penegakan hukum, kementerian, lingkungan hidup, Indonesia">
    <title>GAKKUM LH</title>

    <!-- Google Font kakakak --> 
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= $base_url ?>css/style.css">
</head>
<body>

    <!-- Navbar -->
    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="slides">
            <img src="<?= $base_url ?>/assets/images/slide1.jpeg" class="slide active" alt="Slide 1">
            <img src="<?= $base_url ?>assets/images/slide2.jpeg" class="slide" alt="Slide 2">
            <img src="<?= $base_url ?>assets/images/slide3.png" class="slide" alt="Slide 3">
        </div>

        <div class="overlay"></div>

        <div class="hero-content">
            <h1>Balai Penegakan Hukum Lingkungan Hidup Wilayah Sumatera</h1>
            <p>Seksi Wilayah II Palembang</p>

            <div class="search-box">
                <input type="text" placeholder="Cari..." aria-label="Pencarian">
                <button type="button">Cari</button>
            </div>
        </div>
    </section>

    <!-- Tentang GAKKUM LH -->
    <section id="tentang" class="section">
        <div class="container">
            <h2 class="section-title">Tentang GAKKUM LH</h2>
            <p>
                Kementerian Lingkungan Hidup merupakan lembaga pemerintah yang bertanggung jawab
                dalam pengelolaan dan perlindungan lingkungan hidup di Indonesia.
            </p>
        </div>
    </section>

    <!-- Visi & Misi -->
    <section id="visi-misi" class="section bg-light">
        <div class="container vision-mission-grid">

            <div class="vision-box">
                <h2>Visi</h2>
                <p>
                    Terwujudnya lingkungan hidup yang berkelanjutan dan berkeadilan.
                </p>
            </div>

            <div class="mission-box">
                <h2>Misi</h2>
                <ul>
                    <li>Meningkatkan kualitas lingkungan hidup</li>
                    <li>Pengendalian pencemaran dan kerusakan lingkungan</li>
                    <li>Penegakan hukum lingkungan</li>
                </ul>
            </div>

        </div>
    </section>

    <!-- Tujuan & Tugas -->
    <section id="tugas" class="section">
        <div class="container">
            <h2 class="section-title">Tugas & Fungsi</h2>
            <div class="card-grid">
                <div class="card">
                    <h3>Perumusan Kebijakan</h3>
                    <p>Menetapkan kebijakan strategis di bidang lingkungan hidup untuk pembangunan berkelanjutan.</p>
                </div>
                <div class="card">
                    <h3>Pengawasan</h3>
                    <p>Mengawasi pelaksanaan peraturan dan standar lingkungan di seluruh wilayah Indonesia.</p>
                </div>
                <div class="card">
                    <h3>Penegakan Hukum</h3>
                    <p>Melakukan penindakan tegas terhadap pelanggaran lingkungan sesuai peraturan yang berlaku.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Berita -->
    <section class="section bg-light">
        <div class="container">
            <h2 class="section-title">Berita & Kegiatan Terbaru</h2>

            <div class="news-grid">
                <article class="news-card">
                    <img src="<?= $base_url ?>assets/news1.jpeg" alt="Berita 1">
                    <h4>Judul Berita Pertama</h4>
                    <p>Ringkasan singkat berita.</p>
                </article>

                <article class="news-card">
                    <img src="<?= $base_url ?>assets/news2.jpeg" alt="Berita 2">
                    <h4>Judul Berita Kedua</h4>
                    <p>Ringkasan singkat berita.</p>
                </article>

                <article class="news-card">
                    <img src="<?= $base_url ?>assets/news3.jpg" alt="Berita 3">
                    <h4>Judul Berita Ketiga</h4>
                    <p>Ringkasan singkat berita.</p>
                </article>

                <article class="news-card">
                    <img src="<?= $base_url ?>assets/news4.jpg" alt="Berita 4">
                    <h4>Judul Berita Keempat</h4>
                    <p>Ringkasan singkat berita.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include __DIR__ . '/partials/footer.php'; ?>

    <!-- JavaScript -->
    <script src="<?= $base_url ?>js/script.js"></script>

</body>
</html>
