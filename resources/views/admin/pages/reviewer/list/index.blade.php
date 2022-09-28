@extends('admin.layouts.dashboard')
@section('content')
    @php
        $pageName = 'List Reviewer';
        $urlAddNew = route('admin.reviewers.create');
    @endphp
    <div class="row justify-content-center">
        <div class="col-lg-10 card-wrapper ct-example">
            <div class="card" style="min-height: 100%;">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="mb-0">{{ $pageName }}</h3>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#" class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="tooltip"
                               data-original-title="Edit product">
                                <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                                <span class="btn-inner--text">Export</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th>STT</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Update</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = (request('page', 1) - 1) * 20;
                        @endphp
                        @foreach($reviewers as $reviewer)
                            <tr>
                                <td> {{ ++$i }} </td>
                                <td><img width="60" src="{{ $reviewer->present()->image }}" alt=""></td>
                                <td> {{ $reviewer->name }} </td>
                                <td> {{ $reviewer->updated_at->format('d/m/Y h:i') }} </td>
                                <td class="text-right text-white">
                                    <a rel="tooltip"
                                       href="{{ route('admin.reviewers.edit', $reviewer->id) }}"
                                       class="btn btn-sm btn-warning btn-icon " data-original-title="Edit"
                                       title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4 float-right">
                    {{ $reviewers->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection