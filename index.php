<?php
session_start();
require_once 'db/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Sederhana</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <!-- Navigation menu will go here -->
        </nav>
    </header>

    <main>
        <?php
        // Content will be loaded here
        ?>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> CMS Sederhana</p>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html> 