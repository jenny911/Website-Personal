<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopi Sedap</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
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

    <main class="hero">
     <div class="form-container">
    <h2>Tambah Menu</h2>
    <form action="simpanmenu.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="namaproduk">Nama Produk</label>
            <input type="text" name="namaproduk" id="namaproduk" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" required>
        </div>
        <div class="form-group">
            <label for="foto">Foto Produk</label>
            <input type="file" name="foto" id="foto" accept="image/*" required>
        </div>
        <button type="submit" class="btn-submit">Simpan Menu</button>
    <a href="editmenu.php" style="color: white;">Edit Menu</a>
    </form>
</div>
    </main>

</body>
</html>
