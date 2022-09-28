@extends('admin.layouts.dashboard')
@section('content')
    @php
        $pageName = 'Add Trend';
    @endphp
    <div class="row justify-content-center">
        <div class="col-lg-8 card-wrapper ct-example">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">{{ $pageName }}</h3>
                </div>
                <form method="POST" action="{{ route('admin.trends.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Image</label>
                            <div class="mb-3">
                                <img width="100" src="{{ $trend->present()->thumbnail }}"
                                     class="rounded-circle">
                            </div>
                            <div class="custom-file">
                                <input type="file" name="thumbnail" class="custom-file-input" id="customFileLang" lang="en">
                                <label class="custom-file-label" for="customFileLang"></label>
                            </div>
                            @error('thumbnail')
                                <span class="message text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <label class="form-control-label" for="exampleFormControlInput1">Menu</label>
                        <select name="field_id" class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                            @foreach($fields as $field)
                                <option value="{{ $field->_id }}">{{ $field->name }}</option>
                            @endforeach
                        </select>
                        @error('field_id')
                        <span class="message text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Title</label>
                            <input type="text" name="title" value="{{ old("title") }}" class="form-control" id="exampleFormControlInput1">
                            @error('title')
                                <span class="message text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Content</label>
                            <textarea name="content" id="editor1" rows="10" cols="80">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="message text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section("js")
    <script type="text/javascript" src="{{ asset("ckfinder/ckfinder/ckfinder.js") }}"></script>
    <script>
        CKEDITOR.replace('editor1', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
