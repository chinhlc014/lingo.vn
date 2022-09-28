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
        <div class="container space-top-md-1 space-bottom-1 space-bottom-lg-2">
            <div class="row mb-5">
                <div class="col-6">
                    <h2 class="h3 mb-0">Danh sách blog</h2>
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
                                    </a>
                                </h3>
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
            <div class="d-flex justify-content-between align-items-center mt-8">
                {{ $posts->onEachSide(3)->appends(request()->query())->links('theme7.pages.blog_list.partials.paginate') }}
            </div>
        </div>
    </main>
@endsection

