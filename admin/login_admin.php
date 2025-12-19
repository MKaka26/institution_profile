<?php
session_start();
require_once __DIR__ . '/../config/config.php';

// Contoh validasi sederhana (nanti bisa diganti database)
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin_login'] = true;
        header('Location: admin_dashboard.php');
        exit;
    } else {
        $error = 'Username atau password salah';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS admin -->
    <link rel="stylesheet" href="<?= $base_url ?>css/login_admin.css">
</head>
<body>

<div class="login-container">
    <div class="login-box">
        <h1>Login Admin</h1>
        <p class="subtitle">Website Resmi Kementerian</p>

        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required autofocus>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn-login">Masuk</button>
        </form>

        <div class="footer-text">
            © <?php echo date('Y'); ?> Kementerian
        </div>
    </div>
</div>

<!-- JS -->
<script src="login_admin.js"></script>

</body>
</html>
