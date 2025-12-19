<?php
require_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan & Pengaduan - Balai Gakkum LH Sumatera</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

<!-- CSS -->
    <link rel="stylesheet" href="<?= $base_url ?>css/pengaduan.css">

<!-- CSS Utama -->
    <link rel="stylesheet" href="<?= $base_url ?>css/style.css">

    <!-- Navbar -->
    <?php include __DIR__ . '/../partials/navbar.php'; ?>

    <!-- Header -->
    <header class="page-header">
        <div class="overlay"></div>
        <div class="container header-content">
            <h1>Layanan & Pengaduan</h1>
            <p>Saluran resmi pelaporan pelanggaran lingkungan dan akses layanan publik</p>
        </div>
    </header>

    <!-- Pengaduan -->
    <section id="pengaduan" class="section">
        <div class="container">
            <h2 class="section-title">Formulir Pengaduan Masyarakat</h2>

            <div class="two-column">

                <div class="info-side">
                    <div class="card bg-light">
                        <h3>Prosedur Pengaduan</h3>
                        <p>
                            Silakan laporkan indikasi pencemaran atau perusakan lingkungan hidup.
                            Identitas pelapor dijamin kerahasiaannya sesuai peraturan perundang-undangan.
                        </p>
                        <ul class="list">
                            <li>1. Isi data diri dengan valid (NIK/KTP).</li>
                            <li>2. Jelaskan kronologi kejadian secara rinci.</li>
                            <li>3. Sertakan bukti foto atau dokumen jika ada.</li>
                            <li>4. Simpan Nomor Tiket untuk pengecekan status.</li>
                        </ul>
                    </div>
                </div>

                <div class="form-side">
                    <form class="gakkum-form" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" required placeholder="Sesuai KTP">
                        </div>

                        <div class="form-group">
                            <label>NIK / No. KTP</label>
                            <input type="number" required placeholder="16 digit NIK">
                        </div>

                        <div class="form-group">
                            <label>Nomor WhatsApp / Email</label>
                            <input type="text" required placeholder="Untuk konfirmasi tindak lanjut">
                        </div>

                        <div class="form-group">
                            <label>Lokasi Kejadian</label>
                            <input type="text" required placeholder="Nama Desa, Kecamatan, Kabupaten">
                        </div>

                        <div class="form-group">
                            <label>Isi Pengaduan</label>
                            <textarea rows="5" required placeholder="Ceritakan detail kejadian..."></textarea>
                        </div>

                        <div class="form-group">
                            <label>Upload Bukti</label>
                            <input type="file" accept=".jpg,.png,.pdf">
                            <small>Maksimal 5MB</small>
                        </div>

                        <button type="submit" class="btn-primary">Kirim Pengaduan</button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- Tracking -->
    <section id="tracking" class="section bg-light">
        <div class="container text-center">
            <h2 class="section-title">Lacak Status Pengaduan</h2>
            <p>Masukkan ID Tiket yang Anda terima saat mengirim laporan.</p>

            <div class="tracking-box">
                <input type="text" placeholder="GAKKUM-2024-XXX">
                <button>Cek Status</button>
            </div>
        </div>
    </section>

    <!-- Layanan -->
    <section id="layanan" class="section">
        <div class="container">
            <h2 class="section-title">Layanan Publik Lainnya</h2>

            <div class="card-grid">
                <div class="card text-center">
                    <div class="icon-service">📂</div>
                    <h3>Permohonan Informasi</h3>
                    <p>Layanan permintaan data dan informasi publik.</p>
                    <a href="#" class="link-action">Ajukan &rarr;</a>
                </div>

                <div class="card text-center">
                    <div class="icon-service">🗣️</div>
                    <h3>Konsultasi Gakkum</h3>
                    <p>Konsultasi peraturan hukum lingkungan.</p>
                    <a href="#" class="link-action">Hubungi &rarr;</a>
                </div>

                <div class="card text-center">
                    <div class="icon-service">🎓</div>
                    <h3>Permintaan Narasumber</h3>
                    <p>Permohonan narasumber kegiatan edukasi.</p>
                    <a href="#" class="link-action">Unduh &rarr;</a>
                </div>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <?php include __DIR__ . '/../partials/footer.php'; ?>

    <!-- JS -->
    <script src="<?= $base_url ?>js/script.js"></script>

    <script>
        document.querySelector('.gakkum-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Terima kasih. Pengaduan Anda telah kami terima.\nID Tiket: GAKKUM-2024-XXX');
        });
    </script>

</body>
</html>
