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


    $id_account1 = $id_account;
    $query2 = "SELECT * FROM account WHERE id_account = '$id_account1'";
    $hasil2 = mysqli_query($conn, $query2);


    // Format harga dengan pemisah ribuan
    $harga_format = number_format($harga, 0, ',', ',');

}

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
                <div class="tabble-wrapper">
                    <?php
                    if ($status == "unpaid" || $status == "pending" || $status == "process" || $status == "success") {
                        ?>
                        <div class="form-wrapper-input">
                            <!-- Hasil Input -->
                            <h3 style="color: crimson;">Hasil Order:</h3>
                            <div class="gambar">
                                <img src="../../assets\img\logo\logo3.png" alt="">
                            </div>
                            <form class="formulir" action="order.php" method="post" onsubmit="return validateForm()">
                                <div class="grup-kiri-kanan">
                                    <div class="grup-kiri">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input class="form-output" value="<?php echo $status; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <!-- Rank Awal -->
                                            <label for="rankAwal">Rank Awal</label>
                                            <?php
                                            $rankAwalValue = strtoupper(explode(' ', $rank_awal)[0]);
                                            $rankAwalValueWithoutStar = str_replace('*', '', $rankAwalValue);
                                            ?>
                                            <input name="frank" id="rankAwal" class="form-output"
                                                value="<?php echo $rankAwalValueWithoutStar; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            if (strtoupper(explode(' ', $rank_awal)[0]) == "MASTER" || strtoupper(explode(' ', $rank_awal)[0]) == "GM" || strtoupper(explode(' ', $rank_akhir)[0]) == "EPIC" || strtoupper(explode(' ', $rank_awal)[0]) == "LEGEND") {
                                                ?>
                                                <label for="romawiAwal">Romawi Awal</label>
                                                <input name="fmawi" id="romawiAwal" class="form-output"
                                                    value="<?php echo strtoupper(explode(' ', $rank_awal)[1]); ?>" readonly>
                                                <!-- Opsi Romawi akan diisi secara dinamis oleh JavaScript -->
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            if (strtoupper(explode(' ', $rank_awal)[0]) == "MASTER" || strtoupper(explode(' ', $rank_awal)[0]) == "GM" || strtoupper(explode(' ', $rank_akhir)[0]) == "EPIC" || strtoupper(explode(' ', $rank_awal)[0]) == "LEGEND") {
                                                ?>
                                                <label for="bintangAwal">Bintang Awal</label>
                                                <?php
                                                $bintangAwalValue = strtoupper(explode(' ', $rank_awal)[2]);
                                                $bintangAwalValueWithoutStar = str_replace('*', '', $bintangAwalValue);
                                                ?>
                                                <input name="fstar" id="bintangAwal" class="form-output"
                                                    value="<?php echo $bintangAwalValueWithoutStar; ?>" readonly>
                                            <?php } else { ?>
                                                <label for="bintangAwal">Bintang Awal</label>
                                                <?php
                                                $bintangAwalValue = strtoupper(explode(' ', $rank_awal)[1]);
                                                $bintangAwalValueWithoutStar = str_replace('*', '', $bintangAwalValue);
                                                ?>
                                                <input name="fstar" id="bintangAwal" class="form-output"
                                                    value="<?php echo $bintangAwalValueWithoutStar; ?>" readonly>
                                            <?php } ?>
                                        </div>
                                    </div>



                                    <div class="grup-kanan">
                                        <div class="form-group">
                                            <label>ID Order</label>
                                            <input class="form-output" value="<?php echo $id_order; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <!-- Rank Akhir -->
                                            <label for="rankAkhir">Rank Akhir</label>
                                            <input name="lrank" id="rankAkhir" class="form-output"
                                                value="<?php echo strtoupper(explode(' ', $rank_akhir)[0]); ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <?php
                                            if (strtoupper(explode(' ', $rank_akhir)[0]) == "MASTER" || strtoupper(explode(' ', $rank_akhir)[0]) == "GM" || strtoupper(explode(' ', $rank_akhir)[0]) == "EPIC" || strtoupper(explode(' ', $rank_akhir)[0]) == "LEGEND") {
                                                ?>
                                                <label for="romawiAkhir">Romawi Tujuan</label>
                                                <?php
                                                $romawiValue = strtoupper(explode(' ', $rank_akhir)[1]);
                                                $romawiValueWithoutStar = str_replace('*', '', $romawiValue);
                                                ?>
                                                <input name="lmawi" id="romawiAkhir" class="form-output"
                                                    value="<?php echo $romawiValueWithoutStar; ?>" readonly>
                                                <!-- Opsi Romawi akan diisi secara dinamis oleh JavaScript -->
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            if (strtoupper(explode(' ', $rank_akhir)[0]) == "MASTER" || strtoupper(explode(' ', $rank_akhir)[0]) == "GM" || strtoupper(explode(' ', $rank_akhir)[0]) == "EPIC" || strtoupper(explode(' ', $rank_akhir)[0]) == "LEGEND") {
                                                ?>
                                                <label for="bintangakhir">Bintang Akhir</label>
                                                <?php
                                                $bintangValue = strtoupper(explode(' ', $rank_akhir)[2]);
                                                $bintangValueWithoutStar = str_replace('*', '', $bintangValue);
                                                ?>
                                                <input name="lstar" id="bintangakhir" class="form-output"
                                                    value="<?php echo $bintangValueWithoutStar; ?>" readonly>
                                            <?php } else { ?>
                                                <label for="bintangakhir">Bintang Akhir</label>
                                                <?php
                                                $bintangValue = strtoupper(explode(' ', $rank_akhir)[1]);
                                                $bintangValueWithoutStar = str_replace('*', '', $bintangValue);
                                                ?>
                                                <input name="lstar" id="bintangakhir" class="form-output"
                                                    value="<?php echo $bintangValueWithoutStar; ?>" readonly>
                                            <?php } ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input
                                        style="background-color : white; color : black; font-weight : 500; text-Align: center;"
                                        class="form-output" value="<?php echo "Rp. " . $harga_format; ?>" readonly>
                                </div>
                            </form>
                            <?php if ($status == "success") { ?>
                                <a href="terima2User.php?id_order=<?php echo $id_order; ?>"> <button
                                        class="accept">Selesai</button></a>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="table-order" style="width:500px; margin-right: 350px;">

                            <?php echo "<p> Tidak ada Proses </p>"; ?>

                        </div>
                    <?php } ?>
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