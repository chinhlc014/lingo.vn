@extends('admin.layouts.dashboard')
@section('content')
    @php
        $pageName = 'Edit Shop';
    @endphp
    <div class="row justify-content-center">
        <div class="col-lg-8 card-wrapper ct-example">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">{{ $pageName }}</h3>
                </div>
                <form method="POST" action="{{ route('admin.shops.update', $shop->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Image</label>
                            <div class="mb-3">
                                <img width="100" src="{{ $shop->present()->image }}"
                                     class="rounded-circle">
                            </div>
                            <div class="custom-file">
                                <input type="file" name="imageFile" class="custom-file-input" id="customFileLang" lang="en">
                                <label class="custom-file-label" for="customFileLang"></label>
                            </div>
                            @error('imageFile')
                                <span class="message text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Name</label>
                            <input type="text" name="name" value="{{ $shop->name }}" class="form-control" id="exampleFormControlInput1"
                                   >
                            @error('name')
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
