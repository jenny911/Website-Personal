<?php
$host = "localhost";
$user = "root"; // Ganti sesuai setting MySQL kamu
$pass = "";     // Ganti jika ada password
$dbname = "mocuu"; // Ganti dengan nama database kamu

$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
