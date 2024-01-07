<?php include 'header.php'; 
$idlokasi = $_GET["id"];
$ambil = $koneksi->query("SELECT*FROM lokasi WHERE idlokasi='$idlokasi'");
$detail = $ambil->fetch_assoc();
$ambilfoto = $koneksi->query("SELECT * FROM lokasifoto WHERE idproduk='$detail[idlokasi]'");
$foto = $ambilfoto;


?>
<main>

	<div class="slider-area slider-height" data-background="assets_home/assets/img/hero/h1_hero.jpg">
		<div class="slider-active">
			<div class="single-slider">
				<div class="slider-cap-wrapper">
					<div class="hero__caption">
						<p>Selamat Datang</p>
						<h2 style="font-size: 50px;"><b>Website <br> Penyewaan Rumah Susun <?php echo $detail["namalokasi"] ?></b></h2>
						<?php
						if (!isset($_SESSION["pengguna"])) {
						?>
							<a href="login.php" class="btn hero-btn">Login</a>
						<?php } ?>
					</div>
					<div class="hero__img">
					<?php
								$no = 1;
								$ambilfoto = $koneksi->query("SELECT * FROM lokasifoto where idlokasi='$detail[idlokasi]'");
								while ($foto = $ambilfoto->fetch_assoc()) {
									if ($no == '1') {
										$aktif = "active";
									} else {
										$aktif = "";
									}
								?>
									<div class="carousel-item <?= $aktif ?>">
										<img class="d-block w-100" src="foto/<?php echo $foto["foto"]; ?>" height="700px" style="border-radius: 25px">
									</div>
								<?php
									$no++;
								}
								?>
					</div>
				</div>
		</div>

	</div>
	<div class="about-low-area section-padding2">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="about-caption mb-50">
						<div class="section-tittle mb-35">
							<span>Tentang Kami</span>
							<h2>Tentang Kami</h2>
							<p><?php echo $detail["deskripsi"] ?></p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="about-img ">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php
								$no = 1;
								$ambilfoto = $koneksi->query("SELECT * FROM lokasifoto where idlokasi='$detail[idlokasi]'");
								while ($foto = $ambilfoto->fetch_assoc()) {
									if ($no == '1') {
										$aktif = "active";
									} else {
										$aktif = "";
									}
								?>
									<div class="carousel-item <?= $aktif ?>">
										<img class="d-block w-100" src="foto/<?php echo $foto["foto"]; ?>" height="700px" style="border-radius: 25px">
									</div>
								<?php
									$no++;
								}
								?>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
include 'footer.php';
?>