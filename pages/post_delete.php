<?php
session_start();
require_once '../db/koneksi.php';

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Check if ID is provided and is numeric
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: post.php");
    exit;
}

$id = (int)$_GET['id'];

// Fetch post data for confirmation
$query = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    header("Location: post.php");
    exit;
}

$post = mysqli_fetch_assoc($result);

// Handle deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    $delete_query = "DELETE FROM posts WHERE id = $id";
    if (mysqli_query($koneksi, $delete_query)) {
        header("Location: post.php?message=deleted");
        exit;
    } else {
        $error = "Gagal menghapus post: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Post - CMS Sederhana</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            color: #fff;
        }
        .btn-danger {
            background: #dc3545;
        }
        .btn-danger:hover {
            background: #c82333;
        }
        .btn-secondary {
            background: #6c757d;
        }
        .btn-secondary:hover {
            background: #5a6268;
        }
        .confirmation-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .post-title {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .post-content {
            margin-bottom: 20px;
            color: #666;
        }
        .error {
            color: #dc3545;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
        }
        .actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Hapus Post</h2>
            <a href="post.php" class="btn btn-secondary">Kembali ke Daftar Post</a>
        </div>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <div class="confirmation-box">
            <h3>Konfirmasi Penghapusan</h3>
            <p>Anda yakin ingin menghapus post berikut?</p>
            
            <div class="post-title">
                <?php echo htmlspecialchars($post['title']); ?>
            </div>
            <div class="post-content">
                <?php echo htmlspecialchars(substr($post['content'], 0, 200)) . '...'; ?>
            </div>

            <form method="POST" action="">
                <div class="actions">
                    <button type="submit" name="confirm_delete" class="btn btn-danger">Ya, Hapus Post</button>
                    <a href="post.php" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html> 