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

        <!-- ================= TABLE ================= -->
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
                        <th>Kategori</th>
                        <th width="140">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Penindakan Kasus Pencemaran Sungai</td>
                        <td><?= date('Y-m-d') ?></td>
                        <td>Siaran Pers</td>
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
                        <td>Berita</td>
                        <td>
                            <div class="action-btns">
                                <button class="btn btn-warning">Edit</button>
                                <button class="btn btn-danger">Hapus</button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Sosialisasi Hukum Lingkungan di Palembang</td>
                        <td><?= date('Y-m-d') ?></td>
                        <td>Kegiatan</td>
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

        <!-- ================= FORM ================= -->
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

                <!-- ===== SUMBER GAMBAR ===== -->
                <div class="form-group image-source-box">
                    <label>Sumber Gambar</label>

                    <div class="radio-group">
                        <label>
                            <input type="radio" name="image_type" value="upload" checked>
                            Upload Gambar
                        </label>

                        <label>
                            <input type="radio" name="image_type" value="link">
                            Link Gambar
                        </label>
                    </div>

                    <div class="image-source-content">

                        <div class="file-info image-hint">
                            Format: JPG, PNG, WEBP • Maks 2MB • Rasio 16:9 (1200×630)
                        </div>

                        <!-- UPLOAD -->
                        <div id="uploadGroup">
                            <label class="sub-label">Upload Gambar Berita</label>
                            <input 
                                type="file"
                                id="imageUpload"
                                accept=".jpg,.jpeg,.png,.webp"
                            >
                            <div class="file-info" id="uploadInfo">
                                Belum ada file dipilih
                            </div>
                        </div>

                        <!-- LINK -->
                        <div id="linkGroup" style="display:none;">
                            <label class="sub-label">Link Gambar</label>
                            <input 
                                type="url"
                                id="imageLink"
                                placeholder="https://example.com/gambar.jpg"
                            >
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <label>Link Berita (opsional)</label>
                    <input type="url" placeholder="Link berita...">
                </div>
                
                <div class="form-group">
                    <label>Kategori</label>
                    <select>
                        <option>Berita</option>
                        <option>Siaran Pers</option>
                        <option>Kegiatan</option>
                    </select>
                </div>

                <button class="btn btn-primary">Simpan Berita</button>
            </div>
        </section>

    </main>
</div>

<script src="<?= $base_url ?>js/admin_dashboard.js"></script>
<script src="<?= $base_url ?>js/admin_berita.js"></script>

</body>
</html>
