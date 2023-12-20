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

        // Persiapkan query untuk mendapatkan username dan email
        $sqli = "SELECT username, password, email FROM account";
        $result = $conn->query($sqli);

        if (!$result) {
            echo "Error: " . $sqli . "<br>" . $conn->error;
            exit;
        }

        // Validasi username dan password
        $userExists = false;
        while ($row = $result->fetch_assoc()) {
            $usernameExist = $row['username'];
            $passwordExist = $row['password'];

            if ($username == $usernameExist || password_verify($password, $passwordExist)) {
                $userExists = true;
                break;
            }
        }

        if ($userExists) {
            echo '
            <script>
                alert("Username atau password sudah terdaftar.");
                window.history.back();
            </script>';
        } else {
            // Enkripsi kata sandi menggunakan password_hash()
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Periksa role
            $role = ($Cekrole == "customer") ? 1 : 2;

            // Persiapkan query untuk menyimpan data ke database
            $sql = "INSERT INTO account (name, username, email, password, no_telp, role)
            VALUES ('$name', '$username', '$email', '$hashedPassword', '$notelp', '$role')";

            // Eksekusi query INSERT
            if ($conn->query($sql) === TRUE) {
                $id_account = $conn->insert_id;

                $_SESSION['log'] = 'logged';
                $_SESSION['username'] = $username;
                $_SESSION['nama'] = $name;
                $_SESSION['role'] = $role;
                $_SESSION['id_account'] = $id_account;

                // Redirect ke halaman popup.php
                echo '<script>window.location.href = "popup.php";</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Tutup koneksi
        $conn->close();
    }
}
?>