@extends('admin.layouts.dashboard')
@section('content')
    @php
        $pageName = 'Lĩnh vực';
        $urlAddNew = route('admin.trends.create');
    @endphp
    <div class="row justify-content-center">
        <div class="col-lg-10 card-wrapper ct-example">
            <div class="card" style="min-height: 100%;">
                <!-- Card header -->
                <div class="card-header border-0">
                    @if (session('success'))
                        <div class="alert alert-success mb-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-6">
                            <h3 class="mb-0">{{ $pageName }}</h3>
                        </div>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th>STT</th>
                            <th>Field</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = (request('page', 1) - 1) * 20;
                        @endphp
                        @foreach($trends as $trend)
                            <tr>
                                <td> {{ ++$i }} </td>
                                <td> {{ $trend->field->name ?? "" }} </td>
                                <td><img width="60" src="{{ $trend->present()->thumbnail ?? "" }}" alt=""></td>
                                <td> {{ $trend->title }} </td>
                                <td class="text-center text-white">
                                    <a rel="tooltip"
                                       href="{{ route('admin.trends.edit', $trend->_id) }}"
                                       class="btn btn-sm btn-info btn-icon " data-original-title="Edit"
                                       title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <span rel="tooltip" data-toggle="modal" data-name="{{ $trend->name }}" data-id="{{ $trend->_id }}" data-target="#deletetrend"
                                       class="btn btn-sm btn-warning btn-icon delete-trend" data-original-title="Delete"
                                       title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="deletetrend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title text-center" id="exampleModalLabel">Delete Trend</h5>
                                        </div>
                                        <div class="modal-body">
                                            <span>Bạn có chắc chắn muốn xóa bài viết này không?</span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form method="POST" action="{{ route("admin.trends.destroy", $trend->_id) }}">
                                                @method("DELETE")
                                                @csrf
                                                <Button type="submit" class="btn btn-primary">Delete</Button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4 float-right">
                    {{ $trends->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

