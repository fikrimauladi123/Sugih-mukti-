<?php include 'header.php'; ?>

<?php
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT*FROM pemesanandp WHERE idpemesanan='$idpem'");
$detpem = $ambil->fetch_assoc();

$id_beli = $detpem["idpengguna"];
$id_login = $_SESSION["pengguna"]["idpengguna"];
if ($id_login !== $id_beli) {
    echo "<script> alert('Gagal');</script>";
    echo "<script> location ='riwayatdp.php';</script>";
}
$deadline = date('Y-m-d H:i', strtotime($detpem['waktu'] . ' +14 day'));
$harideadline = date('Y-m-d', strtotime($detpem['waktu'] . ' +14 day'));
$jamdeadline = date('H:i', strtotime($detpem['waktu'] . ' +14 day'));
if (date('Y-m-d H:i') >= $deadline) {
    echo "<script> alert('Waktu pembayaran telah habis');</script>";
    echo "<script> location ='riwayatdp.php';</script>";
}
?>

<main>
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Pembayaran</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section">
        <div class="container mt-4">
            <?php
            $ambil = $koneksi->query("SELECT*FROM pemesanandp JOIN pengguna
		ON pemesanandp.idpengguna=pengguna.idpengguna
		WHERE pemesanandp.idpemesanan='$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            ?>
            <h4 class="text-danger">Upload Bukti Pembayaran DP Sebelum <?= tanggal($harideadline) . ' - Jam ' . $jamdeadline ?></h4>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Status : <?php echo $detail['status']; ?><br>
                </div>
                <div class="col-md-6">
                    <strong>NAMA : <?php echo $detail['nama']; ?></strong><br>
                    Telepon : <?php echo $detail['telepon']; ?><br>
                    Email : <?php echo $detail['email']; ?>
                </div>
            </div>
            <br>
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Perumahan</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM pemesanandpdetail WHERE idpemesanan='$_GET[id]'"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['namaproduk']; ?></td>
                            <td>Rp. <?php echo number_format($pecah['hargaproduk']); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
            <div class="row justify-content-center mb-5 mt-5">
                <div class="col-md-5">
                    <img width="100%" src="foto/bayar.webp">
                </div>
                <div class="col-md-7">
                    <p>Kirim Bukti Pembayaran</p>
                    <b>No Rek 1 : 5220304312 (PT CAM, Atas Nama : PT CAM)</b>
                    <br>
                    <b>No Rek 2 : 156000986789 (PT CAM, Atas Nama : PT CAM)</b>
                    <br>
                    <b>No Rek 3 : 027905890 (PT CAM, Atas Nama : PT CAM)</b>
                    <br> <br>
                    <div class="alert alert-info">Minimal DP : <strong>Rp. <?php echo number_format($detpem["harga"] * 0.3) ?> <br></div>

                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Rekening</label>
                            <input type="text" name="nama" class="form-control" value="<?= $_SESSION['pengguna']['nama'] ?>" required>

                        </div>
                        <div class="form-group">
                            <label>Tanggal Transfer</label>
                            <input type="date" name="tanggaltransfer" class="form-control" value="<?= date('Y-m-d') ?>" required>

                        </div>
                        <div class="form-group">
                            <label>Foto Bukti</label>
                            <input type="file" name="bukti" class="form-control" required>
                        </div>
                        <button class="btn btn-primary float-right" name="kirim">Kirim </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
if (isset($_POST["kirim"])) {
    $namabukti = $_FILES["bukti"]["name"];
    $lokasibukti = $_FILES["bukti"]["tmp_name"];
    $namafix = date("YmdHis") . $namabukti;
    move_uploaded_file($lokasibukti, "foto/bukti/$namafix");

    $nama = $_POST["nama"];
    $tanggaltransfer = $_POST["tanggaltransfer"];
    $tanggal = date("Y-m-d");


    $koneksi->query("INSERT INTO pembayaran(idpemesanan, nama, tanggaltransfer,tanggal, bukti)
		VALUES ('$idpem','$nama','$tanggaltransfer','$tanggal','$namafix')");

    $koneksi->query("UPDATE pemesanandp SET status='Sudah Upload Bukti Pembayaran'
		WHERE idpemesanan='$idpem'");
    echo "<script> alert('Terima kasih');</script>";
    echo "<script>location='riwayatdp.php';</script>";
}
?>
<?php
include 'footer.php';
?>