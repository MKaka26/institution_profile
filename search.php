<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';

$q = trim($_GET['q'] ?? '');
$results = [];

if ($q !== '') {

    /* ================= BERITA & SIARAN PERS ================= */
    $stmt = $pdo->prepare("
        SELECT 
            id,
            judul,
            'Berita / Siaran Pers' AS tipe,
            kategori,
            tanggal_upload AS tanggal,
            CONCAT('pages/detail_berita.php?id=', id) AS link
        FROM berita_siaranpers
        WHERE judul LIKE :q
        LIMIT 10
    ");
    $stmt->execute(['q' => "%$q%"]);
    $results = array_merge($results, $stmt->fetchAll());

    /* ================= AGENDA ================= */
    $stmt = $pdo->prepare("
        SELECT 
            id,
            judul,
            'Agenda' AS tipe,
            NULL AS kategori,
            tanggal,
            CONCAT('pages/agenda_detail.php?id=', id) AS link
        FROM agenda
        WHERE status='publish' AND judul LIKE :q
        LIMIT 10
    ");
    $stmt->execute(['q' => "%$q%"]);
    $results = array_merge($results, $stmt->fetchAll());

    /* ================= PENGUMUMAN ================= */
    $stmt = $pdo->prepare("
        SELECT 
            id,
            judul,
            'Pengumuman' AS tipe,
            kategori,
            tanggal,
            CONCAT('pages/detail_pengumuman.php?id=', id) AS link
        FROM pengumuman
        WHERE judul LIKE :q
        LIMIT 10
    ");
    $stmt->execute(['q' => "%$q%"]);
    $results = array_merge($results, $stmt->fetchAll());
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pencarian</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base_url ?>/css/style.css">
</head>
<body>

<?php include __DIR__ . '/partials/navbar.php'; ?>

<section class="section">
<div class="container">

<h2 class="search-title">
    Hasil pencarian: 
    <span class="search-keyword">"<?= htmlspecialchars($q) ?>"</span>
</h2>


<?php if (!empty($results)): ?>
    <ul class="search-result">
        <?php foreach ($results as $r): ?>
            <li>
                <a href="<?= $base_url . $r['link'] ?>">
                    <strong><?= htmlspecialchars($r['judul']) ?></strong><br>
                    <small><?= $r['tipe'] ?><?= $r['kategori'] ? ' - ' . $r['kategori'] : '' ?></small>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <div class="search-empty">
    <p>Tidak ada hasil ditemukan</p>
</div>

<?php endif; ?>

</div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
    <script src="<?= $base_url ?>js/script.js"></script>

</body>
</html>
