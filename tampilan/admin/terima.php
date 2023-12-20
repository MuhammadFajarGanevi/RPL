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
        $status = "pending";
        $query = "UPDATE orders SET status = '$status' WHERE id_order = $id_order";
        $result = mysqli_query($conn, $query);
        echo "<script>alert('Data berhasil diperbarui'); window.location.href='indexAdmin.php';</script>';</script>";
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