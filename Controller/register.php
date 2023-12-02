<?php
include "./connect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['registrasi'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $notelp = $_POST['notelp'];
        $Cekrole = $_POST['role'];

        // Enkripsi kata sandi menggunakan password_hash()
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if ($Cekrole == "customer") {
            $role = 1;

            // Persiapkan query untuk menyimpan data ke database
            $sql = "INSERT INTO account (name, username, email, password, no_telp, role)
    VALUES ('$name', '$username', '$email', '$hashedPassword', '$notelp', '$role')";
        } else {
            $role = 2;

            // Persiapkan query untuk menyimpan data ke database
            $sql = "INSERT INTO account (name, username, email, password, no_telp, role)
    VALUES ('$name', '$username', '$email', '$hashedPassword', '$notelp', '$role')";
        }

    }

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
}

?>