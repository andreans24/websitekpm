<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Kopegmar</title>
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

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <h1 class="sitename">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <img src="images/kpm2.png" alt="" style="width: 70px; height: auto;">
                        <img src="images/textkpm.png" alt="" style="width: 150px; height: auto;">
                    </div>
                </h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}" class="active">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li class="dropdown"><a href="#"><span>Services</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('detail-service', $category->id) }}">
                                        {{ $category->categories }} </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('news') }}">News</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel"
                data-bs-interval="5000">
                @foreach ($sliders as $index => $slider)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $slider->image) }}" alt="Slide {{ $index + 1 }}">
                        <div class="carousel-container">
                            <h2>{{ $slider->title }}</h2>
                            <p>{{ $slider->description }}</p>
                            <a href="#featured-services" class="btn-get-started">Get Started</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
            <ol class="carousel-indicators">
                @foreach ($sliders as $index => $slider)
                    <li data-bs-target="#hero-carousel" data-bs-slide-to=""></li>
                @endforeach
            </ol>
        </section><!-- /Hero Section -->

        <!-- Featured Services Section -->
        <section id="featured-services" class="featured-services section dark-background">
            <div class="container">
                <div class="row gy-4 justify-content-center">
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon flex-shrink-0"><i class="{{ $service->icon }}"></i></div>
                            <div>
                                <h4 class="title"> {{ $service->title }} </h4>
                                <p class="description-ellipsis">
                                    {{ strip_tags(html_entity_decode($service->description)) }}
                                </p>
                                <a href="{{ route('detail-service', ['id' => $service->id]) }}"
                                    class="readmore stretched-link"><span>Learn
                                        More</span><i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- End Service Item -->
                    @endforeach
                </div>
            </div>
        </section><!-- /Featured Services Section -->

        <!-- About Section -->
        <section id="about" class="about section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>About Us</h2>
                @if ($about)
                    <p style="text-align:justify"> {!! nl2br(e($about->about_me)) !!} </p>
                @endif
                <br>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        {{-- <p class="who-we-are">Who We Are</p> --}}
                        <h3>VISI & MISI</h3>
                        @if ($about)
                            @php
                                // Mengganti strip dengan ikon check-circle
                                $visiMisi = str_replace(
                                    '*',
                                    '<i class="bi bi-check-circle" style="color: #18d26e;"></i> ',
                                    $about->visi_misi,
                                );
                            @endphp
                            <p class="text-justify">{!! $visiMisi !!}</p>
                        @endif
                        <a href="{{ route('about') }}" class="read-more"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>

                    <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                <img src="{{ asset('images/1.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="row gy-4">
                                    <div class="col-lg-12">
                                        <img src="{{ 'images/2.jpg' }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-12">
                                        <img src="{{ 'images/3.png' }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /About Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section light-background">
            <div class="container section-title" data-aos="fade-up">
                <h2>Award</h2>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-center gy-2 flex-wrap">

                    <div class="col-lg-4 col-md-4 col-sm-6 mx-2">
                        <div class="stats-item text-center w-100 h-100">
                            <img src="{{ asset('images/medal.png') }}" alt=""
                                class="img-fluid custom-img mb-3">
                            <p class="text-center">Vendor Terbaik Kategori Nilai Terbanyak Tahun 2021 dari PT Pelindo
                                (Persero)</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-auto col-md-4 col-sm-6 mx-2">
                        <div class="stats-item text-center w-100 h-100">
                            <img src="{{ asset('images/medal.png') }}" alt=""
                                class="img-fluid custom-img mb-3">
                            <p class="text-center">Vendor Terbaik Tahun 2021 dari KSO TPK Koja</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-auto col-md-4 col-sm-6 mx-2">
                        <div class="stats-item text-center w-100 h-100">
                            <img src="{{ asset('images/medal.png') }}" alt=""
                                class="img-fluid custom-img mb-3">
                            <p class="text-center">Vendor Terbaik Tahun 2021 dari KSO TPK Koja</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-auto col-md-4 col-sm-6 mx-2">
                        <div class="stats-item text-center w-100 h-100">
                            <img src="{{ asset('images/medal.png') }}" alt=""
                                class="img-fluid custom-img mb-3">
                            <p class="text-center">100 Besar Koperasi Terbaik Indonesia Tahun 2015</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-auto col-md-4 col-sm-6 mx-2">
                        <div class="stats-item text-center w-100 h-100">
                            <img src="{{ asset('images/medal.png') }}" alt=""
                                class="img-fluid custom-img mb-3">
                            <p class="text-center">Koperasi Berprestasi Tahun 2011 dari Menteri Koperasi dan UMKM RI
                            </p>
                        </div>
                    </div><!-- End Stats Item -->
                </div>
            </div>
        </section><!-- /Stats Section -->

        <!-- Services Section -->
        <section id="services" class="services section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Services</h2>
                <p>Kami Siap Melayani Anda</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    @foreach ($services as $service)
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item d-flex position-relative h-100">
                                <i class="{{ $service->icon }} icon flex-shrink-0"></i>
                                <div>
                                    <h4 class="title"><a
                                            href="{{ route('detail-service', ['id' => $service->id]) }}"
                                            class="stretched-link">{{ $service->title }}</a></h4>
                                    <p class="description">
                                        {{ strip_tags(html_entity_decode(Str::limit($service->description, 100))) }}
                                    </p>
                                </div>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach
                </div>
            </div>
        </section><!-- /Services Section -->

        <!-- Call To Action Section -->
        <section id="stats" class="stats section light-background"
            style="background-image: url('{{ asset('templateWeb/assets/img/bg2.png') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="container section-title">
                        <h2 style="color: rgb(255, 255, 255);">Our Clients</h2>
                    </div>
                    <div class="slider">
                        <div class="slide-track">
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/1.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/2.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/3.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/4.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/5.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/6.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/7.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/8.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/9.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/10.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/11.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/12.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/13.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/14.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/15.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/16.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/17.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/18.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/19.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                            <div class="slide">
                                <img src="{{ asset('templateWeb/assets/img/client/20.png') }}" height="100"
                                    width="250" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call To Action Section -->



        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2> Anak Perusahaan & Portfolio Kopegmar TG Priok</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
                    data-sort="original-order">
                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-anak-perusahaan">Anak Perusahaan</li>
                        <li data-filter=".filter-rupa-rupa-usaha">Rupus</li>
                        <li data-filter=".filter-jasa-tenaga-kerja">JTK</li>
                    </ul><!-- End Portfolio Filters -->
                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($portfolios as $portfolio)
                            <div
                                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ strtolower(str_replace(' ', '-', $portfolio->category->name)) }}">
                                <div class="portfolio-images">
                                    @php
                                        $imageField = 'image1';
                                    @endphp
                                    @if ($portfolio->$imageField)
                                        <img src="{{ asset($portfolio->$imageField) }}" alt="img-fluid"
                                            {{ $portfolio->title }}>
                                        <a href="{{ asset($portfolio->$imageField) }}"
                                            title="{{ $portfolio->title }}"
                                            data-gallery="portfolio-gallery-{{ $portfolio->id }}"
                                            class="glightbox preview-link"></a>
                                    @endif
                                </div>
                                {{-- <img src="{{ asset('templateWeb/assets/img/portfolio/app-1.jpg') }}"
                                    class="img-fluid" alt=""> --}}
                                <div class="portfolio-info">
                                    <h4>{{ $portfolio->title }}</h4>
                                    <p>{{ Str::limit(strip_tags($portfolio->description), 100, '...') }}</p>
                                    <a href=" {{ asset($portfolio->image1) }}" title="{{ $portfolio->title }}"
                                        data-gallery="portfolio-gallery-{{ $portfolio->id }}"
                                        class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                    <a href="{{ route('detail-portfolio', ['id' => $portfolio->id]) }}"
                                        title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div><!-- End Portfolio Item -->
                        @endforeach
                    </div><!-- End Portfolio Container -->
                </div>
            </div>
        </section><!-- /Portfolio Section -->

        <!-- Testimonials Section -->
        {{-- <section id="testimonials" class="testimonials section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimonials</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper init-swiper">
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
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="templateWeb/assets/img/testimonials/testimonials-1.jpg"
                                    class="testimonial-img" alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora
                                        entum
                                        suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh
                                        et.
                                        Maecen aliquam, risus at semper.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="templateWeb/assets/img/testimonials/testimonials-2.jpg"
                                    class="testimonial-img" alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Export tempor illum tamen malis malis eram quae irure esse labore quem
                                        cillum
                                        quid cillum eram malis quorum velit fore eram velit sunt aliqua noster
                                        fugiat
                                        irure amet legam anim culpa.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="templateWeb/assets/img/testimonials/testimonials-3.jpg"
                                    class="testimonial-img" alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum
                                        nulla
                                        quem veniam duis minim tempor labore quem eram duis noster aute amet
                                        eram
                                        fore
                                        quis sint minim.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="templateWeb/assets/img/testimonials/testimonials-4.jpg"
                                    class="testimonial-img" alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos
                                        export
                                        minim
                                        fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt
                                        elit
                                        fore
                                        quem dolore labore illum veniam.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="templateWeb/assets/img/testimonials/testimonials-5.jpg"
                                    class="testimonial-img" alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam
                                        tempor
                                        noster veniam enim culpa labore duis sunt culpa nulla illum cillum
                                        fugiat
                                        legam
                                        esse veniam culpa fore nisi cillum quid.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section><!-- /Testimonials Section --> --}}

        <!-- Team Section -->
        <section id="team" class="team section light-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Team</h2>
                <p style="color: black">PENGURUS KOPEGMAR </p>
            </div><!-- End Section Title -->
            <div class="container">
                <div class="row gy-4 flex-nowrap overflow-auto">
                    @foreach ($teams as $team)
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="member">
                                <img src="{{ asset('storage/' . $team->image) }}" class="img-fluid"
                                    alt="{{ $team->name }}">
                                <div class="member-info">
                                    <div class="member-info-content">
                                        <h4> {{ $team->name }} </h4>
                                        <span>{{ $team->position }}</span>
                                        <div class="social">
                                            @if ($team->social_media_4)
                                                <a href="{{ $team->social_media_4 }}"><i
                                                        class="bi bi-twitter-x"></i></a>
                                            @endif
                                            @if ($team->social_media_1)
                                                <a href="{{ $team->social_media_1 }}"><i
                                                        class="bi bi-facebook"></i></a>
                                            @endif
                                            @if ($team->social_media_2)
                                                <a href="{{ $team->social_media_2 }}"><i
                                                        class="bi bi-instagram"></i></a>
                                            @endif
                                            @if ($team->social_media_3)
                                                <a href="{{ $team->social_media_3 }}"><i
                                                        class="bi bi-linkedin"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Team Member -->
                    @endforeach
                </div>
            </div>
        </section><!-- /Team Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-3">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <p>{{ $office->alamat }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center info-item-borders"
                            style="border-right: 1px solid #ddd; padding-right: 15px;">
                            <i class="bi bi-telephone"></i>
                            <h3>Call Us</h3>
                            <p> {{ $office->notlp }} </p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            style="border-right: 1px solid #ddd; padding-right: 15px;">
                            <i class="bi bi-envelope"></i>
                            <h3>Email Us</h3>
                            <p>{{ $office->email }}</p>
                        </div>
                    </div><!-- End Info Item -->
                    <div class="contact-info col-lg-3">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center">
                            <a href="https://wa.me/628123456789" target="_blank" class="whatsapp-link">
                                <i class="bi bi-whatsapp"></i> <br>
                                Hubungi Kami <br> Via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name"
                                required="">
                        </div>
                        <div class="col-md-6 ">
                            <input type="email" class="form-control" name="email" placeholder="Your Email"
                                required="">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subject"
                                required="">
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                            <button type="submit">Send Message</button>
                        </div>
                    </div>
                </form><!-- End Contact Form -->
            </div>
        </section><!-- /Contact Section -->
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
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('detail-service', $category->id) }}">
                                    {{ $category->categories }} </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <div class="logo">
                        <img src="{{ asset('images/KPM.png') }}" alt="Logo" class="img-fluid mb-3"
                            style="width: 200px;">
                    </div>
                    <div class="whatsapp-link">
                        <a href="https://wa.me/6282114976405" target="_blank">
                            <img src="{{ asset('images/wa.png') }}" alt="WhatsApp" class="img-fluid mb-3"
                                style="width: 200px;">
                        </a>
                    </div>
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

    {{-- script filter portfolio & anak perusahaan --}}
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Isotope
            var iso = new Isotope('.isotope-container', {
                itemSelector: '.isotope-item',
                layoutMode: 'masonry'
            });

            // Ketika filter di klik
            var filtersElem = document.querySelector('.portfolio-filters');
            filtersElem.addEventListener('click', function(event) {
                if (!matchesSelector(event.target, 'li')) {
                    return;
                }
                var filterValue = event.target.getAttribute('data-filter');
                iso.arrange({
                    filter: filterValue
                });

                // Tambahkan class aktif
                document.querySelectorAll('.portfolio-filters li').forEach(function(el) {
                    el.classList.remove('filter-active');
                });
                event.target.classList.add('filter-active');
            });
        });
    </script>
</body>

</html>