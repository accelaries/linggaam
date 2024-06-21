<?php
session_start();
include "koneksi.php";
$user = $_POST['username'];
$psw = $_POST['password'];
$op = $_GET['op'];

if ($op == "in") {
    $sql = "SELECT * FROM user WHERE username='$user' AND password='$psw'";
    $query = $koneksi->query($sql);
    if ($query && mysqli_num_rows($query) == 1) {
        $data = $query->fetch_array();
        $_SESSION['username'] = $data['username'];

        // Redirect berdasarkan level user
        if ($data['username'] == "Admin" || $data['username'] == "admin") {
            header("location:admin.php");
        } else if ($data['username'] != "Admin" || $data['username'] != "admin") {
            header("location:home.php");
        } else {
            echo "<div style='color: red; font-family: Arial, sans-serif; font-size: 14px; padding: 10px; background-color: #f8d7da; border: 1px solid #f5c6cb; border-radius: 4px;'>
            Username atau Password salah <a href=\"javascript:history.back()\" style='color: #721c24;'>kembali</a>
                </div>";
            exit();
        }
    } else {
        echo "<div style='color: red; font-family: Arial, sans-serif; font-size: 14px; padding: 10px; background-color: #f8d7da; border: 1px solid #f5c6cb; border-radius: 4px;'>
        Username atau Password salah <a href=\"javascript:history.back()\" style='color: #721c24;'>kembali</a>
                </div>";
        exit();
    }
} elseif ($op == "out") {
    unset($_SESSION['username']);
    unset($_SESSION['level']);
    header("location:login.php");
}
?>