<?php
include "../../Controller/connect.php";
session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];
$id_account = $_SESSION['id_account'];

// SELECT 
$query = "SELECT * FROM orders ";
$hasil = mysqli_query($conn, $query);



$query3 = "SELECT * FROM orders";
$hasil3 = mysqli_query($conn, $query3);

$waduh = 0;
while ($buff3 = mysqli_fetch_array($hasil3)) {
    if ($buff3['id_booster'] == $id_account) {
        $waduh = 1;
    }
}


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
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../../assets/css/slicknav.css" />
    <link rel="stylesheet" href="../../assets/css/flaticon.css" />
    <link rel="stylesheet" href="../../assets/css/gijgo.css" />
    <link rel="stylesheet" href="../../assets/css/animate.min.css" />
    <link rel="stylesheet" href="../../assets/css/animated-headline.css" />
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="../../assets/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="../../assets/css/themify-icons.css" />
    <link rel="stylesheet" href="../../assets/css/slick.css" />
    <link rel="stylesheet" href="../../assets/css/nice-select.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
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
                    <img src="../../assets/img/logo/logo1.png" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper d-flex align-items-center justify-content-between">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="#"><img src="../../assets/img/logo/logo1.png" alt="" /></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="indexBooster.php">Home</a></li>
                                    <li><a href="#">Boosting</a></li>
                                    <li><a href="statusBooster.php">Status</a></li>
                                    <li><a href="historyBooster.php">History</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header-btn -->
                        <div class="header-btns d-none d-lg-block f-right">
                            <?php include "../../user_button.php" ?>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-70">
                                <h2>BOOSTING</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="services-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <!-- Hasil Input -->
                        <div class="col-lg-6">
                            <div class="result-wrapper">
                                <!-- <div class="backk"> -->
                                <?php if ($waduh != 1) { ?>
                                    <table width="780" border="1" align="center">
                                        <tr>
                                            <th width="85" bgcolor="#3399ff">Name</th>
                                            <th width="82" bgcolor="#3399ff">First Rank</th>
                                            <th width="87" bgcolor="#3399ff">Last Rank</th>
                                            <th width="31" bgcolor="#3399ff">Status</th>
                                            <th width="2" bgcolor="#3399ff">Price</th>
                                            <th width="85" bgcolor="#3399ff">Hapus</th>
                                        </tr>

                                        <?php

                                        while ($buff = mysqli_fetch_array($hasil)) {

                                            $id_account1 = $buff['id_account'];
                                            $rank_awal = $buff['rank_awal'];
                                            $rank_akhir = $buff['rank_akhir'];
                                            $status = $buff['status'];
                                            $harga = $buff['harga'];
                                            $id_order = $buff['id_order'];

                                            $query2 = "SELECT * FROM account WHERE id_account = '$id_account1'";
                                            $hasil2 = mysqli_query($conn, $query2);


                                            // Mengambil nilai
                                    
                                            if ($status == "pending") {
                                                ?>
                                                <tr>
                                                    <?php while ($buff2 = mysqli_fetch_assoc($hasil2)) {
                                                        $namaaku = $buff2['name']; ?>
                                                        <td width="85" bgcolor="#fff">
                                                            <?php echo $namaaku; ?>
                                                        <?php }
                                                    ; ?>
                                                    </td>
                                                    <td width="82" bgcolor="#fff">
                                                        <?php echo $rank_awal; ?>
                                                    </td>
                                                    <td width="87" bgcolor="#fff">
                                                        <?php echo $rank_akhir; ?>
                                                    </td>
                                                    <td width="31" bgcolor="#fff">
                                                        <?php echo $status; ?>
                                                    </td>
                                                    <td width="31" bgcolor="#fff">
                                                        <?php echo $harga; ?>
                                                    </td>
                                                    <td width="30" bgcolor="#fff"><a style="color: black;"
                                                            href="terima.php?id_order=<?php echo $id_order; ?>">Accept</a>

                                                    </td>
                                                </tr>
                                                <?php
                                            }


                                        }
                                        ;
                                        mysqli_close($conn);
                                        ?>
                                    </table>
                                <?php } else {
                                    echo '<p>Tidak Bisa menerima boosting, karena anda sedang menjalankan booster / tidak ada pesanan.</p>';
                                } ?>
                                <!-- </div> -->
                            </div>
                        </div>
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