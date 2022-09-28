@extends('theme7.layouts.master')
@section('title', \Str::ucfirst($keyword->name))
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
        $(document).ready(function () {
            $('.wrapper').find('a[href="#"]').on('click', function (e) {
                e.preventDefault();
                this.expand = !this.expand;
                $(this).text(this.expand ? "Thu nhỏ" : "Xem thêm");
                $(this).closest('.wrapper').find('.smalltext, .big').toggleClass('smalltext big');
            });
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
                                    aria-current="page">{{ \Str::ucfirst($keyword->name) }}
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
        <div class="container space-top-1">
            <div class="mx-lg-auto">
                <div class="row mb-1">
                    <div class="col-md-8 mb-md-0">
                        <h1 class="h2">
                            <a class="text-dark" href="{{ url()->current() }}">
                                {{ \Str::ucfirst($keyword->name) }}
                            </a>
                        </h1>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex justify-content-md-end align-items-center social-share-action pt-2">
								<span class="btn btn-xs btn-icon btn-soft-secondary rounded-circle mr-2 sb-facebook">
								<i class="fab fa-facebook-f"></i>
								</span>
                            <span class="btn btn-xs btn-icon btn-soft-secondary rounded-circle mr-2 sb-twitter">
								<i class="fab fa-twitter"></i>
								</span>
                            <span class="btn btn-xs btn-icon btn-soft-secondary rounded-circle mr-2 sb-pinterest">
								<i class="fab fa-pinterest"></i>
								</span>
                            <span class="btn btn-xs btn-icon btn-soft-secondary rounded-circle mr-2 sb-linkedin">
								<i class="fab fa-linkedin"></i>
								</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5 mt-5" id="intro">
            <div class="card shadow-none p-2 mb-3 mb-sm-2">
                <div class="media align-items-center max-w-35rem mb-4">
                    @if($reviewer)
                        <div class="mr-3">
                            <img class="img-fluid rounded-circle lazy"
                                 src="{{ asset('common/images/product_temp.svg') }}"
                                 width="50" height="50" data-src="{{ $reviewer->present()->image }}"
                                 alt="{{ $reviewer->name }}">
                        </div>
                    @endif
                    <div class="media-body">
                        @if($reviewer)
                            <div class="h4 mb-1">
                                <span class="text-dark">{{ $reviewer->name }}</span>
                                <img class="bottom-0 right-0 rounded-circle mb-1 lazyload"
                                     src="https://cdn.findthisbest.com/assets/svg/illustrations/top-vendor.svg"
                                     data-src="https://cdn.findthisbest.com/assets/svg/illustrations/top-vendor.svg"
                                     alt="Top Writer Icon" width="16" height="16" title="Top Writer">
                            </div>
                        @endif
                        <div class="mb-0 text-nowrap small text-body">
                            <i class="far fa-clock"></i>
                            Cập nhật: {{ $keyword->updated_at->format('d/m/Y') }}
                        </div>
                    </div>
                </div>
                @php
                    $adminKeywordSites = $keyword->adminKeywordSites;
                    $adminKeywordSite = $adminKeywordSites->first();
                @endphp
                @if($adminKeywordSite && $adminKeywordSite->top_description)
                    <div class="description_shot">
                        {!! $adminKeywordSite->top_description !!}
                    </div>
                @endif
            </div>
        </div>
        <div class="container mb-5" id="quick-pick">
            <div class="mx-lg-auto bg-dark rounded px-2 px-md-8 px-lg-10 py-5">
                <div class="row">
                    @foreach($items->take(3) as $index => $item)
                        <div class="col-sm-12 col-lg-4 mb-3">
                            <div class="card border shadow-none text-center h-100 d-none d-lg-block">
                                <div class="position-relative">
                                    <a
                                        data-open-tab="{{ $item->present()->getRedirectLink  }}"
                                        href="{{ $item->present()->getRedirectLink  }}"
                                        data-href="https://bit.ly/thoitrangthecoth"
                                       rel="nofollow" target="_blank" class="btn-go-to-shop">
                                        <img style="height: 220px;object-fit: contain;padding: 2rem;"
                                             class="card-img-top lazy"
                                             src="{{ asset('common/images/product_temp.svg') }}"
                                             data-src="{{ $item->present()->imageThumb }}"
                                             alt="HIWARE Lobster Crackers and Picks Set Cover" width="220" height="220">
                                    </a>
                                    <div class="position-absolute top-0 left-0 pt-3 pl-3">
                                            <span class="badge badge-soft-primary">
                                            <span class="legend-indicator bg-primary"></span>TOP {{ $index + 1 }}
                                            </span>
                                    </div>
                                </div>
                                <div class="card-body pt-4 px-4 pb-0 mb-2 line-2-hidden" style="height: 74px;">
                                    {{ $item->name }}
                                </div>
                                <div class="position-relative max-w-13rem mx-auto mb-2">
                                    <img class="img-fluid" src="{{ asset('theme7/images/review-rating-shield.svg') }}" alt="ftb score rating icon" width="96" height="81">
                                    <span class="position-absolute top-0 right-0 left-0 z-index-2 text-white font-size-2 font-weight-bold mt-2">{{ round($item->present()->getRatingStar(1)*2, 1) }}</span>
                                    <div class="small pt-2">FTB Score <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"  title="Điểm FTB là hệ thống tính điểm độc quyền của chúng tôi giúp chúng tôi đánh giá từng sản phẩm theo thang điểm từ 1 đến 10. Điểm số được dựa trên các tính năng của sản phẩm, mức độ phổ biến trực tuyến, giá cả, danh tiếng thương hiệu và các đánh giá khác của chuyên gia."></i>
                                    </div>
                                </div>
                                <div class="card-footer border-0 pt-3 pb-4 px-4">
                                    <a class="btn btn-sm btn-outline-primary btn-pill transition-3d-hover btn-go-to-shop"
                                       data-open-tab="{{ $item->present()->getRedirectLink  }}"
                                       href="{{ $item->present()->getRedirectLink  }}"
                                       data-href="https://bit.ly/thoitrangthecoth"
                                       rel="nofollow" target="_blank"><i class="fas fa-check-circle mr-1"></i> Đến cửa
                                        hàng
                                        <i class="fas fa-angle-right ml-1"></i></a>
                                </div>
                            </div>
                            <div class="card border shadow-none text-center h-100 d-lg-none p-3">
                                <div class="media">
                                    <div class="avatar avatar-lg mr-3">
                                        <a class="text-inherit btn-go-to-shop"
                                           data-open-tab="{{ $item->present()->getRedirectLink  }}"
                                           href="{{ $item->present()->getRedirectLink  }}"
                                           data-href="https://bit.ly/thoitrangthecoth"
                                           rel="nofollow" target="_blank">
                                            <img class="avatar-img lazy"
                                                 src="{{ asset('common/images/product_temp.svg') }}"
                                                 data-src="{{ $item->present()->imageThumb }}"
                                                 alt="{{ $item->name }}" width="68" height="68"></a>
                                    </div>
                                    <div class="media-body text-left">
                                        <h5 class="h6"
                                            style="height: 40px;overflow: hidden;white-space: wrap;word-wrap: break-word;word-break: break-all;">
                                            <a class="text-inherit btn-go-to-shop"
                                               data-open-tab="{{ $item->present()->getRedirectLink  }}"
                                               href="{{ $item->present()->getRedirectLink  }}"
                                               data-href="https://bit.ly/thoitrangthecoth"
                                               rel="nofollow" target="_blank">
                                                {{ $item->name }}
                                            </a>
                                        </h5>
                                        <div class="text-body font-size-1">
                                            <span class="badge badge-soft-primary">
                                                <span class="legend-indicator bg-primary"></span>TOP {{ $index + 1 }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container bp-container">
            <h2 class="h3 pt-1 pb-4 text-center">Top {{ $items->count() }} {{ $keyword->name }}</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @foreach($items as $index => $item)
                        <div class="bp-cards card border p-3 p-lg-5 mb-5" id="p-{{ $item->itemid }}">
                            <div class="mb-2">
                                <div class="flex justify-content-start align-items-center mb-2"
                                     style="max-width: 100%;flex-wrap: nowrap;overflow-x: auto;white-space: nowrap;">
                                    <small class="badge badge-primary badge-pill">#TOP {{ $index + 1 }}</small>
                                    @if($relatedKeywords->count())
                                        @foreach($relatedKeywords->random($relatedKeywords->count() >= 2 ? 2 : 1) as $relatedKeyword)
                                            <a href="{{ route('tag_detail', ['slug' => $relatedKeyword->slug]) }}">
                                                <small class="badge badge-primary badge-pill">{{ $relatedKeyword->name }}</small>
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                                <h3 class="text-dark line-2-hidden">{{ $item->name }}</h3>
                            </div>
                            <div class="px-md-2 mb-md-0 w-100 mt-5">
                                <div class="text-center">
                                    <a
                                            data-open-tab="{{ $item->present()->getRedirectLink  }}"
                                            href="{{ $item->present()->getRedirectLink  }}"
                                            data-href="https://bit.ly/thoitrangthecoth"
                                       rel="nofollow" target="_blank" class="btn-go-to-shop">
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
                                    <a class="btn btn-sm btn-primary mb-2 mx-1 btn-go-to-shop"
                                       data-open-tab="{{ $item->present()->getRedirectLink  }}"
                                       href="{{ $item->present()->getRedirectLink  }}"
                                       data-href="https://bit.ly/thoitrangthecoth"
                                       rel="nofollow" target="_blank">
                                        <i class="fab fa-amazon mr-1"></i>Đến cửa hàng</a>
                                </div>
                            </div>
                            <hr class="my-6">
                            <div style="overflow: hidden;" class="wrapper">
                                <h4 class="mb-4 h5">Mô tả</h4>
                                <div class="smalltext">
                                    {{ $item->description }}
                                </div>
                                @if($item->description)
                                    <a href="#">Xem thêm</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-3 mb-5 mb-md-0">
{{--                 top product   --}}
                    <div class="banner card shadow-none mt-3">
                        <span>
                            <a href="https://www.thecoth.com/collection-iconic" target="_blank">
                                <img alt="the coth" class="img-fluid" src="https://i.imgur.com/tmDjJX6.jpg" width="500"
                                     height="500"></a>
                        </span>
                    </div>
                    <nav class="card shadow-none bg-light bp-nav">
                        <div class="card-body">
                            <h5>Top {{ $keyword->name }}</h5>
                            @php
                                $countTop = $items->count() > 10 ? 10 : $items->count();
                            @endphp
                            <ul class="nav nav-sm nav-x-0 flex-column overflow-hidden">
                                @foreach($items->take($countTop) as $key => $topItem)
                                    <li class="nav-item line-2-hidden">
                                        <div class="nav-link">
                                            <span>{{ $key+1 }}.</span>
                                            <a href="#p-{{ $topItem->itemid }}">{{ $topItem->name }}</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                    {{--                 top sale product   --}}
                    <nav class="card shadow-none bg-light bp-nav mt-3">
                        <div class="card-body">
                            <h5>Top bán chạy</h5>
                            @php
                                $countTopSold = $items->count() > 10 ? 10 : $items->count();
                                $countItemSold = $items->sortByDesc('historical_sold')->take($countTopSold);
                                $key2 = 1;
                            @endphp
                            <ul class="nav nav-sm nav-x-0 flex-column overflow-hidden">
                                @foreach($countItemSold as $topItemSold)
                                    <li class="nav-item line-2-hidden">
                                        <div class="nav-link">
                                            <span>{{ $key2++ }}.</span>
                                            <a href="#p-{{ $topItemSold->itemid }}">{{ $topItemSold->name }}</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>

                    {{--    next keyword   --}}
                    <nav class="card shadow-none bg-light bp-nav mt-3">
                        <div class="card-body">
                            <h5>Liên quan</h5>
                            <ul class="nav nav-sm nav-x-0 flex-column overflow-hidden">
                                @foreach($nextKeywords as $nextKeyword)
                                    <li class="nav-item line-2-hidden">
                                        <div class="nav-link">
                                            <a href="{{ route('tag_detail', ['slug' => $nextKeyword->slug]) }}">{{ $nextKeyword->name }}</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container space-top-1 space-bottom-1" id="guide">
            <div class="card bg-light border p-4 p-md-7">
                <h2 class="pb-3">{{ $keyword->name }}</h2>
                <div class="mb-4">
                    <img class="lazy img-fluid rounded-lg w-lg-75" alt="{{ $keyword->name }}"
                         data-src="{{ $keyword->present()->image }}"
                         src="{{ asset('common/images/product_temp.svg') }}">
                </div>
                @if($adminKeywordSite && $adminKeywordSite->bottom_description)
                    <div class="pb-5">
    {{--                    <p>If you haven’t swapped to LED bulbs, it’s the best time for conversion. The LED bulbs will make your environment better in a friendly way. You'll find new features to change your décor in terms of light colors, the voice assistant for choice in light settings.</p>--}}
    {{--                    <p>With the advancement of technology, LED bulbs are made differently than conventional light bulbs. LED bulbs are eco-friendly, utilize less energy, and emit less heat than conventional lights. These bulbs are available in common light fittings like MR16 and GU10.</p>--}}
    {{--                    <h3>Factors to Consider Before Buying LED Bulbs</h3>--}}
    {{--                    <p><strong>Efficiency</strong></p>--}}
    {{--                    <p>LED bulbs are five times more efficient than conventional lights. Comparing used wattage to lumen output is the easiest way to measure efficiency. LED bulbs use 6-8W /800 LUMENS, while&nbsp;<a href="https://www.findthisbest.com/best-incandescent-bulbs" target="_blank" rel="noopener">incandescent bulbs</a>&nbsp;use 60W /800 LUMENS.</p>--}}
    {{--                    <p><strong>Life Span</strong></p>--}}
    {{--                    <p>LED bulbs have a 10 to 20 times higher lifespan than traditional lights. The life span of an incandescent bulb is 1,000- 2,000 hours, while SYLVANIA&nbsp;A19 LED bulbs are up to 11,000 hours.</p>--}}
    {{--                    <p><strong>Dimming</strong></p>--}}
    {{--                    <p>Dimming LED bulbs are more common because they can save more energy. The compatibility of dimmable bulbs can match with both dimmable and non-dimmable circuits. But non-dimmable bulbs are not compatible with dimmable circuits. So, Check the compatibility of the bulb with the existing dimmer before buying it.</p>--}}
    {{--                    <p><strong>Fitting/Cap</strong></p>--}}
    {{--                    <p>Fitting/cap is the most important feature of buying a bulb. LED bulbs are made in such a way to fit into pre-exciting incandescent bulbs fittings. You just need to pick the right cap type according to your fittings.</p>--}}
    {{--                    <p><strong>Beam Angle</strong></p>--}}
    {{--                    <p>Before buying the LED bulbs, it’s important to decide their use. For highlighting a specific object, light with a 20° beam angle is suitable. For large areas and corridors, light with a 120° beam angle is perfect. As lower the beam value narrower the light it emits.</p>--}}
    {{--                    <p><strong>Cost</strong></p>--}}
    {{--                    <p>The cost of LED bulbs is more than the conventional ones. But because of their long life span, your overall budget will be minimized by their use.</p>--}}
    {{--                    <h3>Benefits of LED Bulbs</h3>--}}
    {{--                    <p>LED bulbs are eco-friendly because of the use of non-toxic materials. These lights are Mercury-free and also don't emit IF/UV radiations.</p>--}}
    {{--                    <p>LED bulbs have high durability and a longer lifespan than conventional&nbsp;<a href="https://www.findthisbest.com/best-light-bulbs" target="_blank" rel="noopener">light bulbs</a>.</p>--}}
    {{--                    <p>LED bulbs consume less energy and produce light 90% more efficiently. LED bulbs have cold temperatures operation, which means light performance rise when operation temperature decrease.</p>--}}
    {{--                    <h3>Frequently Ask Questions: (FAQs)</h3>--}}
    {{--                    <p><strong>1.&nbsp;Where can we use LED bulbs?</strong></p>--}}
    {{--                    <p>You can use LED bulbs in areas where light is needed for a long time, like restaurants, outdoor lights, factories, hotels, and shops.</p>--}}
    {{--                    <p><strong>2.&nbsp;Why are LED bulbs better?</strong></p>--}}
    {{--                    <p>You can save energy up to 75% by using LED bulbs. These lights are also eco-friendly; they have no harmful effects like mercury or UV radiation emission, unlike other conventional lights.</p>--}}
                        <h3>Kết luận</h3>
                        {!! $adminKeywordSite->bottom_description !!}
                    </div>
                @endif
{{--                <div class="pt-5">--}}
{{--                    <h3 class="pb-3">Editor's Notes</h3>--}}
{{--                    <p>During our led bulb research, we found 18,823 led bulb products and shortlisted 18 quality products. We collected and analyzed 241,694 customer reviews through our big data system to write the led bulbs list. We found that most customers choose led bulbs with an average price of $18.</p><p>The <a class="link-underline" href="https://buy.geni.us/Proxy.ashx?TSID=123727&amp;GR_URL=https%3A%2F%2Fwww.amazon.com%2Fdp%2FB08J87MTXF&amp;rf_source=amazon" rel="nofollow" target="_blank">SYLVANIA LED Bulb</a> are available for purchase. We have researched hundreds of brands and picked the top brands of led bulbs, including <a class="link-underline" href="https://www.findthisbest.com/brand/276-sylvania" target="_blank">SYLVANIA</a>, <a class="link-underline" href="https://www.findthisbest.com/brand/213225-ledvance" target="_blank">LEDVANCE</a>, <a class="link-underline" href="https://www.findthisbest.com/brand/49576-energetic-smarter-lighting" target="_blank">ENERGETIC SMARTER LIGHTING</a>, <a class="link-underline" href="https://www.findthisbest.com/brand/56140-vgogfly" target="_blank">Vgogfly</a>, <a class="link-underline" href="https://www.findthisbest.com/brand/1821-kasa-smart" target="_blank">Kasa Smart</a>. The seller of top 1 product has received honest feedback from 387 consumers with an average rating of 4.7.</p>--}}
{{--                </div>--}}
                @if($reviewer)
                    <div class="media d-block d-sm-flex align-items-center border-top border-bottom py-5 my-3">
                        <div class="position-relative mx-auto mb-3 mb-sm-0 mr-sm-4" style="width: 100px; height: 100px;">
                            <img class="img-fluid rounded-circle lazy" src="{{ $reviewer->present()->image }}" width="300" height="300"  alt="{{ $reviewer->name }}">
                        </div>
                        <div class="media-body ml-3">
                            <small class="d-block small font-weight-bold text-cap">Viết bởi</small>
                            <div class="h3 mb-0">
                                <a class="text-dark" href="{{ route('reviewer',['slug' => $reviewer->slug]) }}" target="_blank">{{ $reviewer->name }}</a>
                            </div>
                            <p class="mb-0">
                                {!! $reviewer->description  !!}
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
    <style>
        .smalltext {
            height: 20px;
            overflow: hidden;
        }

        .big {
            height: auto;
        }
    </style>
@endsection

