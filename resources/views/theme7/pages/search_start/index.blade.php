@extends('theme7.layouts.master')
@section('title', 'Kết quả cho: ' . request('q'))
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
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách review</li>
                                <li class="breadcrumb-item active text-uppercase" aria-current="page">{{ request('slug') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container space-2">
            <h1 class="h2 mb-8">
                @if(request('slug'))
                    Bắt đầu với <span class="text-uppercase">"{{ request('slug') }}"</span>
                @else
                    Tất cả đánh giá
                @endif
            </h1>
            <div class="text-center mt-3">
                <ul class="nav nav-segment">
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" style="padding:.625rem .95rem;" href="https://www.findthisbest.com/topics-directory">HOT</a>--}}
{{--                    </li>--}}
                    @for ($i = 'a'; $i != 'aa'; $i++)
                        <li class="nav-item">
                            <a class="nav-link  text-uppercase {{ $i == request('slug') ? 'active' : ''  }}" style="padding:.625rem .95rem;" href="{{ route('search_start', ['slug' => $i]) }}">{{ $i }}</a>
                        </li>
                    @endfor
                </ul>
            </div>
                <div class="row mt-5">
                    @foreach($keywords as $keyword)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="card border h-100 p-3">
                            <div class="media">
                                <div class="avatar avatar-lg mr-3">
                                    <a class="text-inherit" href="{{ route('tag_detail', $keyword->slug) }}">
                                        <img class="avatar-img lazy"
                                             src="{{ asset('common/images/product_temp.svg') }}"
                                             data-src="{{ $keyword->present()->imageThumb }}"
                                             alt="{{ $keyword->name }}" width="68" height="68"></a>
                                </div>
                                <div class="media-body">
                                    <h5 class="h6">
                                        <a class="text-inherit" href="{{ route('tag_detail', $keyword->slug) }}">{{ $keyword->name }}</a>
                                    </h5>
                                    <div class="text-body font-size-1">
                                        <span>
                                            @php
                                                $des = '';
                                                $products = data_get($keyword, 'products', []);
                                                $text = '';
                                                if (count($products)) {
                                                    $product = $products[0];
                                                    $text = data_get($product, 'name');
                                                }
                                                if ($text) {
                                                    $q = request('q');
                                                    $qStrong = '<strong>' . $q .'</strong>';
                                                    $des = str_replace($q, $qStrong, $text);
                                                }
                                            @endphp
                                            @if($des)
                                                {!! $des !!}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            <div class="d-flex justify-content-between align-items-center mt-8">
                {{ $keywords->onEachSide(3)->appends(request()->query())->links('theme7.pages.search.partials.paginate') }}
            </div>
        </div>
    </main>
@endsection
