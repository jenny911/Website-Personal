<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | mocuu</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background-color: #8d91b6;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            backdrop-filter: blur(10px);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 900;
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background-color: #e2e2f2;
            font-size: 16px;
            color: #333;
        }

        .form-group input:focus {
            outline: none;
            background-color: #ffffff;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            border: 2px solid white;
            background-color: transparent;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-login:hover {
            background-color: white;
            color: #5c618c;
        }

        .text-center {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .text-center a {
            color: white;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn-login">Masuk</button>
        </form>
        <div class="text-center">
            Belum punya akun? <a href="registerpage.php">Daftar sekarang</a>
        </div>
    </div>

</body>
</html>
