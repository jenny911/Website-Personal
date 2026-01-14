<?php
include 'koneksi.php';

// Tangkap data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah username sudah terdaftar
$check = $conn->prepare("SELECT * FROM login WHERE username = ?");
$check->bind_param("s", $username);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "<script>alert('Username sudah digunakan!'); window.location.href='registerpage.php';</script>";
    exit;
}

// Hash password dengan bcrypt
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Simpan ke database
$stmt = $conn->prepare("INSERT INTO login (username, pass) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashedPassword);

if ($stmt->execute()) {
    echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='index.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
