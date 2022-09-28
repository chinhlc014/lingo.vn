<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                            @if(isset($pageName))
                                <li class="breadcrumb-item active" aria-current="page">{{ $pageName }}</li>
                            @endif
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    @if(isset($urlAddNew))
                        <a class="btn btn-sm btn-neutral" href="{{ $urlAddNew }}">
                            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                            <span class="btn-inner--text">Ad New</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>