<?php

include "../Controller/connect.php";
session_start();
$username = $_SESSION['username'];



?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Tempest Booster</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="manifest" href="site.webmanifest" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />

    <!-- CSS here -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../assets/css/slicknav.css" />
    <link rel="stylesheet" href="../assets/css/flaticon.css" />
    <link rel="stylesheet" href="../assets/css/gijgo.css" />
    <link rel="stylesheet" href="../assets/css/animate.min.css" />
    <link rel="stylesheet" href="../assets/css/animated-headline.css" />
    <link rel="stylesheet" href="../assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="../assets/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="../assets/css/themify-icons.css" />
    <link rel="stylesheet" href="../assets/css/slick.css" />
    <link rel="stylesheet" href="../assets/css/nice-select.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha384-..." crossorigin="anonymous">

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
            background-size: 110%;
        }

        .back-button {
            position: fixed;
            top: 10px;
            left: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="../assets/img/logo/logo1.png" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <main>
        <!--? Hero Start -->
        <div class="container" id="container">
            <?php
            if (isset($_SESSION['role'])) {
                if (isset($_SESSION['id_account'])) {
                    $id_account = $_SESSION['id_account'];
                    $select = "SELECT * FROM account WHERE id_account='$id_account'";
                    $hasil = mysqli_query($conn, $select);
                    while ($buff = mysqli_fetch_array($hasil)) {
                        $_SESSION['role'] = $buff['role'];
                        ?>
                        <div class="d-flex justify-content-center">
                            <div class="edittt">
                                <form action="../controller/update.php" method="post" class="post">
                                    <div class="input-form-edit">
                                        <label>Name</label>:
                                        <input type="text" name="name" value="<?php echo $buff['name']; ?>" required />
                                    </div>
                                    <div class="input-form-edit">
                                        <label>Username</label>:
                                        <input type="text" name="username" value="<?php echo $buff['username']; ?>" required />
                                    </div>
                                    <div class="input-form-edit">
                                        <label>Email</label>:
                                        <input type="email" name="email" value="<?php echo $buff['email']; ?>" required />
                                    </div>
                                    <div class="input-form-edit">
                                        <label>Password</label>:
                                        <input type="password" name="password" value="" required />
                                    </div>
                                    <div class="input-form-edit">
                                        <label>Phone</label>:
                                        <input type="number" name="no_telp" value="<?php echo $buff['no_telp']; ?>" required />
                                    </div>
                                    <button type="submit" name="submit" value="submit" class="save-edit">Save</button>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                    mysqli_close($conn);
                } else {
                    echo "ID not found.";
                }
            } else {
                echo "Access denied.";
            }
            ?>
        </div>
    </main>

    <button class="back-button" onclick="goBack()">Kembali</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <!-- JS here -->

    <script src="../assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="../assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/animated.headline.js"></script>
    <script src="../assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="../assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="../assets/js/jquery.nice-select.min.js"></script>
    <script src="../assets/js/jquery.sticky.js"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/jquery.countdown.min.js"></script>
    <script src="../assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="../assets/js/contact.js"></script>
    <script src="../assets/js/jquery.form.js"></script>
    <script src="../assets/js/jquery.validate.min.js"></script>
    <script src="../assets/js/mail-script.js"></script>
    <script src="../assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>