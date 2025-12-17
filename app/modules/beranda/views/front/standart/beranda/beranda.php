<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SIMONTORAN | Sistem Monitoring Ajuan Keuangan</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="<?= BASE_ASSET; ?>beranda/img/favicon.png" rel="icon">
  <link href="<?= BASE_ASSET; ?>beranda/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= BASE_ASSET; ?>beranda/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASE_ASSET; ?>beranda/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= BASE_ASSET; ?>beranda/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= BASE_ASSET; ?>beranda/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= BASE_ASSET; ?>beranda/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?= BASE_ASSET; ?>beranda/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eNno
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="<?= BASE_ASSET; ?>beranda/img/logo.png" alt=""> -->
        <h1 class="sitename">SIMONTORAN</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#services">Layanan</a></li>
          <!--<li><a href="#portfolio">Portfolio</a></li>-->
          <!--<li><a href="#team">Team</a></li>-->
          <!-- <li class="dropdown"><a href="#"><span>Tahun Anggaran</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a> -->
            <!-- <ul> -->
              <!--<li><a href="#">Dropdown 1</a></li>-->
              <!--<li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>-->
              <!--  <ul>-->
              <!--    <li><a href="#">Deep Dropdown 1</a></li>-->
              <!--    <li><a href="#">Deep Dropdown 2</a></li>-->
              <!--    <li><a href="#">Deep Dropdown 3</a></li>-->
              <!--    <li><a href="#">Deep Dropdown 4</a></li>-->
              <!--    <li><a href="#">Deep Dropdown 5</a></li>-->
              <!--  </ul>-->
              <!--</li>-->
              <!-- <li><a href="anggaran/2025">2025</a></li> -->
              <!-- <li><a href="anggaran/2024">2024</a></li> -->
              
            <!-- </ul> -->
          <!-- </li> -->
          <!-- <li class="dropdown"><a href="#"><span>Link Terkait</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
             
              <li><a href="https://sipecel.Muara Enimkab.go.id/">Sipecel</a></li>
              <li><a href="https://emonev.Muara Enimkab.go.id/">eMonev</a></li>
              <li><a href="https://perencanaan.Muara Enimkab.go.id">Website Utama</a></li>
               <li><a href="https://Muara Enimkab.go.id">Portal Pemkab Muara Enim</a></li>
            </ul>
          </li> -->
        <li>
          <a href="#" data-bs-toggle="modal" data-bs-target="#panduanModal">
            Panduan
          </a>
        </li>
          <li><a href="#contact">Kontak</a></li>
          <li>
            
            <a href="<?=  base_url() ?>administrator/login" class="btn-login"><font color="#ffffff">Login</font></a>
            
          </li>
          
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <!--<a class="btn-getstarted" href="index.html#about">Get Started</a>-->

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
            <h2>Sistem Monitoring Ajuan Keuangan Sekretariat Daerah Kabupaten Muara Enim</h2>
            <p>Transparansi dan Efisiensi dalam Pengelolaan Keuangan Daerah</p>
            <div class="d-flex">
              <a href="<?=  base_url() ?>administrator/login" class="btn-get-started">Masuk ke aplikasi</a>
              <!--<a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>-->
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
            <img src="<?= BASE_ASSET; ?>beranda/img/hero-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

   <!-- Featured Services Section -->
<section id="featured-services" class="featured-services section">

  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item position-relative">
          <div class="icon"><i class="bi bi-activity icon"></i></div>
          <h4><a href="" class="stretched-link">Transparansi Proses Keuangan</a></h4>
          <p>Menyediakan akses mudah untuk memantau proses ajuan keuangan dengan transparansi penuh.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="200">
        <div class="service-item position-relative">
          <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
          <h4><a href="" class="stretched-link">Efisiensi Pengelolaan Ajuan</a></h4>
          <p>Mengoptimalkan waktu dan sumber daya dengan sistem yang terintegrasi dan otomatis.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="300">
        <div class="service-item position-relative">
          <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
          <h4><a href="" class="stretched-link">Pengelolaan Data Real-Time</a></h4>
          <p>Dapatkan pembaruan status ajuan secara langsung untuk keputusan yang lebih cepat.</p>
        </div>
      </div><!-- End Service Item -->

    </div>

  </div>

</section><!-- /Featured Services Section -->


<!-- About Section -->
<section id="about" class="about section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <span>Tentang Kami<br></span>
    <h2>Tentang</h2>
    <p>Sistem Monitoring Ajuan Keuangan untuk meningkatkan transparansi dan efisiensi pengelolaan keuangan daerah.</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">
      <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
        <img src="<?= BASE_ASSET; ?>beranda/img/about.png" class="img-fluid" alt="Gambar Sistem Monitoring Keuangan">
        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
      </div>
      <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
        <h3>Mewujudkan Pengelolaan Keuangan yang Transparan, Efisien, dan Akuntabel.</h3>
        <p class="fst-italic">
          Sistem Monitoring Ajuan Keuangan (Simontoran) hadir sebagai solusi digital untuk mendukung tata kelola keuangan yang lebih baik.
        </p>
        <ul>
          <li><i class="bi bi-check2-all"></i> <span>Memastikan setiap ajuan keuangan dapat dipantau secara real-time.</span></li>
          <li><i class="bi bi-check2-all"></i> <span>Meningkatkan efisiensi proses persetujuan keuangan dengan sistem terintegrasi.</span></li>
          <li><i class="bi bi-check2-all"></i> <span>Mendukung pengambilan keputusan yang berbasis data dengan informasi yang akurat dan transparan.</span></li>
        </ul>
        <p>
          Dengan Simontoran, kami berkomitmen untuk memberikan layanan yang mempermudah setiap Bagian dalam mengelola dan memantau ajuan keuangan secara profesional dan efisien.
        </p>
      </div>
    </div>

  </div>

</section>
<!-- /About Section -->


    

    <!-- Services Section -->
    <section id="services" class="services section light-background">

     <!-- Services Section -->
<section id="services" class="services section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <span>Layanan</span>
    <h2>Layanan</h2>
    <p>Fitur unggulan yang membantu transparansi, efisiensi, dan akuntabilitas dalam pengelolaan keuangan daerah.</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-activity"></i>
          </div>
          <a href="service-details.html" class="stretched-link">
            <h3>Monitoring Real-Time</h3>
          </a>
          <p>Memantau status ajuan keuangan secara langsung untuk memastikan setiap proses berjalan transparan dan efisien.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-broadcast"></i>
          </div>
          <a href="service-details.html" class="stretched-link">
            <h3>Pelacakan Ajuan</h3>
          </a>
          <p>Menyediakan fitur pelacakan untuk mengetahui progres dan tahapan persetujuan keuangan secara terperinci.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-easel"></i>
          </div>
          <a href="service-details.html" class="stretched-link">
            <h3>Integrasi Data</h3>
          </a>
          <p>Mengintegrasikan data keuangan antar-bagian untuk mempermudah pengambilan keputusan berbasis data.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-bounding-box-circles"></i>
          </div>
          <a href="service-details.html" class="stretched-link">
            <h3>Notifikasi Otomatis</h3>
          </a>
          <p>Mengirimkan notifikasi otomatis untuk setiap update terkait status ajuan keuangan.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-calendar4-week"></i>
          </div>
          <a href="service-details.html" class="stretched-link">
            <h3>Jadwal Pengajuan</h3>
          </a>
          <p>Mengelola jadwal pengajuan keuangan untuk memastikan setiap proses berjalan sesuai rencana.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-chat-square-text"></i>
          </div>
          <a href="service-details.html" class="stretched-link">
            <h3>Laporan Komprehensif</h3>
          </a>
          <p>Menyediakan laporan lengkap yang dapat diakses oleh pihak terkait untuk mendukung transparansi.</p>
        </div>
      </div><!-- End Service Item -->

    </div>

  </div>

</section>
<!-- /Services Section -->


  

    <!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section accent-background">
  <div class="container">
    <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
      <div class="col-xl-10">
        <div class="text-center">
          <h3>Monitor Ajuan Keuangan Sekretariat Daerah</h3>
          <p>Segera ajukan dan pantau status keuangan Anda di Sistem Monitoring Ajuan Keuangan. Pastikan setiap pengajuan sesuai dengan prosedur yang berlaku untuk memastikan kelancaran proses administrasi.</p>
          <a class="cta-btn" href="#">Ajukan Ajuan Keuangan</a>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Call To Action Section -->


  
    <!-- Contact Section -->
<section id="contact" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <span>Hubungi Kami</span>
    <h2>Kontak</h2>
    <p>Untuk pertanyaan atau informasi lebih lanjut mengenai pengajuan keuangan, hubungi kami melalui formulir di bawah ini.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-5">

        <div class="info-wrap">
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3>Alamat</h3>
              <p>JL. Jend. A. Yani No.16, Ps. I Muara Enim, Kec. Muara Enim, Kabupaten Muara Enim, Sumatera Selatan 31313</p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Hubungi Kami</h3>
              <p>Telepon -  0734421001</p>
              <!-- <p>Bagian Perencanaan dan Keuangan Sekretariat Daerah Kabupaten Muara Enim</p> -->
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email</h3>
              <p>bagperencanaandankeu@muaraenimkab.go.id</p>
            </div>
          </div><!-- End Info Item -->

          <!-- Gambar Peta -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.6993249758725!2d103.77448167503263!3d-3.6558291463181734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e39f64a7d725d2d%3A0xfe1a90a2af874e15!2sSekretariat%20Daerah%20Kabupaten%20Muara%20Enim!5e0!3m2!1sen!2sid!4v1765034363019!5m2!1sen!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <div class="col-lg-7">
        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-4">

            <div class="col-md-6">
              <label for="name-field" class="pb-2">Nama Anda</label>
              <input type="text" name="name" id="name-field" class="form-control" required="">
            </div>

            <div class="col-md-6">
              <label for="email-field" class="pb-2">Email Anda</label>
              <input type="email" class="form-control" name="email" id="email-field" required="">
            </div>

            <div class="col-md-12">
              <label for="subject-field" class="pb-2">Subjek</label>
              <input type="text" class="form-control" name="subject" id="subject-field" required="">
            </div>

            <div class="col-md-12">
              <label for="message-field" class="pb-2">Pesan</label>
              <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
            </div>

            <div class="col-md-12 text-center">
              <div class="loading">Sedang Memuat...</div>
              <div class="error-message"></div>
              <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>

              <button type="submit">Kirim Pesan</button>
            </div>

          </div>
        </form>
      </div><!-- End Contact Form -->

    </div>

  </div>

</section><!-- /Contact Section -->


  </main>

<footer id="footer" class="footer">

  <div class="container footer-top">
    <div class="row gy-4">
      <div class="col-lg-4 col-md-6 footer-about">
        <a href="index.html" class="d-flex align-items-center">
          <span class="sitename">Sistem Monitoring Ajuan Keuangan</span>
        </a>
        <div class="footer-contact pt-3">
          <p>Bagian Perencanaan dan Keuangan Daerah Sekretariat Daerah Kab. Muara Enim</p>
          <p>JL. Jend. A. Yani No.16, Ps. I Muara Enim, Kec. Muara Enim, Kabupaten Muara Enim, Sumatera Selatan 31313</p>
          <!--<p class="mt-3"><strong>Phone:</strong> <span>-</span></p>-->
          <!-- <p><strong>Email:</strong> <span>bagperencanaandankeu.Muara Enimkab@gmail.com</span></p> -->
        </div>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4>Link Berguna</h4>
        <ul>
          <li><i class="bi bi-chevron-right"></i> <a href="#">Beranda</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#">Tentang Kami</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#">Ajuan Keuangan</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#">Syarat & Ketentuan</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4>Layanan Kami</h4>
        <ul>
          <li><i class="bi bi-chevron-right"></i> <a href="#">Pengajuan Ajuan Keuangan</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#">Status Ajuan</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#">Laporan Keuangan</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-12">
        <h4>Ikuti Kami</h4>
        <p>Untuk mendapatkan informasi terbaru seputar pengajuan keuangan, ikuti kami di media sosial.</p>
        <div class="social-links d-flex">
          <a href="https://twitter.com"><i class="bi bi-twitter"></i></a>
          <a href="https://facebook.com"><i class="bi bi-facebook"></i></a>
          <a href="https://instagram.com"><i class="bi bi-instagram"></i></a>
          <a href="https://linkedin.com"><i class="bi bi-linkedin"></i></a


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= BASE_ASSET; ?>beranda/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= BASE_ASSET; ?>beranda/vendor/php-email-form/validate.js"></script>
  <script src="<?= BASE_ASSET; ?>beranda/vendor/aos/aos.js"></script>
  <script src="<?= BASE_ASSET; ?>beranda/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= BASE_ASSET; ?>beranda/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= BASE_ASSET; ?>beranda/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?= BASE_ASSET; ?>beranda/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= BASE_ASSET; ?>beranda/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="<?= BASE_ASSET; ?>beranda/js/main.js"></script>
  
  
  
  <!-- Modal HTML -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="post">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




<!-- Modal Panduan PDF -->
<div class="modal fade" id="panduanModal" tabindex="-1" aria-labelledby="panduanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="panduanModalLabel">Panduan SIMONTORAN</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <iframe 
          src="<?= base_url() ?>uploads/panduan/PANDUAN%20SIMONTORAN%20Muara%20Enim.pdf"
          width="100%" 
          height="600px"
          style="border: none;">
        </iframe>
      </div>
    </div>
  </div>
</div>


</body>

</html>