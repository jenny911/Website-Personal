<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Transaksi</title>
  <script src="assets/script.js"></script> <!-- Panggil JS -->
</head>
<body>
  <h2>Form Transaksi</h2>

  <form>
    <!-- Dropdown Produk -->
    <select id="produkSelect" onchange="hitungTotal()">
      <option value="">-- Pilih Produk --</option>
      <?php
        $result = mysqli_query($conn, "SELECT * FROM produk");
        while($row = mysqli_fetch_assoc($result)) {
          echo "<option value='{$row['id']}' data-harga='{$row['harga']}' data-stok='{$row['stok']}'>
                  {$row['nama_produk']}
                </option>";
        }
      ?>
    </select>

    <!-- Input Jumlah -->
    <input type="number" id="jumlah" placeholder="Jumlah" oninput="hitungTotal()">

    <!-- Output Total Harga -->
    <p>Total: <span id="totalHarga">0</span></p>

    <!-- Input Uang Bayar -->
    <input type="number" id="bayar" placeholder="Bayar" oninput="hitungKembalian()">

    <!-- Output Kembalian -->
    <p>Kembalian: <span id="kembalian">0</span></p>

    <button type="button" onclick="simpanTransaksi()">Bayar</button>
  </form>
</body>
</html>
