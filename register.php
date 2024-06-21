<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="shortcut icon" href="logo-Quick.jpeg" type="image/x-icon">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .register-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-left: #FC2947 solid 5px;
            max-width: 400px;
            width: 100%;
        }

        .register-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .register-container table {
            width: 100%;
        }

        .register-container td {
            padding: 10px 0;
        }

        .register-container input[type="text"],
        .register-container input[type="password"],
        .register-container input[type="email"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .register-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #FC2947;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        .register-container input[type="submit"]:hover {
            background-color: #A0153E;
            text-align: center;
        }

        .register-container p {
            text-decoration: none;
            color: #A0153E;
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .register-container a {
            text-decoration: underline;
            color: #A0153E;
        }

        .register-container a:hover {
            color: #FC2947;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="aksi_register.php" method="POST">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="register" value="Register"></td>
                </tr>
            </table>
            <p>Sudah memiliki akun? <a href="login.php"> Login di sini</a></p>
        </form>
    </div>
</body>

</html>