<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>KOPEGMAR Website - 404NotFound</title>
    <meta name="description"
        content="KOPEGMAR menyediakan layanan simpan pinjam dan unit usaha untuk pegawai maritim Tanjung Priok. Temukan layanan unggulan kami di sini!">
    <meta name="keywords"
        content="KOPEGMAR, koperasi, pegawai maritim, simpan pinjam, unit usaha, Tanjung Priok, Jakarta Utara">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:url" content="{{ $ogUrl }}">

    <!-- Favicons -->
    <link href="{{ asset('templateWeb/assets/img/favicon.png') }}" rel="icon" type="image/png" sizes="32x32">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('templateWeb/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('templateWeb/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('templateWeb/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('templateWeb/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('templateWeb/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('templateWeb/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="service-details-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <div style="display: flex; flex-direction: column; align-items: center;">
                    <img src="{{ asset('images/kpm2.png') }}" alt="Kopegmar-Website-Logo"
                        style="width: 70px; height: auto;">
                    <img src="{{ asset('images/textkpm.png') }}" alt="Kopegmar-Website-Logo ."
                        style="width: 150px; height: auto;">
                </div>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li class="dropdown"><a href="#" class="active"><span>Services</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            @forelse ($categories as $category)
                            <li>
                                <a href="{{ route('detail-service', $category->slug) }}">
                                    {{ $category->categories }}
                                </a>
                            </li>
                            @empty
                            <li><a href="{{ route('error-page') }}">Kategori tidak tersedia</a></li> {{-- Tautan ke
                            halaman error --}}
                            @endforelse
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
            style="background-image: url({{ asset('templateWeb/assets/img/page-title-bg.jpg') }});">
            <div class="container position-relative">
                <h1>404 | NOT FOUND</h1>
            </div>
        </div><!-- End Page Title -->


        <!-- Service Details Section -->
        <section id="service-details" class="service-details section">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="services-list">
                            @foreach ($categories as $category)
                            <a href="{{ route('detail-service', $category->slug) }}"
                                class="{{ request()->slug == $category->slug ? 'active' : '' }}">
                                {{ $category->categories }} </a>
                            @endforeach
                            <!-- Recent Posts Widget -->
                            <div class="recent-posts-widget widget-item">
                                <h3 class="widget-title">Recent Posts</h3>
                                @foreach ($recentPosts as $recent)
                                <div class="post-item image-center">
                                    <img src="{{ asset($recent->image) }}" alt="" class="flex-shrink-0 img-fluid">
                                    <div>
                                        <h4><a
                                                href="{{ route('detail-news', ['id' => $recent->id, 'title' => Str::slug($recent->title, '-')]) }}">{{
                                                $recent->title }}</a>
                                        </h4>
                                        <time datetime="{{ $recent->created_at }}">{{ $recent->created_at->format('M d,
                                            Y') }}</time>
                                    </div>
                                </div><!-- End recent post item-->
                                @endforeach
                            </div>
                            <!--/Recent Posts Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Service Details Section -->

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                        <span class="sitename">KOPEGMAR TG PRIOK</span>
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
                        <a href="https://padiumkm.id/store/631a66de8755a8a989634f28" target="_blank">
                            <img src="{{ asset('images/padiumkm.png') }}" alt="PadiUMKM"
                                style="width: 24px; height: 24px;">
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About us</a></li>
                        <li><a href="{{ route('news') }}">News</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Layanan Kami</h4>
                    <ul>
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('detail-service', $category->slug) }}">
                                {{ $category->categories }} </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <div class="logo">
                        <img src="{{ asset('images/KPM.png') }}" alt="logo-kopegmar" class="img-fluid mb-3"
                            style="width: 200px;">
                    </div>
                    <div class="whatsapp-link">
                        <a href="https://wa.me/6287771760501" target="_blank">
                            <img src="{{ asset('images/wa.png') }}" alt="WhatsApp" class="img-fluid mb-3"
                                style="width: 200px;">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright 2024</span> <strong class="px-1 sitename">KOPEGMAR TG PRIOK</strong> <span>All Rights
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
    {{-- <script src="{{ asset('templateWeb/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
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