<?php
session_start();
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $username = $_POST['name'];
        $password = $_POST['pass'];

        // Prepared statement untuk mencegah injection
        $stmt = $conn->prepare("SELECT * FROM account WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Login berhasil
                $_SESSION['role'] = $row['role'];
                $role = $_SESSION['role'];
                if ($role == 1) {
                    // Jika Customer
                    $_SESSION['log'] = 'logged';
                    $_SESSION['id'] = $row['id_account'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama'] = $row['name'];
                    $id = $_SESSION['id'];
                    header("Location: popup.php");
                } else if ($role == 2) {
                    // Jika booster
                    $_SESSION['log'] = 'logged';
                    $_SESSION['id'] = $row['id_account'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama'] = $row['nama'];
                } else {
                    // Jika Admin
                    $_SESSION['log'] = 'logged';
                    $_SESSION['id'] = $row['id_account'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama'] = $row['nama'];
                }
            } else {
                header("Location: popup.php");
            }
        } else {
                  header("Location: popup.php");
        }
        exit();
    }
}
?>
