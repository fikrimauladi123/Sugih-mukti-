<?php include 'header.php'; ?>
<main>
	<div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center ">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="hero-cap text-center pt-50">
						<h2>Daftar</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="contact-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<form class="form-contact contact_form" method="post">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>Alamat</label>
									<textarea class="form-control " name="alamat" required></textarea>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>Telepon</label>
									<input type="number" name="telepon" class="form-control">
								</div>
							</div>
							

						</div>
						<div class="form-group mt-3">
							<button type="submit" name="daftar" class="button button-contactForm boxed-btn btn-block">Simpan</button>
						</div>
					</form>
				</div>
				<div class="col-lg-3 offset-lg-1">
					<img width="100%" style="height:500px;object-fit:cover" src="foto/daftar.png">
				</div>
			</div>
		</div>
	</section>
</main>
<?php
if (isset($_POST["daftar"])) {
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];
	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	$ambil = $koneksi->query("SELECT*FROM pengguna 
							WHERE email='$email'");
	$yangcocok = $ambil->num_rows;
	if ($yangcocok == 1) {
		echo "<script>alert('Pendaftaran Gagal, email sudah terdaftar')</script>";
		echo "<script>location='daftar.php';</script>";
	} else {
		$koneksi->query("INSERT INTO pengguna (nama, email,  password, alamat, telepon)
								VALUES('$nama','$email','$password','$alamat','$telepon'
								)");
		echo "<script>alert('Pendaftaran Berhasil')</script>";
		echo "<script>location='login.php';</script>";
		foreach ($namafoto as $key => $tiap_nama) {
			$tiap_ktp = $ktpfoto[$key];
	
			move_uploaded_file($tiap_ktp, "../foto/" . $tiap_nama);
	
			$koneksi->query("INSERT INTO penggunafoto (idpengguna, foto)
				VALUES('$idpengguna','$tiap_nama')")  or die(mysqli_error($koneksi));
		}
	}
}
?>
<script src="../js/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$(".btn-tambah").on("click", function() {
			$(".letak-input").append("<input type='file' class='form-control mt-3' name='foto[]'>");
		})
	})
</script>
<?php
include 'footer.php';
?>