<?php
include "../../Controller/connect.php";
session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];


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
                            <a href="indexUser.php"><img src="../../assets/img/logo/logo1.png" alt="" /></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="indexUser.php">Home</a></li>
                                    <li><a href="#">Order</a></li>
                                    <li><a href="statusUser.php">Status</a></li>
                                    <li><a href="historyUser.php">Review</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header-btn -->
                        <div class="header-btns d-none d-lg-block f-right">
                            <?php include "../../user_button.php"; ?>
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
                                <h2>ORDER</h2>
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
                        <div class="form-wrapper">

                            <form action="order.php" method="post" onsubmit="return validateForm()">
                                <!-- Rank Awal -->
                                <div class="form-group">
                                    <label for="info_game">Informasi Akun</label>
                                    <input type="text" name="id_game" placeholder="ID Game" required>
                                    <input type="text" name="pass_game" placeholder="Password Game" required>
                                </div>
                                <div class="form-group">
                                    <label for="rankAwal">Rank Awal</label>
                                    <select name="frank" id="rankAwal" class="form-control"
                                        onchange="updateOptions('Awal')">
                                        <option value="" hidden> </option>
                                        <option value="master">Master</option>
                                        <option value="gm">Grand Master</option>
                                        <option value="epic">Epic</option>
                                        <option value="legend">Legend</option>
                                        <option value="mythic">Mythical </option>
                                        <option value="honor">Mythical Honor</option>
                                        <option value="glory">Mythical Glory</option>
                                        <option value="immortal">Mythical Immortal</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="romawiAwal">Romawi Awal</label>
                                    <select name="fmawi" id="romawiAwal" class="form-control">
                                        <!-- Opsi Romawi akan diisi secara dinamis oleh JavaScript -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bintangAwal">Bintang Awal</label>
                                    <input type="number" name="fstar" id="bintangAwal" class="form-control" min="0">

                                </div>

                                <!-- Rank Akhir -->
                                <div class="form-group">
                                    <label for="rankAkhir">Rank Tujuan</label>
                                    <select name="lrank" id="rankAkhir" class="form-control"
                                        onchange="updateOptions('Akhir')">
                                        <option value="" hidden> </option>
                                        <option value="master">Master</option>
                                        <option value="gm">Grand Master</option>
                                        <option value="epic">Epic</option>
                                        <option value="legend">Legend</option>
                                        <option value="mythic">Mythic</option>
                                        <option value="honor">Mythical Honor</option>
                                        <option value="glory">Mythical Glory</option>
                                        <option value="immortal">Mythical Immortal</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="romawiAkhir">Romawi Tujuan</label>
                                    <select name="lmawi" id="romawiAkhir" class="form-control">
                                        <!-- Opsi Romawi akan diisi secara dinamis oleh JavaScript  -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bintangAkhir">Bintang Tujuan</label>
                                    <input type="number" name="lstar" id="bintangAkhir" class="form-control" min="1">
                                </div>

                                <!-- Tombol Submit -->
                                <button type="submit" name="order" class="btn btn-primary">Submit</button>
                            </form>


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


    <!-- Skrip JavaScript -->
    <script>
        // document.body.innerHTML = "";
        function updateOptions(prefix) {
            var rankSelect = document.getElementById(`rank${prefix}`);
            var romawiSelect = document.getElementById(`romawi${prefix}`);
            var bintangInput = document.getElementById(`bintang${prefix}`);

            // Dapatkan nilai rank yang dipilih
            var selectedRank = rankSelect.value;


            // Kosongkan opsi Romawi dan Bintang
            romawiSelect.innerHTML = '';
            bintangInput.innerHTML = '';

            // Logika untuk mengisi opsi Romawi dan Bintang berdasarkan Rank
            if (selectedRank === 'master') {
                // Jika rank adalah master, isi opsi Romawi dari I - IV dan Bintang dari * - ****
                for (var i = 1; i <= 4; i++) {
                    var romawiOption = document.createElement('option');
                    // romawiOption.value = getRomawi(i);
                    romawiOption.value = i;
                    romawiOption.text = getRomawi(i);
                    romawiSelect.add(romawiOption);
                }
                romawiSelect.style.display = 'block';
                romawiSelect.disabled = false;
                bintangInput.max = "4";


            } else if (['gm', 'epic', 'legend'].includes(selectedRank)) {
                // Jika rank adalah GM, epic, atau legend, isi opsi Romawi dari I - V dan Bintang dari * - *****
                for (var i = 1; i <= 5; i++) {
                    var romawiOption = document.createElement('option');
                    // romawiOption.value = getRomawi(i);
                    romawiOption.value = i;
                    romawiOption.text = getRomawi(i);
                    romawiSelect.add(romawiOption);
                }
                romawiSelect.style.display = 'block';
                romawiSelect.disabled = false;
                bintangInput.max = "5";


            }
            // Disable Romawi jika rank adalah Mythic, Mythical Glory
            else if (['mythic', 'honor', 'glory', 'immortal'].includes(selectedRank)) {
                // Sembunyikan elemen <select> Romawi
                romawiSelect.style.display = 'none';
                // Tampilkan container elemen input number Romawi
                bintangInput.style.display = 'block';
                // Enable Bintang
                bintangInput.disabled = false; // Di-enable untuk memungkinkan pengisian bintang

                if (selectedRank === 'mythic') {
                    bintangInput.min = "1";
                    bintangInput.max = "24";
                }
                else if (selectedRank === 'honor') {
                    bintangInput.min = "25";
                    bintangInput.max = "49";
                }
                else if (selectedRank === 'glory') {
                    bintangInput.min = "50";
                    bintangInput.max = "99";
                }
                else if (selectedRank === 'immortal') {
                    bintangInput.min = "100";
                    bintangInput.max = "300";
                }
            }


            // Set nilai default untuk Romawi
            if (selectedRank === 'master') {
                // Jika "Rank" adalah master, set default Romawi ke IV
                romawiSelect.value = '4';
            } else if (['gm', 'epic', 'legend'].includes(selectedRank)) {
                // Jika "Rank" adalah GM, epic, atau legend, set default Romawi ke V
                romawiSelect.value = '5';
            }
        }

        function getRomawi(number) {
            // Fungsi untuk mendapatkan representasi Romawi dari angka
            var romawiNumerals = ['I', 'II', 'III', 'IV', 'V'];
            return romawiNumerals[number - 1];
        }


        function validateForm() {
            // Logika validasi formulir jika diperlukan
            return true; // Ganti dengan logika validasi sesuai kebutuhan
        }
    </script>



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