<?php
session_start();
require_once '../db/koneksi.php';

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

$error = '';
$post = null;

// Get post ID from URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: post.php");
    exit;
}

$id = (int)$_GET['id'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $content = mysqli_real_escape_string($koneksi, $_POST['content']);

    // Validate input
    if (empty($title) || empty($content)) {
        $error = "Judul dan konten harus diisi!";
    } else {
        // Update database
        $query = "UPDATE posts SET title = '$title', content = '$content' WHERE id = $id";
        if (mysqli_query($koneksi, $query)) {
            header("Location: post.php?message=updated");
            exit;
        } else {
            $error = "Gagal mengupdate post: " . mysqli_error($koneksi);
        }
    }
}

// Fetch post data
$query = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $post = mysqli_fetch_assoc($result);
} else {
    header("Location: post.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post - CMS Sederhana</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .container {
            max-width: 800px;
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
        .btn-primary {
            background: #007bff;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
        .btn-secondary {
            background: #6c757d;
        }
        .btn-secondary:hover {
            background: #5a6268;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-group textarea {
            min-height: 200px;
            resize: vertical;
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
            <h2>Edit Post</h2>
            <a href="post.php" class="btn btn-secondary">Kembali ke Daftar Post</a>
        </div>

        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="title">Judul Post:</label>
                <input type="text" id="title" name="title" required 
                       value="<?php echo htmlspecialchars($post['title']); ?>">
            </div>

            <div class="form-group">
                <label for="content">Konten:</label>
                <textarea id="content" name="content" required><?php echo htmlspecialchars($post['content']); ?></textarea>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Update Post</button>
                <a href="post.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html> 