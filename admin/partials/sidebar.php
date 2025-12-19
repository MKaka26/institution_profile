<aside class="sidebar">
    <div class="sidebar-header">
        <h2>ADMIN</h2>
        <span>Balai GakKum LH Wilayah Sumatera</span><br>
        <strong>SEKSI WILAYAH II PALEMBANG</strong>
    </div>

    <nav class="sidebar-menu">
        <a href="<?= $base_url ?>admin/admin_dashboard.php" 
           class="<?= basename($_SERVER['PHP_SELF']) == 'admin_dashboard.php' ? 'active' : '' ?>">
            Dashboard
        </a>

        <a href="<?= $base_url ?>admin/admin_berita.php" 
           class="<?= basename($_SERVER['PHP_SELF']) == 'admin_berita.php' ? 'active' : '' ?>">
            Berita
        </a>

        <a href="<?= $base_url ?>admin/admin_pengumuman.php"
            class="<?= basename($_SERVER['PHP_SELF']) == 'admin_pengumuman.php' ? 'active' : '' ?>">
            Pengumuman
        </a>

        <a href="<?= $base_url ?>admin/admin_pengaduan.php"
        class="<?= basename($_SERVER['PHP_SELF']) == 'admin_pengaduan.php' ? 'active' : '' ?>">
            Pengaduan
        </a>
        
        <a href="<?= $base_url ?>admin/admin_galeri.php"
            class="<?= basename($_SERVER['PHP_SELF']) == 'admin_galeri.php' ? 'active' : '' ?>">
            Galeri
        </a>

        <a href="<?= $base_url ?>admin/logout.php" class="logout">Logout</a>
    </nav>
</aside>
