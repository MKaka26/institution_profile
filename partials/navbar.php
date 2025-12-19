<head>
    <link rel="stylesheet" href="<?= $base_url ?>/css/navbar.css">
</head>
<header class="navbar">
    <div class="container nav-wrapper">

        <!-- Logo Area -->
        <div class="logo-area">
            <a href="<?= $base_url ?>index.php">
                <img src="<?= $base_url ?>/assets/icons/new_KLH_GAKKUM.png" alt="Logo GAKKUM LH dan KLH">
            </a>
            <div class="logo-text">
                <span>Balai Gakkum LH Wilayah Sumatera</span>
                <strong>SEKSI WILAYAH II PALEMBANG</strong>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="nav-menu">

            <!-- Beranda -->
            <a href="<?= $base_url ?>index.php" class="nav-link">Beranda</a>

            <!-- Profil Dropdown -->
            <div class="nav-item">
                <a href="#" class="nav-link">
                    Profil <span class="arrow">▾</span>
                </a>
                <div class="dropdown">
                    <a href="<?= $base_url ?>index.php#tentang">Tentang LH</a>
                    <a href="<?= $base_url ?>index.php#visi-misi">Visi & Misi</a>
                    <a href="<?= $base_url ?>index.php#tugas">Tugas & Fungsi</a>
                    <a href="<?= $base_url ?>index.php#struktur">Struktur Organisasi</a>
                </div>
            </div>

            <!-- Informasi Publik Dropdown -->
            <div class="nav-item">
                <a href="#" class="nav-link">
                    Informasi Publik <span class="arrow">▾</span>
                </a>
                <div class="dropdown">
                    <a href="<?= $base_url ?>pages/berita.php">Berita</a>
                    <a href="<?= $base_url ?>pages/pengumuman.php">Pengumuman</a>
                    <a href="<?= $base_url ?>pages/informasi-publik.php#dokumen">Dokumen</a>
                    <a href="<?= $base_url ?>pages/informasi-publik.php#galeri">Galeri</a>
                </div>
            </div>

            <!-- Layanan & Pengaduan Dropdown -->
            <div class="nav-item">
                <a href="#" class="nav-link">
                    Layanan & Pengaduan <span class="arrow">▾</span>
                </a>
                <div class="dropdown">
                    <a href="<?= $base_url ?>pages/layanan_pengaduan.php#pengaduan">Pengaduan Masyarakat</a>
                    <a href="<?= $base_url ?>pages/layanan-pengaduan.php#layanan">Layanan Online</a>
                    <a href="<?= $base_url ?>pages/layanan-pengaduan.php#tracking">Tracking Pengaduan</a>
                </div>
            </div>
        </nav>

        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </div>
</header>
