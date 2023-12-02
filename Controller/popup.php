<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url(../Doc/img/gelap.png);
            background-position: center;
        }

        .popup-overlay {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .popup-overlay.active {
            visibility: visible;
            opacity: 1;
        }

        .close-btn {
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    // Periksa apakah variabel sesi "log" dan "login_status" telah diatur
    if (isset($_SESSION['log']) && $_SESSION['log'] == 'logged') {
        $login_status = $_SESSION['log'];
        $username = $_SESSION['username'];
        $role = $_SESSION['role'];

        // Hapus variabel sesi setelah digunakan
        unset($_SESSION['log']);
        unset($_SESSION['username']);
        unset($_SESSION['role']);

        // Tampilkan pesan pop-up
        echo '
    <div class="popup-overlay active">
        <div class="popup-content">
            <p>' . ($login_status == 'logged' ? 'Selamat datang, ' . $username . '!' : '') . '</p>
            <button class="close-btn" onclick="closePopup()">Close</button>
        </div>
    </div>
    ';

        // Tambahkan script JavaScript di sini
        echo '
    <script>
        function closePopup() {
            document.querySelector(\'.popup-overlay\').classList.remove(\'active\');
        }
    </script>
    ';
        // Redirect ke menu sesuai dengan peran (role)
        if ($role == 1) {
            header('Location: ../tampilan/user/index.php');
            exit;
        } elseif ($role == 2) {
            header('Location: ../tampilan/booster/index.php');
            exit;
        } else {
            header('Location: ../tampilan/admin/index.php');
            exit;
        }
    } else {
        // Tampilkan pesan pop-up login gagal di luar blok sesi
        echo '
    <div class="popup-overlay active">
        <div class="popup-content">
            <h3>Login Gagal</h3>
            <p>Username atau password salah. Silakan coba lagi.</p>
            <button class="close-btn" onclick="closePopup()">Close</button>
        </div>
    </div>
    ';

        // Tambahkan script JavaScript di sini
        echo '
    <script>
        function closePopup() {
            document.querySelector(\'.popup-overlay\').classList.remove(\'active\');
            window.location.href = "../tampilan/login.html"; 
        }
    </script>
    ';
    }
    ?>

</body>

</html>