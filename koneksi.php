<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "artikel";
    $koneksi = mysqli_connect($host, $username, $password, $database);
    if($koneksi) {
        echo "    ";
    } else {
        echo "Server not Connected";
    }
?>