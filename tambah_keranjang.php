<?php
session_start();

$id = $_POST['id'];
$namaproduk = $_POST['namaproduk'];
$harga = $_POST['harga'];
$jumlah = (int) $_POST['jumlah'];

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

if (isset($_SESSION['keranjang'][$id])) {
    $_SESSION['keranjang'][$id]['jumlah'] += $jumlah;
} else {
    $_SESSION['keranjang'][$id] = [
        'id' => $id,
        'namaproduk' => $namaproduk,
        'harga' => $harga,
        'jumlah' => $jumlah
    ];
}

header("Location: pilihmenu.php");
