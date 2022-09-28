@extends('theme7.layouts.master')
@section('title', 'Review '. $shop->name)
@section('header')
    @include('theme7.layouts.partials.header2')
@endsection
@section('page_lib_js')
    <script
            src="//code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
@endsection
@section('body')
    <main id="content" role="main">
        <div class="bg-light">
            <div class="container py-3">
                <div class="row justify-content-md-between align-items-md-center">
                    <div class="col-md-8 py-2 mb-md-0">
                        <nav class="d-inline-block rounded" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter font-size-1 mb-0">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                                <li class="breadcrumb-item active d-none d-md-block"
                                    aria-current="page">{{ \Str::ucfirst($shop->name) }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container space-top-1">
            <div class="page-header">
                <div class="d-sm-flex align-items-lg-center py-3">
                    <div class="media-body">
                        <div class="row">
                            <div class="col-lg mb-3 mb-lg-0">
                                <h1 class="h2 mb-1">
                                    {{ $shop->name }}
                                </h1>
                                <div class="d-flex ml-auto align-items-center">
                                    <div class="mr-1 small" style="color:#ffc109;">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star "></i>
                                    </div>
                                    <span class="font-weight-bold text-dark ml-1">{{ $shop->present()->getRatingStar(2) }}</span>
                                    <span class="font-size-1 ml-1">({{ $shop->present()->ratingCount() }} đánh giá)</span>
                                </div>
                            </div>
                            <div class="col-lg-auto align-self-lg-end text-lg-right">
                                <div>
                                    <a class="btn btn-sm btn-block btn-primary mb-1 mb-sm-0" rel="nofollow"
                                       target="_blank" href="{{ $shop->present()->getOriginLink }}">
                                        Xem trên Shopee
                                        <i class="fas fa-angle-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="pageHeaderTabParent">
                    <div class="js-nav-scroller js-sticky-block hs-nav-scroller-horizontal bg-white"
                         data-hs-sticky-block-options="{
                       &quot;parentSelector&quot;: &quot;#pageHeaderTabParent&quot;,
                       &quot;breakpoint&quot;: &quot;lg&quot;,
                       &quot;startPoint&quot;: &quot;#pageHeaderTabParent&quot;,
                       &quot;endPoint&quot;: &quot;#pageHeaderTabEndPoint&quot;
                     }">
                    <span class="hs-nav-scroller-arrow-prev" style="display: none;">
                    <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                    <i class="fas fa-angle-left"></i>
                    </a>
                    </span>
                                            <span class="hs-nav-scroller-arrow-next" style="display: none;">
                    <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                    <i class="fas fa-angle-right"></i>
                    </a>
                    </span>
                        <ul class="js-scroll-nav nav nav-tabs page-header-tabs bg-white" id="pageHeaderTab"
                            role="tablist" data-hs-scroll-nav-options="{
                                &quot;customOffsetTop&quot;: -70
                            }">
                            <li class="nav-item active">
                                <a class="nav-link" href="#about-section">Thông tin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#products-section">Sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#faqs-section">FAQs</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div id="about-section" class="container space-top-1 space-bottom-1">
            <h2 class="h3 mb-5">Thông tin về shop</h2>
            <div class="row mb-5">
                <div class="col-md-3 order-md-2 mb-3 mb-md-0">
                    <div class="pl-md-4">
                        <ul class="list-unstyled list-article">
                            <li>
                                <span class="h5 d-block">Nơi bán</span>
                                <div>
                                    <span class="badge badge-soft-success">
                                    <span class="legend-indicator bg-success"></span>Shopee
                                    </span>
                                </div>
                            </li>
                            <li>
                                <span class="h5 d-block">Địa chỉ người bán</span>
                                <div class="font-size-1">
                                    {{ $shop->shop_location }}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="mb-5" style="word-wrap: break-word;">
                        @if(isset($extraInfo['rate']))
                            <p>{{ $extraInfo['rate'] }}</p>
                        @endif
                            @if(isset($extraInfo['product']))
                                <p>{{ $extraInfo['product'] }}</p>
                            @endif
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-5 mb-3 mb-md-0">
                            <div class="small d-flex justify-content-md-start align-items-center text-muted">
                                <i class="far fa-clock mr-1"></i>
                                Cập nhật: {{ $shop->updated_at->format('d/m/Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="products-section" class="container space-bottom-1">
            <div class="text-center mx-md-auto mb-5 mb-md-9 mt-5 border-top pt-8">
                <h2>Sản phẩm của shop</h2>
            </div>
            <div class="row mx-n2 mx-sm-n3 mb-3">
                @foreach($items as $item)
                    <div class="col-sm-6 col-lg-3 px-2 px-sm-3 mb-3 mb-sm-5">
                    <div class="card border shadow-none text-center h-100">
                        <div class="position-relative product-image">
                            <a
                                data-open-tab="{{ $item->present()->getRedirectLink  }}"
                                data-href="https://bit.ly/thoitrangthecoth"
                               rel="nofollow" target="_blank" class="btn-go-to-shop">
                                <img class="card-img-top lazyload" style="padding-top:2.5rem;"
                                     src="{{ $item->present()->imageThumb }}"
                                     alt="{{ $item->name }}"
                                     width="156" height="156">
                            </a>
{{--                            <div class="position-absolute top-0 left-0 pt-3 pl-3">--}}
{{--                                <a class="badge badge-soft-warning"--}}
{{--                                   href="https://www.findthisbest.com/best-car-seat-covers">--}}
{{--                                    Car Seat Cover--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </div>
                        <div class="card-body pt-4 px-4 pb-0">
                            <div class="mb-2">
                                <span class="d-block font-size-1" style="height: 48px;overflow: hidden;">
                                <a class="text-inherit btn-go-to-shop"
                                   data-open-tab="{{ $item->present()->getRedirectLink  }}"
                                   data-href="https://bit.ly/thoitrangthecoth"
                                   rel="nofollow" target="_blank">{{ $item->name }}</a>
                                </span>
                            </div>
                        </div>
                        <div class="card-footer border-0 pt-0 pb-4 px-4">
                            <a class="btn btn-sm btn-outline-primary btn-pill transition-3d-hover btn-go-to-shop"
                               data-open-tab="{{ $item->present()->getRedirectLink  }}"
                               data-href="https://bit.ly/thoitrangthecoth"
                               rel="nofollow" target="_blank">Xem trên shopee</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="position-relative text-center">
                <div class="d-inline-block font-size-1 border bg-white text-center rounded-pill py-3 px-4">
                    Xem tất cả sản phẩm?
                    <a class="d-block d-sm-inline-block font-weight-bold ml-sm-3"
                       href="{{ $shop->present()->getOriginLink }}"
                       rel="nofollow" target="_blank">
                        Đến trang người bán
                        <span class="fas fa-angle-right ml-1"></span>
                    </a>
                </div>
            </div>
        </div>

        <div id="faqs-section" class="container space-top-1 space-bottom-1">
            <div class="text-center mx-lg-auto mb-5 mb-md-9 border-top pt-8">
                <h2>Các câu hỏi thường gặp</h2>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-5">
                    <div class="pr-md-4">
                        <h4>Bạn muốn hoàn tiền từ {{ $shop->name }}?</h4>
                        <p>Vui lòng tham khảo <a
                            href="https://shopee.vn/legaldoc/policies"
                            target="_blank" rel="nofollow">Điều khoản Shopee</a> và <a
                            href="https://shopee.vn/docs/3111"
                            target="_blank" rel="nofollow">Chính sách hoàn tiền</a> hoặc liên hệ với {{ $shop->name }} để nhận thông tin về bất kỳ chính sách bổ sung nào có thể áp dụng.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-3 mb-md-5">
                    <div class="pl-md-4">
                        <h4>Đơn hàng từ {{ $shop->name }} không được giao, bạn muốn biết thông tin theo dõi đơn hàng?</h4>
                        <p>
                            Bạn có thể vào trực tiếp trang đơn hàng Shopee để xem thông tin theo dõi đơn hàng cho việc mua hàng của mình. Nếu bạn vẫn còn thắc mắc về vấn đề này, bạn có thể nhấp vào <a
                                    href="https://help.shopee.vn/vn/s/topic/0TO6F000000QzKWWA0/v%E1%BA%ADn-chuy%E1%BB%83n"
                                    target="_blank" rel="nofollow">đây</a> để biết thêm thông tin trợ giúp đặt hàng.
                        </p>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-6 mb-3 mb-md-5">
                    <div class="pr-md-4">
                        <h4>Tôi không chắc chắn về cách sử dụng các mặt hàng đã mua và muốn hỏi?</h4>
                        <p>Chúng tôi không phải là người bán Shopee đó và không cung cấp dịch vụ tư vấn cho việc sử dụng mặt hàng đó. Vui lòng liên hệ với {{ $shop->name }} nếu bạn có thắc mắc.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-3 mb-md-5">
                    <div class="pl-md-4">
                        <h4>Tôi là chủ sở hữu của cửa hàng Shopee này, muốn xóa thông tin của tôi khỏi {{ trans('meta.web_name') }}?</h4>
                        <p>Vui lòng gửi cho chúng tôi email kèm theo thông tin của bạn về {{ $shop->name }} và chúng tôi sẽ xem xét và xử lý.</p>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-6 mb-3 mb-md-5 mb-md-0">
                    <div class="pr-md-4">
                        <h4>Tôi đã nhận được một khoản phí trong thẻ tín dụng của mình từ {{ $shop->name }}, nhưng tôi chưa đặt hàng từ bạn?</h4>
                        <p>Vui lòng kiểm tra hóa đơn tín dụng của bạn để nhớ lại nếu đơn hàng được đặt từ cửa hàng trên trang web hoặc Shopee. Nếu bạn vẫn có câu hỏi về khoản bồi hoàn, vui lòng liên hệ với người bán Shopee {{ $shop->name }} để xác nhận xem có thực sự là vấn đề hay không.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pl-md-4">
                        <h4>Địa chỉ liên hệ cho {{ $shop->name }} là gì?</h4>
                        <p>Chúng tôi không thể tìm thấy thông tin liên hệ như số điện thoại và email cho {{ $shop->name }} vào lúc này, bạn có thể truy cập trực tiếp vào trang
                            <a rel="nofollow" target="_blank"
                               href="{{ $shop->present()->getOriginLink }}">người bán
                                Shopee</a> để biết thêm thông tin.</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="pageHeaderTabEndPoint" class="container my-5">
            <p>Shop khác:
                @foreach($otherShops as $key => $otherShop)
                    <a href="{{ $otherShop->present()->getRouteUrl }}" target="_blank">
                        {{ $otherShop->name }}@if($key < ($otherShops->count() -1)),@endif
                    </a>
                @endforeach
            </p>
        </div>
    </main>
@endsection
