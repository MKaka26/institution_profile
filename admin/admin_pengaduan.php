<?php
session_start();
require_once __DIR__ . '/../config/config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin | Pengaduan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base_url ?>css/admin_dashboard.css">
    <link rel="stylesheet" href="<?= $base_url ?>css/admin_pengaduan.css">
</head>
<body>

<div class="dashboard-wrapper">

    <?php include 'partials/sidebar.php'; ?>

    <main class="main-content">

        <?php include 'partials/topbar.php'; ?>

        <section class="content-box">
            <h2 class="page-title">Manajemen Pengaduan</h2>

            <table class="admin-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelapor</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ahmad Fauzi</td>
                        <td>Sungai Musi, Palembang</td>
                        <td><?= date('Y-m-d') ?></td>
                        <td><span class="status masuk">Masuk</span></td>
                        <td>
                            <button class="btn detail">Detail</button>
                            <button class="btn delete">Hapus</button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Siti Rahma</td>
                        <td>Ilir Barat I</td>
                        <td><?= date('Y-m-d') ?></td>
                        <td><span class="status proses">Diproses</span></td>
                        <td>
                            <button class="btn detail">Detail</button>
                            <button class="btn delete">Hapus</button>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Budi Santoso</td>
                        <td>Kertapati</td>
                        <td><?= date('Y-m-d') ?></td>
                        <td><span class="status selesai">Selesai</span></td>
                        <td>
                            <button class="btn detail">Detail</button>
                            <button class="btn delete">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="content-box">
            <h2>Detail Pengaduan</h2>

            <div class="detail-box">
                <p><strong>Nama:</strong> Ahmad Fauzi</p>
                <p><strong>NIK:</strong> 1671xxxxxxxxxxxx</p>
                <p><strong>Kontak:</strong> 0812xxxxxxx</p>
                <p><strong>Lokasi Kejadian:</strong> Sungai Musi, Palembang</p>
                <p><strong>Isi Pengaduan:</strong></p>
                <p>
                    Terjadi pencemaran air sungai akibat limbah pabrik yang
                    dibuang langsung tanpa pengolahan.
                </p>

                <p><strong>Lampiran:</strong></p>
                <a href="#" class="file-link">foto_limbah.jpg</a>

                <label>Status Pengaduan</label>
                <select>
                    <option>Masuk</option>
                    <option>Diproses</option>
                    <option>Selesai</option>
                </select>

                <button class="btn primary">Simpan Status</button>
            </div>
        </section>

    </main>
</div>

</body>
</html>
