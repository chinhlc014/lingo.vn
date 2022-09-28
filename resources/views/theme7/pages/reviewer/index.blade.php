@extends('theme7.layouts.master')
@section('title', data_get($metaData, 'meta_og_title'))
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

        <div class="container space-top-3 space-bottom-2">
            <div class="border-bottom w-md-75 w-lg-60 space-bottom-2 mx-md-auto">
                <div class="media d-block d-sm-flex">
                    <div class="position-relative mx-auto mb-3 mb-sm-0 mr-sm-4" style="width: 160px; height: 160px;">
                        <img class="img-fluid rounded-circle" src="{{ $reviewer->present()->image }}" alt="{{ $reviewer->name }}" width="160" height="160">
                        <img class="bg-white position-absolute bottom-0 right-0 rounded-circle p-1" src="https://cdn.findthisbest.com/assets/svg/illustrations/top-vendor.svg" alt="Icon" width="36" height="36" title="Top Writer">
                    </div>
                    <div class="media-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h1 class="h3">{{ $reviewer->name }}</h1>
                        </div>
                        <p class="mb-0">{{ $reviewer->description }}</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row mb-5">
                @foreach($adminKeywordReviewers as $adminKeywordReviewer)
                    <article class="col-md-6 col-lg-4 mb-5">
                        <div class="card border h-100 bp-card">
                            <div class="card-img-top position-relative bp-cover pt-3">
                                <a href="{{ route('tag_detail', ['slug' => $adminKeywordReviewer->adminKeyword->slug]) }}">
                                    <img class="card-img-top lazy"
                                         src="{{ asset('common/images/product_temp.svg') }}"
                                         data-src="{{ $adminKeywordReviewer->adminKeyword->present()->imageThumb }}"
                                         width="300" height="300"
                                         alt="{{ $adminKeywordReviewer->adminKeyword->present()->name }}" style="object-fit: contain;">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 bp-title">
                                    <div class="h4">
                                        <a class="text-inherit"
                                           href="{{ route('tag_detail', ['slug' => $adminKeywordReviewer->adminKeyword->slug]) }}">
                                            {{ $adminKeywordReviewer->adminKeyword->present()->name }}
                                        </a>
                                    </div>
                                </div>
                                <p class="bp-summary">
                                    @php
                                        $des = '';
                                        $products = data_get($adminKeywordReviewer->adminKeyword, 'products', []);
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
                                </p>
                            </div>
                            <div class="card-footer border-0 pt-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="small text-muted mr-2">
                                        {{ $adminKeywordReviewer->adminKeyword->updated_at->format('d/m/Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
                <div class="space-bottom-2"></div>
            </div>
            <div class="d-flex align-items-center justify-content-center mt-0 text-right">
                {{ $adminKeywordReviewers->onEachSide(3)->appends(request()->query())->links('theme7.pages.reviewer.partials.paginate') }}
            </div>
        </div>


        <div class="container space-2 space-bottom-lg-3 space-bottom-1">
            <div class="row mb-5">
                <div class="col-6">
                    <h2 class="h3 mb-0">Bài viết mới của {{ $reviewer->name }}</h2>
                </div>
                <div class="col-6 text-right">
                    <a class="font-weight-bold" href="{{ route('blog_list') }}">Tất cả bài viết <i class="fas fa-angle-right fa-sm ml-1"></i></a>
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
{{--                                    <div class="avatar-group">--}}
{{--                                        <div class="avatar avatar-xs avatar-circle" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                             data-original-title="{{ data_get($reviewer, 'name') }}">--}}
{{--                                            <img class="avatar-img" src="{{ $reviewer->present()->image }}" alt="{{ data_get($post, 'reviewer.name') }}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
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
