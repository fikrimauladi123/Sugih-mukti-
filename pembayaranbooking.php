<?php include 'header.php'; ?>

<?php
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT*FROM booking WHERE idbooking='$idpem'");
$detpem = $ambil->fetch_assoc();

$id_beli = $detpem["idpengguna"];
$id_login = $_SESSION["pengguna"]["idpengguna"];
if ($id_login !== $id_beli) {
    echo "<script> alert('Gagal');</script>";
    echo "<script> location ='riwayatdp.php';</script>";
}
$deadline = date('Y-m-d H:i', strtotime($detpem['waktu'] . ' +1 day'));
$harideadline = date('Y-m-d', strtotime($detpem['waktu'] . ' +1 day'));
$jamdeadline = date('H:i', strtotime($detpem['waktu'] . ' +1 day'));
if (date('Y-m-d H:i') >= $deadline) {
    echo "<script> alert('Waktu pembayaran telah habis');</script>";
    echo "<script> location ='riwayatbooking.php';</script>";
}
?>

<main>
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Pembayaran Booking</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section">
        <div class="container mt-4">
            <?php
            $ambil = $koneksi->query("SELECT*FROM booking JOIN pengguna
		ON booking.idpengguna=pengguna.idpengguna
		WHERE booking.idbooking='$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            ?>
            <h4 class="text-danger">Upload Bukti Pembayaran Booking Sebelum <?= tanggal($harideadline) . ' - Jam ' . $jamdeadline ?></h4>
            <br>
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Rusun</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM bookingdetail WHERE idbooking='$_GET[id]'"); ?>
                    <?php while ($rowdata = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $rowdata['namaproduk']; ?> x <?= $rowdata['jumlahbulan'] ?> Tahun</td>
                            <td>Rp. <?php echo number_format($rowdata['hargaproduk'] * $rowdata['jumlahbulan']); ?></td>
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
                    <b>Nomor Rekening : 0097015465101 (Bank BJB Atas Nama : Medi Abdurahman)</b>

                    <br> <br>
                    <div class="alert alert-info">Total Tagihan : <strong><?php echo rupiah($detail['harga']) ?> <br></div>

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
                            <label>Foto Bukti <small><strong>*Wajib</small></label>
                            <input type="file" name="bukti" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Foto KTP <small><strong>*Wajib</small></label>
                            <input type="file" name="ktp" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Foto KK <small><strong>*Wajib</small></label>
                            <input type="file" name="kk" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Foto Buku Nikah<span><small> (Kosongkan jika lajang)</small></label>
                            <input type="file" name="bn" class="form-control" placeholder="Jika Sudah Menikah Isi">
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
    move_uploaded_file($lokasibukti, "foto/bukti_booking/$namafix");
    $namaktp = $_FILES["ktp"]["name"];
    $lokasiktp = $_FILES["ktp"]["tmp_name"];
    $namaktpf = date("YmdHis") . $namaktp;
    move_uploaded_file($lokasiktp, "foto/ktp/$namaktpf");
    $namakk = $_FILES["kk"]["name"];
    $lokasikk = $_FILES["kk"]["tmp_name"];
    $namakkf = date("YmdHis") . $namakk;
    move_uploaded_file($lokasikk, "foto/kk/$namakkf");
    $namabn = $_FILES["bn"]["name"];
    $lokasibn = $_FILES["bn"]["tmp_name"];
    $namabnf = date("YmdHis") . $namakk;
    move_uploaded_file($lokasibn, "foto/bn/$namabnf");

    $nama = $_POST["nama"];
    $tanggaltransfer = $_POST["tanggaltransfer"];
    $tanggal = date("Y-m-d");


    $koneksi->query("INSERT INTO pembayaranbooking(idbooking, nama, tanggaltransfer,tanggal, bukti, ktp, kk, bn)
		VALUES ('$idpem','$nama','$tanggaltransfer','$tanggal','$namafix','$namaktpf','$namakkf','$namabnf')");

    $koneksi->query("UPDATE booking SET status='Sudah Upload Bukti Pembayaran'
		WHERE idbooking='$idpem'");
    echo "<script> alert('Terima kasih');</script>";
    echo "<script>location='riwayatbooking.php';</script>";
}
?>
<?php
include 'footer.php';
?>