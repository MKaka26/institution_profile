<?php
session_start();
require_once __DIR__ . '/../config/config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin | Galeri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base_url ?>css/admin_dashboard.css">
    <link rel="stylesheet" href="<?= $base_url ?>css/admin_galeri.css">
</head>
<body>

<div class="dashboard-wrapper">

    <?php include 'partials/sidebar.php'; ?>

    <main class="main-content">

        <?php include 'partials/topbar.php'; ?>

        <section class="content-box">
            <h2 class="page-title">Manajemen Galeri</h2>

            <!-- DAFTAR GALERI -->
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Preview</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="<?= $base_url ?>assets/gallery/sample1.jpg" class="thumb">
                        </td>
                        <td>Operasi Penindakan Limbah</td>
                        <td><?= date('Y-m-d') ?></td>
                        <td>
                            <button class="btn edit">Edit</button>
                            <button class="btn delete">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <img src="<?= $base_url ?>assets/gallery/sample2.jpg" class="thumb">
                        </td>
                        <td>Sosialisasi Lingkungan</td>
                        <td><?= date('Y-m-d') ?></td>
                        <td>
                            <button class="btn edit">Edit</button>
                            <button class="btn delete">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- FORM UPLOAD -->
        <section class="content-box">
            <h2>Tambah Foto</h2>

            <form class="admin-form" enctype="multipart/form-data">
                <label>Judul Foto</label>
                <input type="text" placeholder="Judul foto">

                <label>Upload Foto</label>
                <input type="file" accept="image/*">

                <button type="submit" class="btn primary">Simpan Foto</button>
            </form>
        </section>

    </main>
</div>

</body>
</html>
