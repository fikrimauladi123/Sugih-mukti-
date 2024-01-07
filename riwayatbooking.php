<?php include 'header.php'; ?>

<main>
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Riwayat Booking</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table" width="100%">
                            <thead class="bg-primary text-white">
                                <tr class="text-center">
                                    <th width="10px">No</th>
                                    <th width="15%">Daftar</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Janji Temu</th>
                                    <th>Opsi</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1;
                                $id = $_SESSION["pengguna"]['idpengguna'];
                                $ambil = $koneksi->query("SELECT *, booking.idbooking as idbookingreal FROM booking left join pembayaranbooking on booking.idbooking = pembayaranbooking.idbooking WHERE booking.idpengguna='$id' order by booking.tanggalbooking desc, booking.idbooking desc");
                                while ($rowdata = $ambil->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td>
                                            <?php $ambilproduk = $koneksi->query("SELECT * FROM bookingdetail join produk on bookingdetail.idproduk = produk.idproduk where idbooking='$rowdata[idbookingreal]'");
                                            while ($produk = $ambilproduk->fetch_assoc()) { ?>
                                                - <?= $produk['namaproduk'] ?><br><br>
                                            <?php } ?>
                                        </td>
                                        <td>Rp <?= number_format($rowdata['harga']) ?></td>


                                        <td><?php echo tanggal($rowdata['tanggalbooking']) ?></td>
                                        <td><?php echo tanggal($rowdata['janjitemu']) . '<br>Jam ' . date('H:i', strtotime($rowdata['janjitemu'])) ?></td>

                                        <td>
                                            <a class="btn btn-success m-1 text-white" href="bookingdetail.php?id=<?php echo $rowdata["idbookingreal"] ?>">Detail</a>

                                            <?php if ($rowdata['status'] == "Belum Bayar") {
                                                $deadline = date('Y-m-d H:i', strtotime($rowdata['waktu'] . ' +1 day'));
                                                $harideadline = date('Y-m-d', strtotime($rowdata['waktu'] . ' +1 day'));
                                                $jamdeadline = date('H:i', strtotime($rowdata['waktu'] . ' +1 day'));
                                                if (date('Y-m-d H:i') >= $deadline) {
                                                    echo 'Waktu pembayaran<br>telah habis';
                                                } else { ?>
                                                    <a href="pembayaranbooking.php?id=<?php echo $rowdata["idbookingreal"] ?>" class="btn btn-success m-1">Silahkan Upload Pembayaran Booking Sebelum <?= tanggal($harideadline) . ' - Pukul ' . $jamdeadline . ' W.I.B' ?></a>
                                                <?php }
                                            } elseif ($rowdata['status'] == "Sudah Upload Bukti Pembayaran") { ?>
                                                <a class="btn btn-primary m-1 text-white">Menunggu Konfirmasi Admin</a>
                                            <?php } elseif ($rowdata['status'] == "Booking Di Setujui") { ?>
                                                <a class="btn btn-primary m-1" href="#">Booking Di Setujui</a>
                                                <?php
                                                if ($rowdata['lampiran'] != "") { ?>
                                                    <a class="btn btn-primary m-1" href="admin/lampiran_booking/<?= $rowdata['lampiran'] ?>" target="_blank">Download Lampiran</a>
                                                <?php } ?>
                                            <?php } elseif ($rowdata['status'] == "Booking Di Tolak") { ?>
                                                <a class="btn btn-danger m-1 text-white">Booking Anda Di Tolak</a>
                                            <?php } elseif ($rowdata['status'] == "Selesai") { ?>
                                                <a class="btn btn-success m-1 text-white">Selesai</a>
                                                <?php
                                                if ($rowdata['lampiran'] != "") { ?>
                                                    <a class="btn btn-primary m-1" href="admin/lampiran_booking/<?= $rowdata['lampiran'] ?>" target="_blank">Download Lampiran</a>
                                                <?php } ?>
                                            <?php } ?>
                                            <br>
                                            <br>
                                        </td>
                                        <td><img width="100px" src="foto/bukti_booking/<?= $rowdata['bukti'] ?>" alt=""></td>
                                        <td><?= $rowdata['catatan'] ?></td>
                                    </tr>
                                    <?php $nomor++; ?>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</main>

<?php
include 'footer.php';
?>