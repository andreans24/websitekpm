<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>KOPEGMAR Website - {{ $news->title }}</title>
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

<body class="blog-details-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <h1 class="sitename">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <img src="{{ asset('images/kpm2.png') }}" alt="Kopegmar-Website-Logo"
                            style="width: 70px; height: auto;">
                        <img src="{{ asset('images/textkpm.png') }}" alt="Kopegmar-Website-Logo ."
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
                            @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('detail-service', $category->slug) }}">
                                    {{ $category->categories }} </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('news') }}" class="active">News</a></li>
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
                <h1>News Details</h1>
                <p>{{ $news->title }}</p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="current">News</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Details Section -->
                    <section id="blog-details" class="blog-details section">
                        <div class="container">
                            <article class="article">
                                <div class="post-img">
                                    <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="img-fluid">
                                </div>
                                <h2 class="title">{{ $news->title }}</h2>
                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="">Kopegmar</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href=""><time datetime="{{ $news->created_at }}">{{
                                                    $news->created_at->format('M d, Y') }}</time></a>
                                        </li>
                                        <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                                href="#comments-section">{{ $commentCount }} Comments</a></li>
                                    </ul>
                                </div><!-- End meta top -->

                                <div class="content">
                                    <p>{!! $news->description !!}</p>
                                </div><!-- End post content -->
                                <style>
                                    .content img {
                                        max-width: 85%;
                                        height: auto;
                                    }
                                </style>
                                <div class="meta-bottom">
                                    <i class="bi bi-folder"></i>
                                    <ul class="cats">
                                        <li><a href="#">Business</a></li>
                                    </ul>
                                    <i class="bi bi-tags"></i>
                                    <ul class="tags">
                                        <li><a href="#">Creative</a></li>
                                        <li><a href="#">Tips</a></li>
                                        <li><a href="#">Marketing</a></li>
                                    </ul>
                                </div><!-- End meta bottom -->
                            </article>
                        </div>
                    </section><!-- /Blog Details Section -->

                    <!-- Blog Comments Section -->
                    <section id="comments-section" class="blog-comments section">
                        <div class="container">
                            <h4 class="comments-count">{{ $comments->count() }}</h4>
                            @foreach ($comments as $comment)
                            <div id="comment-{{ $comment->id }}" class="comment">
                                <div class="d-flex">
                                    <div class="comment-img"><img src="{{ asset('path/to/avatar.png') }}"></div>
                                    <div>
                                        <h5><a href="#">{{ $comment->name }}</a>
                                            <a href="#" class="reply" onclick="toggleReplyForm({{ $comment->id }})"><i
                                                    class="bi bi-reply-fill"></i>
                                                Reply</a>
                                        </h5>
                                        <time datetime="{{ $comment->created_at }}">{{ $comment->created_at->format('M
                                            d, Y') }}</time>
                                        <p> {{ $comment->comment }} </p>
                                    </div>
                                </div>
                                @if ($comment->parent_id)
                                <div class="comment comment-reply">
                                    <!-- Ini bisa diisi dengan komentar balasan jika ada -->
                                </div>
                                @else
                                <!-- Form untuk reply -->
                                <div class="reply-form" id="reply-form-{{ $comment->id }}" style="display:none;">
                                    <form action="{{ route('comments-store', $news->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control" placeholder="Your Name*"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <input name="email" type="text" class="form-control"
                                                placeholder="Your Email*" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="comment" class="form-control" placeholder="Your Reply*"
                                                required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Post Reply</button>
                                    </form>
                                </div>
                                <!-- Menampilkan balasan komentar -->
                                <div class="replies">
                                    @foreach ($comments as $reply)
                                    @if ($reply->parent_id === $comment->id)
                                    <!-- Memeriksa apakah ini balasan -->
                                    <div class="comment comment-reply">
                                        <div class="d-flex">
                                            <div class="comment-img">
                                                <img src="{{ asset('path/to/avatar.png') }}">
                                            </div>
                                            <div>
                                                <h5><a href="">{{ $reply->name }}</a></h5>
                                                <time datetime="{{ $reply->created_at }}">
                                                    {{ $reply->created_at->format('M d, Y') }}
                                                </time>
                                                <p>{{ $reply->comment }}</p>
                                            </div>
                                        </div>
                                    </div><!-- End reply comment -->
                                    @endif
                                    @endforeach
                                    @endif
                                </div><!-- End comment #1 -->
                                @endforeach
                            </div>
                    </section><!-- /Blog Comments Section -->

                    <!-- Comment Form Section -->
                    <section id="comment-form" class="comment-form section">
                        <div class="container">
                            <form action="{{ route('comments-store', $news->id) }}" method="POST">
                                @csrf
                                <h4>Post Comment</h4>
                                <p>Your email address will not be published. Required fields are marked * </p>
                                <input type="hidden" name="news_id" value="{{ $news->id }}">
                                <!-- Menyimpan ID berita -->
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input name="name" type="text" class="form-control" placeholder="Your Name*"
                                            required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input name="email" type="text" class="form-control" placeholder="Your Email*"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <textarea name="comment" class="form-control" placeholder="Your Comment*"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Post Comment</button>
                                </div>
                            </form>
                        </div>
                    </section><!-- /Comment Form Section -->
                </div>

                <div class="col-lg-4 sidebar">
                    <div class="widgets-container">
                        <!-- Search Widget -->
                        <div class="search-widget widget-item">
                            <h3 class="widget-title">Search</h3>
                            <form action="">
                                <input type="text">
                                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                        <!--/Search Widget -->
                        <!-- Categories Widget -->
                        <div class="categories-widget widget-item">
                            <h3 class="widget-title">Services</h3>
                            <ul class="mt-3">
                                <li><a href="#">Simpan Pinjam </a></li>
                                <li><a href="#">Jasa Tenaga Kerja </a></li>
                                <li><a href="#">Rupa - Rupa Usaha </a></li>
                            </ul>
                        </div>
                        <!--/Categories Widget -->
                        <!-- Recent Posts Widget -->
                        <div class="recent-posts-widget widget-item">
                            <h3 class="widget-title">Recent Posts</h3>
                            @foreach ($recentPosts as $recent)
                            <div class="post-item image-center">
                                <img src="{{ asset($recent->image) }}" alt="{{ $recent->title }}"
                                    class="flex-shrink-0 img-fluid">
                                <div>
                                    <h4><a
                                            href="{{ route('detail-news', ['id' => $recent->id, 'title' => Str::slug($recent->title, '-')]) }}">{{
                                            $recent->title }}</a>
                                    </h4>
                                    <time datetime="{{ $recent->created_at }}">{{ $recent->created_at->format('M d, Y')
                                        }}</time>
                                </div>
                            </div><!-- End recent post item-->
                            @endforeach
                        </div>
                        <!--/Recent Posts Widget -->

                        <!-- Tags Widget -->
                        <div class="tags-widget widget-item">
                            <h3 class="widget-title">Tags</h3>
                            <ul>
                                <li><a href="#">Simpan Pinjam Kopegmar</a></li>
                                <li><a href="#">Koperasi Pegawai Maritim</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Jasa Tenaga Kerja Kopegmar</a></li>
                                <li><a href="#">Outsourcing Kopegmar</a></li>
                                <li><a href="#">Office</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Teknik Sipil</a></li>
                                <li><a href="#">Rupa - Rupa Usaha</a></li>
                            </ul>
                        </div>
                        <!--/Tags Widget -->
                    </div>
                </div>
            </div>
        </div>
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
    <script>
        function toggleReplyForm(commentId) {
            const replyForm = document.getElementById('reply-form-' + commentId);
            replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
        }
    </script>

</body>

</html>