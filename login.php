<?php include 'header.php'; ?>
<main>
	<div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center ">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="hero-cap text-center pt-50">
						<h2>Login</h2>
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
									<label>Email</label>
									<input type="email" name="email" class="form-control">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" name="password">
								</div>
							</div>

						</div>
						<div class="form-group mt-3">
							<button type="submit" name="simpan" class="button button-contactForm boxed-btn btn-block">Masuk</button>
						</div>
					</form>
				</div>
				<div class="col-lg-3 offset-lg-1">
					<img width="100%" src="foto/daftar.png">
				</div>
			</div>
		</div>
	</section>
</main>
<?php
if (isset($_POST["simpan"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];
	$ambil = $koneksi->query("SELECT * FROM pengguna
		WHERE email='$email' AND password='$password' limit 1");
	$akunyangcocok = $ambil->num_rows;
	if ($akunyangcocok == 1) {
		$akun = $ambil->fetch_assoc();
		$_SESSION["pengguna"] = $akun;
		echo "<script>alertify.success('Success notification message.');</script>";
		echo "<script> location ='index.php';</script>";
	} else {
		echo "<script>  alertify.success('Success notification message.'); </script>";
		echo "<script> location ='login.php';</script>";
	}
}
?>
<script>
	function confirmationHapusData(url) {
  Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Your work has been saved',
  showConfirmButton: false,
  timer: 1500
})
  </script>
<?php
include 'footer.php';
?>