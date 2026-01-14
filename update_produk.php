<?php
include 'koneksi.php';

$id = $_POST['id'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$stmt = $conn->prepare("UPDATE menu SET harga = ?, stok = ? WHERE id = ?");
$stmt->bind_param("iii", $harga, $stok, $id);
$stmt->execute();

header("Location: editmenu.php");
