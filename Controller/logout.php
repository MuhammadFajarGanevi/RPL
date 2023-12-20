<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['log']);
unset($_SESSION['role']);
session_destroy();
echo "<script>alert('ANDA BERHASIL KELUAR'); window.location.href='../';</script>";
?>