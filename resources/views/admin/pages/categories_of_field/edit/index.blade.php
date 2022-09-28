@extends('admin.layouts.dashboard')
@section('content')
    @php
        $pageName = 'Edit Field';
    @endphp
    <div class="row justify-content-center">
        <div class="col-lg-8 card-wrapper ct-example">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">{{ $pageName }}</h3>
                </div>
                <form method="POST" action="{{ route('admin.fields.update', $field->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="card-body">
                            <label class="form-control-label" for="exampleFormControlInput1">Name</label>
                            <input type="text" name="name" value="{{ $field->name }}" class="form-control" id="exampleFormControlInput1">
                            @error('name')
                                <span class="message text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="card-body">
                            <label class="form-control-label" for="exampleFormControlInput1">Menu</label>
                            <select name="menu_id" class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                                @foreach(config("constant.menu") as $key => $value)
                                    <option {{ ($field->menu_id == $key) ? "selected" : "" }} value="{{ $key }}">{{ $value["name"] ?? "" }}</option>
                                @endforeach
                            </select>
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
