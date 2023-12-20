<?php
include "../../Controller/connect.php";

session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];
$id_account = $_SESSION['id_account'];

// Mempersiapkan statement
$stmt = $conn->prepare("SELECT * FROM orders WHERE id_account = ?");
// Mengikat parameter
$stmt->bind_param("s", $id_account);
// Mengeksekusi statement
$stmt->execute();
// Mengambil hasil
$result = $stmt->get_result();
// Menggunakan hasil
// DEKLARASI

$id_order = "";
$idgame = "";
$passgame = "";
$waktu = "";
$rank_awal = "";
$rank_akhir = "";
$harga = "";
$status = "";
while ($row = $result->fetch_assoc()) {
    // Lakukan sesuatu dengan data
    $id_order = $row['id_order'];
    $idgame = $row['account_game'];
    $passgame = $row['password_game'];
    $waktu = $row['waktu_pesan'];
    $rank_awal = $row['rank_awal'];
    $rank_akhir = $row['rank_akhir'];
    $harga = $row['harga'];
    $status = $row['status'];
}
// Menutup statement
$stmt->close();

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
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.ico" />

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
                            <a href="index.php"><img src="../../assets/img/logo/logo1.png" alt="" /></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="indexUser.php">Home</a></li>
                                    <li><a href="orderUser.php">Order</a></li>
                                    <li><a href="#">Status</a></li>
                                    <li><a href="historyUser.php">History</a></li>
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
                                <h2>STATUS</h2>
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
                                <h3 style="color : crimson;">Hasil Order:</h3>
                                <?php
                                if ($status == "unpaid" || $status == "pending" || $status == "process" || $status == "success") {
                                    echo '<p>Status: <br>' . $status . '</p>';
                                    echo '<p>ID Order: <br>' . $id_order . '</p>';
                                    echo '<p>Rank Awal: <br>' . $rank_awal . '</p>';
                                    echo '<p>Rank Tujuan: <br>' . $rank_akhir . '</p>';
                                    echo '<p>Harga: <br>Rp. ' . $harga . '</p>';
                                    echo '<p>Waktu Order: <br>' . $waktu . '</p>';
                                } else {
                                    echo '<p>Tidak ada proses.</p>';
                                }
                                ?>
                            </div>
                            <?php if ($status == "success") { ?>
                                <a href="terima2User.php?id_order=<?php echo $id_order; ?>"> <button
                                        class="btn btn-primary">Selesai</button></a>
                            <?php } ?>


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
    <!-- ... (more scripts) ... -->
    <!-- Jquery Plugins, main Jquery -->
    <script src="../../assets/js/plugins.js"></script>
    <script src="../../assets/js/main.js"></script>


</body>

</html>