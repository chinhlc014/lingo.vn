@extends('admin.layouts.dashboard')
@section('page_top_lib_css')
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/quill/dist/quill.core.css') }}">
@endsection
@section('page_bot_lib_js')
    <script src="{{ asset('adminAssets/vendor/quill/dist/quill.min.js') }}"></script>
@endsection
@section('page_bot_js')
    <script>
        $(document).ready(function() {
            let quill1 = new Quill('#quill1', {
                modules: {
                    toolbar: [["bold", "italic"], ["link", "blockquote", "code"], [{
                        list: "ordered"
                    }, {
                        list: "bullet"
                    }]]
                },
                theme: "snow"
            });
            quill1.on('text-change', function(delta, oldDelta, source) {
                $('#top_description').val(quill1.container.firstChild.innerHTML);
            });

            let quill2 = new Quill('#quill2', {
                modules: {
                    toolbar: [["bold", "italic"], ["link", "blockquote", "code"], [{
                        list: "ordered"
                    }, {
                        list: "bullet"
                    }]]
                },
                theme: "snow"
            });

            quill2.on('text-change', function(delta, oldDelta, source) {
                $('#bottom_description').val(quill2.container.firstChild.innerHTML);
            });

            let quill3 = new Quill('#quill3', {
                modules: {
                    toolbar: [["bold", "italic"], ["link", "blockquote", "code"], [{
                        list: "ordered"
                    }, {
                        list: "bullet"
                    }]]
                },
                theme: "snow"
            });

            quill3.on('text-change', function(delta, oldDelta, source) {
                $('#crawl_description').val(quill3.container.firstChild.innerHTML);
            });
        });

    </script>
@endsection
@section('content')
    @php
        $pageName = 'Edit Keyword';
    @endphp
    <div class="row justify-content-center">
        <div class="col-lg-8 card-wrapper ct-example">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">{{ $pageName }}</h3>
                </div>
                <form method="POST" action="{{ route('admin.admin-keywords.update', $keyword->id) }}" id="form-submit" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Name</label>
                            <input type="text" name="name" value="{{ $keywordSite->name ?? $keyword->name  }}" class="form-control" id="exampleFormControlInput1"
                            >
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" >Top Description</label>
                            <div id="quill1">
                                {!!  $keywordSite->top_description  !!}
                            </div>
                            <textarea name="top_description" style="display:none" id="top_description" >{!!  $keywordSite->top_description  !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" >Bottom Description</label>
                            <div id="quill2">
                                {!!  $keywordSite->bottom_description  !!}
                            </div>
                            <textarea name="bottom_description" style="display:none" id="bottom_description">{!!  $keywordSite->bottom_description  !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" >Crawl Description</label>
                            <div id="quill3">
                                {!!  $keywordSite->crawl_description  !!}
                            </div>
                            <textarea name="crawl_description" style="display:none" id="crawl_description">{!!  $keywordSite->crawl_description  !!}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="admin_keyword_id" value="{{ $keyword->id }}">
                        <input type="hidden" name="site_identifier" value="{{ config('constant.site_identifier') }}">
                        <button type="submit" class="btn btn-info">Save</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection