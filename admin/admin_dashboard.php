<?php
session_start();
require_once __DIR__ . '/../config/config.php';
$page_title = 'Dashboard';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base_url ?>css/admin_dashboard.css">
    <link rel="stylesheet" href="<?= $base_url ?>css/admin_berita.css">
</head>
<body>

<div class="dashboard-wrapper">

    <?php include __DIR__ . '/partials/sidebar.php'; ?>

    <main class="main-content">

        <?php include __DIR__ . '/partials/topbar.php'; ?>

        <section class="stats">
            <div class="stat-card">
                <h3>Total Berita</h3>
                <p>24</p>
            </div>
            <div class="stat-card">
                <h3>Total Dokumen</h3>
                <p>12</p>
            </div>
            <div class="stat-card">
                <h3>Total Pengaduan</h3>
                <p>8</p>
            </div>
            <div class="stat-card">
                <h3>Galeri</h3>
                <p>36</p>
            </div>
        </section>

        <section class="content-box">
            <h2>Aktivitas Terbaru</h2>
            <p>Belum ada aktivitas terbaru.</p>
        </section>

    </main>
</div>

<script src="<?= $base_url ?>js/admin_dashboard.js"></script>
</body>
</html>
