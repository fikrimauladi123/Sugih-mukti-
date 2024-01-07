<?php include 'header.php'; ?>
<?php
$idproduk = $_GET["id"];
$ambil = $koneksi->query("SELECT*FROM produk WHERE idproduk='$idproduk'");
$detail = $ambil->fetch_assoc();
$ambilfoto = $koneksi->query("SELECT * FROM produkfoto WHERE idproduk='$detail[idproduk]' limit 1");
$foto = $ambilfoto->fetch_assoc();
?>
<main>
	<div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="hero-cap text-center pt-50">
						<h2>Detail</h2>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="blog_area single-post-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 posts-list">
					<div class="single-post">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php
								$no = 1;
								$ambilfoto = $koneksi->query("SELECT * FROM produkfoto where idproduk='$detail[idproduk]'");
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
					<div class="blog_details">
						<h2><?php echo $detail["namaproduk"] ?>
						</h2>
						<ul class="blog-info-link mt-3 mb-4">
							<li><a href="#">Tipe rusun : <?php echo $detail["tiperusun"]; ?></a></li>
							<li><a href="#"> Harga : Rp. <?php echo number_format($detail["hargaproduk"]); ?></a></li>
						</ul>
						<p class="excert">
							<?php echo $detail["deskripsiproduk"]; ?>
						</p>
						<center>
							<p>
								<?php echo $detail["alamatrumah"]; ?>
							</p>
						</center>
						<center>
							<p>
								<iframe  width="560" height="315" " src="https://www.youtube.com/embed/<?php echo $detail["vidio"]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</p>
						</center>
					</div>
				</div>
			</div>
			<br>
			<form action="" method="POST">
				<button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" name="booking" type="submit">Booking</button>
			</form>
		</div>
		</div>
		</div>
	</section>
</main>
<?php
include 'footer.php';
?>
<?php
if (isset($_POST["booking"])) {
	if (!isset($_SESSION["pengguna"])) {
		echo "<script> alert('Harap login terlebih dahulu');</script>";
		echo "<script> location ='index.php';</script>";
	}
	$_SESSION["booking"][$idproduk] = true;
	echo "<script> location ='booking.php';</script>";
}
?>
<script type='text/javascript'>
	<?php if (!empty($_GET['skrol'])) { ?>
		$('html, body').animate({
			scrollTop: $('#open_here').offset().top
		}, 'slow');
	<?php } ?>
</script>