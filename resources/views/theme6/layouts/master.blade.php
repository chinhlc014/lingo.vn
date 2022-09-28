<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index,follow" />
    <title>@yield('title', 'NTVV | Mua và Bán Trên Ứng Dụng Di Động Hoặc Website')</title>
    @yield('meta_data')
    <meta name="OMG-Verify-V1" content="ebbf0efe-eea4-4002-bb4e-db066e11b4e2"/>

    <meta name="keywords" content="HTML5 Template"/>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="/common/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/common/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/common/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/common/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/common/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/common/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/common/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/common/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/common/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/common/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/common/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/common/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/common/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/common/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/common/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4480613266653781"
     crossorigin="anonymous"></script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('common/css/bootstrap.min.css') }}">

    <!-- Main CSS File -->
    {!! Html::style('theme6/css/style.min.css') !!}

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
    {!! Html::style(mix('css/common/custom.css')) !!}
    @yield('schema_data')
</head>
<body class="loaded">
<div class="page-wrapper">
{{--    @include('theme6.layouts.partials.top_notice')--}}

    <header class="header">
        @include('theme6.layouts.partials.header_top')
        @yield('header_bottom')
    </header><!-- End .header -->

    @yield('main')

    @include('theme6.layouts.partials.footer')
</div><!-- End .page-wrapper -->


<!-- Plugins JS File -->
<script src="{{ asset('common/js/jquery.min.js') }}"></script>
<script src="{{ asset('theme6/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('theme6/js/plugins.min.js') }}"></script>
@yield('page_bot_js')
<!-- Main JS File -->
<script src="{{ asset('theme6/js/main.min.js') }}"></script>
<script src="{{ asset('common/js/lazyload.js') }}" ></script>
@if(app()->environment('production'))
    <script type="text/javascript">
        OAID = 2240212;
        ORef = escape(window.parent.location.href);
        !function () {
            var a = document.createElement("script");
            a.type = "text/javascript", a.async = !0, a.src = "//track.omguk.com/la?aid=" + OAID + "&ref=" + ORef;
            var b = document.getElementsByTagName("body")[0];
            if (b) b.appendChild(a, b); else {
                var b = document.getElementsByTagName("script")[0];
                b.parentNode.insertBefore(a, b)
            }
        }();
    </script>
@endif
</body>
</html>
