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
                                <li class="breadcrumb-item active" aria-current="page">Tìm kiếm: {{ request('q') }}</li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
        <div class="container space-2">
            <div class="row justify-content-md-between align-items-md-center mb-4">
                <div class="col-md-6 mb-3 mb-md-0">
                    <h1 class="h2">Danh sách kết quả</h1>
                </div>
                <div class="col-md-6 col-lg-6 text-md-right">
                    <form class="input-group input-group-merge" action="{{ route('search') }}">
                        <input name="q" type="text" class="form-control" placeholder="{{ request('q') }}" aria-label="what if" aria-describedby="search product" required="">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text" id="searchBtn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mb-5">
                <div class="row mx-n2">
                    @foreach($keywords as $keyword)
                        <div class="col-md-6 mb-5">
                        <div class="card border h-100 p-4">
                            <div class="media">
                                <div class="avatar avatar-lg mr-3">
                                    <a class="text-inherit" href="{{ route('tag_detail', ['slug' => $keyword->slug]) }}">
                                        <img class="avatar-img lazy"
                                             src="{{ asset('common/images/product_temp.svg') }}"
                                             data-src="{{ $keyword->present()->imageThumb }}"
                                             alt="{{ $keyword->name }}" width="68" height="68">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="h6">
                                        <a class="text-inherit" href="{{ route('tag_detail', $keyword->slug) }}">
                                            {{ $keyword->name }}
                                        </a>
                                    </h5>
                                    <div class="text-body">
                                        <small class="d-block text-body">
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
                                        </small>
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
        </div>
    </main>
@endsection
