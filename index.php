<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';

/* ================= BERITA & SIARAN PERS TERBARU ================= */
$stmt = $pdo->prepare("
    SELECT id, judul, isi, gambar_utama, kategori, tanggal_upload
    FROM berita_siaranpers
    ORDER BY tanggal_upload DESC
    LIMIT 4
");
$stmt->execute();
$berita_terbaru = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website resmi Balai GAKKUM LH Seksi Wilayah II Palembang">
    <meta name="keywords" content="penegakan hukum, kementerian, lingkungan hidup, Indonesia">
    <title>GAKKUM LH</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base_url ?>/css/style.css">
</head>
<body>
    
    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <section class="hero">
        <div class="slides">
            <img src="<?= $base_url ?>assets/images/slide1.jpg" class="slide active" alt="Slide 1">
            <img src="<?= $base_url ?>assets/images/slide2.jpg" class="slide" alt="Slide 2">
            <img src="<?= $base_url ?>assets/images/slide3.jpg" class="slide" alt="Slide 3">
        </div>
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Balai Penegakan Hukum Lingkungan Hidup Wilayah Sumatera</h1>
            <p>SEKSI WILAYAH II PALEMBANG</p>
            <form action="search.php" method="GET" class="search-box">
    <input 
        type="text" 
        name="q"
        placeholder="Cari berita, agenda, pengumuman..."
        required
    >
    <button type="submit">Cari</button>
</form>


        </div>
    </section>

    <!-- SOSIAL MEDIA KEMENTRIAN LINGKUNGAN HIDUP -->
    <section id="media-sosial" class="section bg-soft">
        <div class="container">
                <h2 class="section-title">Media Sosial Resmi Kementerian Lingkungan Hidup</h2>
            <div class="social-grid">
                <a href="https://www.facebook.com/KementerianLH" target="_blank" class="social-card">
            <div class="social-icon">
                <img src="<?= $base_url ?>assets/icons/facebook.png" alt="Facebook">
            </div>
                <h4>Facebook</h4>
                </a>
                <a href="https://x.com/KLH_BPLH" target="_blank" class="social-card">
            <div class="social-icon">
                <img src="<?= $base_url ?>assets/icons/x.png" alt="X">
            </div>
                <h4>X (Twitter)</h4>
                </a>
                <a href="https://www.youtube.com/@KLH-BPLH" target="_blank" class="social-card">
            <div class="social-icon">
                <img src="<?= $base_url ?>assets/icons/youtube.png" alt="YouTube">
            </div>
                <h4>YouTube</h4>
                </a>
                <a href="https://www.instagram.com/kemenlh_bplh/#" target="_blank" class="social-card">
            <div class="social-icon">
                <img src="<?= $base_url ?>assets/icons/instagram.png" alt="Instagram">
            </div>
                <h4>Instagram</h4>
                </a>
            </div>
        </div>
    </section>

    <section id="tentang" class="section">
        <div class="container">
            <h2 class="section-title">Tentang GAKKUM LH</h2>
            <p>
            Seksi Wilayah II Palembang - Balai Penegakan Hukum Lingkungan Hidup (Balai Gakkum LH) Wilayah Sumatera 
            merupakan unit pelaksana teknis di bawah Kementerian Lingkungan Hidup (KLH) yang bertugas menjalankan 
            penegakan hukum lingkungan di wilayah Sumatera bagian Selatan yang mencakup Provinsi Sumatera Selatan,
            Provinsi Bangka Belitung, Provinsi Bengkulu, dan Provinsi Lampung.
            <br></br>
            Seksi Wilayah II Palembang berperan dalam pencegahan, pengawasan, serta penanganan pelanggaran yang 
            berpotensi menimbulkan pencemaran dan kerusakan lingkungan hidup. Melalui kegiatan intelijen, pengawasan 
            lapangan, operasi penindakan, serta koordinasi dengan aparat penegak hukum lainnya, Seksi Wilayah II 
            memastikan proses penegakan hukum berjalan cepat, profesional, dan sesuai ketentuan yang berlaku.
            <br></br>
            Dengan dukungan Balai Gakkum Wilayah Sumatera, sektor-sektor strategis seperti hutan, gambut, industri, 
            limbah, dan sumber daya alam lainnya mendapatkan pengawasan yang optimal. Kami berkomitmen menjalankan \
            prinsip integritas, akuntabilitas, dan respons cepat untuk menjaga kelestarian lingkungan hidup demi 
            kualitas hidup masyarakat yang lebih baik di wilayah Sumatera.
            </p>
        </div>
    </section>

    <!-- Visi & Misi -->
    <section id="visi-misi" class="section bg-light">
        <div class="container vision-mission-grid vertical">
            <h2 class="section-title">Visi & Misi</h2>
            <div class="vision-box">
                <h2>Visi</h2>
                <p>
                    "Terwujudnya penegakan hukum lingkungan hidup yang kuat, adil, dan efektif guna melindungi lingkungan hidup serta menjamin pembangunan keberlanjutan."
                </p>
            </div>
            <div class="mission-box">
                <h2>Misi</h2>
                <ul>
                    <li>Meningkatkan kepatuhan pelaku usaha dan kegiatan terhadap peraturan perundang-undangan di bidang lingkungan hidup.</li>
                    <li>Melaksanakan pengawasan dan penindakan hukum lingkungan hidup secara profesional, transparan, dan berkeadilan.</li>
                    <li>Menegakkan sanksi administratif, perdata, dan pidana lingkungan hidup secara konsisten untuk memberikan efek jera.</li>
                    <li>Memperkuat koordinasi penegakan hukum lingkungan hidup dengan aparat penegak hukum dan pemangku kepentingan terkait.</li>
                    <li>Meningkatkan kapasitas kelembagaan dan sumber daya manusia penegakan hukum lingkungan hidup, termasuk di tingkat wilayah.</li>
                    <li>Mendorong pencegahan pencemaran dan/atau kerusakan lingkungan hidup, termasuk pengendalian kebakaran hutan dan lahan.</li>
                </ul>
            </div>
        </div>
    </section>

   <!-- Tugas & Fungsi -->
    <section id="tugas" class="section bg-light">
        <div class="container">
            <h2 class="section-title">Tugas & Fungsi</h2>
            <div class="tf-box">
                <!-- <h3 class="tf-subtitle">Tugas</h3> -->
                <p class="tf-text">
                    Balai Gakkum Lingkungan Hidup mempunyai tugas melaksanakan kegiatan penurunan gangguan,
                    ancaman, dan pelanggaran hukum lingkungan hidup berdasarkan Pasal 4 Peraturan Menteri LH Nomor 10 Tahun 2025. 
                    Dalam melaksanakan tugas sebagaimana dimaksud, Gakkum LH menyelenggarakan fungsi sebagai berikut: 
                </p>
                <ul class="tf-list">
                    <li>Penyusunan rencana, program, dan anggaran.</li>
                    <li>Pelaksanaan inventarisasi dan identifikasi potensi pencemaran, perusakan, pelanggaran hukum lingkungan hidup, serta kebakaran lahan.</li>
                    <li>Pelaksanaan pengelolaan pengaduan pelanggaran hukum lingkungan hidup.</li>
                    <li>Pelaksanaan pengawasan ketaatan terhadap perizinan berusaha atau persetujuan pemerintah.</li>
                    <li>Pelaksanaan penanganan pelanggaran hukum lingkungan hidup.</li>
                    <li>Pelaksanaan fasilitasi dan penyelesaian sengketa lingkungan hidup.</li>
                    <li>Pelaksanaan kegiatan teknis pengendalian kebakaran lahan.</li>
                    <li>Pelaksanaan sosialisasi penegakan hukum lingkungan hidup dan pengendalian kebakaran lahan.</li>
                    <li>Pelaksanaan koordinasi dengan aparat penegak hukum dan pihak terkait lainnya.</li>
                    <li>Pelaksanaan pemantauan, evaluasi, dan pelaporan penegakan hukum lingkungan hidup serta pengendalian kebakaran lahan.</li>
                    <li>Pemantauan, evaluasi, dan pelaporan Gakkum LH.</li>
                    <li>Pelaksanaan urusan ketatausahaan dan rumah tangga Gakkum LH.</li>
                </ul>
            </div>
        </div>
    </section>
    
    <!-- Berita -->
        <section class="section bg-light">
            <div class="container">
                <h2 class="section-title">Berita & Kegiatan Terbaru</h2>
                <div class="news-grid">

<?php if (!empty($berita_terbaru)): ?>
    <?php foreach ($berita_terbaru as $b): ?>
        <article class="news-card">

            <?php if (!empty($b['gambar_utama'])): ?>
                <img src="<?= htmlspecialchars($b['gambar_utama']) ?>" 
                     alt="<?= htmlspecialchars($b['judul']) ?>">
            <?php else: ?>
                <img src="<?= $base_url ?>assets/default.jpg" alt="Default">
            <?php endif; ?>

            <span class="news-date">
                <?= date('d M Y', strtotime($b['tanggal_upload'])) ?>
            </span>

            <h4><?= htmlspecialchars($b['judul']) ?></h4>

            <p>
                <?= htmlspecialchars(substr(strip_tags($b['isi']), 0, 120)) ?>...
            </p>

            <a href="<?= $base_url ?>pages/detail_berita.php?id=<?= $b['id'] ?>"
               class="btn-read">
                Baca Selengkapnya →
            </a>

        </article>
    <?php endforeach; ?>
<?php else: ?>
    <p style="text-align:center;">Belum ada berita.</p>
<?php endif; ?>

</div>

            </div>
        </section>

    <?php include __DIR__ . '/partials/footer.php'; ?>
    <script src="<?= $base_url ?>js/script.js"></script>
</body>
</html>
