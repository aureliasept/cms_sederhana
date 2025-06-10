<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Sederhana</title>
    
    <!-- Link ke CSS AdminLTE -->
    <link rel="stylesheet" href="assets/css/adminlte.min.css"> <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="assets/css/style.css">  <!-- Custom CSS -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <!-- Header Navbar -->
        <header class="main-header navbar navbar-expand navbar-dark navbar-primary">
            <nav class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </nav>
        </header>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">CMS Sederhana</span>
            </a>

            <!-- Sidebar Menu -->
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <h1>Welcome to the Dashboard</h1>
                    <p>This is your content area.</p>
                    <p>Content goes here...</p>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <div class="container-fluid text-center">
                <p>&copy; <?php echo date('Y'); ?> CMS Sederhana</p>
            </div>
        </footer>
    </div>

    <!-- Link ke JS AdminLTE -->
    <script src="assets/js/adminlte.min.js"></script>  <!-- AdminLTE JS -->
    <script src="assets/js/script.js"></script>  <!-- Custom JS -->
</body>
</html>
