<?php


include "../../Controller/connect.php";

session_start();
$id_account = $_SESSION['id_account'];
// Cek apakah ada data yang dikirim melalui metode GET
if (isset($_GET['id_order'])) {
    $id_order = $_GET['id_order'];

    // Mengambil data user_parkir berdasarkan ID
    $query = "SELECT * FROM orders WHERE id_order = $id_order";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $status = "completed";
        $query = "UPDATE orders SET status = '$status', id_booster = '$id_account' WHERE id_order = $id_order";
        $result = mysqli_query($conn, $query);


        $id_account1 = $row['id_account'];
        $id_booster1 = $row['id_booster'];

        $waktu_pesan1 = $row['waktu_pesan'];
        $format_waktu = 'Y-m-d H:i:s'; // Sesuaikan format waktu sesuai kebutuhan

        // Convert $waktu_pesan1 to a Unix timestamp
        $timestamp = strtotime($waktu_pesan1);

        // Format the timestamp using date()
        $waktu_pesan2 = date($format_waktu, $timestamp);


        $waktu_akhir1 = date('Y-m-d H:i:s');
        $rank_awal1 = $row['rank_awal'];
        $rank_akhir1 = $row['rank_akhir'];
        $harga1 = $row['harga'];
        $status1 = 'completed';

        // Memindahkan data ke tabel history
        $queryDone = "INSERT INTO history (id_order, id_booster, id_account, waktu_selesai, waktu_pesan, rank_awal, rank_akhir, harga, status ) 
        VALUES('$id_order', '$id_booster1', '$id_account1', '$waktu_akhir1', '$waktu_pesan2' ,'$rank_awal1', '$rank_akhir1', '$harga1', '$status1')";
        $resultDone = mysqli_query($conn, $queryDone);

        if ($resultDone) {
            $queryDelete = "DELETE  FROM orders WHERE id_order = $id_order";
            $resultDelete = mysqli_query($conn, $queryDelete);
        }
        echo "<script>alert('Data berhasil diperbarui'); window.location.href='historyUser.php';</script>';</script>";
    } else {
        // Jika tidak ada pengguna dengan ID yang sesuai
        echo "Data pengguna tidak ditemukan.";
    }

    mysqli_close($conn);
} else {
    // Jika tidak ada parameter ID yang diberikan
    echo "Parameter ID tidak ditemukan.";
}
?>