<?php
session_start();
require_once __DIR__ . '/../config/database.php';

// Fungsi untuk generate ID Tiket unik
function generateTicketId() {
    $year = date('Y');
    $random = mt_rand(1000, 9999);
    return "GAKKUMLH-{$year}-{$random}";
}

// Fungsi untuk upload file
function uploadFile($file, $type = 'formulir') {
    $uploadDir = __DIR__ . '/../assets/uploads/pengaduan/' . $type . '/';
    
    // Cek folder ada atau tidak
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    
    // Validasi file
    $allowedTypes = [
        'formulir' => ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
        'bukti' => ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']
    ];
    
    $fileType = $file['type'];
    if (!in_array($fileType, $allowedTypes[$type])) {
        return ['success' => false, 'message' => 'Tipe file tidak diizinkan'];
    }
    
    // Cek ukuran file (max 5MB)
    if ($file['size'] > 5 * 1024 * 1024) {
        return ['success' => false, 'message' => 'Ukuran file terlalu besar (max 5MB)'];
    }
    
    // Generate nama file unik
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = $type . '_' . uniqid() . '_' . time() . '.' . $extension;
    $filePath = $uploadDir . $fileName;
    
    // Upload file
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        return ['success' => true, 'path' => 'assets/uploads/pengaduan/' . $type . '/' . $fileName];
    } else {
        return ['success' => false, 'message' => 'Gagal mengupload file'];
    }
}

// Proses form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = ['success' => false, 'message' => '', 'ticket_id' => ''];
    
    // Validasi file formulir (wajib)
    if (!isset($_FILES['formulir']) || $_FILES['formulir']['error'] !== UPLOAD_ERR_OK) {
        $response['message'] = 'File formulir wajib diupload';
        $_SESSION['response'] = $response;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
    // Upload formulir
    $formulirUpload = uploadFile($_FILES['formulir'], 'formulir');
    if (!$formulirUpload['success']) {
        $response['message'] = $formulirUpload['message'];
        $_SESSION['response'] = $response;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
    $formulirPath = $formulirUpload['path'];
    $buktiPath = [];
    
    // Upload bukti (opsional)
    if (isset($_FILES['bukti']) && $_FILES['bukti']['error'] === UPLOAD_ERR_OK) {
        $buktiUpload = uploadFile($_FILES['bukti'], 'bukti');
        if ($buktiUpload['success']) {
            $buktiPath = $buktiUpload['path'];
        }
    }
    
    // Generate ID Tiket
    $ticketId = generateTicketId();
    
    try {
        // Gunakan $pdo dari database.php yang sudah ter-include
        // Cek apakah ID tiket sudah ada (untuk memastikan unique)
        $checkStmt = $pdo->prepare("SELECT id FROM pengaduan WHERE id_tiket = ?");
        $checkStmt->execute([$ticketId]);
        
        // Jika ID sudah ada, generate ulang
        while ($checkStmt->fetch()) {
            $ticketId = generateTicketId();
            $checkStmt->execute([$ticketId]);
        }
        
        // Insert pengaduan
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $stmt = $pdo->prepare("INSERT INTO pengaduan (id_tiket, formulir_path, bukti_path, status, ip_address, tanggal_submit) VALUES (?, ?, ?, 'Masuk', ?, NOW())");
        $stmt->execute([$ticketId, $formulirPath, $buktiPath, $ipAddress]);
        
        $pengaduanId = $pdo->lastInsertId();
        
        // Insert log pertama
        $logStmt = $pdo->prepare("INSERT INTO pengaduan_log (pengaduan_id, status_lama, status_baru, catatan, tanggal) VALUES (?, NULL, 'Masuk', 'Pengaduan baru diterima', NOW())");
        $logStmt->execute([$pengaduanId]);
        
        $response['success'] = true;
        $response['message'] = 'Pengaduan berhasil dikirim';
        $response['ticket_id'] = $ticketId;
        
    } catch (PDOException $e) {
        $response['message'] = 'Gagal menyimpan pengaduan: ' . $e->getMessage();
    }
    
    $_SESSION['response'] = $response;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    header('Location: ../pages/layanan_pengaduan.php');
    exit;
}
?>