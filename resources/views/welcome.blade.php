<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ParentLoop</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('backend/img/logo/logo.png')}}" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart - v1.4.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="#hero" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span>ParentLoop</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="#footer">Layanan</a></li>


                    @if (Route::has('login'))
                    @auth
                    <li><a class="nav-link scrollto" href="{{ url('/home') }}">Beranda</a></li>
                    @else
                    <li><a class="nav-link scrollto" href="{{ route('login') }}">Masuk</a></li>
                    @if (Route::has('register'))
                    <li><a class=" nav-link scrollto" href="{{ route('register') }}">Daftar</a></li>
                    @endif
                    @endauth
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Buku Penghubung Digital</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Memberikan informasi mengenai kegiatan, perkembangan, dan tanggung jawab murid</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="{{route('login')}}"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Masuk</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="content">
                            <h3>SDN 055 Jatihandap</h3>
                            <h2>Deskripsi Sekilas</h2>
                            <p>
                                SD negeri ini berdiri sejak 1951. Pada saat ini SD Negeri 055 Jatihandap Kota Bandung mengimplementasikan panduan kurikulum belajar SD 2013. SDN 055 Jatihandap Kota Bandung dikepalai oleh seorang kepala sekolah bernama Sri Winarsih dan operator sekolah Hendri Sukmawansyah.
                            </p>
                            <div class="text-center text-lg-start">
                                <a href="https://simdik.bandung.go.id/npsn/20245598"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Lebih Lanjut</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="assets/img/about.jpeg" class="img-fluid" alt="">
                    </div>

                </div>
            </div>

        </section><!-- End About Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="#hero" class="logo d-flex align-items-center">
                            <img src="assets/img/logo.png" alt="">
                            <span>ParentLoop</span>
                        </a>
                        <p>Memberikan informasi mengenai kegiatan, perkembangan, dan tanggung jawab murid</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Tautan</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Beranda</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#about">Tentang Kami</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#footer">Layanan</a></li>

                        </ul>
                    </div>



                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Hubungi Kami</h4>
                        <p>
                            Fulan <br>
                            Bandung<br>
                            Indonesia <br><br>
                            <strong>Phone:</strong> 08xxxxxxxxxx<br>
                            <strong>Email:</strong> fulan@gmail.com<br>
                        </p>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
            </div>

        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
