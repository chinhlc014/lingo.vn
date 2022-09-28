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
                                <li class="breadcrumb-item" aria-current="page">
                                    <a href="{{ route('blog_list') }}">Blog</a>
                                </li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
        <div class="container space-top-2 space-bottom-2">
            <div class="w-lg-75 mx-lg-auto">
                <div class="mb-4">
                    <h1 class="h2">{{ $post->title }}</h1>
                </div>
                @if($reviewer)
                    <div class="border-top border-bottom py-4 mb-5">
                        <div class="row align-items-md-center">
                            <div class="col-md-7 mb-5 mb-md-0">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-circle">
                                        <img class="avatar-img lazy"
                                             src="{{ asset('common/images/product_temp.svg') }}"
                                             width="300" height="300" data-src="{{ $reviewer->present()->image }}"
                                             alt="{{ $reviewer->name }}">
                                    </div>
                                    <div class="media-body font-size-1 ml-3">
                                        <a class="h6 text-dark" href="{{ route('reviewer',['slug' => $reviewer->slug]) }}" target="_blank">{{ $reviewer->name }}</a>
                                        <span class="d-block text-muted">{{ $post->updated_at->format('d/m/Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="d-flex justify-content-md-end align-items-center social-share-action">
                                    <span class="d-block small font-weight-bold text-cap mr-2">Share:</span>
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
                @endif

            </div>
            <div class="w-lg-75 mx-lg-auto article-content">
                <p>
                    <strong>{{ $post->description }}</strong>
                </p>
                <p>
                    <img style="display: block; margin-left: auto; margin-right: auto;" class="lazy" src="{{ asset('common/images/product_temp.svg') }}" data-src="{{ $post->image }}">
                </p>

                {!! $post->body  !!}
            </div>
            @if($reviewer)
                <div class="w-lg-75 mx-lg-auto">
                    <div class="media align-items-center border-top border-bottom py-5 my-8">
                        <div class="avatar avatar-circle avatar-xl">
                            <img class="avatar-img lazy" src="{{ $reviewer->present()->image }}" width="300" height="300"
                                 data-src="{{ $reviewer->present()->image }}" alt="{{ $reviewer->name }}">
                        </div>
                        <div class="media-body ml-3">
                            <small class="d-block small font-weight-bold text-cap">Viết bởi</small>
                            <h4 class="h3 mb-1"><a class="text-dark" href="{{ route('reviewer',['slug' => $reviewer->slug]) }}"
                                                   target="_blank">{{ $reviewer->name }}</a>
                            </h4>
                            <p class="mb-0">
                                {!! $reviewer->description  !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="container">
            <div class="w-lg-75 border-top space-2 mx-lg-auto">
                <div class="mb-3 mb-sm-5">
                    <h3>Vài viết liên quan</h3>
                </div>
                <div class="row">
                    @foreach($relatedPosts as $relatedPost)
                        <div class="col-md-6">
                        <article class="border-bottom h-100 py-5">
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <h4 class="mb-0">
                                        <a class="text-inherit" href="{{ route('blog_detail', ['slug' => $relatedPost->slug . '-' . $relatedPost->id]) }}">
                                            {{ $relatedPost->title }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="col-5">
                                    <img class="img-fluid rounded lazy" src="{{ asset('common/images/product_temp.svg') }}" width="300" height="300" data-src="{{ $relatedPost->image }}" alt="{{ $relatedPost->title }}">
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection

