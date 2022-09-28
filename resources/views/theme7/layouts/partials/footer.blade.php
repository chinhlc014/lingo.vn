<footer class="bg-light">
    <div class="container">
        <hr class="my-0">
        <div class="space-top-2 space-bottom-1 space-bottom-lg-2">
            <div class="row justify-content-lg-between">
                <div class="col-lg-6 mb-5 mb-lg-0">

                    <div class="mb-4">
                        <a href="{{ route('home') }}" aria-label="logo" class="navbar-brand-footer">
                            <img class="brand" src="{{ asset('common/images/new_logo/logo1.png') }}" alt="Logo" width="160" >
                        </a>
                    </div>

                    <p class="pb-2 pb-sm-3">{{ trans('meta.web_name') }} nhằm mục đích tạo ra một nền tảng để giúp bạn đưa ra quyết định mua sắm tốt hơn với ít thời gian và năng lượng hơn. Giành được sự tin tưởng của người dùng là trọng tâm trong những gì chúng tôi làm.</p>
                </div>
                <div class="col-6 col-lg-3 mb-5 mb-lg-0">
                    <h5>Trang</h5>
                    <ul class="nav nav-sm nav-x-0 flex-column">
                        <li class="nav-item"><a class="nav-link" href="{{ route('search_all') }}">Đánh giá</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('blog_list') }}">Blog</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3 mb-5 mb-lg-0">
                    <h5>Liên kết</h5>
                    <ul class="nav nav-sm nav-x-0 flex-column">
                        <li class="nav-item"><a class="nav-link" href="https://thieuhoa.com.vn/">Thiều Hoa</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://khanchoangthieuhoa.com/">Khăn Choàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="space-1">
            <div class="w-md-75 text-lg-center mx-lg-auto">
                <p class="text-muted small">
                    {{ trans('meta.web_name') }}
                </p>
            </div>
        </div>
    </div>
</footer>