<!doctype html>
<html lang="vi">
<head>
    <title>@yield('title')</title>
    @include('common.meta_data')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css" media="all">
    <link rel="stylesheet" href="{{ asset('theme7/front.css') }}" media="all">
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

    @if(app()->environment('production'))
        <link rel="dns-prefetch" href="https://www.google-analytics.com">
        <link rel="dns-prefetch" href="https://www.googletagmanager.com">
        <link rel="preconnect" href="https://www.googletagmanager.com">
        <link rel="preconnect" href="https://www.google-analytics.com">
        <link rel="preconnect" href="https://pagead2.googlesyndication.com/">
        <link rel="preconnect" href="https://googleads.g.doubleclick.net/">
        <link rel="preconnect" href="https://tpc.googlesyndication.com/">
        <script async="" src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4480613266653781"
                crossorigin="anonymous" type="text/javascript"></script>
    @endif

    @yield('page_lib_js')
    <style>
        @font-face {
            font-weight: 400;
            font-style:  normal;
            font-family: 'Circular-Loom';
            src: url('//cdn.loom.com/assets/fonts/circular/CircularXXWeb-Book-cd7d2bcec649b1243839a15d5eb8f0a3.woff2') format('woff2');
            font-display: swap;
        }
        @font-face {
            font-weight: 500;
            font-style:  normal;
            font-family: 'Circular-Loom';
            src: url('//cdn.loom.com/assets/fonts/circular/CircularXXWeb-Medium-d74eac43c78bd5852478998ce63dceb3.woff2') format('woff2');
            font-display: swap;
        }
        @font-face {
            font-weight: 700;
            font-style:  normal;
            font-family: 'Circular-Loom';
            src: url('//cdn.loom.com/assets/fonts/circular/CircularXXWeb-Bold-83b8ceaf77f49c7cffa44107561909e4.woff2') format('woff2');
            font-display: swap;
        }
        @font-face {
            font-weight: 900;
            font-style:  normal;
            font-family: 'Circular-Loom';
            src: url('//cdn.loom.com/assets/fonts/circular/CircularXXWeb-Black-bf067ecb8aa777ceb6df7d72226febca.woff2') format('woff2');
            font-display: swap;
        }
    </style>
    <style>
        .ads-400-250 {
            opacity: 0;
            position: fixed;
            z-index: 9995;
            bottom: 0;
            height: 250px;
            width: 400px;
            text-align: center;
        }
    </style>
    @include('common.schema')
</head>
<body>
    @yield('header')
    @yield('body')
    @include('theme7.layouts.partials.footer')
    <script src="{{ asset('common/js/lazyload.js') }}" ></script>
    @yield('page_bot_js')
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

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-208864407-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-208864407-1');
        </script>
    @endif
    @if(app()->environment('production'))
        <div class="justify-content-center d-flex">
            <div class="ads-400-250 d-flex">
                <ins class="adsbygoogle ads-400-250"
                     style="display:inline-block;width:400px;height:250px"
                     data-ad-client="ca-pub-4480613266653781"
                     data-ad-slot="3359223178"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
    @endif
    <script>
        $('.btn-go-to-shop').click(function(e) {
            e.preventDefault();
            let urlHref = $(this).data('href')
            let urlOpenTab = $(this).data('open-tab')

            window.open(urlOpenTab, '_blank');
            // window.location.href = urlHref
        });
    </script>
</body>
</html>
