<aside class="sidebar-home col-lg-3 order-lg-first mobile-sidebar">
    <div class="side-menu-wrapper text-uppercase mb-2 d-none d-lg-block">
        <h2 class="side-menu-title bg-gray ls-n-25">Browse Categories</h2>
        <nav class="side-nav">
            <ul class="menu menu-vertical sf-arrows">
                <li class="active">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                @foreach($siteCategories as $siteCategory)
                    <li>
                        <a href="#" class="sf-with-ul">{{ data_get($siteCategory, 'display_name') }}</a>
                        <ul>
                            @foreach(data_get($siteCategory, 'children') as $child)
                                <li><a href="{{ route('category', ['slug'=> data_get($child, 'slug')]) }}">{{ data_get($child, 'display_name') }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                <li><a href="#">About Us</a></li>
            </ul>
        </nav>
    </div><!-- End .side-menu-container -->

    <div class="widget widget-banners px-5 pb-3 text-center" style="min-height: 350px">
        <div class="owl-theme">
            <div class="banner d-flex flex-column align-items-center">
                <div class=" font1 text-uppercase m-b-3">Ads Box</div>
            </div><!-- End .banner -->
        </div><!-- End .banner-slider -->
    </div><!-- End .widget -->
</aside><!-- End .col-lg-3 -->
