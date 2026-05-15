<?php
session_start();
require_once __DIR__ . '/../config/database.php';

$response = ['success' => false, 'message' => '', 'data' => null];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ticket_id'])) {
    $ticketId = trim($_POST['ticket_id']);
    
    if (empty($ticketId)) {
        $response['message'] = 'ID Tiket tidak boleh kosong';
        $_SESSION['tracking_response'] = $response;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
    try {
        // Gunakan $pdo dari database.php (sudah ter-include)
        // Ambil data pengaduan
        $stmt = $pdo->prepare("SELECT id, id_tiket, status, tanggal_submit, tanggal_update, catatan_admin FROM pengaduan WHERE id_tiket = ?");
        $stmt->execute([$ticketId]);
        $pengaduan = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($pengaduan) {
            // Ambil riwayat log
            $logStmt = $pdo->prepare("SELECT status_lama, status_baru, catatan, tanggal FROM pengaduan_log WHERE pengaduan_id = ? ORDER BY tanggal ASC");
            $logStmt->execute([$pengaduan['id']]);
            $logs = $logStmt->fetchAll(PDO::FETCH_ASSOC);
            
            $pengaduan['logs'] = $logs;
            
            $response['success'] = true;
            $response['data'] = $pengaduan;
        } else {
            $response['message'] = 'ID Tiket tidak ditemukan. Pastikan Anda memasukkan ID Tiket yang benar.';
        }
        
    } catch (PDOException $e) {
        $response['message'] = 'Terjadi kesalahan: ' . $e->getMessage();
    }
    
    $_SESSION['tracking_response'] = $response;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    header('Location: ../pages/layanan_pengaduan.php');
    exit;
}
?>