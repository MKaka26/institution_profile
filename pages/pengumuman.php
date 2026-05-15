<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// ======================
// PAGINATION CONFIG
// ======================
$limit = 9;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$offset = ($page - 1) * $limit;

// ======================
// TOTAL DATA
// ======================
if ($search !== '') {
    $totalStmt = $pdo->prepare("
        SELECT COUNT(*) 
        FROM pengumuman 
        WHERE judul LIKE :search 
           OR isi LIKE :search
    ");
    $totalStmt->execute([
        ':search' => "%$search%"
    ]);
} else {
    $totalStmt = $pdo->query("
        SELECT COUNT(*) 
        FROM pengumuman
    ");
}

$totalData  = $totalStmt->fetchColumn();
$totalPages = ceil($totalData / $limit);

// ======================
// DATA PER HALAMAN
// ======================
if ($search !== '') {
    $stmt = $pdo->prepare("
        SELECT * FROM pengumuman
        WHERE judul LIKE :search
           OR isi LIKE :search
        ORDER BY tanggal DESC
        LIMIT :limit OFFSET :offset
    ");
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
} else {
    $stmt = $pdo->prepare("
        SELECT * FROM pengumuman
        ORDER BY tanggal DESC
        LIMIT :limit OFFSET :offset
    ");
}

$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$pengumuman = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman - Gakkum LH Seksi Wilayah II Palembang</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base_url ?>css/style.css">
    <link rel="stylesheet" href="<?= $base_url ?>css/pengumuman.css">
</head>
<body>

<?php include __DIR__ . '/../partials/navbar.php'; ?>

<section class="page-header pengumuman-header">
    <div class="header-wrapper">
        <div class="header-text">
            <h1>Pengumuman Resmi</h1>
            <p>Pemberitahuan dan informasi penting dari Balai Gakkum LH Seksi Wilayah II Palembang</p>
        </div>
        <div class="header-search-box">
            <h4>Cari Pengumuman</h4>

            <form method="GET" action="">
                <input 
                    type="text"
                    name="search"
                    placeholder="Ketik sesuatu…"
                    value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>"
                >
            </form>
        </div>
    </div>
</section>

<section class="section">
    <div class="container pengumuman-layout">

        <!-- ======================
             LIST PENGUMUMAN
        ====================== -->
        <div class="pengumuman-list">
            <?php foreach ($pengumuman as $row): ?>
                <article 
                    class="pengumuman-card"
                    data-title="<?= strtolower($row['judul']) ?>"
                    data-content="<?= strtolower(substr(strip_tags($row['isi']), 0, 200)) ?>"
                >

                    <?php if (!empty($row['gambar'])): ?>
                        <?php if (filter_var($row['gambar'], FILTER_VALIDATE_URL)): ?>
                            <img src="<?= htmlspecialchars($row['gambar']) ?>" alt="Gambar Pengumuman">
                        <?php else: ?>
                            <img src="<?= $base_url ?>assets/uploads/pengumuman/<?= htmlspecialchars($row['gambar']) ?>" alt="Gambar Pengumuman">
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="pengumuman-content">
                        <span class="pengumuman-date">
                            <?= date('d F Y', strtotime($row['tanggal'])) ?>
                        </span>

                        <h3><?= htmlspecialchars($row['judul']) ?></h3>
                        <p><?= htmlspecialchars(substr(strip_tags($row['isi']), 0, 120)) ?>...</p>

                        <a href="<?= $base_url ?>pages/detail_pengumuman.php?id=<?= $row['id'] ?>" class="btn-baca">
                            Baca Selengkapnya
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- ======================
             PAGINATION (BENAR)
        ====================== -->
        <?php if ($totalPages > 1): ?>
        <div class="pagination-wrapper">
            <div class="pagination">

                <!-- PREVIOUS -->
                <a
                    class="<?= $page <= 1 ? 'disabled' : '' ?>"
                    href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>"
                >
                    &laquo; Previous
                </a>

                <!-- PAGE NUMBER -->
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a
                        class="<?= $i == $page ? 'active' : '' ?>"
                        href="?page=<?= $i ?>&search=<?= urlencode($search) ?>"
                    >
                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <!-- NEXT -->
                <a
                    class="<?= $page >= $totalPages ? 'disabled' : '' ?>"
                    href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>"
                >
                    Next &raquo;
                </a>

            </div>
        </div>
        <?php endif; ?>


    </div>
</section>

<?php include __DIR__ . '/../partials/footer.php'; ?>

<script src="<?= $base_url ?>js/pengumuman.js"></script>
<script src="<?= $base_url ?>js/script.js"></script>

</body>
</html>
