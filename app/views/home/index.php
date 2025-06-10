<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
            text-align: center;
        }
        
        header h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        nav {
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }
        
        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 2rem;
        }
        
        nav a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        nav a:hover {
            color: #667eea;
        }
        
        main {
            padding: 3rem 0;
        }
        
        .hero {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #333;
        }
        
        .hero p {
            font-size: 1.1rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto 2rem;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }
        
        .feature-card h3 {
            color: #667eea;
            margin-bottom: 1rem;
        }
        
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 2rem;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: transform 0.3s;
        }
        
        .cta-button:hover {
            transform: scale(1.05);
        }
        
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: 3rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1><?php echo $title; ?></h1>
            <p><?php echo $description; ?></p>
        </div>
    </header>
    
    <nav>
        <div class="container">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/home/about">About</a></li>
                <li><a href="/home/contact">Contact</a></li>
            </ul>
        </div>
    </nav>
    
    <main>
        <div class="container">
            <section class="hero">
                <h2>Welcome to Our CMS</h2>
                <p><?php echo $description; ?></p>
                <a href="/home/about" class="cta-button">Learn More</a>
            </section>
            
            <section class="features">
                <?php foreach ($features as $feature): ?>
                    <div class="feature-card">
                        <h3><?php echo $feature; ?></h3>
                        <p>Experience the power of our <?php echo strtolower($feature); ?> system.</p>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
    </main>
    
    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Simple CMS. All rights reserved.</p>
        </div>
    </footer>
</body>
</html> 