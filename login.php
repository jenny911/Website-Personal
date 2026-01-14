<?php
session_start();
include 'koneksi.php'; // file koneksi ke database

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah username ada
$stmt = $conn->prepare("SELECT * FROM login WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verifikasi password
    if (password_verify($password, $user['pass'])) {
        // Set session
        $_SESSION['username'] = $user['username'];

        // Redirect ke home
        header("Location: home.php");
        exit;
    } else {
        echo "<script>alert('Password salah!'); window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('Username tidak ditemukan!'); window.location.href='index.php';</script>";
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
