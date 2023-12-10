<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Dynamic</title>
    <style>
        .hidden {
            display: none;
        }

        .rank-box {
            display: inline-block;
            padding: 10px;
            border: 1px solid #ccc;
            margin-right: 10px;
            cursor: pointer;
        }

        .rank-box-2 {
            display: inline-block;
            padding: 10px;
            border: 1px solid #ccc;
            margin-right: 10px;
            cursor: pointer;
        }

        .rank-box.active {
            background-color: red;
            /* Warna latar belakang saat menjadi aktif */
        }

        .rank-box-2.active {
            background-color: red;
            /* Warna latar belakang saat menjadi aktif */
        }
    </style>
</head>

<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="formRank">

        <!-- Pilihan Rank -->
        <div class="rank-box" onclick="showAndToggle('master', this)">Master</div>
        <div class="rank-box" onclick="showAndToggle('gm', this)">GM</div>
        <div class="rank-box" onclick="showAndToggle('epic', this)">Epic</div>
        <div class="rank-box" onclick="showAndToggle('legend', this)">Legend</div>
        <div class="rank-box" onclick="showAndToggle('mythic', this)">Mythic</div>
        <div class="rank-box" onclick="showAndToggle('honor', this)">Honor</div>
        <div class="rank-box" onclick="showAndToggle('glory', this)">Glory</div>
        <div class="rank-box" onclick="showAndToggle('immortal', this)">Immortal</div>
        <br>
        <!-- Form inputan dalam file yang sama -->

        <div id="fmawiFields" class="hidden">
            <label for="fmawi">First Mawi:</label>
            <select name="fmawi" id="fmawi">
                <!-- Options for Mawi will be dynamically added here -->
            </select><br>
        </div>

        <label for="fstar">First Star:</label>
        <input type="number" name="fstar" id="fstar" required min="0"><br>
        <input type="hidden" name="frank" id="frankInput">


        <!-- Pilihan Rank akhir -->
        <div class="rank-box-2" onclick="showAndToggleEnd('master', this)">Master</div>
        <div class="rank-box-2" onclick="showAndToggleEnd('gm', this)">GM</div>
        <div class="rank-box-2" onclick="showAndToggleEnd('epic', this)">Epic</div>
        <div class="rank-box-2" onclick="showAndToggleEnd('legend', this)">Legend</div>
        <div class="rank-box-2" onclick="showAndToggleEnd('mythic', this)">Mythic</div>
        <div class="rank-box-2" onclick="showAndToggleEnd('honor', this)">Honor</div>
        <div class="rank-box-2" onclick="showAndToggleEnd('glory', this)">Glory</div>
        <div class="rank-box-2" onclick="showAndToggleEnd('immortal', this)">Immortal</div>
        <br>

        <!-- Form inputan dalam file yang sama -->

        <div id="lmawiFields" class="hidden">
            <label for="lmawi">Last Mawi:</label>
            <select name="lmawi" id="lmawi">
                <!-- Options for Mawi will be dynamically added here -->
            </select><br>
        </div>

        <label for="lstar">Last Star:</label>
        <input type="number" name="lstar" id="lstar" required min="1"><br>
        <input type="hidden" name="lrank" id="frankInput2">

        <button type="submit" name="order">Hitung</button>
    </form>

    <script>
        // func 1
        function showAndToggle(selectedRank, element) {
            showFields(selectedRank, 'fmawiFields');
            toggleActive(element, '.rank-box');
            document.getElementById('frankInput').value = selectedRank;
            setMaxFirstStar(selectedRank);
        }

        // func 2
        function showAndToggleEnd(selectedRank2, element2) {
            showFields(selectedRank2, 'lmawiFields');
            toggleActive(element2, '.rank-box-2');
            document.getElementById('frankInput2').value = selectedRank2;
            setMaxLastStar(selectedRank2);
        }

        // func 1 dan func 2
        function toggleActive(element, selector) {
            var rankBoxes = document.querySelectorAll(selector);
            rankBoxes.forEach(function (box) {
                if (box.classList.contains('active')) {
                    box.classList.remove('active');
                }
            });

            element.classList.add('active');
        }

        // func 1
        function showFields(selectedRank, containerId) {
            var fmawiFields = document.getElementById(containerId);
            var fmawiSelect = fmawiFields.querySelector('select');

            // Reset options
            while (fmawiSelect.firstChild) {
                fmawiSelect.removeChild(fmawiSelect.firstChild);
            }

            // Show/hide fields based on the selected rank
            if (selectedRank === "master" || selectedRank === "gm" || selectedRank === "legend" || selectedRank === "epic") {
                fmawiFields.classList.remove("hidden");
                var mawiMax = (selectedRank === "master") ? 4 : 5;

                for (var i = 1; i <= mawiMax; i++) {
                    var option = document.createElement("option");
                    option.value = i;
                    option.text = i;
                    fmawiSelect.appendChild(option);
                }
            } else {
                fmawiFields.classList.add("hidden");
            }
        }

        // func tambahan untuk setMaxFirstStar
        function setMaxFirstStar(selectedRank) {
            var fstarInput = document.getElementById('fstar');

            // Reset nilai dan batasan setiap kali fungsi dipanggil
            fstarInput.value = '';
            fstarInput.removeAttribute('max');


            // Tentukan batasan berdasarkan selectedRank
            if (selectedRank === 'master') {
                fstarInput.setAttribute('max', '4');
            } else if (selectedRank === 'gm' || selectedRank === 'epic' || selectedRank === 'legend') {
                fstarInput.setAttribute('max', '5');
            } else if (selectedRank === 'mythic') {
                fstarInput.setAttribute('max', '24');
            } else if (selectedRank === 'honor') {
                fstarInput.setAttribute('min', '25');
                fstarInput.setAttribute('max', '49');
            } else if (selectedRank === 'glory') {
                fstarInput.setAttribute('min', '50');
                fstarInput.setAttribute('max', '99');
            } else if (selectedRank === 'immortal') {
                fstarInput.setAttribute('min', '100');
                fstarInput.setAttribute('max', '300');
            }
        }

        function setMaxLastStar(selectedRank2) {
            var lstarInput = document.getElementById('lstar');
            lstarInput.value = '';
            lstarInput.removeAttribute('max');

            if (selectedRank2 === 'master') {
                lstarInput.setAttribute('max', '4');
            } else if (selectedRank2 === 'gm' || selectedRank2 === 'epic' || selectedRank2 === 'legend') {
                lstarInput.setAttribute('max', '5');
            } else if (selectedRank2 === 'mythic') {
                lstarInput.setAttribute('min', '1');
                lstarInput.setAttribute('max', '24');
            } else if (selectedRank2 === 'honor') {
                lstarInput.setAttribute('min', '25');
                lstarInput.setAttribute('max', '49');
            } else if (selectedRank2 === 'glory') {
                lstarInput.setAttribute('min', '50');
                lstarInput.setAttribute('max', '99');
            } else if (selectedRank2 === 'immortal') {
                lstarInput.setAttribute('min', '100');
                lstarInput.setAttribute('max', '500');
            }

        }
    </script>

</body>

</html>



<?php
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
    if (isset($_POST['order'])) {
        //  Awal Tangkap nilai-nilai dari form
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

        if ($frankPriority > $lrankPriority) {                         // Perbandingan rank awal dan rank pemesanan
            echo "Rank tujuan tidak boleh lebih kecil dari Rank awal";
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
                        $rank4 = $rank[4];
                        $cmythic = 1;
                        $fstar = 0;
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
                    if ($fstar > 50) {
                        if ($lstar < 100) {
                            $alls = $alls + ($lstar - $fstar) * $harga['glory'];
                        } else {
                            $alls = $alls + (100 - $fstar) * $harga['glory'];
                        }
                    } else {
                        if ($lstar < 100) {
                            $alls = $alls + ($lstar - 50) * $harga['glory'];
                        } else {
                            $alls = $alls + (100 - 50) * $harga['glory'];
                        }
                    }
                }
                 if ($lstar > 25) {
                    if ($fstar > 25) {
                        if ($lstar < 50) {
                            $alls = $alls + ($lstar - $fstar) * $harga['honor'];
                        } else {
                            $alls = $alls + (50 - $fstar) * $harga['honor'];
                        }
                    } else {
                        if ($lstar < 50) {
                            $alls = $alls + ($lstar - 25) * $harga['honor'];
                        } else {
                            $alls = $alls + (50 - 25) * $harga['honor'];
                        }
                    }
                }
                if($lstar > 0) {
                    if ($lstar < 25) {
                        $alls = $alls + ($lstar - $fstar) * $harga['mythic'];
                    } else {
                        $alls = $alls + (25 - $fstar) * $harga['mythic'];
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

       
            // Total Harga Keseluruhan
            $rilhato = $hato + $hato2 + $all + $alls + $hato3;
            print_r($rilhato);
        }
    }
}


?>