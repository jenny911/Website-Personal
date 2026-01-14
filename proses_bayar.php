<?php
session_start();
include 'koneksi.php';

$keranjang = $_SESSION['keranjang'] ?? [];
$bayar = $_POST['bayar'];
$totalBelanja = 0;

foreach ($keranjang as $item) {
    $totalBelanja += $item['harga'] * $item['jumlah'];
}

// Cek cukup atau tidak
if ($bayar < $totalBelanja) {
    echo "<script>alert('Jumlah bayar kurang!'); window.location.href='keranjang.php';</script>";
    exit;
}

// Kurangi stok & simpan transaksi
foreach ($keranjang as $item) {
    $id = $item['id'];
    $namaproduk = $item['namaproduk'];
    $jumlah = $item['jumlah'];
    $total = $item['harga'] * $item['jumlah'];

    // Update stok produk
    $conn->query("UPDATE menu SET stok = stok - $jumlah WHERE id = $id");

    // Simpan ke tabel transaksi
    $stmt = $conn->prepare("INSERT INTO transaksi (product_id, namaproduk, jumlah, total, tanggal) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("isii", $id, $namaproduk, $jumlah, $total);
    $stmt->execute();
    $stmt->close();
}

// Bersihkan keranjang
unset($_SESSION['keranjang']);

echo "<script>alert('Transaksi berhasil! Kembalian: Rp " . number_format($bayar - $totalBelanja) . "'); window.location.href='home.php';</script>";
