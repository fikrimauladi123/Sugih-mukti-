<?php include 'header.php'; ?>
<?php
if (!isset($_SESSION["pengguna"])) {
    echo "<script> alert('Harap login terlebih dahulu');</script>";
    echo "<script> location ='login.php';</script>";
}
$id = $_SESSION["pengguna"]["idpengguna"];
$ambil = $koneksi->query("SELECT *FROM pengguna WHERE idpengguna='$id'");
$rowdata = $ambil->fetch_assoc(); ?>
<main>
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Akun</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-contact contact_form" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input value="<?php echo $rowdata['nama']; ?>" type="text" value="" class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input value="<?php echo $rowdata['email']; ?>" type="email" class="form-control" name="email">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea value="<?php echo $rowdata['alamat']; ?>" class="form-control" name="alamat" id="alamat" rows="5"><?php echo $rowdata['alamat']; ?></textarea>
                                    <script>
                                        CKEDITOR.replace('alamat');
                                    </script>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input value="<?php echo $rowdata['telepon']; ?>" type="number" class="form-control" name="telepon">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password">
                                    <input type="hidden" class="form-control" name="passwordlama" value="<?php echo $rowdata['password']; ?>">
                                    <span class="text-danger">Kosongkan Password jika tidak ingin mengganti</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" name="ubah" class="button button-contactForm boxed-btn btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
if (isset($_POST['ubah'])) {
    if ($_POST['password'] == "") {
        $password = $_POST['passwordlama'];
    } else {
        $password = $_POST['password'];
    }

    $koneksi->query("UPDATE pengguna SET password='$password',nama='$_POST[nama]', email='$_POST[email]',telepon='$_POST[telepon]', alamat='$_POST[alamat]' WHERE idpengguna='$id'") or die(mysqli_error($koneksi));
    echo "<script>alert('Profil Berhasil Di Ubah');</script>";
    echo "<script>location='akun.php';</script>";
}
include 'footer.php';
?>