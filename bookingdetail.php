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
?>

<main>
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Detail Booking</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section">
        <div class="container">
            <?php
            $ambil = $koneksi->query("SELECT*FROM booking JOIN pengguna
		ON booking.idpengguna=pengguna.idpengguna
		WHERE booking.idbooking='$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            ?>
            <br>
            <div class="card mb-5">
                <div class="card-header bg-primary text-white">
                    Form Pendaftaran Booking
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td><strong>Nama Lengkap</strong></td>
                                <td><?php echo $detail['nama']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td><?php echo $detail['email']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>No. KTP/SIM/PASPOR</strong></td>
                                <td>
                                    <?php echo $detail['noktp']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Telepon</strong></td>
                                <td><?php echo $detail['telepon']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Alamat</strong></td>
                                <td><?php echo $detail['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Booking</strong></td>
                                <td><?= tanggal(date('Y-m-d', strtotime($detail['tanggalbooking']))) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Janji Temu</strong></td>
                                <td><?= tanggal($detail['janjitemu']) . ' Jam ' . date('H:i', strtotime($detail['janjitemu'])) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Catatan</strong></td>
                                <td><?php echo $detail['catatan']; ?></td>
                            </tr>
                            <tr>
                                <th><strong>Total Harga</strong></th>
                                <th><?= rupiah($detail['harga']) ?></th>
                            </tr>
                            <tr>
                                <th><strong>Status</strong></th>
                                <th><?php echo $detail['status']; ?></th>
                            </tr>
                            <?php
                            if ($detail['lampiran'] != "") { ?>
                                <tr>
                                    <td><strong>Lampiran</strong></td>
                                    <td><a href="admin/lampiran_booking/<?php echo $detail['lampiran']; ?>" target="_blank" class="btn btn-success">Download</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
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
                            <td><?php echo $rowdata['namaproduk']; ?> x <?= $rowdata['jumlahbulan'] ?> Bulan</td>
                            <td>Rp. <?php echo number_format($rowdata['hargaproduk'] * $rowdata['jumlahbulan']); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
            <br>
            <?php
            $ambil = $koneksi->query("SELECT*FROM pembayaranbooking WHERE idbooking='$_GET[id]'");
            $pembayaran = $ambil->fetch_assoc();
            if ($pembayaran['bukti'] != '') { ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Bukti Pembayaran</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="foto/bukti_booking/<?php echo $pembayaran['bukti'] ?>" width="100%" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php
            $ambil = $koneksi->query("SELECT*FROM pembayaranbooking WHERE idbooking='$_GET[id]'");
            $ktp = $ambil->fetch_assoc();
            if ($ktp['ktp'] != '') { ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Bukti ktp</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="foto/ktp/<?php echo $ktp['ktp'] ?>" width="100%" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php
            $ambil = $koneksi->query("SELECT*FROM pembayaranbooking WHERE idbooking='$_GET[id]'");
            $kk = $ambil->fetch_assoc();
            if ($kk['kk'] != '') { ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Bukti kk</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="foto/kk/<?php echo $kk['kk'] ?>" width="100%" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php
            $ambil = $koneksi->query("SELECT*FROM pembayaranbooking WHERE idbooking='$_GET[id]'");
            $bn = $ambil->fetch_assoc();
            if ($bn['bn'] != '') { ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Buku Nikah</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="foto/bn/<?php echo $bn['bn'] ?>" width="100%" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</main>
<?php
include 'footer.php';
?>