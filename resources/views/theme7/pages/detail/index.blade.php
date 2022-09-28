@extends('theme7.layouts.master')
@section('title'){{ data_get($metaData, 'meta_og_title')  }}@endsection
@section('header')
    @include('theme7.layouts.partials.header2')
@endsection
@section('page_lib_js')
    <script
            src="//code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script async src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

@endsection
@section('page_bot_js')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
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
                                    aria-current="page">{{ $item->name }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner container mt-1">
            <span>
                <a href="https://www.thecoth.com/collection-iconic" target="_blank">
                    @if($agent->isDesktop())
                        <img alt="the coth" class="img-fluid" src="https://i.imgur.com/ykMg0TV.jpg" width="1110"
                         height="278">
                    @else
                        <img alt="the coth" class="img-fluid" src="https://i.imgur.com/tmDjJX6.jpg" width="500"
                             height="500">
                    @endif
                </a>

            </span>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-9 mb-5 mb-md-0">
                        <div class="bp-cards card border p-3 p-lg-5 mb-5" id="p-{{ $item->itemid }}">
                            <div class="mb-2">
                                <h3 class="text-dark line-2-hidden">{{ $item->name }}</h3>
                            </div>
                            <div class="px-md-2 mb-md-0 w-100 mt-5">
                                <div class="text-center">
                                    <a href="{{$item->present()->getRedirectLink}}"
                                       rel="nofollow" target="_blank">
                                        <img class="img-fluid lazyload bp-product-thumb lazy"
                                             src="{{ asset('common/images/product_temp.svg') }}"
                                             data-src="{{ $item->present()->imageThumb }}"
                                             width="220" height="220"
                                             alt="{{ $item->name }}">
                                    </a>
                                </div>
                                <div class="bp-product-thumblist">
                                    @foreach( data_get($item, 'images' , []) as $image)
                                        <a
                                           data-open-tab="{{ $item->present()->getRedirectLink  }}"
                                           href="{{ $item->present()->getRedirectLink  }}"
                                           data-href="https://bit.ly/thoitrangthecoth"
                                           rel="nofollow" target="_blank" class="btn-go-to-shop">
                                            <img class="shadow rounded lazyload lazy"
                                                 src="{{ asset('common/images/product_temp.svg') }}"
                                                 data-src="{{ \App\Support\WebHelpers::imageUrl($image) }}"
                                                 alt="{{ $item->name }}" width="100"
                                                 height="100">
                                        </a>
                                    @endforeach
                                </div>
                                <div class="text-center pt-5">
                                    <h4 class="h5 mb-4">
                                        Đánh giá cho sản phẩm (FTB Score)
                                        <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"  title="Điểm FTB là hệ thống tính điểm độc quyền của chúng tôi giúp chúng tôi đánh giá từng sản phẩm theo thang điểm từ 1 đến 10. Điểm số được dựa trên các tính năng của sản phẩm, mức độ phổ biến trực tuyến, giá cả, danh tiếng thương hiệu và các đánh giá khác của chuyên gia."></i>
                                    </h4>
                                    <div class="position-relative max-w-13rem mx-auto mb-2">
                                        <img class="img-fluid" src="{{ asset('theme7/images/review-rating-shield.svg') }}" alt="ftb score rating icon" width="96" height="81">
                                        <span class="position-absolute top-0 right-0 left-0 z-index-2 text-white font-size-2 font-weight-bold mt-2">{{ round($item->present()->getRatingStar(1)*2, 1) }}</span>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <div class=" mb-2 mx-1 d-inline mr-5" >
                                        @if($item->discount)
                                            <span class="text-small"><small><del>{{ $item->present()->priceBeforeDiscount }}</del></small> </span>
                                        @endif
                                        <span class="product-price font-size-2">{{ $item->present()->priceFormatWithCurrency }}</span>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <a class="btn btn-sm btn-primary mb-2 mx-1 btn-go-to-shop"
                                       data-open-tab="{{ $item->present()->getRedirectLink  }}"
                                       href="{{ $item->present()->getRedirectLink  }}"
                                       data-href="https://bit.ly/thoitrangthecoth"
                                       rel="nofollow" target="_blank">
                                        <i class="fab fa-amazon mr-1"></i>Đến cửa hàng</a>
                                </div>
                            </div>
                            <hr class="my-6">
                            <div class="wrapper">
                                <h4 class="mb-4 h5">Mô tả</h4>
                                <div class="smalltext">
                                    {!! str_replace("\n",'<br>', $item->description) !!}
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-3 mb-5 mb-md-0">
                    {{--    next keyword   --}}
                    <nav class="card shadow-none bg-light bp-nav">
                        <div class="card-body">
                            <h5>Từ khóa</h5>
                            <ul class="nav nav-sm nav-x-0 flex-column overflow-hidden">
                                @foreach($keywords as $nextKeyword)
                                    <li class="nav-item line-2-hidden">
                                        <div class="nav-link">
                                            <a href="{{ route('tag_detail', ['slug' => $nextKeyword->slug]) }}">{{ $nextKeyword->name }}</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                    <div class="banner card shadow-none mt-3">
                        <span>
                            <a href="https://www.thecoth.com/collection-iconic"  target="_blank">
                                <img alt="the coth" class="img-fluid" src="https://i.imgur.com/tmDjJX6.jpg" width="500"
                                     height="500">
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div id="products-section" class="container space-bottom-1">
            <div class="text-center mx-md-auto mb-5 mb-md-9 mt-5 border-top pt-8">
                <h2>Sản phẩm liên quan</h2>
            </div>
            <div class="row mx-n2 mx-sm-n3 mb-3">
                @foreach($otherItems as $item)
                    <div class="col-sm-6 col-lg-3 px-2 px-sm-3 mb-3 mb-sm-5">
                        <div class="card border shadow-none text-center h-100">
                            <div class="position-relative product-image">
                            <a
                                data-open-tab="{{ $item->present()->getRedirectLink  }}"
                                href="{{ $item->present()->getRedirectLink  }}"
                                data-href="https://bit.ly/thoitrangthecoth"
                                   rel="nofollow" target="_blank" class="btn-go-to-shop">
                                    <img class="card-img-top lazyload" style="padding-top:2.5rem;"
                                         src="{{ $item->present()->imageThumb }}"
                                         alt="{{ $item->name }}"
                                         width="156" height="156">
                                </a>
                            </div>
                            <div class="card-body pt-4 px-4 pb-0">
                                <div class="mb-2">
                                <span class="d-block font-size-1" style="height: 48px;overflow: hidden;">
                                <a class="text-inherit btn-go-to-shop"
                                   data-open-tab="{{ $item->present()->getRedirectLink  }}"
                                   href="{{ $item->present()->getRedirectLink  }}"
                                   data-href="https://bit.ly/thoitrangthecoth"
                                   rel="nofollow" target="_blank">{{ $item->name }}</a>
                                </span>
                                </div>
                            </div>
                            <div class="card-footer border-0 pt-0 pb-4 px-4">
                                <a class="btn btn-sm btn-outline-primary btn-pill transition-3d-hover btn-go-to-shop"
                                   data-open-tab="{{ $item->present()->getRedirectLink  }}"
                                   href="{{ $item->present()->getRedirectLink  }}"
                                   data-href="https://bit.ly/thoitrangthecoth"
                                   rel="nofollow" target="_blank">Xem trên shopee</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection

