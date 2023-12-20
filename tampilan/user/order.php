<?php
include "../../Controller/connect.php";
session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];
$id_account = $_SESSION['id_account'];









function getRankPriority($rank)
{
    // Tentukan prioritas numerik untuk setiap tingkat peringkat
    $rankPriorities = [
        'master' => 1,
        'gm' => 2,
        'epic' => 3,
        'legend' => 4,
        'mythic' => 5,
        'honor' => 6,
        'glory' => 7,
        'immortal' => 8,
    ];
    return $rankPriorities[$rank] ?? 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $statuscek = "";
    if (isset($_POST['order'])) {




        //Melakukan pengecekan jika akun ini sedang memesan joki
        $sqlcek = "SELECT status FROM orders WHERE id_account = '$id_account'";
        $result1 = $conn->query($sqlcek);
        if ($result1) {
            $row = $result1->fetch_assoc();
            if ($row) {
                // Dapatkan id_account dari hasil query
                $statuscek = $row['status'];
            }
        } else {
            // Jika query gagal
            echo "Error: " . $conn->error;
        }
        //akhir



        if ($statuscek === "pending" || $statuscek === "proses" || $statuscek === "unpaid") {
            echo '
            <script>
                alert("Akun ini sedang dalam proses dan tidak bisa memesan kembali. Silakan cek status pesanan Anda di halaman status.");
                window.location.href = "statusUser.php";
            </script>';
        } else {
            //  Awal Tangkap nilai-nilai dari form

            $idgame = $_POST['id_game'];
            $passgame = $_POST['pass_game'];

            $frank = $_POST["frank"];
            if (!empty($_POST["fmawi"])) {

                $fmawitemp = $_POST["fmawi"];
                // Reverse Mawi
                if ($frank === 'master') {
                    if ($fmawitemp == 4) {
                        $fmawi = 1;
                    } else if ($fmawitemp == 3) {
                        $fmawi = 2;
                    } else if ($fmawitemp == 2) {
                        $fmawi = 3;
                    } else if ($fmawitemp == 1) {
                        $fmawi = 4;
                    }
                } else if ($frank === 'gm' || $frank === 'epic' || $frank === 'legend') {
                    if ($fmawitemp == 5) {
                        $fmawi = 1;
                    } else if ($fmawitemp == 4) {
                        $fmawi = 2;
                    } else if ($fmawitemp == 3) {
                        $fmawi = 3;
                    } else if ($fmawitemp == 2) {
                        $fmawi = 4;
                    } else if ($fmawitemp == 1) {
                        $fmawi = 5;
                    }
                }
            } else {
                $fmawi = 0;
            }
            $fstar = $_POST["fstar"];

            $lrank = $_POST["lrank"];
            if (!empty($_POST["lmawi"])) {
                $lmawitemp = $_POST["lmawi"];
                // Reverse Mawi
                if ($lrank === 'master') {
                    if ($lmawitemp == 4) {
                        $lmawi = 1;
                    } else if ($lmawitemp == 3) {
                        $lmawi = 2;
                    } else if ($lmawitemp == 2) {
                        $lmawi = 3;
                    } else if ($lmawitemp == 1) {
                        $lmawi = 4;
                    }
                } else if ($lrank === 'gm' || $lrank === 'epic' || $lrank === 'legend') {
                    if ($lmawitemp == 5) {
                        $lmawi = 1;
                    } else if ($lmawitemp == 4) {
                        $lmawi = 2;
                    } else if ($lmawitemp == 3) {
                        $lmawi = 3;
                    } else if ($lmawitemp == 2) {
                        $lmawi = 4;
                    } else if ($lmawitemp == 1) {
                        $lmawi = 5;
                    }

                }
            } else {
                $lmawi = 0;
            }
            $lstar = $_POST["lstar"];
            // Akhir Tangkap nilai-nilai dari form

            // Konversi tingkat peringkat ke nilai prioritas numerik
            $frankPriority = getRankPriority($frank);
            $lrankPriority = getRankPriority($lrank);

            if ($frankPriority > $lrankPriority) {   // Perbandingan rank awal dan rank pemesanan


                echo "<script>alert('Inputan Rank tidak valid'); window.history.back();</script>";


            } else {

                // Deklarasi Variabel
                $rank1;
                $rank3;

                $all = 0;
                $alls = 0;
                $cmythic = 0;
                $hato = 0;
                $hato2 = 0;
                $hato3 = 0;


                $harga = array(
                    'master' => 4000,
                    'gm' => 5000,
                    'epic' => 7000,
                    'legend' => 8000,
                    'mythic' => 14000,
                    'honor' => 16000,
                    'glory' => 21000,
                    'immortal' => 28000
                );

                $totalm = 16; // Total bintang di master
                $totals = 25; // Total bintang di GM - legend

                $rank = array("master", "gm", "epic", "legend", "mythic", "honor", "glory", "immortal", "");
                $mawim = array(1, 2, 3, 4);
                $mawi = array(1, 2, 3, 4, 5);
                // Akhir Deklarasi Variabel

                //Awal Logika Perhitungan

                // For Rank awal
                for ($i = 0; $i <= 8; $i++) {
                    if ($frank == $rank[0]) {
                        $rank1 = $rank[1];
                        $rank3 = $rank[0];
                        for ($j = 0; $j < 4; $j++) {
                            if ($fmawi == $mawi[$j]) {
                                $hato = ($totalm - ($j * 4 + $fstar)) * $harga['master'];
                            }
                        }
                    } else if ($frank == $rank[$i]) {
                        $rank1 = $rank[$i + 1];
                        $rank3 = $rank[$i];
                        if ($frank == $rank[4] || $frank == $rank[5] || $frank == $rank[6] || $frank == $rank[7]) {
                            $cmythic = 1;
                        } else {
                            for ($j = 0; $j < 5; $j++) {
                                if ($fmawi == $mawi[$j]) {
                                    $hato = ($totals - ($j * 5 + $fstar)) * $harga[$rank[$i]];
                                }
                            }
                        }
                    }
                }

                // For rank tujuan akhir
                for ($i = 0; $i < 8; $i++) {
                    if ($lrank == $rank[0]) {
                        $rank4 = $rank[0];
                        for ($j = 0; $j < 4; $j++) {
                            if ($lmawi == $mawi[$j]) {
                                $hato2 = (($j * 4 + $lstar)) * $harga['master'];
                            }
                        }
                    } else if ($lrank == $rank[$i]) {
                        $rank4 = $rank[$i];
                        if ($lrank == $rank[4] || $lrank == $rank[5] || $lrank == $rank[6] || $lrank == $rank[7]) {
                            $cmythic = 1;
                            if ($frank == $rank[0] || $frank == $rank[1] || $frank == $rank[2] || $frank == $rank[3]) {
                                $fstar = 0;
                                $rank4 = $rank[4];
                            }
                        } else {
                            for ($j = 0; $j < 5; $j++) {
                                if ($lmawi == $mawi[$j]) {
                                    $hato2 = ($totals - ($totals - ($j * 5 + $lstar))) * $harga[$rank[$i]];
                                }
                            }
                        }
                    }
                }

                // Cek rank diantara rank awal dan rank akhir
                $index1 = array_search($rank3, $rank);
                $index2 = array_search($rank4, $rank);
                if ($frank !== $rank4) {
                    if ($rank1 !== $rank4) {
                        $result = array_slice($rank, min($index1, $index2) + 1, abs($index2 - $index1) - 1);
                        for ($i = 0; $i < count($result); $i++) {
                            for ($j = 0; $j < 8; $j++) {
                                if ($result[$i] == $rank[$j]) {
                                    $all = $all + ($totals * $harga[$rank[$j]]);
                                }
                            }
                        }
                    }
                }

                // Jika rank == mythic ke immortal
                if ($cmythic == 1) {
                    if ($lstar > 100) {
                        if ($fstar > 100) {
                            $alls = $alls + ($lstar - $fstar) * $harga['immortal'];
                        } else {
                            $alls = $alls + ($lstar - 100) * $harga['immortal'];
                        }
                    }
                    if ($lstar > 50) {
                        if ($fstar > 50 && $fstar < 100) {
                            if ($lstar < 100) {
                                $alls = $alls + ($lstar - $fstar) * $harga['glory'];
                            } else {
                                $alls = $alls + (100 - $fstar) * $harga['glory'];
                            }
                        } else if ($fstar < 50) {
                            if ($lstar < 100) {
                                $alls = $alls + ($lstar - 50) * $harga['glory'];
                            } else {
                                $alls = $alls + (100 - 50) * $harga['glory'];
                            }
                        }
                    }
                    if ($lstar > 25) {
                        if ($fstar > 25 && $fstar < 50) {
                            if ($lstar < 50) {
                                $alls = $alls + ($lstar - $fstar) * $harga['honor'];
                            } else {
                                $alls = $alls + (50 - $fstar) * $harga['honor'];
                            }
                        } else if ($fstar < 25) {
                            if ($lstar < 50) {
                                $alls = $alls + ($lstar - 25) * $harga['honor'];
                            } else {
                                $alls = $alls + (50 - 25) * $harga['honor'];
                            }
                        }
                    }
                    if ($lstar > 0) {
                        if ($fstar < 25) {
                            if ($lstar < 25) {
                                $alls = $alls + ($lstar - $fstar) * $harga['mythic'];
                            } else {
                                $alls = $alls + (25 - $fstar) * $harga['mythic'];
                            }
                        }
                    }
                }


                // Cek apakah rank awal == rank akhir
                if ($frank == $lrank && $frank !== $rank[4] && $frank !== $rank[5] && $frank !== $rank[6] && $frank !== $rank[7]) {
                    if ($frank == $rank[0]) {
                        $hato3 = $hato + $hato2 - ($totalm * $harga['master']);
                        $hato2 = 0;
                        $hato = 0;
                    } else {
                        for ($i = 1; $i < 4; $i++) {
                            if ($frank == $rank[$i]) {
                                $hato3 = $hato + $hato2 - ($totals * $harga[$rank[$i]]);
                                $hato2 = 0;
                                $hato = 0;

                            }
                        }
                    }
                }
                $alltot = $hato + $hato2 + $all + $alls + $hato3;

                //Akhir Logika Perhitungan


                // Memasukan data waktu disaat itu
                $waktu = date('Y-m-d H:i:s');

                // Menyatukan rank awal 
                if ($fmawi !== 0 && $lmawi !== 0) {
                    $rank_awal = "rank : $frank,  Romawi : $fmawitemp, Bintang : $fstar";
                    $rank_akhir = "rank : $lrank,  Romawi : $lmawitemp, Bintang : $lstar";
                } else if ($fmawi !== 0 && $lmawi == 0) {
                    $rank_awal = "rank : $frank,  Romawi : $fmawitemp, Bintang : $fstar";
                    $rank_akhir = "rank : $lrank, Bintang : $lstar";
                } else if ($fmawi == 0 && $lmawi == 0) {
                    $rank_awal = "rank : $frank,  Bintang : $fstar";
                    $rank_akhir = "rank : $lrank, Bintang : $lstar";
                }



                // Status ketika input order adalah unpaid
                $status = "unpaid";
                $_SESSION['id_account'] = $id_account;

                // Periksa hasil query

                // Tampilkan notifikasi jika diperlukan

                echo '
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var notificationBox = document.getElementById("notificationBox");
                            notificationBox.style.display = "block";
                        });
                    </script>
                ';

            }

        }
        // akhir dari else 
        if (isset($_POST['confirm'])) {

            $alltot = $_POST['alltot'];

            // Menyatukan rank awal 
            if ($fmawi !== 0 && $lmawi !== 0) {
                $rank_awal = "rank : $frank,  Romawi : $fmawitemp, Bintang : $fstar";
                $rank_akhir = "rank : $lrank,  Romawi : $lmawitemp, Bintang : $lstar";
            } else if ($fmawi !== 0 && $lmawi == 0) {
                $rank_awal = "rank : $frank,  Romawi : $fmawitemp, Bintang : $fstar";
                $rank_akhir = "rank : $lrank, Bintang : $lstar";
            } else if ($fmawi == 0 && $lmawi == 0) {
                $rank_awal = "rank : $frank,  Bintang : $fstar";
                $rank_akhir = "rank : $lrank, Bintang : $lstar";
            }


            $sql = "INSERT INTO orders (account_game, password_game, waktu_pesan, rank_awal, rank_akhir, harga, status, id_account) 
            VALUES('$idgame', '$passgame', '$waktu', '$rank_awal', '$rank_akhir', '$alltot', '$status', '$id_account')";

            // Menjalankan query
            if ($conn->query($sql) == TRUE) {
                echo "<script>alert('Order berhasil disubmit!'); window.location.href='statusUser.php';</script>";

            } else {
                echo "<script>alert('Error:  $conn->error')</script>";
            }

            // Menutup koneksi
            $conn->close();
        }

        if (isset($_POST['cancel'])) {
            echo "<script>alert('Mengcancel order'); window.location.href='orderUser.php';</script>";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(../../Doc/img/gelap.png);
        }

        /* Gaya CSS untuk overlay */
        .overlay {
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .notification-box {
            border: 1px solid #ccc;
            display: block;
            padding: 20px;
            width: 400px;
            background-color: #f8f8f8;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            align-items: center;
            justify-content: center;
        }

        .notification-box h2 {
            margin-bottom: 10px;
            color: #333;
        }

        .notification-box p {
            margin: 5px 0;
            color: #666;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .submit-button,
        .cancel-button {
            padding: 10px 20px;
            margin: 0 10px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }

        .submit-button {
            background-color: #4CAF50;
            color: white;
        }

        .cancel-button {
            background-color: #f44336;
            color: white;
        }

        /* Gaya CSS untuk pesan error */
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <!-- Overlay untuk popup -->
    <div class="overlay" id="overlay">
        <div class="d-flex justify-content-center">
            <div class="notification-box" id="notificationBox">
                <?php if (isset($pesanError)): ?>
                    <div class="error-message">
                        <p>
                            <?php echo $pesanError; ?>
                            <button class="cancel-button" onclick="cancelOrder()">Cancel</button>
                        </p>
                    </div>
                <?php else: ?>
                    <h2>Informasi Pemesanan</h2>
                    <p>Username:
                        <?php echo $username; ?>
                    </p>
                    <p>ID Game:
                        <?php echo $idgame; ?>
                    </p>
                    <p>Password Game:
                        <?php echo $passgame; ?>
                    </p>
                    <p>Rank Awal:
                        <?php echo $rank_awal; ?>
                    </p>
                    <p>Rank Akhir:
                        <?php echo $rank_akhir; ?>
                    </p>
                    <p>Harga :
                        RP.
                        <?php echo $alltot; ?>
                    </p>
                    <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
                    <form method="post" class="button-container">
                        <input type="hidden" name="id_game" value="<?= $idgame ?>" placeholder="ID Game" required>
                        <input type="hidden" name="pass_game" value="<?= $passgame ?>" placeholder="Password Game" required>

                        <input type="hidden" name="frank" value="<?= $frank ?>" id="rankAwal" required>
                        <input type="hidden" name="fmawi" value="<?= $fmawi ?>" id="romawiAwal" required>
                        <input type="hidden" name="fstar" value="<?= $fstar ?>" id="bintangAwal">


                        <input type="hidden" name="lrank" value="<?= $lrank ?>" id="rankAkhir" required>
                        <input type="hidden" name="lmawi" value="<?= $lmawi ?>" id="rankAkhir" required>
                        <input type="hidden" name="lstar" id="bintangAkhir" value="<?= $lstar ?>">

                        <input type="hidden" name="alltot" value="<?= $alltot ?>">
                        <input type="hidden" name="order">

                        <button class="submit-button" name="confirm">Submit</button>
                        <button class="cancel-button" name="cancel">Cancel</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Logika untuk menentukan apakah pop-up harus ditampilkan
            <?php if ($frankPriority > $lrankPriority || $cekstatus == "queue"): ?>
                var overlay = document.getElementById("overlay"); overlay.style.display = "flex";
            <?php endif; ?>
        });
    </script>
</body>

</html>