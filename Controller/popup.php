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

    if (isset($_SESSION['log']) && $_SESSION['log'] == 'logged') {
        $login_status = $_SESSION['log'];
        $username = $_SESSION['username'];
        $role = $_SESSION['role'];
        $id_account = $_SESSION['id_account'];

        echo '
        <div class="popup-overlay active">
            <div class="popup-content">
                <p>' . ($login_status == 'logged' ? 'Selamat datang, ' . $username . '!' : '') . '</p>
                <button type="button" class="close-btn" onclick="closePopup()">Close</button>
            </div>
        </div>
        ';

        echo '
    <script>
        function closePopup() {
            document.querySelector(\'.popup-overlay\').classList.remove(\'active\');
            var role = ' . $role . ';

            if (role == 1) {
                window.location.href = "../tampilan/user/indexUser.php";
            } else if (role == 2) {
                window.location.href = "../tampilan/booster/indexBooster.php";
            } else {
                window.location.href = "../tampilan/admin/indexAdmin.php";
            }
        }
    </script>
    ';


    } else {
        // Display the login failed popup
        echo '
        <div class="popup-overlay active">
            <div class="popup-content">
                <h3>Login Gagal</h3>
                <p>Username atau password salah. Silakan coba lagi.</p>
                <button type="button" class="close-btn" onclick="closePopup()">Close</button>
            </div>
        </div>
        ';

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