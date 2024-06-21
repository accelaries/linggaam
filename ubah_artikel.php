<?php
session_start();

require_once "koneksi.php";

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data artikel untuk dropdown
$artikelQuery = "SELECT * FROM artikel";
$artikelResult = $koneksi->query($artikelQuery);

// Proses hapus artikel
if (isset($_POST['hapus_artikel'])) {
    $id_artikel = $_POST['id_artikel'];

    // Hapus data artikel
    $deleteQuery = "DELETE FROM artikel WHERE id_artikel = ?";
    $stmt = $koneksi->prepare($deleteQuery);
    $stmt->bind_param("i", $id_artikel);

    if ($stmt->execute()) {
        echo "<script language='javascript'>
                alert('Artikel berhasil dihapus');
                document.location = 'home.php';
              </script>";
    } else {
        echo "Terjadi kesalahan: " . $koneksi->error;
    }

    $stmt->close();
}

// Proses ubah artikel
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['hapus_artikel'])) {
    $id_artikel = $_POST['id_artikel'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $nama_file = $_FILES['gambar']['name'];
    $target_dir = "Uploads/";
    $target_file = $target_dir . basename($nama_file);

    // Jika gambar baru diupload
    if ($nama_file) {
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            $updateQuery = "UPDATE artikel SET judul = ?, isi = ?, nama_file = ? WHERE id_artikel = ?";
            $stmt = $koneksi->prepare($updateQuery);
            $stmt->bind_param("sssi", $judul, $isi, $nama_file, $id_artikel);
        } else {
            echo "<script language='javascript'>
                    alert('Gagal mengunggah gambar');
                    document.location = 'ubah_artikel.php?id=$id_artikel';
                  </script>";
            exit();
        }
    } else {
        $updateQuery = "UPDATE artikel SET judul = ?, isi = ? WHERE id_artikel = ?";
        $stmt = $koneksi->prepare($updateQuery);
        $stmt->bind_param("ssi", $judul, $isi, $id_artikel);
    }

    if ($stmt->execute()) {
        echo "<script language='javascript'>
                alert('Artikel berhasil diubah');
                document.location = 'home.php';
              </script>";
    } else {
        echo "<script language='javascript'>
                alert('Artikel gagal diubah');
                document.location = 'home.php';
              </script>";
    }

    $stmt->close();
}

// Ambil data artikel yang dipilih untuk diubah
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selectQuery = "SELECT * FROM artikel WHERE id_artikel = ?";
    $stmt = $koneksi->prepare($selectQuery);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Artikel</title>
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
        textarea,
        select,
        input[type="file"] {
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

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-container {
            text-align: center;
            margin-top: 10px;
        }

        .btn-container button {
            margin: 0 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Ubah Artikel</h2>
        <p>Pilih artikel yang ingin diubah datanya.</p>
        <form method="post" action="ubah_artikel.php" enctype="multipart/form-data">
            <label for="id_artikel">Pilih Artikel:</label>
            <select name="id_artikel" id="id_artikel" onchange="window.location.href='ubah_artikel.php?id='+this.value">
                <option value="">Pilih Artikel</option>
                <?php while ($artikel = $artikelResult->fetch_assoc()) { ?>
                    <option value="<?php echo $artikel['id_artikel']; ?>" <?php if (isset($row) && $row['id_artikel'] == $artikel['id_artikel'])
                           echo 'selected'; ?>>
                        <?php echo $artikel['judul']; ?>
                    </option>
                <?php } ?>
            </select><br><br>

            <?php if (isset($row)) { ?>
                <label for="judul">Judul Artikel:</label>
                <input type="text" name="judul" id="judul" value="<?php echo $row['judul']; ?>" required><br><br>

                <label for="isi">Isi Artikel:</label>
                <textarea name="isi" id="isi" required><?php echo $row['isi']; ?></textarea><br><br>

                <label for="gambar">Masukkan Gambar:</label>
                <input type="file" name="gambar" id="gambar"><br><br>

                <div>
                    <img src="Uploads/<?php echo $row['nama_file']; ?>" alt="Gambar Artikel"
                        style="max-width: 100px; height: auto;">
                </div><br>

                <button type="submit">Ubah</button>

                <!-- Tombol Hapus -->
                <button type="submit" class="btn-danger" name="hapus_artikel"
                    onclick="return confirm('Anda yakin ingin menghapus artikel ini?')">Hapus</button>
            <?php } ?>
        </form>
        <div class="btn-container">
            <a href="home.php">Home</a>
        </div>
    </div>
</body>

</html>