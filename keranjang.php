<?php
session_start();
$keranjang = $_SESSION['keranjang'] ?? [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
    <style>
        body {
            background-color: #8d91b6;
            color: white;
            font-family: 'Inter', sans-serif;
            padding: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(8px);
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: rgba(255,255,255,0.2);
        }
        tr:nth-child(even) {
            background-color: rgba(255,255,255,0.05);
        }
        .btn {
            padding: 6px 12px;
            background: transparent;
            color: white;
            border: 1px solid white;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn:hover {
            background: white;
            color: #5c618c;
        }
    </style>
</head>
<body>

<h2>🛒 Keranjang Belanja</h2>
<?php if (empty($keranjang)): ?>
    <p>Keranjang masih kosong.</p>
<?php else: ?>
    <table>
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
        <?php $grandtotal = 0; ?>
        <?php foreach ($keranjang as $item): 
            $total = $item['harga'] * $item['jumlah'];
            $grandtotal += $total;
        ?>
            <tr>
                <td><?= $item['namaproduk']; ?></td>
                <td>Rp <?= number_format($item['harga']); ?></td>
                <td><?= $item['jumlah']; ?></td>
                <td>Rp <?= number_format($total); ?></td>
                <td>
                    <a href="hapus_keranjang.php?id=<?= $item['id']; ?>" class="btn">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3"><strong>Total Belanja</strong></td>
            <td colspan="2"><strong>Rp <?= number_format($grandtotal); ?></strong></td>
        </tr>
    </table>
<?php endif; ?>
<form action="proses_bayar.php" method="POST">
    <h3>💵 Pembayaran</h3>
    <label for="bayar">Jumlah Bayar:</label>
    <input type="number" name="bayar" id="bayar" required oninput="hitungKembalian()" style="padding: 8px; border-radius: 6px; border: none; margin-left: 10px; width: 150px;">

    <p style="margin-top: 10px;">Kembalian: <strong id="kembalian">Rp 0</strong></p>

    <!-- Hidden total untuk JavaScript -->
    <input type="hidden" id="total" value="<?= $grandtotal ?>">
    <br><br>
    <button type="submit" class="btn">💳 Bayar</button>
</form>

<script>
function hitungKembalian() {
    const total = parseInt(document.getElementById('total').value);
    const bayar = parseInt(document.getElementById('bayar').value);
    const kembali = bayar - total;

    document.getElementById('kembalian').innerText = 'Rp ' + (kembali >= 0 ? kembali.toLocaleString() : 0);
}
</script>

<br>
<a href="home.php" class="btn">← Kembali Belanja</a>

</body>
</html>
