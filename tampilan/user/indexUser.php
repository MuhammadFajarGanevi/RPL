<?php
include "../../Controller/connect.php";
session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];
$id_account = $_SESSION['id_account'];





// GET id_account
$sql = "SELECT id_account FROM account WHERE username = '$username'";
$result = $conn->query($sql);

if ($result) {
    // Ambil hasilnya
    $row = $result->fetch_assoc();
    $id_account = $row['id_account'];
}

// Meng set id _account
$_SESSION['id_account'] = $id_account;

?>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tempest Booster</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/slicknav.css">
    <link rel="stylesheet" href="../../assets/css/flaticon.css">
    <link rel="stylesheet" href="../../assets/css/gijgo.css">
    <link rel="stylesheet" href="../../assets/css/animate.min.css">
    <link rel="stylesheet" href="../../assets/css/animated-headline.css">
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../../assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/css/slick.css">
    <link rel="stylesheet" href="../../assets/css/nice-select.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha384-..." crossorigin="anonymous">

</head>

<body class="black-bg">
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="../../assets/img/logo/logo1.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Tempest Boosting</title>
        </head>

        <body>

            <div class="header-area">
                <div class="main-header header-sticky navbar-dark">
                    <div class="container-fluid">
                        <div class="menu-wrapper d-flex align-items-center justify-content-between">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="login.php"><img src="../../assets/img/logo/logo1.png" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="indexUser.php">Home</a></li>
                                        <li><a href="orderUser.php">Order</a></li>
                                        <li><a href="statusUser.php">Status</a></li>
                                        <li><a href="historyUser.php">History</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            <div class="header-btns d-none d-lg-block f-right">
                                <?php
                                include "../../user_button.php";
                                ?>

                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none">
                                    <div class="slicknav_menu">
                                        <a href="#" aria-haspopup="true" role="button" tabindex="0"
                                            class="slicknav_btn slicknav_collapsed">
                                            <span class="slicknav_menutxt">MENU</span>
                                            <span class="slicknav_icon">
                                                <span class="slicknav_icon-bar"></span>
                                                <span class="slicknav_icon-bar"></span>
                                                <span class="slicknav_icon-bar"></span>
                                            </span>
                                        </a>
                                        <ul class="slicknav_nav slicknav_hidden" style="display: none;"
                                            aria-hidden="true" role="menu">
                                            <li><a href="indexUser.php" role="menuitem" tabindex="-1">Home</a></li>
                                            <li><a href="orderUser.php" role="menuitem" tabindex="-1">Order</a></li>
                                            <li><a href="statusUser.php" role="menuitem" tabindex="-1">Status</a></li>
                                            <li><a href="historyUser.php" role="menuitem" tabindex="-1">Review</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>

        <!-- Header End -->
    </header>
    <main>
        <!--? slider Area Start-->
        <div class="slider-area position-relative">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <span data-animation="fadeInLeft" data-delay="0.1s">Mobile Legend</span>
                                    <h1 data-animation="fadeInLeft" data-delay="0.4s">Tempest Boosting</h1>
                                    <a href="orderUser.php" class="border-btn hero-btn" data-animation="fadeInLeft"
                                        data-delay="0.8s">Go Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Traning categories Start -->
        <section class="traning-categories black-bg">
            <div class="pading">
                <!-- div kotak kiri -->
                <div class="kotak-kiri">
                    <h2>WHAT IS <span>TEMPEST</span></h2>
                    <p>Tempest boosting is a service where players can pay service providers to increase their progress
                        in the mobile legends game, where players want to reach the highest rank, increase character
                        statistics, or achieve achievements in a short time. Tempest provides game boosting services
                        usually consisting of hundreds of highly skilled and experienced players</p>
                    <span>SINCE <span>2023</span></span>
                </div>

                <!-- div kanan -->
                <div class="mytic">
                    <h2>HIGHEST <span>RANK</span></h2>
                    <img src="../../assets\img\logo\logo3.png">
                </div>
            </div>
            </div>

            <div class="container2">
                <div class="seksi">
                    <div class="item">
                        <img src="../../assets/img/icon/pensil.png" alt="Enter Your Destination">
                        <p>Enter Your Destination</p>
                    </div>
                    <div class="item">
                        <img src="../../assets/img/icon/card.png" alt="Pay Your Boosting">
                        <p>Pay Your Boosting</p>
                    </div>
                    <div class="item">
                        <img src="../../assets/img/icon/gelas.png" alt="Wait Till Done">
                        <p>Wait Till Done</p>
                    </div>
                    <div class="item">
                        <img src="../../assets/img/icon/like.png" alt="Confirmation Your Result">
                        <p>Confirmation Your Result</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <!-- Footer Bottom -->
        <div class="footer-bottom" style="overflow-x: hidden;">
            <div class="row d-flex align-items-center">
                <img src="../../assets/img/icon/footer.png">
            </div>
        </div>
        </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="form">
            <div class="result-wrapper">
                <a href="../../Controller/logout.php"><button type="button" class="btn btn-primary jarakk">Log
                        Out</button></a>
                <a href="../../Controller/edit.php"><button type="button"
                        class="btn btn-primary jarakk">Edit</button></a>
            </div>
        </div>
    </div>
    <script>
        document.querySelector("#show-login").addEventListener("click", function () {
            var popup = document.querySelector(".popup");
            popup.classList.toggle("active");
        });

        document.querySelector(".popup .close-btn").addEventListener("click", function () {
            var popup = document.querySelector(".popup");
            popup.classList.remove("active");
        });
    </script>

    <!-- JS here -->

    <script src="../../assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="../../assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="../../assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="../../assets/js/owl.carousel.min.js"></script>
    <script src="../../assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="../../assets/js/wow.min.js"></script>
    <script src="../../assets/js/animated.headline.js"></script>
    <script src="../../assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="../../assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="../../assets/js/jquery.nice-select.min.js"></script>
    <script src="../../assets/js/jquery.sticky.js"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="../../assets/js/jquery.counterup.min.js"></script>
    <script src="../../assets/js/waypoints.min.js"></script>
    <script src="../../assets/js/jquery.countdown.min.js"></script>
    <script src="../../assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="../../assets/js/contact.js"></script>
    <script src="../../assets/js/jquery.form.js"></script>
    <script src="../../assets/js/jquery.validate.min.js"></script>
    <script src="../../assets/js/mail-script.js"></script>
    <script src="../../assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="../../assets/js/plugins.js"></script>
    <script src="../../assets/js/main.js"></script>

</body>

</html>