<?php
include 'koneksi.php';

// Ambil data dari form
$namaproduk = $_POST['namaproduk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

// Handle upload foto
$targetDir = "uploads/";
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}
$fotoName = basename($_FILES["foto"]["name"]);
$targetFile = $targetDir . time() . "_" . $fotoName;

if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {
    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO menu (namaproduk, harga, stok, foto) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdis", $namaproduk, $harga, $stok, $targetFile);

    if ($stmt->execute()) {
        echo "<script>alert('Menu berhasil disimpan!'); window.location.href='tambahmenu.php';</script>";
    } else {
        echo "Gagal menyimpan: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Gagal upload gambar.";
}

$conn->close();
?>
