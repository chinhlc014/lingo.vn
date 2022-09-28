<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{ asset('adminAssets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
            </a>
            <div class=" ml-auto ">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.home') }}">
                            <i class="ni ni-folder-17 text-primary"></i>
                            <span class="nav-link-text {{ (Request::route()->getName() == "admin.fields.index") ||
                                                        (Request::route()->getName() == "admin.home") ||
                                                        (Request::route()->getName() == "admin.fields.create") ||
                                                        (Request::route()->getName() == "admin.fields.edit")
                                                        ? "text-success" : "" }}">Lĩnh vực</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.shops.index') }}">
                            <i class="ni ni-shop text-info"></i>
                            <span class="nav-link-text {{ (Request::route()->getName() == "admin.shops.index") ||
                                                        (Request::route()->getName() == "admin.shops.create") ||
                                                        (Request::route()->getName() == "admin.shops.edit")
                                                        ? "text-success" : "" }}">Cửa hàng</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.trends.index') }}">
                            <i class="ni ni-circle-08 text-success"></i>
                            <span class="nav-link-text {{ (Request::route()->getName() == "admin.trends.index") ||
                                                        (Request::route()->getName() == "admin.trends.create") ||
                                                        (Request::route()->getName() == "admin.trends.edit")
                                                        ? "text-success" : "" }}">Xu hướng</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.categories-of-fields.index') }}">
                            <i class="ni ni-single-copy-04 text-warning"></i>
                            <span class="nav-link-text {{ (Request::route()->getName() == "admin.categories-of-fields.index") ||
                                                        (Request::route()->getName() == "admin.categories-of-fields.create") ||
                                                        (Request::route()->getName() == "admin.categories-of-fields.edit")
                                                        ? "text-success" : "" }}">Danh mục</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
