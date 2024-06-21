<?php
// Koneksi ke database
include ("koneksi.php");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$sql = "SELECT * FROM user, artikel WHERE user.id_user=artikel.id_user;";
$result = $koneksi->query($sql);

// Proses penambahan data pembayaran
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul_artikel = $_POST['judul'];
    $isi = $_POST['isi'];
    $id_user = $_POST['id_user'];
    $nama_file = $_FILES['gambar']['name'];
    $target_dir = "Uploads/";
    $target_file = $target_dir . basename($nama_file);

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
        $insertQuery = "INSERT INTO artikel (judul, id_user, isi, nama_file) VALUES (?, ?, ?, ?)";
        $stmt = $koneksi->prepare($insertQuery);
        $stmt->bind_param("siss", $judul_artikel, $id_user, $isi, $nama_file);
        if ($stmt->execute()) {
            echo "<script language='javascript'>
                    alert('Artikel berhasil ditambahkan');
                    document.location = 'home.php';
                  </script>";
        } else {
            echo "<script language='javascript'>
                    alert('Artikel gagal ditambahkan');
                    document.location = 'home.php';
                  </script>";
        }
        $stmt->close();
    } else {
        echo "<script language='javascript'>
                alert('Gagal mengunggah gambar');
                document.location = 'form_artikel.php';
              </script>";
    }
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Artikel</title>
    <link rel="shortcut icon" href="logo-Quick.jpeg" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            text-align: center;
        }

        label {
            display: inline-block;
            width: 150px;
            text-align: left;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="file"],
        select,
        textarea {
            width: calc(100% - 160px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            height: 100px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .btn-container {
            text-align: center;
            margin-top: 10px;
        }

        .btn-container a {
            margin: 0 5px;
            text-decoration: none;
            color: #007bff;
        }

        .btn-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Buat Artikel</h2>
        <form method="post" action="form_artikel.php" enctype="multipart/form-data">
            <label for="id_user">Username:</label>
            <select name="id_user" id="" required>
                <option value="">Pilih User</option>
                <?php
                // Koneksi ke database lagi untuk mengambil data reservasi
                include ("koneksi.php");
                $userQuery = "SELECT * FROM user;";
                $userResult = $koneksi->query($userQuery);
                if ($userResult->num_rows > 0) {
                    while ($user = $userResult->fetch_assoc()) {
                        echo '<option value="' . $user['id_user'] . '">' . $user['id_user'] . ', ' . $user['username'] . '</option>';
                    }
                } else {
                    echo '<option value="">No User Available</option>';
                }
                ?>
            </select><br><br>
            <label for="judul">Judul Artikel:</label>
            <input type="text" name="judul" id="judul" required><br><br>
            <label for="isi">Isi Artikel:</label>
            <textarea name="isi" id="isi" required></textarea><br><br>
            <label for="gambar">Masukkan Gambar:</label>
            <input type="file" name="gambar" id="gambar" required><br><br>
            <button type="submit">Tambah</button>
        </form>
        <div class="btn-container">
            <a href="home.php">Home</a>
        </div>
    </div>
</body>

</html>