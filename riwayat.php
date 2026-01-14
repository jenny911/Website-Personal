<?php
include 'koneksi.php';
$transaksi = $conn->query("SELECT * FROM transaksi ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #8d91b6;
            color: white;
            font-family: 'Inter', sans-serif;
            padding: 40px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: rgba(255,255,255,0.2);
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: rgba(255,255,255,0.05);
        }
        a.btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: white;
            border: 2px solid white;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.3s;
        }
        a.btn:hover {
            background-color: white;
            color: #5c618c;
        }
    </style>
</head>
<body>

<h1>📋 Riwayat Transaksi</h1>

<?php if ($transaksi->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($row = $transaksi->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['namaproduk']) ?></td>
                    <td><?= $row['jumlah'] ?></td>
                    <td>Rp <?= number_format($row['total']) ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($row['tanggal'])) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p style="text-align:center;">Belum ada transaksi.</p>
<?php endif; ?>

<div style="text-align: center;">
    <a href="home.php" class="btn">← Kembali</a>
</div>

</body>
</html>
