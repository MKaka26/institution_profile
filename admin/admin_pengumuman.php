<?php
session_start();
require_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin | Manajemen Pengumuman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base_url ?>css/admin_dashboard.css">
    <link rel="stylesheet" href="<?= $base_url ?>css/admin_pengumuman.css">

</head>
<body>

<div class="dashboard-wrapper">

    <?php include __DIR__ . '/partials/sidebar.php'; ?>

    <main class="main-content">

        <?php include __DIR__ . '/partials/topbar.php'; ?>

        <section class="content-box">
            <div class="toolbar">
                <h2 class="page-title">Manajemen Pengumuman</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Pengumuman</th>
                        <th>Tanggal</th>
                        <th>Dokumen</th>
                        <th width="140">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Pemberitahuan Libur Nasional</td>
                        <td><?= date('Y-m-d') ?></td>
                        <td>libur_nasional.pdf</td>
                        <td>
                            <div class="action-btns">
                                <button class="btn btn-warning">Edit</button>
                                <button class="btn btn-danger">Hapus</button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Pengumuman Rekrutmen</td>
                        <td><?= date('Y-m-d') ?></td>
                        <td>rekrutmen.docx</td>
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

        <section class="content-box">
            <div class="form-box">
                <h3>Tambah Pengumuman</h3>

                <div class="form-group">
                    <label>Judul Pengumuman</label>
                    <input type="text" placeholder="Judul pengumuman...">
                </div>

                <div class="form-group">
                    <label>Upload Dokumen</label>
                    <input type="file" accept=".pdf,.doc,.docx" onchange="showDocName(this)">
                    <div class="file-info" id="docInfo">Belum ada dokumen dipilih</div>
                </div>

                <button class="btn btn-primary">Simpan Pengumuman</button>
            </div>
        </section>

    </main>
</div>

<script src="<?= $base_url ?>js/admin_dashboard.js"></script>
<script>
function showDocName(input) {
    const info = document.getElementById('docInfo');
    info.textContent = input.files.length
        ? 'Dokumen dipilih: ' + input.files[0].name
        : 'Belum ada dokumen dipilih';
}
</script>

</body>
</html>
