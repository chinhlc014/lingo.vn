<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="{{ trans('meta.web_name') }}">
    <title>{{ trans('meta.web_name') }} Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Canonical SEO -->
    <link rel="canonical" href="{{ route('home') }}" />
    <!--  Social tags      -->
    <meta name="keywords" content="admin">
    <meta name="description" content="admin">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('adminAssets/img/brand/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" type="text/css">
    <script type="text/javascript" src="{{ asset("ckeditor/ckeditor.js") }}"></script>
    <!-- Argon CSS -->
    @yield('page_top_lib_css')
    <link rel="stylesheet" href="{{ asset('adminAssets/css/argon.min23cd.css') }}" type="text/css">
</head>

<body>
<!-- Sidenav -->
@include('admin.layouts.partials.sidenav')
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    @include('admin.layouts.partials.top_navbar')
    <!-- Header -->
    @include('admin.layouts.partials.breadcrumb')
    <!-- Header -->

    <!-- Page content -->
    <div class="container-fluid mt--6">
        @yield('content')



        <!-- Footer -->
        <footer class="footer pt-3">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; 2021 <a href="https://www.creative-tim.com/" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com/" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ asset('adminAssets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('adminAssets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminAssets/vendor/js-cookie/js.cookie.js') }}"></script>
<script src="{{ asset('adminAssets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('adminAssets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
<script src="{{ asset('adminAssets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('page_bot_lib_js')
<!-- Argon JS -->
<script src="{{ asset('adminAssets/js/argon.min23cd.js') }}"></script>
@yield('page_bot_js')
<script>

    $(document).ready(function() {
        window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        /**
         * Next we will register the CSRF Token as a common header with Axios so that
         * all outgoing HTTP requests automatically have it attached. This is just
         * a simple convenience so we don't have to attach every token manually.
         */
        let token = document.head.querySelector('meta[name="csrf-token"]');
        if (token) {
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
        } else {
            console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
        }
    });

    $(document).on('click', '[data-swal]', function(e) {
        e.preventDefault()

        const $this = $(this)
        const url = $this.attr('href')
        const options = $this.data('swal') || {}
        const data = $this.data('swalData') || {}
        const method = $this.data('swalMethod') || 'GET'
        options.showLoaderOnConfirm = true;

        Swal.fire(options).then((result) => {
            console.log(result)
            if (typeof result.value !== "undefined" && result.value) {
                if (url) {
                    axios.request({
                        url,
                        method,
                        data
                    }).then(({data}) => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                        })
                        if (data.redirect) {
                            setTimeout(() => {
                                if (data.redirect === true) {
                                    window.location.reload()
                                } else {
                                    window.location = data.redirect;
                                }
                            }, 1000)
                        }
                    })
                }
            }
        }, dismiss => {
            // console.log(dismiss)
        })
    })
</script>

@yield("js")
<!-- Demo JS - remove this in your project -->
{{--<script src="{{ asset('adminAssets/js/demo.min.js') }}"></script>--}}
</body>


</html>
