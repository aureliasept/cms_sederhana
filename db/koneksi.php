<?php
$host = 'localhost';
$user = 'root'; // username MySQL
$pass = ''; // password MySQL (kosong jika belum ada)
$dbname = 'cms_sederhana'; // nama database yang kamu buat di MySQL

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
