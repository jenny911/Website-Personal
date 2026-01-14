<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <style>
        body {
            margin: 0;
            padding: 40px;
            font-family: 'Segoe UI', sans-serif;
            background-color: #0b1e3b; /* biru gelap */
            color: white;
            text-align: center;
        }

        h2 {
            margin-bottom: 30px;
            color: #ffffff;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 1000px;
            background-color: #0f2e59;
            color: white;
        }

        th, td {
            border: 1px solid #4894ff;
            padding: 12px 14px;
            text-align: center;
        }

        th {
            background-color: #195cbd;
            color: #ffffff;
        }

        td {
            background-color: #122e4d;
        }

        tr:nth-child(even) td {
            background-color: #16395e;
        }

        footer {
            margin-top: 30px;
            color: #ccc;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <h2>Riwayat Transaksi</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Total</th>
                <th>Dibayar</th>
                <th>Kembalian</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>21</td>
                <td>09-07-2025 06:00</td>
                <td>Latte</td>
                <td>Rp28.000</td>
                <td>1</td>
                <td>Rp28.000</td>
                <td>Rp28.000</td>
                <td>Rp30.000</td>
                <td>Rp2.000</td>
            </tr>
            <tr>
                <td>19</td>
                <td>09-07-2025 05:53</td>
                <td>Donat</td>
                <td>Rp12.000</td>
                <td>1</td>
                <td>Rp12.000</td>
                <td>Rp32.000</td>
                <td>Rp50.000</td>
                <td>Rp18.000</td>
            </tr>
            <tr>
                <td>19</td>
                <td>09-07-2025 05:53</td>
                <td>Sandwich</td>
                <td>Rp20.000</td>
                <td>1</td>
                <td>Rp20.000</td>
                <td>Rp32.000</td>
                <td>Rp50.000</td>
                <td>Rp18.000</td>
            </tr>
        </tbody>
    </table>

    <footer>
        © 2025 Finovi Coffee Shop. Kopi Tiga Nama.
    </footer>

</body>
</html>
