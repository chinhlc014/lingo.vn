@extends('admin.layouts.dashboard')
@section('content')
    @php
        $pageName = 'Edit Reviewer';
    @endphp
    <div class="row justify-content-center">
        <div class="col-lg-8 card-wrapper ct-example">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">{{ $pageName }}</h3>
                </div>
                <form method="POST" action="{{ route('admin.reviewers.update', $reviewer->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Image</label>
                            <div class="mb-3">
                                <img width="100" src="{{ $reviewer->present()->image }}"
                                     class="rounded-circle">
                            </div>
                            <div class="custom-file">
                                <input type="file" name="imageFile" class="custom-file-input" id="customFileLang" lang="en">
                                <label class="custom-file-label" for="customFileLang"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Name</label>
                            <input type="text" name="name" value="{{ $reviewer->name }}" class="form-control" id="exampleFormControlInput1"
                                   >
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlTextarea1">Description</label>
                            <textarea name="description"  class="form-control" id="exampleFormControlTextarea1" rows="5">{{ $reviewer->description }}</textarea>
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