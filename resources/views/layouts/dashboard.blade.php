<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Website KOPEGMAR</title>

    <link rel="stylesheet" href="{{ asset('admin-purple/src/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-purple/src/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-purple/src/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-purple/src/assets/vendors/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet"
        href="{{ asset('admin-purple/src/assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('admin-purple/src/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin-purple/src/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('templateWeb/assets/img/favicon2.png') }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <div class="container-scroller">
        {{-- Header --}}
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            @include('layouts.header')
        </nav>
        {{-- Akhir Header --}}

        <div class="container-fluid page-body-wrapper">
            {{-- Sidebar --}}
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                @include('layouts.sidebar')
            </nav>
            {{-- Akhir Sidebar --}}

            {{-- Halaman tengah --}}
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->


                {{-- Footer --}}
                <footer class="footer">
                    @include('layouts.footer')
                </footer>
                {{-- Akhir Footer --}}

                <!-- partial -->
            </div>
            {{-- akhir halaman tengah --}}

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    @include('layouts.script')
</body>

</html>