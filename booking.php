<?php include 'header.php'; ?>
<?php
if (!isset($_SESSION["pengguna"])) {
    echo "<script> alert('Harap login terlebih dahulu');</script>";
    echo "<script> location ='index.php';</script>";
}
?>
<main>
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Booking</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead class="bg-primary text-white">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kamar</th>
                                <th>Tipe</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            $hargaproduk = 0;
                            if (!empty($_SESSION["booking"])) {
                                foreach ($_SESSION["booking"] as $idproduk => $value) {
                                    $ambil = $koneksi->query("SELECT*FROM produk WHERE idproduk='$idproduk'");
                                    $rowdata = $ambil->fetch_assoc();
                                    $harga = $rowdata['hargaproduk'];
                            ?>
                                    <tr>
                                        <td><?= $nomor; ?></td>
                                        <td><?= $rowdata['namaproduk'] ?></td>
                                        <td><?= $rowdata['tiperusun'] ?></td>
                                        <td>Rp <?= number_format($rowdata['hargaproduk']) ?></td>
                                        <td>
                                            <a href="hapusbooking.php?idproduk=<?= $idproduk ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php
                                    $nomor++;
                                    $hargaproduk += $harga;
                                }
                            } else { ?>
                                <td colspan="5" align="center">Tidak Ada Data</td>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-section">
        <div class="container">
            <div class="section-tittle text-center mb-70">
                <h2>Form Peryaratan</h2>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-contact contact_form" method="post">
                        <div class="row">
                            <input type="hidden" value="<?= $hargaproduk ?>" class="form-control" name="harga">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" readonly value="<?php echo $_SESSION["pengguna"]['nama'] ?>" class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" readonly value="<?php echo $_SESSION["pengguna"]['email'] ?>" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>No. KTP/SIM/PASPOR</label>
                                    <input type="text" value="" class="form-control" name="noktp">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea type="text" class="form-control" name="alamat"><?php echo $_SESSION["pengguna"]['alamat'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>No. Handphone</label>
                                    <input type="text" readonly value="<?php echo $_SESSION["pengguna"]['telepon'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <div class="form-group">
                                    <label>Janji Temu</label>
                                    <input type="datetime-local" value="" class="form-control" name="janjitemu">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <label>Lama Sewa</label>
                                <div class="form-group">
                                    <input type="number" name="jumlahbulan" value="1" min="1" max="100" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <?php if (!empty($_SESSION["booking"])) { ?>
                                <button type="submit" name="booking" class="button button-contactForm boxed-btn btn-block">Selesaikan Booking</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
if (isset($_POST["booking"])) {
    $notransaksi = '#INV-' . date("Ymdhis");
    $id = $_SESSION["pengguna"]["idpengguna"];
    $tanggalbooking = date("Y-m-d");
    $waktu = date("Y-m-d H:i:s");
    $noktp = $_POST['noktp'];
    $alamat = $_POST['alamat'];
    $inputjanji = $_POST['janjitemu'];
    $jumlahbulan = $_POST['jumlahbulan'];
    $harga = $_POST['harga'] * $jumlahbulan;
    $janjitemu = date('Y-m-d H:i:s', strtotime($inputjanji));
    $keterangan = $_POST['keterangan'];
    $koneksi->query(
        "INSERT INTO booking(notransaksi,
				idpengguna, tanggalbooking, harga, janjitemu, noktp, alamat, status, waktu)
				VALUES('$notransaksi','$id', '$tanggalbooking','$harga','$janjitemu','$noktp','$alamat', 'Belum Bayar', '$waktu')"
    ) or die(mysqli_error($koneksi));
    $idbooking_barusan = $koneksi->insert_id;
    foreach ($_SESSION["booking"] as $idproduk => $value) {
        $ambil = $koneksi->query("SELECT*FROM produk WHERE idproduk='$idproduk'");
        $rowdata = $ambil->fetch_assoc();
        $nama = $rowdata['namaproduk'];
        $harga = $rowdata['hargaproduk'];

        $koneksi->query("INSERT INTO bookingdetail (idbooking, idproduk, namaproduk, hargaproduk,jumlahbulan)
					VALUES ('$idbooking_barusan','$idproduk', '$nama','$harga','$jumlahbulan')") or die(mysqli_error($koneksi));
    }
    unset($_SESSION["booking"]);
    echo "<script> alert('Booking Sukses');</script>";
    echo "<script> location ='riwayatbooking.php';</script>";
}
?>

<?php
include 'footer.php';
?>