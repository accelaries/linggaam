<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-left: #FC2947 solid 5px;
            max-width: 400px;
            width: 100%;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .login-container table {
            width: 100%;
        }

        .login-container td {
            padding: 10px 0;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .login-container input[type="submit"] {
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

        .login-container input[type="submit"]:hover {
            background-color: #A0153E;
        }

        .login-container a {
            text-decoration: underline;
            color: #A0153E;
        }

        .login-container p {
            text-decoration: none;
            color: #A0153E;
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .login-container a:hover {
            color: #FC2947;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="aksi_login.php?op=in" method="POST">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" id="" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" id="" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="login" value="Login"></td>
                </tr>
            </table>
            <p>Belum memiliki akun? <a href="register.php"> Register di sini</a></p>
        </form>
    </div>
</body>

</html>