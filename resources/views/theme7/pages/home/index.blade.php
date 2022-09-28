@extends('theme7.layouts.master')
@section('title'){{ data_get($metaData, 'meta_og_title')  }}@endsection
@section('page_lib_js')
    <script
            src="//code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
@endsection
@section('header')
    @include('theme7.layouts.partials.header1')
@endsection
@section('body')
    <div class="position-relative bg-primary overflow-hidden">
        <div class="container position-relative z-index-2 space-top-3 space-top-md-4 space-bottom-3 space-bottom-md-4">
            <div class="w-md-80 w-xl-60 text-center mx-md-auto">
                <div class="mb-7">
                    <h1 class="display-4 text-white mb-3">
                        Giúp bạn tìm kiếm sản phẩm tốt nhất
                    </h1>
                    <p class="text-white-70 mb-4">Kiểm tra các đánh giá của chúng tôi trước khi mua bất cứ thứ gì. Chúng tôi mong muốn giúp bạn đưa ra quyết định mua sắm tốt hơn</p>
                </div>
                <form action="{{ route('search') }}">
                    <div class="card p-2 mb-3">
                        <div class="form-row input-group-borderless">
                            <div class="col-sm">
                                <input type="text" name="q" class="form-control shadow-none" placeholder="Tìm kiếm..." aria-label="Tìm kiếm...">
                            </div>
                            <div class="col-sm-auto">
                                <button type="submit" style="height: 100%;" class="btn btn-block btn-primary">
                                    <i class="fas fa-search"></i>
                                    <span class="d-sm-none ml-1">Search</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <figure class="position-absolute top-0 left-0 w-60">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1246 1078">
                <g opacity=".4">
                    <linearGradient id="doubleEllipseTopLeftID1" gradientUnits="userSpaceOnUse" x1="2073.5078" y1="1.7251" x2="2273.4375" y2="1135.5818" gradientTransform="matrix(-1 0 0 1 2600 0)">
                        <stop offset="0.4976" style="stop-color:#559bff"></stop>
                        <stop offset="1" style="stop-color:#377DFF"></stop>
                    </linearGradient>
                    <polygon fill="url(#doubleEllipseTopLeftID1)" points="519.8,0.6 0,0.6 0,1078 863.4,1078   "></polygon>
                    <linearGradient id="doubleEllipseTopLeftID2" gradientUnits="userSpaceOnUse" x1="1717.1648" y1="3.779560e-05" x2="1717.1648" y2="644.0417" gradientTransform="matrix(-1 0 0 1 2600 0)">
                        <stop offset="1.577052e-06" style="stop-color:#559bff"></stop>
                        <stop offset="1" style="stop-color:#377DFF"></stop>
                    </linearGradient>
                    <polygon fill="url(#doubleEllipseTopLeftID2)" points="519.7,0 1039.4,0.6 1246,639.1 725.2,644   "></polygon>
                </g>
            </svg>
        </figure>
        <figure class="position-absolute right-0 bottom-0 left-0 mb-n1">
            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 100.1">
                <path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"></path>
            </svg>
        </figure>

    </div>
    <main id="content" role="main">
        <div class="bg-light">
            @if($keywords->count())
                <div class="container space-sm-2 space-bottom-lg-3 space-bottom-1">
                    <div class="w-md-80 text-center mx-md-auto mb-9 pt-5">
                        <h2>Tìm kiếm hàng đầu</h2>
                    </div>
                    <div class="row mb-5">
                        @foreach($keywords as $keyword)
                            <article class="col-md-6 col-lg-4 mb-5">
                                <div class="card border h-100 bp-card">
                                    <div class="card-img-top position-relative bp-cover">
                                        <a href="{{ route('tag_detail',['slug' => $keyword->slug]) }}">
                                            <img class="card-img-top lazyload" src="{{ $keyword->present()->imageThumb }}"
                                                 width="300" height="300" alt="{{$keyword->name}}">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="h4">
                                                <a class="text-inherit"
                                                   href="{{ route('tag_detail',['slug' => $keyword->slug]) }}">{{ $keyword->name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <div class="mt-5">
                        @include('theme7.pages.home.partials.paginate2')
{{--                        {{ $keywords->onEachSide(3)->appends(request()->query())->links('theme7.pages.home.partials.paginate') }}--}}
                    </div>
                </div>
            @endif
        </div>
        <div class="" >
            <div class="position-relative">
                <div class="container space-2">
                    <div class="row align-items-md-center mb-7">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <h2>Xem các review mua hàng mới nhất</h2>
                        </div>
{{--                        <div class="col-md-6 text-md-right">--}}
{{--                            <a class="font-weight-bold" href="https://www.findthisbest.com/categories">See all Guides <i class="fa fa-angle-right fa-sm ml-1"></i></a>--}}
{{--                        </div>--}}
                    </div>
                    <div class=" row" >
                        @foreach($newKeywords as $key => $newKeyword)
                            @php
                                $newImg = $key;
                                $x = $newImg%6 + 1;
                                $path = 'theme7/images/img'.$x.'.jpg';
                            @endphp
                            <article class="col-6 col-lg-3 mb-5 pt-2">
                                <a class="card bg-img-hero w-100 min-h-270rem transition-3d-hover" href="{{ route('tag_detail',['slug' => $newKeyword->slug]) }}"
                                   style="background-image: url({{ asset($path) }});">
                                    <div class="card-body">
                                        <span class="d-block small text-white-70 font-weight-bold text-cap mb-2">Mới</span>
                                        <h4 class="text-white">{{ $newKeyword->name }}</h4>
                                    </div>
                                    <div class="card-footer border-0 bg-transparent pt-0">
                                        <span class="text-white font-size-1 font-weight-bold">Xem thêm</span>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>
                    <div class="mt-5">
                        <div class="text-center mt-5">
                            <ul class="nav nav-segment">
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" style="padding:.625rem .95rem;" href="https://www.findthisbest.com/topics-directory">Hot</a>--}}
{{--                                </li>--}}
                                @for ($i = 'a'; $i != 'aa'; $i++)
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" style="padding:.625rem .95rem;"
                                           href="{{ route('search_start', ['slug' => $i]) }}">
                                            {{ $i }}
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container space-2 space-bottom-lg-3 space-bottom-1">
            <div class="row mb-5">
                <div class="col-6">
                    <h2 class="h3 mb-0">Bài viết mới</h2>
                </div>
                <div class="col-6 text-right">
                    <a class="font-weight-bold" href="{{ route('blog_list') }}">Xem thêm <i class="fas fa-angle-right fa-sm ml-1"></i></a>
                </div>
            </div>
            <div class="row mb-3">
                @foreach($posts as $post)
                    <div class="col-sm-6 col-lg-4 mb-3 mb-sm-8">
                    <article class="card h-100">
                        <div class="card-img-top position-relative">
                            <img class="card-img-top lazy" data-src="{{ $post->image }}"  src="{{ asset('common/images/product_temp.svg') }}"
                                 alt="{{ $post->title }}" style="height: 220px;">
                            <figure class="ie-curved-y position-absolute right-0 bottom-0 left-0 mb-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 100.1">
                                    <path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"></path>
                                </svg>
                            </figure>
                        </div>
                        <div class="card-body">
                            <h3>
                                <a class="text-inherit" href="{{ route('blog_detail', ['slug' => $post->slug . '-' . $post->id]) }}">
                                    {{ $post->title }}
                                </a></h3>
                            <p>{{ Str::limit($post->description, 80) }}</p>
                        </div>
                        <div class="card-footer border-0 pt-0">
                            <div class="media align-items-center">
                                @if($post->reviewer)
                                    @php
                                        $reviewer = $post->reviewer;
                                    @endphp
                                    <div class="avatar-group">
                                        <div class="avatar avatar-xs avatar-circle" data-toggle="tooltip" data-placement="top" title=""
                                             data-original-title="{{ data_get($reviewer, 'name') }}">
                                            <img class="avatar-img" src="{{ $reviewer->present()->image }}" alt="{{ data_get($post, 'reviewer.name') }}">
                                        </div>
                                    </div>
                                @endif
                                <div class="media-body d-flex justify-content-end text-muted font-size-1 ml-2">
                                    {{ $post->updated_at->format('d/m/Y') }}
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection