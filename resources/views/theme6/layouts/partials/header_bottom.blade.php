<div class="header-bottom sticky-header d-none d-lg-block">
    <div class="container">
        <nav class="main-nav w-100">
            <ul class="menu">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                @foreach($siteCategories as $siteCategory)
                    <li>
                        <a href="#">{{ data_get($siteCategory, 'display_name') }}</a>
                        <ul>
                            @foreach(data_get($siteCategory, 'children') as $child)
                                <li><a href="{{ route('category', ['slug'=> data_get($child, 'slug')]) }}">{{ data_get($child, 'display_name') }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
    </div><!-- End .container -->
</div><!-- End .header-bottom -->
<div class="container">
    <span>
        <a href="http://www.thecoth.com" target="_blank"><img src="http://www.thecoth.com/wp-content/uploads/2021/12/Untitled-9.jpeg" width="1200" height="300"></a>
    </span>
</div>