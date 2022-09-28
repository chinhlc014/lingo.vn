@extends('theme6.layouts.master')
@section('header_bottom')
    @widget('App\Widgets\Theme6\Common\HeaderBottom')
@endsection
@section('meta_data')
    @include('common.meta_data')
@endsection
@section('schema_data')
    @include('common.schema')
@endsection
@section('title'){{ data_get($metaData, 'meta_og_title')  }}@endsection
@section('main')
    <main class="main">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home')  }}">NTVV</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ $item->name }}</a></li>
                </ol>
            </nav>
            <div class="row">

                <div class="col-lg-12 main-content">
                    <div class="product-single-container product-single-default">
                        <div class="row">
                            <div class="col-lg-7 col-md-6 product-single-gallery">
                                <div class="product-slider-container">
                                    <div class="product-single-carousel owl-carousel owl-theme">
                                        <div class="product-item">
                                            <img class="product-single-image" alt="{{ $item->name }}" src="{{ \App\Support\WebHelpers::imageUrl($item->image) }}" data-zoom-image="{{ \App\Support\WebHelpers::imageUrl($item->image) }}"/>
                                        </div>
                                        @foreach( data_get($item, 'images' , []) as $image)
                                            <div class="product-item">
                                                <img class="product-single-image" alt="{{ $item->name }}" src="{{ \App\Support\WebHelpers::imageUrl($image) }}" data-zoom-image="{{ \App\Support\WebHelpers::imageUrl($image) }}"/>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- End .product-single-carousel -->
                                    <span class="prod-full-screen">
											<i class="icon-plus"></i>
										</span>
                                </div>
                                <div class="prod-thumbnail owl-dots" id='carousel-custom-dots' >
                                    <div class="owl-dot">
                                        <img style="max-width: 50px;" alt="{{ $item->name }}" src="{{ \App\Support\WebHelpers::imageUrl($item->image) }}"/>
                                    </div>
                                    @foreach( data_get($item, 'images' , []) as $image)
                                        <div class="owl-dot">
                                            <img style="max-width: 50px;" alt="{{ $item->name }}" src="{{ \App\Support\WebHelpers::imageUrl($image) }}"/>
                                        </div>
                                    @endforeach
                                </div>
                            </div><!-- End .product-single-gallery -->

                            <div class="col-lg-5 col-md-6 product-single-details">
                                <h1 class="product-title">{{ $item->name }}</h1>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:{{ $item->present()->getRatingStar*20 }}%"></span><!-- End .ratings -->
                                    </div><!-- End .product-ratings -->

                                    <a href="#" class="rating-link">( {{ $item->present()->shortenRating }} Reviews )</a>
                                </div><!-- End .product-container -->

                                <hr class="short-divider">

                                <div class="price-box">
                                    @if($item->discount)
                                        <span class="old-price">{{ $item->present()->priceBeforeDiscount }}</span>
                                    @endif
                                    <span class="product-price">{{ $item->present()->priceFormatWithCurrency }}</span>
                                </div><!-- End .price-box -->

{{--                                <div class="product-desc">--}}
{{--                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>--}}
{{--                                </div><!-- End .product-desc -->--}}

{{--                                <div class="product-filters-container">--}}
{{--                                    <div class="product-single-filter">--}}
{{--                                        <label>Colors:</label>--}}
{{--                                        <ul class="config-swatch-list">--}}
{{--                                            <li class="active">--}}
{{--                                                <a href="#" style="background-color: #0188cc;"></a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" style="background-color: #ab6e6e;"></a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" style="background-color: #ddb577;"></a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" style="background-color: #6085a5;"></a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div><!-- End .product-single-filter -->--}}
                                {{--                                </div><!-- End .product-filters-container -->--}}

                                <hr class="divider">
                                <p>
                                    {!! $sortDescription !!}
                                </p>

                                <div class="product-action">
                                    {{--                                    <div class="product-single-qty">--}}
                                    {{--                                        <input class="horizontal-quantity form-control" type="text">--}}
                                    {{--                                    </div><!-- End .product-single-qty -->--}}

                                    <a href="{{ $item->present()->getRedirectLink  }}"
                                       data-open-tab="{{ $item->present()->getRedirectLink  }}"
                                       data-href="https://bit.ly/thoitrangthecoth"
                                       rel="nofollow" target="_blank"
                                       id="btn-go-to-shop"
                                       class="btn btn-success add-cart icon-shopping-cart" title="Go to Shop">Đến cửa
                                        hàng</a>
                                </div><!-- End .product-action -->
                                <div class="banner" style="text-align: center; margin-top: 30px;">
                                    <span>
                                        <a href="http://www.thecoth.com" target="_blank" rel="nofollow,noopener"><img src="http://www.thecoth.com/wp-content/uploads/2021/11/2-1.jpeg" width="340" height="360"></a>
                                    </span>
                                </div>
                                {{--                                <hr class="divider mb-1">--}}

                                {{--                                <div class="product-single-share">--}}
                                {{--                                    <label class="sr-only">Share:</label>--}}

                                {{--                                    <div class="social-icons mr-2">--}}
                                {{--                                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>--}}
                                {{--                                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>--}}
{{--                                        <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>--}}
{{--                                        <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>--}}
{{--                                        <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>--}}
{{--                                    </div><!-- End .social-icons -->--}}

{{--                                    <a href="#" class="add-wishlist" title="Add to Wishlist">Add to Wishlist</a>--}}
{{--                                </div><!-- End .product single-share -->--}}
                            </div><!-- End .product-single-details -->
                        </div><!-- End .row -->
                    </div><!-- End .product-single-container -->

                    <div class="product-single-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Thông Tin Sản Phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Từ Khóa</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                                <div class="product-desc-content">
                                    {!! str_replace("\n",'<br>', $item->description) !!}
                                </div><!-- End .product-desc-content -->
                            </div><!-- End .tab-pane -->

                            <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                                <div class="product-tags-content">
                                    <div class="tag-body">
                                        <div class="tags-inner">
                                            @foreach($keywords as $keyword)
                                                <a href="{{ route('tag_detail', ['slug' => $keyword->slug]) }}" class="tag-item">{{ $keyword->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div><!-- End .product-tags-content -->
                            </div><!-- End .tab-pane -->

                        </div><!-- End .tab-content -->
                    </div><!-- End .product-single-tabs -->

                    @include('theme6.pages.detail.partials.related_products')
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->

            <div class="mb-lg-4"></div><!-- margin -->
        </div><!-- End .container -->
    </main><!-- End .main -->
@endsection
@section('page_bot_js')
    <script>
        $('#btn-go-to-shop').click(function(e) {
            e.preventDefault();
            let urlHref = $(this).data('href')
            let urlOpenTab = $(this).data('open-tab')

            window.open(urlOpenTab, '_blank');
            window.location.href = urlHref
        });
    </script>
@endsection
