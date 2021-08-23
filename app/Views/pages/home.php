<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Bank Sampah - SemangatePoor</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="/img/favicon.png" rel="icon">
	<link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="/vendor/welcome/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/vendor/welcome/icofont/icofont.min.css" rel="stylesheet">
	<link href="/vendor/welcome/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="/vendor/welcome/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="/vendor/welcome/venobox/venobox.css" rel="stylesheet">
	<link href="/vendor/welcome/aos/aos.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="/css/styles.css" rel="stylesheet">

	<!-- =======================================================
  * Template Name: Appland - v2.3.1
  * Template URL: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top header-transparent ">
		<div class="container d-flex align-items-center">

			<div class="mr-auto logo">
				<h1 class="text-light"><a href="index.html">SemangatePoor</a></h1>
				<!-- Uncomment below if you prefer to use an image logo -->
				<!-- <a href="index.html"><img src="/img/logo.png" alt="" class="img-fluid"></a>-->
			</div>

			<nav class="nav-menu d-none d-lg-block">
				<ul>
					<li class="active"><a href="#hero">Home</a></li>
					<li><a href="#tujuan">Tujuan Kami</a></li>
					<li><a href="#jenis">Jenis Sampah</a></li>
					<li><a href="#faq">F.A.Q</a></li>
					<li><a href="#contact">Hubungi Kami</a></li>
					<?php if (empty(session('id'))) : ?>
						<li class="get-started"><a href="/login">Login</a></li>
					<?php else : ?>
						<li class="get-started"><a href="/user">Dashboard</a></li>
					<?php endif ?>
				</ul>
			</nav><!-- .nav-menu -->

		</div>
	</header><!-- End Header -->

	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex align-items-center">

		<div class="container">
			<div class="row">
				<div class="order-2 pt-5 col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-lg-0 order-lg-1" data-aos="fade-up">
					<div>
						<h2><strong>SemangatePoor merupakan bank sampah dengan tujuan mendaur ulang sampah untuk menyelamatkan Bumi kita.</strong></h2>
						<br>
						<h2><i>Manfaatkan sampah disekitarmu dan jadikan Rupiah!</i></h2>
						<!-- <a href="#" class="download-btn"><i class="bx bxl-play-store"></i> Google Play</a> -->
						<!-- <a href="#" class="download-btn"><i class="bx bxl-apple"></i> App Store</a> -->
					</div>
				</div>
				<div class="order-1 col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-lg-2 hero-img" data-aos="fade-up">
					<img src="/img/hero-img.png" class="img-fluid" alt="">
				</div>
			</div>
		</div>

	</section><!-- End Hero -->

	<main id="main">

		<!-- ======= Tujuan Section ======= -->
		<section id="tujuan" class="features">
			<div class="container">

				<div class="section-title">
					<h2>Tujuan Kami</h2>
					<p>Melalui Bank Sampah SemangatePoor kami bertujuan untuk:</p>
				</div>

				<div class="row no-gutters">
					<div class="order-2 col-xl-7 d-flex align-items-stretch order-lg-1">
						<div class="content d-flex flex-column justify-content-center">
							<div class="row">

								<div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
									<i class="bx bx-images"></i>
									<h4>Ramah Lingkungan</h4>
									<p>Dengan daur ulang sampah</p>
								</div>
								<div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
									<i class="bx bx-shield"></i>
									<h4>Kemanan Data</h4>
									<p>Data dijamin Aman!</p>
								</div>
								<div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
									<i class="bx bx-atom"></i>
									<h4>Membantu Ekonomi</h4>
									<p>Tukarkan sampah jadi Rupiah</p>
								</div>
								<div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
									<i class="bx bx-id-card"></i>
									<h4>Hak Anggota</h4>
									<p>Penjemputan sampah dirumah dan Transparansi Saldo Anda</p>
								</div>
							</div>
						</div>
					</div>
					<div class="order-1 image col-xl-5 d-flex align-items-stretch justify-content-center order-lg-2" data-aos="fade-left" data-aos-delay="100">
						<img src="/img/features.svg" class="img-fluid" alt="">
					</div>
				</div>

			</div>
		</section><!-- End App Features Section -->

		<section id="jenis">
			<div class="container">
				<div class="section-title">
					<h2>Jenis Sampah</h2>
					<p>Anda dapat menyetorkan sampah dengan kategori berikut</p>
				</div>
				<div class="container-fluid testimonials">
					<div class="owl-carousel testimonials-carousel" data-aos="fade-up">
						<?php foreach ($jenisSampah as $sampah) : ?>
							<div class="testimonial-wrap">
								<div class="testimonial-item">
									<img src="/img/<?= $sampah->sampul ?>" class="testimonial-img" alt="">
									<h3><?= $sampah->jenis ?></h3>
									<h4>Rp.<?= $sampah->harga ?>/KG</h4>
									<p>
										<i class="bx bxs-quote-alt-left quote-icon-left"></i>
										<?= $sampah->des ?><i class="bx bxs-quote-alt-right quote-icon-right"></i>
									</p>
								</div>
							</div>

						<?php endforeach ?>
					</div>
				</div>
			</div>
		</section>
		<!-- ======= Frequently Asked Questions Section ======= -->
		<section id="faq" class="faq section-bg">
			<div class="container">

				<div class="section-title">

					<h2>Frequently Asked Questions</h2>
					<p>Berikut daftar pertanyaan yang mungkin akan anda tanyakan.</p>
				</div>

				<div class="accordion-list">
					<ul>
						<li data-aos="fade-up">
							<i class="bx bx-help-circle icon-help"></i>
							<a data-toggle="collapse" class="collapse" href="#accordion-list-1">Bagaimana cara pendaftaran anggota? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
							<div id="accordion-list-1" class="collapse show" data-parent=".accordion-list">
								<p>
									Anda dapat langsung datang ke kantor atau menghubungi kami melalui +62 821 3787 8859 (WhatsApp).
								</p>
							</div>
						</li>

						<li data-aos="fade-up" data-aos-delay="100">
							<i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#accordion-list-2" class="collapsed">Bagaimana cara ambil saldo? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
							<div id="accordion-list-2" class="collapse" data-parent=".accordion-list">
								<p>
									Anda dapat langsung datang ke kantor.
								</p>
							</div>
						</li>

						<li data-aos="fade-up" data-aos-delay="200">
							<i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#accordion-list-3" class="collapsed">Cara meminta penjemputan sampah? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
							<div id="accordion-list-3" class="collapse" data-parent=".accordion-list">
								<p>
									Menghubungi kami melalui +62 821 3787 8859 (WhatsApp) pada jam kerja.
								</p>
							</div>
						</li>

						<li data-aos="fade-up" data-aos-delay="300">
							<i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#accordion-list-4" class="collapsed">Sampah apa saja yang dapat disetorkan? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
							<div id="accordion-list-4" class="collapse" data-parent=".accordion-list">
								<p>
									Sampah Anorganik atau anda dapat melihatnya pada menu Jenis Sampah.
								</p>
							</div>
						</li>

						<li data-aos="fade-up" data-aos-delay="400">
							<i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#accordion-list-5" class="collapsed">Bagaimana jika kita lupa username dan password? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
							<div id="accordion-list-5" class="collapse" data-parent=".accordion-list">
								<p>Silahkan hubungi kami melalui +62 821 3787 8859 (WhatsApp).
								</p>
							</div>
						</li>

					</ul>
				</div>

			</div>
		</section><!-- End Frequently Asked Questions Section -->

		<!-- ======= Contact Section ======= -->
		<section id="contact" class="contact">
			<div class="container">

				<div class="section-title">
					<h2>Hubungi Kami</h2>
					<p>Anda dapat menghubungi melalui media sosial kami.</p>
				</div>

				<div class="row">

					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-6 info" data-aos="fade-up">
								<i class="bx bx-map"></i>
								<h4>Sempor Lor</h4>
								<p>Jalan Raya desa sempor lor Rt 02 Rw 02<br>53391</p>
							</div>
							<div class="col-lg-6 info" data-aos="fade-up" data-aos-delay="100">
								<i class="bx bx-phone"></i>
								<h4>Hubungi</h4>
								<p>+62 821 3787 8859<br>+62 821 3787 8859 (WhatsApp)</p>
							</div>
							<div class="col-lg-6 info" data-aos="fade-up" data-aos-delay="200">
								<i class="bx bx-envelope"></i>
								<h4>Email Us</h4>
								<p>semangatepoor@gmail.com</p>
							</div>
							<div class="col-lg-6 info" data-aos="fade-up" data-aos-delay="300">
								<i class="bx bx-time-five"></i>
								<h4>Jam Kerja</h4>
								<p>Sabtu: 09.00 Wib - 12.00 Wib</p>
							</div>
						</div>
					</div>

				</div>

			</div>
		</section><!-- End Contact Section -->

	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<footer id="footer">


		<div class="footer-top">
			<div class="container">
				<div class="row justify-content-around">

					<!-- <div class="col-lg-3 col-md-6 footer-contact" data-aos="fade-up">
						<h3>Appland</h3>
						<p>
							A108 Adam Street <br>
							New York, NY 535022<br>
							United States <br><br>
							<strong>Phone:</strong> +1 5589 55488 55<br>
							<strong>Email:</strong> info@example.com<br>
						</p>
					</div> -->



					<div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="300">
						<h4>Follow Social Media Kami di:</h4>

						<div class="mx-3 social-links">
							<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
							<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
							<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
							<a href="#" class="google-plus"><i class="bx bxl-youtube"></i></a>
							<!-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="container py-4">
			<div class="copyright">
				<!-- &copy; Copyright <strong><span>Appland</span></strong>. All Rights Reserved -->
				<strong><span>Copyright &copy; SemangatePoor <?= date('Y'); ?></span></strong>
			</div>
			<div class="credits">
				<!-- All the links in the footer should remain intact. -->
				<!-- You can delete the links only if you purchased the pro version. -->
				<!-- Licensing information: https://bootstrapmade.com/license/ -->
				<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/ -->
				Designed by SemangatePoor
				<!-- <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
			</div>
		</div>
	</footer><!-- End Footer -->

	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

	<!-- Vendor JS Files -->
	<script src="/vendor/welcome/jquery/jquery.min.js"></script>
	<script src="/vendor/welcome/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/vendor/welcome/jquery.easing/jquery.easing.min.js"></script>
	<script src="/vendor/welcome/php-email-form/validate.js"></script>
	<script src="/vendor/welcome/owl.carousel/owl.carousel.min.js"></script>
	<script src="/vendor/welcome/venobox/venobox.min.js"></script>
	<script src="/vendor/welcome/aos/aos.js"></script>

	<!-- Template Main JS File -->
	<script src="/js/main.js"></script>

</body>

</html>