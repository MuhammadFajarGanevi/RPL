<?php
include "../../Controller/connect.php";
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    // Redirect ke halaman login jika belum login
    header("Location: http://localhost:83/RPL/tempest/tempest-booster/tampilan/login.html");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman User</title>
    <!-- Tambahkan stylesheet atau tag head lainnya sesuai kebutuhan -->
</head>

<body>
    <!-- Tambahkan konten halaman user di sini -->

    <h1>Selamat Datang di Halaman User!</h1>
    <p><?php echo $_SESSION['nama']; ?></p>

    <a href="orderUser.php">Order</a>

    <!-- Tambahkan elemen HTML lainnya sesuai kebutuhan -->

</body>

</html>
