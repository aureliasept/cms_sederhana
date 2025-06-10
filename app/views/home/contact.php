<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - CMS Sederhana</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .contact-content {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        .nav-links {
            margin-bottom: 20px;
        }
        .nav-links a {
            color: #007bff;
            text-decoration: none;
            margin-right: 15px;
        }
        .nav-links a:hover {
            text-decoration: underline;
        }
        .contact-info {
            margin: 20px 0;
        }
        .contact-info div {
            margin: 10px 0;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 4px;
        }
        .contact-form {
            margin-top: 30px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }
        .btn {
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1><?php echo $title; ?></h1>
        </div>
    </header>

    <nav>
        <div class="container">
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="/home/about">About</a>
                <a href="/home/contact">Contact</a>
                <a href="/home/login">Login</a>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            <div class="contact-content">
                <h2>Hubungi Kami</h2>
                <p>Silakan hubungi kami melalui informasi kontak di bawah ini atau gunakan form yang tersedia.</p>
                
                <div class="contact-info">
                    <div>
                        <strong>Email:</strong> <?php echo $email; ?>
                    </div>
                    <div>
                        <strong>Telepon:</strong> <?php echo $phone; ?>
                    </div>
                    <div>
                        <strong>Alamat:</strong> Jl. Contoh No. 123, Jakarta, Indonesia
                    </div>
                    <div>
                        <strong>Jam Kerja:</strong> Senin - Jumat, 09:00 - 17:00 WIB
                    </div>
                </div>
                
                <div class="contact-form">
                    <h3>Kirim Pesan</h3>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="name">Nama Lengkap:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject">Subjek:</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Pesan:</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> CMS Sederhana. All rights reserved.</p>
        </div>
    </footer>
</body>
</html> 