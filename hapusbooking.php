<?php
session_start();

// Pastikan ada parameter idproduk pada URL
if (isset($_GET['idproduk']) && !empty($_GET['idproduk'])) {
    $idproduk = $_GET['idproduk'];

    // Hapus item dengan idproduk dari sesi "booking"
    if (isset($_SESSION["booking"][$idproduk])) {
        unset($_SESSION["booking"][$idproduk]);
    }
}

// Alihkan kembali ke halaman sebelumnya atau halaman lain yang diinginkan
header("Location: booking.php");
exit();
