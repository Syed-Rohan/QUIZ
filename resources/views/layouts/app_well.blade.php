<!doctype html>
<html lang="zxx">

<!-- Mirrored from templates.envytheme.com/seku/default/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Feb 2022 07:33:09 GMT -->
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap Min CSS -->
		<link rel="stylesheet" href="{{asset('public/welcome/assets/css/bootstrap.min.css')}}">
		<!-- Owl Theme Default Min CSS -->
		<link rel="stylesheet" href="{{asset('public/welcome/assets/css/owl.theme.default.min.css')}}">
		<!-- Owl Carousel Min CSS -->
		<link rel="stylesheet" href="{{asset('public/welcome/assets/css/owl.carousel.min.css')}}">
		<!-- Owl Magnific Popup Min CSS -->
		<link rel="stylesheet" href="{{asset('public/welcome/assets/css/magnific-popup.min.css')}}">
		<!-- Animate Min CSS -->
		<link rel="stylesheet" href="{{asset('public/welcome/assets/css/animate.min.css')}}">
		<!-- Boxicons Min CSS -->
		<link rel="stylesheet" href="{{asset('public/welcome/assets/css/boxicons.min.css')}}">
		<!-- Flaticon CSS -->
		<link rel="stylesheet" href="{{asset('public/welcome/assets/css/flaticon.css')}}">
		<!-- Meanmenu Min CSS -->
		<link rel="stylesheet" href="{{asset('public/welcome/assets/css/meanmenu.min.css')}}">
		<!-- Nice Select Min CSS -->
		<link rel="stylesheet" href="{{asset('public/welcome/assets/css/nice-select.min.css')}}">
		<!-- Odometer Min CSS-->
		<link rel="stylesheet" href="{{asset('public/welcome/assets/css/odometer.min.css')}}">
		<!-- Style CSS -->
		<link rel="stylesheet" href="{{asset('public/welcome/assets/css/style.css')}}">
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="{{asset('public/welcome/assets/css/responsive.css')}}">

		<!-- Favicon -->
		<link rel="icon" type="image/png" href="assets/img/favicon.png">
		<!-- Title -->
		<title>QUIZ - BY TEAM_FLAMING</title>
    </head>

    <body>
		<!-- Start Preloader Area -->
		{{-- <div class="loader-wrapper">
			<div class="loader"></div>
			<div class="loader-section section-left"></div>
			<div class="loader-section section-right"></div>
		</div> --}}
		<!-- End Preloader Area -->

		<!-- Start Heder Area -->
		<header class="header-area fixed-top">
			<div class="nav-area nav-area-three">
				<div class="navbar-area">
					<!-- Menu For Mobile Device -->
					<div class="mobile-nav">
						<a href="index.html" class="logo">
							<img src="assets/img/logo.png" alt="Logo">
						</a>
					</div>

					<!-- Menu For Desktop Device -->
					<div class="main-nav">
						<nav class="navbar navbar-expand-md">
							<div class="container-fluid">
								<a class="navbar-brand" href="{{url('/')}}">
                                    <img src="{{asset('public/logo.jpg')}}" style="height:80px;width:80px" alt="">
								</a>

								<div class="collapse navbar-collapse mean-menu">
									<ul class="navbar-nav m-auto">
										<li class="nav-item">
											<a href="{{ url('/') }}" class="nav-link active">
												Home
											</a>
										</li>

										<li class="nav-item">
											<a href="about.html" class="nav-link">About</a>
										</li>
										<li class="nav-item">
											<a href="#" class="nav-link">
												Courses
											</a>
										</li>

										<li class="nav-item">
											<a href="{{ url('/login') }}" class="nav-link">
												Login
											</a>
										</li>
										<li class="nav-item">
											<a href="{{ url('/register') }}" class="nav-link">Register</a>
										</li>
									</ul>

									<!-- Start Other Option -->
									<div class="others-option">
										<div class="call-us">
											<a href="tel:+892-569-756">
												<i class="bx bxs-phone-call"></i>
												+88 01731-715003
											</a>
										</div>
									</div>
									<!-- End Other Option -->
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</header>

@yield('content')

<footer class="footer-top-area pt-100 pb-70 jarallax">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single-widget contact">
                    <h3>Contact Us</h3>

                    <ul>
                        <li class="pl-0">
                            <a href="tel:Phone:+892-569-756">
                                <i class="bx bx-phone-call"></i>
                                <span>Hotline:</span>
                                Phone: +8801731715003
                            </a>
                        </li>

                        <li class="pl-0">
                            <a href="https://templates.envytheme.com/cdn-cgi/l/email-protection#cea6aba2a2a18ebdaba5bbe0ada1a3">
                                <i class="bx bx-envelope"></i>
                                <span>Email:</span>
                                <span class="__cf_email__" data-cfemail="ee868b828281ae9d8b859bc08d8183">[email&#160;protected]</span>
                            </a>
                        </li>

                        <li>
                            <i class="bx bx-location-plus"></i>
                            <span>Address:</span>
                            Sukrabad, Dhanmondi,Dhaka
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-widget">
                    <h3>Services Link</h3>

                    <ul>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                Web Site Protection
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                Hosting & Server Guard
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                Web Administrator
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                Conducting Training
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                GRPS Smart Protection
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                Security App
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-widget">
                    <h3>Support & Help</h3>

                    <ul>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                Support Forum
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                FAQ Questions
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                24/7 Support for Help
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                Counseling
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                Protection
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                Security
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-widget">
                    <h3>Quick Links</h3>

                    <ul>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                Security
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                Protection
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                Antivirus Packages
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                Security App
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                Website Security
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-chevrons-right"></i>
                                Digital Security
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Top Area -->

<!-- Start Footer Bottom Area -->
<footer class="footer-bottom-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="copy-right">
                    <p>
                        Copyright <i class="bx bx-copyright"></i>Designed By  'TEAM FLAMING'
                        <a href="https://daffodilvarsity.edu.bd/" target="blank">DIU</a>
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="condition-privacy">
                    <ul>
                        <li>
                            <a href="terms-conditions.html">Terms & Condition</a>
                        </li>
                        <li>
                            <a href="privacy-policy.html">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Bottom Area -->

<!-- Start Go Top Area -->
<div class="go-top">
    <i class='bx bx-chevrons-up'></i>
    <i class='bx bx-chevrons-up'></i>
</div>
<!-- End Go Top Area -->


<!-- Jquery Min JS -->
<!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
<script src="{{asset('public/welcome/assets/js/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle Min JS -->
<script src="{{asset('public/welcome/assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- Meanmenu Min JS -->
<script src="{{asset('public/welcome/assets/js/meanmenu.min.js')}}"></script>
<!-- Owl Carousel Min JS -->
<script src="{{asset('public/welcome/assets/js/owl.carousel.min.js')}}"></script>
<!-- Owl Carousel Thumbs Min JS -->
<script src="{{asset('public/welcome/assets/js/carousel-thumbs.min.js')}}"></script>
<!-- Wow Min JS -->
<script src="{{asset('public/welcome/assets/js/wow.min.js')}}"></script>
<!-- Nice Select Min JS -->
<script src="{{asset('public/welcome/assets/js/nice-select.min.js')}}"></script>
<!-- Magnific Popup Min JS -->
<script src="{{asset('public/welcome/assets/js/magnific-popup.min.js')}}"></script>
<!-- Ofi Min JS -->
<script src="{{asset('public/welcome/assets/js/ofi.min.js')}}"></script>
<!-- jarallax Min JS -->
<script src="{{asset('public/welcome/assets/js/jarallax.min.js')}}"></script>
<!-- Appear Min JS -->
<script src="{{asset('public/welcome/assets/js/appear.min.js')}}"></script>
<!-- Odometer JS -->
<script src="{{asset('public/welcome/assets/js/odometer.min.js')}}"></script>
<!-- Form Validator Min JS -->
<script src="{{asset('public/welcome/assets/js/form-validator.min.js')}}"></script>
<!-- Contact JS -->
<script src="{{asset('public/welcome/assets/js/contact-form-script.js')}}"></script>
<!-- Ajaxchimp Min JS -->
<script src="{{asset('public/welcome/assets/js/ajaxchimp.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('public/welcome/assets/js/custom.js')}}"></script>
</body>

<!-- Mirrored from templates.envytheme.com/seku/default/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Feb 2022 07:33:11 GMT -->
</html>

