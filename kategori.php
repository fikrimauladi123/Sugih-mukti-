<?php
include 'header.php';
$kategori = $_GET["id"];
include 'koneksi.php';
if (!empty($_POST['keyword'])) {
	$keyword = $_POST['keyword'];
} else {
	$keyword = "";
}

$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE (namaproduk LIKE '%$keyword%' OR hargaproduk LIKE '%$keyword%') AND idkategori = $kategori and statusproduk = 'Tersedia'");
while ($rowdata = $ambil->fetch_assoc()) {
	$semuadata[] = $rowdata;
}

$datakategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
	$datakategori[] = $tiap;
}

$am = $koneksi->query("SELECT * FROM kategori WHERE idkategori='$kategori'");
$pe = $am->fetch_assoc();
?>

<main>
	<div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center ">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="hero-cap text-center pt-50">
						<h2>Kamar <?php echo $pe["namakategori"] ?></h2>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Team Area Start -->
	<div class="team-area section-padding30">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md-12">
					<form method="post">
						<div class="row">
							<div class="col-md-9 my-auto">
								<div class="form-group">
									<input type="text" name="keyword" value="<?= $keyword ?>" placeholder="Masukkan kata pencarian" class="form-control">
								</div>
							</div>
							<div class="col-md-3">
								<button type="submit" name="cari" value="cari" class="btn btn-primary btn-block">Cari</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="cl-xl-7 col-lg-8 col-md-10">
					<div class="section-tittle text-center mb-70">
						<h2>Kamar <?php echo $pe["namakategori"] ?></h2>
						<?php if (empty($semuadata)) : ?>
							<div class="alert alert-danger">Produk <strong><?php echo $pe["namakategori"] ?></strong> Kosong</div>
						<?php endif ?>
					</div>
				</div>
			</div>
			<div class="row">
				<?php foreach ($semuadata as $key => $produk) :
					$ambilfoto = $koneksi->query("SELECT * FROM produkfoto WHERE idproduk='$produk[idproduk]' limit 1");
					$foto = $ambilfoto->fetch_assoc();
				?>
					<div class="col-lg-6 col-md-4 col-sm-6">
						<div class="single-team mb-30">
							<div class="team-img">
								<img style="height: 400px; object-fit: cover" width="100%" src="foto/<?php echo $foto['foto'] ?>" alt="">
								<div class="team-social">
									<li><a href="detail.php?id=<?php echo $produk['idproduk']; ?>"><i class="fa fa-eye"></i></a></li>
								</div>
							</div>
							<div class="team-caption">
								<h3 class="mt-3"><a href="detail.php?id=<?php echo $produk['idproduk']; ?>"><?php echo $produk['namaproduk'] ?></a></h3>
								<p>Tipe: <?= $produk['tiperusun'] ?></p>
								<p>Rp <?php echo number_format($produk['hargaproduk']) ?></p>
								<b><?= $produk['statusproduk'] ?></b>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</main>

<?php
include 'footer.php';
?>