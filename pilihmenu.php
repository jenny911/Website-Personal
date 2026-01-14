<?php
session_start();
include 'koneksi.php';
$data = $conn->query("SELECT * FROM menu");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <style>
        body {
            background-color: #8d91b6;
            color: white;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .card {
            background-color: rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            backdrop-filter: blur(8px);
        }
        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }
        .card h3 {
            margin: 10px 0 5px;
        }
        .card p {
            margin: 0 0 10px;
        }
        .btn {
            padding: 10px 20px;
            background: transparent;
            color: white;
            border: 2px solid white;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn:hover {
            background: white;
            color: #5c618c;
        }
        .nav {
            text-align: right;
            margin-bottom: 20px;
        }
        .nav a {
            color: white;
            margin-left: 20px;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="nav">
    <a href="keranjang.php">🛒 Lihat Keranjang</a>
</div>

<h1>Daftar Produk</h1>
<div class="container">
    <?php while($row = $data->fetch_assoc()): ?>
        <div class="card">
            <img src="<?= $row['foto']; ?>" alt="Foto Produk">
            <h3><?= $row['namaproduk']; ?></h3>
            <p>Rp <?= number_format($row['harga']); ?></p>
            <p>Stok: <?= $row['stok']; ?></p>
         <form action="tambah_keranjang.php" method="POST">
    <input type="hidden" name="id" value="<?= $row['id']; ?>">
    <input type="hidden" name="namaproduk" value="<?= $row['namaproduk']; ?>">
    <input type="hidden" name="harga" value="<?= $row['harga']; ?>">
    
    <input type="number" name="jumlah" value="1" min="1" max="<?= $row['stok']; ?>" style="width: 60px; margin-top: 10px;" required>
    
    <br><br>
    <button type="submit" class="btn">+ Keranjang</button>
</form>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>
