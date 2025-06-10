<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('APP_ROOT', dirname(__DIR__));

// Autoload (kalau kamu punya composer, aktifkan ini)
// require_once APP_ROOT . '/vendor/autoload.php';

// Include core files
require_once APP_ROOT . '/core/App.php';
require_once APP_ROOT . '/core/Controller.php';

// Jalankan aplikasi
echo '<pre>';
print_r($_GET);
echo '</pre>';
$app = new App();
