@extends('layouts.master')

@section('title'){{ data_get($metaData, 'meta_og_title')  }}@endsection
@section('page_header_css')
    <style>
        body {
            font-size: .875rem;
            font-family: Mulish,Helvetica Neue,Helvetica,Arial,Roboto,sans-serif;
            background: #fff;
            font-weight: 400;
            line-height: 1.5;
            color: #183239;
            -webkit-font-smoothing: antialiased;
        }
        .driect-wrap {
            display: table;
            height: 100vh;
            max-width: 700px;
            margin: 0 auto;
        }
        .container {
            width: 100%;
            display: table-cell;
            vertical-align: middle;
            padding: 50px 0;
        }
        .logo {
            line-height: 0;
            text-align: center;
        }
        .logo a {
            display: inline-block;
            line-height: 0;
        }
        .logo img {
            max-height: 64px;
        }
        .driect-text {
            margin: 24px 0 0;
            font-size: 24px;
            line-height: 28px;
            font-weight: 500;
            color: #333;
            text-align: center;
        }
        .driect-text p {
            margin: 0;
        }
        .driect-loading {
            margin: 24px 0 0;
            text-align: center;
        }
        .driect-load-text {
            font-size: 24px;
            line-height: 28px;
            color: #333;
        }
        .driect-load-wrap {
            margin: 32px auto 0;
            position: relative;
            width: 100%;
            max-width: 120px;
            display: block;
            min-height: 120px;
        }
        #driectLoad {
            width: 120px;
            animation: loading 3s linear infinite;
        }
        #loading-inner {
            stroke-dashoffset: 0;
            stroke-dasharray: 300;
            stroke-width: 8;
            stroke-miterlimit: 10;
            stroke-linecap: round;
            animation: loading-circle 2s linear infinite;
            stroke: #207BC1;
            fill: transparent;
        }
        @keyframes loading {
            0% {
                -webkit-transform: rotate(0);
                -ms-transform: rotate(0);
                transform: rotate(0);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes loading-circle {
            0% {
                stroke-dashoffset: 0
            }
            100% {
                stroke-dashoffset: -600;
            }
        }
        #driectTimer {
            font-size: 48px;
            line-height: 56px;
            color: #207BC1;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        .driect-link {
            margin: 48px 0 0;
            text-align: center;
        }
        .driect-link a {
            display: inline-block;
            font-size: 24px;
            line-height: 28px;
            color: #FFF;
            background: #FF4200 none;
            padding: 13px 35px;
            border-radius: 8px;
        }
        a {
            -webkit-transition: all .3s;
            transition: all .3s;
            text-decoration: none;
            color: #337ab7;
        }
    </style>
@endsection
@section('page_bot_js')
    <script>
        function startTimer() {
            let seconds = 1
            setInterval(function() {
                document.getElementById("driectTimer").innerHTML = seconds + 's';

                if (seconds === 0) {
                    window.location.href = document.getElementById('origin-link').getAttribute('href');
                } else {
                    seconds--;
                }
            }, 1000)
        }

        window.onload = function () {
            startTimer();
        };
    </script>
    @if(app()->environment('production'))
        <script type="text/javascript">
            OAID=2240212;ORef=escape(window.parent.location.href);!function(){var a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src="//track.omguk.com/la?aid="+OAID+"&ref="+ORef;var b=document.getElementsByTagName("body")[0];if(b)b.appendChild(a,b);else{var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)}}();
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
@endsection
@section('content')
    <section class="driect-wrap">
        <div class="container">
            <h1 class="logo">
                <a href="{{ route('home') }}" title="">
                    <img src="{{ asset('common/images/logo.png') }}" alt="Trang chủ">
                </a>
            </h1>
            <div class="driect-text"><p>Bạn đang chuyển đến trang bán sản phẩm</p>
                <p>"{{  $item->name }}" trên {{ config('domains.url') }}!</p></div>
            <div class="driect-loading">
                <div class="driect-load-text">Vui lòng chờ trong vòng</div>
                <div class="driect-load-wrap">
                    <svg id="driectLoad" xmlns="http://www.w3.org/2000/svg"
                         version="1.1" viewBox="0 0 120 120" x="0px" y="0px">
                        <circle cx="60" cy="60" r="56" id="loading-inner"></circle>
                    </svg>
                    <span id="driectTimer">2s</span></div>
            </div>
            <div class="driect-link">
                <a href="{{ $link }}" id="origin-link" rel="nofollow" title="">Chuyển đến trang ngay lập tức</a>
            </div>

        </div>
    </section>
@endsection
