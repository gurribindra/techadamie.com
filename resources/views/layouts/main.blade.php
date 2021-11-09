<!DOCTYPE html>
<html lang="en">
<head>
    <title>Techadamie</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Start Include All CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/preset.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <!-- End Include All CSS -->

    <script src="{{ asset('assets/js/jquery.js') }}"></script>

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/fav.png') }}">
    <!-- Favicon Icon -->
</head>

<body>
    @include('partials.preloader')

    @include('partials.header')

    @includeWhen($slider ?? false, 'partials.slider')

    @includeWhen($banner ?? false, 'partials.banner')

    @includeWhen($breadcrumb ?? null, 'partials.breadcrumb')

    @includeWhen($eduedge ?? false, 'partials.eduedge')

    @includeWhen($edupro ?? false, 'partials.edupro')

    @yield('content')

    @includeWhen($blogs ?? false, 'partials.blogs')

    @include('partials.footer')

     <!-- Start Include All JS -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('assets/js/lightcase.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.shuffle.min.js') }}"></script>

    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('js/form.js') }}"></script>
    <!-- End Include All JS -->

</body>

</html>