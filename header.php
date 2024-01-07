<?php
session_start();
include 'koneksi.php';
$datakategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
  $datakategori[] = $tiap;
}
$datalokasi = array();
$ambil = $koneksi->query("SELECT * FROM lokasi");
while ($tiap = $ambil->fetch_assoc()) {
  $datalokasi[] = $tiap;
}
function rupiah($angka)
{
  $hasilrupiah = "Rp " . number_format($angka, 2, ',', '.');
  return $hasilrupiah;
}
function tanggal($tgl)
{
  $tanggal = substr($tgl, 8, 2);
  $bulan = getBulan(substr($tgl, 5, 2));
  $tahun = substr($tgl, 0, 4);
  return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function getBulan($bln)
{
  switch ($bln) {
    case 1:
      return "Januari";
      break;
    case 2:
      return "Februari";
      break;
    case 3:
      return "Maret";
      break;
    case 4:
      return "April";
      break;
    case 5:
      return "Mei";
      break;
    case 6:
      return "Juni";
      break;
    case 7:
      return "Juli";
      break;
    case 8:
      return "Agustus";
      break;
    case 9:
      return "September";
      break;
    case 10:
      return "Oktober";
      break;
    case 11:
      return "November";
      break;
    case 12:
      return "Desember";
      break;
  }
}
$id = $_SESSION["pengguna"]["idpengguna"];
$ambil = $koneksi->query("SELECT *FROM pengguna WHERE idpengguna='$id'");
$rowdata = $ambil->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" type="image/x-icon" href="foto/logo.png">
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Si-Rusun</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <!-- 
        RTL version
    -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets_home/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets_home/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets_home/assets/css/slicknav.css">
  <link rel="stylesheet" href="assets_home/assets/css/flaticon.css">
  <link rel="stylesheet" href="assets_home/assets/css/animate.min.css">
  <link rel="stylesheet" href="assets_home/assets/css/magnific-popup.css">
  <link rel="stylesheet" href="assets_home/assets/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="assets_home/assets/css/themify-icons.css">
  <link rel="stylesheet" href="assets_home/assets/css/slick.css">
  <link rel="stylesheet" href="assets_home/assets/css/nice-select.css">
  <link rel="stylesheet" href="assets_home/assets/css/style.css">
  <link rel="stylesheet" href="admin/assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
  <style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<!--
    
TemplateMo 562 Space Dynamic

https://templatemo.com/tm-562-space-dynamic

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="#" class="logo">
              <h4>Si<span>Rusun</span></h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="index.php">Home</a></li>
              <!-- <li class="scroll-to-section"><a href="index.php#about">About Us</a></li> -->
              <li class="submenu"><a href="rusun.php">Lantai</a>
                        <ul >
                          <?php foreach ($datakategori as $key => $value) : ?>
                            <li><a href="kategori.php?id=<?php echo $value["idkategori"] ?>">Lantai <?php echo $value["namakategori"] ?></a></li>
                          <?php endforeach ?>
                        </ul>
                      </li>
              <li class="submenu"><a href="rusun.php">Lokasi</a>
                        <ul >
                          <?php foreach ($datalokasi as $key => $value) : ?>
                            <li><a href="lokasi.php?id=<?php echo $value["idlokasi"] ?>">Lokasi <?php echo $value["namalokasi"] ?></a></li>
                          <?php endforeach ?>
                        </ul>
                      </li>
                      
              <li class="scroll-to-section"><a href="rusun.php">Rusun</a></li>
              <?php
                      include 'koneksi.php';
                      if (isset($_SESSION["pengguna"])) { ?>
                      
                        <li class="submenu"><a href="#"><?php echo $rowdata['nama']; ?></a>
                          <ul class="submenu">
                            <li><a href="akun.php">Akun</a></li>
                            <li><a href="riwayatbooking.php">Riwayat Booking</a></li>
                            <li><a href="logout.php">Logout</a></li>
                          </ul>
                        </li>
                      <?php } else {  ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="daftar.php">Daftar</a></li>
                      <?php } ?>
              <li class="scroll-to-section"><div class="main-red-button"><a href="index.php#contact">Contact Now</a></div></li> 
            </ul>    
			    
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
			
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
  <script>error_reporting(0);
ini_set('display_errors', 0);
</script>