<?php
session_start();
require_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin | Manajemen Berita</title>
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

        <section class="content-box">
            <div class="toolbar">
                <h2 class="page-title">Manajemen Berita</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Berita</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th width="140">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Penindakan Kasus Pencemaran Sungai</td>
                        <td><?= date('Y-m-d') ?></td>
                        <td><span class="status publish">Publish</span></td>
                        <td>
                            <div class="action-btns">
                                <button class="btn btn-warning">Edit</button>
                                <button class="btn btn-danger">Hapus</button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Sosialisasi Hukum Lingkungan di Palembang</td>
                        <td><?= date('Y-m-d') ?></td>
                        <td><span class="status draft">Draft</span></td>
                        <td>
                            <div class="action-btns">
                                <button class="btn btn-warning">Edit</button>
                                <button class="btn btn-danger">Hapus</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- FORM -->
        <section class="content-box">
            <div class="form-box">
                <h3>Tambah Berita</h3>

                <div class="form-group">
                    <label>Judul Berita</label>
                    <input type="text" placeholder="Judul berita...">
                </div>

                <div class="form-group">
                    <label>Isi Berita</label>
                    <textarea rows="5" placeholder="Isi berita..."></textarea>
                </div>

                <div class="form-group">
                    <label>Gambar Berita</label>
                    <input type="file" accept="image/*" onchange="showFileName(this)">
                    <div class="file-info" id="fileInfo">Belum ada file dipilih</div>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select>
                        <option>Publish</option>
                        <option>Draft</option>
                    </select>
                </div>

                <button class="btn btn-primary">Simpan Berita</button>
            </div>
        </section>

    </main>
</div>

<script src="<?= $base_url ?>js/admin_dashboard.js"></script>
<script>
function showFileName(input) {
    const info = document.getElementById('fileInfo');
    info.textContent = input.files.length
        ? 'File dipilih: ' + input.files[0].name
        : 'Belum ada file dipilih';
}
</script>

</body>
</html>
