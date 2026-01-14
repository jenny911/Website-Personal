<?php
include 'koneksi.php';
$produk = $conn->query("SELECT * FROM menu ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #8d91b6;
            font-family: 'Inter', sans-serif;
            color: white;
            padding: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: rgba(255,255,255,0.2);
        }

        tr:nth-child(even) {
            background-color: rgba(255,255,255,0.05);
        }

        .btn {
            padding: 6px 12px;
            border: 1px solid white;
            background: transparent;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background: white;
            color: #5c618c;
        }

        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: #5c618c;
            margin: 10% auto;
            padding: 30px;
            border: 1px solid #888;
            width: 400px;
            border-radius: 10px;
            color: white;
        }

        .close {
            color: white;
            float: right;
            font-size: 24px;
            cursor: pointer;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: none;
            border-radius: 6px;
            margin-bottom: 15px;
        }
           body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background-color: #8d91b6;
            color: white;
        }

        header {
            padding: 20px 40px;
            display: flex;
            justify-content: flex-end;
            background-color: transparent;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 25px;
            margin: 0;
            padding: 0;
        }

        .nav-links li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: opacity 0.3s ease;
        }

        .nav-links li a:hover {
            opacity: 0.7;
        }

        .hero {
            height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .greeting {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 900;
            margin: 0;
            text-transform: lowercase;
        }

        .description {
            font-size: 16px;
            color: #e2e2f2;
            margin-top: 12px;
            margin-bottom: 25px;
        }

        .btn {
            padding: 12px 24px;
            font-weight: bold;
            background-color: transparent;
            color: white;
            border: 2px solid white;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn:hover {
            background-color: white;
            color: #5c618c;
        }
              .form-container {
            background: rgba(255,255,255,0.1);
            padding: 40px;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 500px;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 900;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: none;
            background-color: #e2e2f2;
            color: #333;
        }
        .btn-submit {
            width: 100%;
            padding: 12px;
            background: transparent;
            color: white;
            font-weight: bold;
            border: 2px solid white;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: white;
            color: #5c618c;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul class="nav-links">
                <li><a href="home.php">HOME</a></li>
                <li><a href="tambahmenu.php">TAMBAH MENU</a></li>
                <li><a href="riwayat.php">RIWAYAT TRANSAKSI</a></li>
                        <li><a href="logout.php">Logout</a></li>
                <li><a href="#"><i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </nav>
    </header>
<h2>📦 Daftar Produk</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
 
        <th>Aksi</th>
    </tr>
    <?php $no = 1; while ($row = $produk->fetch_assoc()): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['namaproduk'] ?></td>
        <td>Rp <?= number_format($row['harga']) ?></td>
        <td><?= $row['stok'] ?></td>
    
        <td>
            <button class="btn" onclick="openModal(<?= $row['id'] ?>, <?= $row['harga'] ?>, <?= $row['stok'] ?>)">Edit</button>
            <a href="hapus_produk.php?id=<?= $row['id'] ?>" class="btn" onclick="return confirm('Yakin hapus produk ini?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<!-- Modal Edit -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Edit Produk</h3>
        <form action="update_produk.php" method="POST">
            <input type="hidden" name="id" id="modal-id">
            <label>Harga</label>
            <input type="number" name="harga" id="modal-harga" required>
            <label>Stok</label>
            <input type="number" name="stok" id="modal-stok" required>
            <button type="submit" class="btn" style="width:100%;">Simpan</button>
        </form>
    </div>
</div>

<script>
function openModal(id, harga, stok) {
    document.getElementById('modal-id').value = id;
    document.getElementById('modal-harga').value = harga;
    document.getElementById('modal-stok').value = stok;
    document.getElementById('editModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}
</script>

</body>
</html>
