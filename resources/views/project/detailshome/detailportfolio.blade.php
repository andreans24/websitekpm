<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Portfolio Details - BizPage Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('templateWeb/assets/img/favicon2.png') }}" rel="icon">
    <link href="{{ asset('templateWeb/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('templateWeb/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('templateWeb/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('templateWeb/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('templateWeb/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('templateWeb/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('templateWeb/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="portfolio-details-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <h1 class="sitename">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <img src="{{ asset('images/kpm2.png') }}" alt="" style="width: 70px; height: auto;">
                        <img src="{{ asset('images/textkpm.png') }}" alt=""
                            style="width: 150px; height: auto;">
                    </div>
                </h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li class="dropdown"><a href="#"><span>Services</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('services') }}">Simpan Pinjam</a></li>
                            <li><a href="{{ route('services') }}">Pengelolaan Jasa Tenaga Kerja</a></li>
                            <li><a href="{{ route('services') }}">Rupa - Rupa Usaha</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('news') }}">News</a></li>
                    {{-- <li><a href="#">Blog</a></li> --}}
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">
        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url('{{ asset('templateWeb/assets/img/page-title-bg.jpg') }}');">
            <div class="container position-relative">
                <h1>Portfolio Details</h1>
                <p>{{ $portfolios->title }}</p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Portfolio Details</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Portfolio Details Section -->
        <section id="portfolio-details" class="portfolio-details section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper init-swiper">
                            <script type="application/json" class="swiper-config">
                                {
                                "loop": true,
                                "speed": 600,
                                "autoplay": {
                                    "delay": 5000
                                },
                                "slidesPerView": "auto",
                                "pagination": {
                                    "el": ".swiper-pagination",
                                    "type": "bullets",
                                    "clickable": true
                                }
                                }
                            </script>

                            <div class="swiper-wrapper align-items-center">
                                @for ($i = 1; $i <= 4; $i++)
                                    @php
                                        $imageField = 'image' . $i;
                                    @endphp
                                    @if ($portfolios->$imageField)
                                        <div class="swiper-slide">
                                            <img src="{{ asset($portfolios->$imageField) }}"
                                                alt="Portfolio Image {{ $i }}">
                                        </div>
                                    @endif
                                @endfor
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        {{-- bagian description baru --}}
                        <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
                            <h2>{{ $portfolios->title }}</h2>
                            <p>
                                {!! $portfolios->description !!}
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                            <h3>Project information</h3>
                            <ul>
                                <li><strong>Category</strong>: {{ $portfolios->category->name }}</li>
                                <li><strong>Client</strong>: {{ $portfolios->client }}</li>
                                <li><strong>Project date</strong>:
                                    {{ $portfolios->project_date }}
                                </li>
                                {{-- <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> --}}
                            </ul>
                        </div>

                        {{-- bagian descrition lama --}}


                    </div>
                </div>
            </div>
        </section><!-- /Portfolio Details Section -->
    </main>

    <footer id="footer" class="footer dark-background">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">KOPEGMAR TG PRIOK </span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>{{ $office->alamat }}</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>{{ $office->notlp }} </span></p>
                        <p><strong>Email:</strong> <span>{{ $office->email }}</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="https://x.com/kopegmar?lang=id"><i class="bi bi-twitter-x"></i></a>
                        <a href="https://www.facebook.com/kopegmartanjungpriokofficial?locale=it_IT"><i
                                class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/kopegmartanjungpriok/"><i class="bi bi-instagram"></i></a>
                        <a href="https://id.linkedin.com/"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About us</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="{{ route('news') }}">News</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                    <form action="forms/newsletter.php" method="post" class="php-email-form">
                        <div class="newsletter-form"><input type="email" name="email"><input type="submit"
                                value="Subscribe"></div>
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright 2024</span> <strong class="px-1 sitename">Kopegmar Tg Priok</strong> <span>All Rights
                    Reserved</span>
            </p>
            <div class="credits">
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('templateWeb/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('templateWeb/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('templateWeb/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('templateWeb/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('templateWeb/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('templateWeb/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('templateWeb/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('templateWeb/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('templateWeb/assets/js/main.js') }}"></script>

</body>

</html>
