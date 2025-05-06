<?php
session_start();
require_once '../db/koneksi.php';

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['admin_username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CMS Sederhana</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .welcome-message {
            background: #e9ecef;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .logout-btn {
            background: #dc3545;
            color: #fff;
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
        }
        .logout-btn:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="welcome-message">
            <h2>Selamat datang, <?php echo htmlspecialchars($username); ?>!</h2>
            <p>Ini adalah halaman dashboard CMS Sederhana.</p>
        </div>

        <nav>
            <a href="logout.php" class="logout-btn">Logout</a>
        </nav>

        <main>
            <!-- Dashboard content will go here -->
            <h3>Menu Dashboard</h3>
            <ul>
                <li>Kelola Artikel</li>
                <li>Kelola Kategori</li>
                <li>Kelola Pengguna</li>
                <li>Pengaturan</li>
            </ul>
        </main>
    </div>
</body>
</html> 