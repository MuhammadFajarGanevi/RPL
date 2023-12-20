<?php

include "connect.php";
session_start();
$id_account = $_SESSION['id_account'];
$username = $_SESSION['username'];
$role = $_SESSION['role'];


if (isset($_SESSION['role'])) {
    if (isset($_POST['submit'])) {
        $id1 = $_POST['id_account'];
        $nama = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['no_telp'];


        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Query untuk mengupdate data pengguna

        if ($role == 0) {
            $query = "UPDATE account SET name = '$nama', username = '$username', email = '$email' , password = '$hashedPassword' , no_telp = '$phone' WHERE id_account = $id1";
        } else {
            $query = "UPDATE account SET name = '$nama', username = '$username', email = '$email' , password = '$hashedPassword' , no_telp = '$phone' WHERE id_account = $id_account";
        }

        $result = mysqli_query($conn, $query);

        if ($result) {

            if ($role == 1) {
                echo "<script>alert('Data berhasil diperbarui'); window.location.href='../';</script>';</script>";
            } else if ($role == 2) {
                echo "<script>alert('Data berhasil diperbarui'); window.location.href='../';</script>';</script>";
            } else {
                echo "<script>alert('Data berhasil diperbarui'); window.location.href='../tampilan/admin/settingAccount.php';</script>';</script>";

            }
        } else {
            // Jika query gagal dijalankan
            echo "<script>alert('Gagal memperbarui data'); window.location.href='/uas/user/indexUser.php?module=viewdatau&id=" . $_SESSION['id_account'] . "#pos';</script>';</script>";
        }
    } else {
        echo "ndak jelas.";
    }

} else {
    echo "Access denied.";
}
?>