<?php
include 'header.php';
?> <!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

<!-- 
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />
<style>
  .left-image {
    text-align: center;
    /* Mengatur teks agar berada di tengah gambar */
  }

  .left-image img {
    display: block;
    /* Membuat gambar agar berada di tengah */
    margin: 0 auto;
    /* Mengatur gambar agar berada di tengah horizontal */
  }

  .left-image h5 {
    margin-top: 10px;
    /* Mengatur jarak atas teks dengan gambar */
  }

  .main-banner {
    padding: 100px 0px 0px 0px !important;
  }

  .about-us {
    padding: 95px 0px 109px 0px !important;
  }

  .our-portfolio {
    padding-top: 60px !important;
    margin-top: 0px;
  }
</style>
<div id="about" class="about-us section">
  <div class="container">
    <div class="row">
      <div class="col-lg-5" style="margin-top: 5%;">
        <div class="services">
          <div class="row">
            <div class="col-lg-12">
              <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="center-text" justify content>
                  <p>
                    Segala Puji dan rasa syukur marilah senantiasa kita panjatkan kehadirat Allah SWT atas segala nikmat dan karunia-Nya sehingga kami dapat menghadirkan layanan pemesanan sewa Rumah Susun melalui Website Si-Rusun dengan tampilan informasi dan layanan serta beraneka fitur yang menarik dan komunikatif. Kehadiran website ini diharapkan menjadi sarana untuk sewa yang efektif dan efisien antara kami sebagai penyedia layanan hunian dengan masyarakat yang membutuhkan tempat tinggal aman, nyaman, dan layak.
                  </p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7" style="margin-top: 5%;">
        <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
          <div style="text-align: center;">
            <img src="assets/images/medirb.png" alt="person graphic" class="rounded" style="width: 30%; height: 220px; display: block; margin: 0 auto;">
            <div class="row">
              <div class="col-lg-2 float-end"> </div>
              <div class="col-lg-9 align-center">
                <img src="assets/images/team.png" alt="reporting" class="float-end" style="width: 50px; height: 50px;">
                <h5 style="text-align: center;">Medi Abdurahman, S.E (Kepala Unit Pelaksana Teknis Rusunawa)</h5>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>






<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s" style="padding-bottom: 5px ;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
              <h6>Welcome to Si Rusun</h6>
              <h2>Unit Pelaksana Teknis Rusunawa</em></h2>
              <?php
              if (!isset($_SESSION["pengguna"])) {
              ?>
                <!-- <p>Daftar Akun Si Rusun sekarang juga , Lebih mudah dan praktis untuk menyewa Unit Hunian.<br><a rel="nofollow" href="daftar.php" target="_parent"><b>Daftar</b></a>.</p> -->

                <!-- <a href="login.php" class="btn hero-btn">Login</a> -->
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <a href="lokasi.php?id=15">
                <img src="foto/limus.jpeg" alt="limus">
              </a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="left-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
            <a href="lokasi.php?id=17">
              <img src="foto/gedung.jpeg" alt="dayeuh">
            </a>
            </div>
          </div>
          <div class="col-lg-6 align-self-center">
            <div class="right-content header-text wow fadeInRight" data-wow-duration="1s" data-wow-delay="1s">
              <h6>So Easy</h6>
              <h2>Semudah <em>Chat Teman</em></h2>
              <p>Daftar di Si Rusun sekarang juga, lebih praktis dalam melakukan booking untuk mendapatkan hunian yang layak dan nyaman.<a rel="nofollow" href="daftar.php" target="_parent">Daftar</a>.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--<div id="services" class="our-services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="left-image">
            <img src="assets/images/services-left-image.png" alt="">
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="section-heading">
            <h2>Grow your website with our <em>SEO</em> service &amp; <span>Project</span> Ideas</h2>
            <p>Space Dynamic HTML5 template is free to use for your website projects. However, you are not permitted to redistribute the template ZIP file on any CSS template collection websites. Please contact us for more information. Thank you for your kind cooperation.</p>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="first-bar progress-skill-bar">
                <h4>Website Analysis</h4>
                <span>84%</span>
                <div class="filled-bar"></div>
                <div class="full-bar"></div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="second-bar progress-skill-bar">
                <h4>SEO Reports</h4>
                <span>88%</span>
                <div class="filled-bar"></div>
                <div class="full-bar"></div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="third-bar progress-skill-bar">
                <h4>Page Optimizations</h4>
                <span>94%</span>
                <div class="filled-bar"></div>
                <div class="full-bar"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->

<div id="portfolio" class="our-portfolio section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
          <h2>Syarat<em> Dan</em> Ketentuan</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-sm-6">
        <a href="#">
          <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="hidden-content">
              <h4>Kartu Tanda Penduduk</h4>
            </div>
            <div class="showed-content">
              <img src="assets/images/ktp.png" alt="">
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-sm-6">
        <a href="#">
          <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
            <div class="hidden-content">
              <h4>Kartu Keluarga</h4>
            </div>
            <div class="showed-content">
              <img src="assets/images/kk.png" alt="">
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-sm-6">
        <a href="#">
          <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="hidden-content">
              <h4>Buku Nikah</h4>
            </div>
            <div class="showed-content">
              <img src="assets/images/nkh.png" alt="">
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<br>
<!-- <div id="blog" class="our-blog section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Check Out What Is <em>Trending</em> In Our Latest <span>News</span></h2>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
          <div class="top-dec">
            <img src="assets/images/blog-dec.png" alt="">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
          <div class="left-image">
            <a href="#"><img src="assets/images/big-blog-thumb.jpg" alt="Workspace Desktop"></a>
            <div class="info">
              <div class="inner-content">
                <ul>
                  <li><i class="fa fa-calendar"></i> 24 Mar 2021</li>
                  <li><i class="fa fa-users"></i> TemplateMo</li>
                  <li><i class="fa fa-folder"></i> Branding</li>
                </ul>
                <a href="#"><h4>SEO Agency &amp; Digital Marketing</h4></a>
                <p>Lorem ipsum dolor sit amet, consectetur and sed doer ket eismod tempor incididunt ut labore et dolore magna...</p>
                <div class="main-blue-button">
                  <a href="#">Discover More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
          <div class="right-list">
            <ul>
              <li>
                <div class="left-content align-self-center">
                  <span><i class="fa fa-calendar"></i> 18 Mar 2021</span>
                  <a href="#"><h4>New Websites &amp; Backlinks</h4></a>
                  <p>Lorem ipsum dolor sit amsecteturii and sed doer ket eismod...</p>
                </div>
                <div class="right-image">
                  <a href="#"><img src="assets/images/blog-thumb-01.jpg" alt=""></a>
                </div>
              </li>
              <li>
                <div class="left-content align-self-center">
                  <span><i class="fa fa-calendar"></i> 14 Mar 2021</span>
                  <a href="#"><h4>SEO Analysis &amp; Content Ideas</h4></a>
                  <p>Lorem ipsum dolor sit amsecteturii and sed doer ket eismod...</p>
                </div>
                <div class="right-image">
                  <a href="#"><img src="assets/images/blog-thumb-01.jpg" alt=""></a>
                </div>
              </li>
              <li>
                <div class="left-content align-self-center">
                  <span><i class="fa fa-calendar"></i> 06 Mar 2021</span>
                  <a href="#"><h4>SEO Tips &amp; Digital Marketing</h4></a>
                  <p>Lorem ipsum dolor sit amsecteturii and sed doer ket eismod...</p>
                </div>
                <div class="right-image">
                  <a href="#"><img src="assets/images/blog-thumb-01.jpg" alt=""></a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>-->
<BR>
<div id="contact" class="contact-us section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <div class="section-heading">
          <h2>Jika ada yang ingin dipertanyakan, silahkan hubungi:</h2>
          <div class="phone-info">
            <h4>
              <span><i class="fa fa-phone"></i> <a href="https://wa.me/089608511940">Whatsapp</a></span>
              <span><i class="fa fa-envelope"></i><a href="https://www.instagram.com/upt_rusun/">Instagram</a></span><br>
              <br><br>For Fast Respon
            </h4>
            <div class="footer-tittle">

            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <form id="contact" action="" method="post">
          <h4>Alamat</h4>
          <BR>
          <h5><a href="https://goo.gl/maps/8gQxaFsS5JnH826n8"><b>Rusun Pekerja Dayeuh</b></a></h5>
          <h5>
            <p>HXH7+W3V, Kp.Rawa Jamun, RT.04/RW.04, Dayeuh, Kec. Cileungsi, Kabupaten Bogor, Jawa Barat 16820</p>
          </h5>
          <h5><a href="https://goo.gl/maps/44rDwF3SDgSq742CA"><b>Rusunawa Limusnunggal</b></a></h5>
          <h5>
            <p>Jl. Raya Narogong No.54, Limus Nunggal, Kec. Cileungsi, Kabupaten Bogor, Jawa Barat 16820</p>
          </h5>
          <div class="contact-dec">
            <img src="assets/images/contact-decoration.png" alt="">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
include 'footer.php';
?>