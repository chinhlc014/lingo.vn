@extends('admin.layouts.dashboard')
@section('content')
    @php
        $pageName = 'List Keyword'
    @endphp
    <div class="row justify-content-center">
        <div class="col-lg-10 card-wrapper ct-example">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Search</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{ route('admin.admin-keywords.index') }}" method="GET">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label class="form-control-label" for="validationCustom01">Name</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="name..." name="name" value="{{ request('name') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-control-label" for="validationCustom02">Slug</label>
                                <input type="text" class="form-control" id="validationCustom02" placeholder="slug..." name="slug" value="{{ request('slug') }}">
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit">Search</button>
                        <a class="btn btn-warning ml-2" href="{{ route('admin.admin-keywords.index') }}">Clear</a>
                    </form>
                </div>
            </div>
            <div class="card">
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
                        @foreach($keywords as $keyword)
                            <tr>
                                <td> {{ ++$i }} </td>
                                <td><img width="60" src="{{ $keyword->present()->imageThumb }}" alt=""></td>
                                <td>
                                    @php
                                        $adminKeywordSites = $keyword->adminKeywordSites;
                                        $adminKeywordSite = $adminKeywordSites->first();
                                        if($adminKeywordSite) {
                                            $name = $adminKeywordSite->name;
                                        } else {
                                            $name = $keyword->name;
                                        }
                                    @endphp
                                    {{ $name }}
                                </td>
                                <td> {{ $keyword->updated_at->format('d/m/Y h:i') }} </td>
                                <td class="text-right text-white">
                                    <a rel="tooltip"
                                       href="{{ route('admin.admin-keywords.edit', $keyword->id) }}"
                                       class="btn btn-sm btn-warning btn-icon " data-original-title="Edit"
                                       title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="{{  route('admin.admin-keywords.destroy', $keyword->id) }}" rel="tooltip" data-swal="{{ json_encode(swal([
                                                    'title' => 'Are you sure?',
                                                    'text' => "You won't be able to revert this!",
                                                    'icon' => 'warning',
                                                    'showCancelButton' => true,
                                                    'confirmButtonColor' => '#3085d6',
                                                    'cancelButtonColor' => '#d33',
                                                ])) }}"
                                       data-swal-method="DELETE"
                                       class="btn btn-danger btn-icon btn-sm " data-original-title="" title="">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4 float-right">
                    {{ $keywords->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection