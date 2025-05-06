<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'cms_db';

// Create connection
$koneksi = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 