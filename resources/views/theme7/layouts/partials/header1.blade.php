<header id="header" class="header header-bg-transparent header-white-nav-links-lg header-abs-top" data-hs-header-options="{
            &quot;fixMoment&quot;: 1000,
            &quot;fixEffect&quot;: &quot;slide&quot;
          }">
    <div class="header-section">
        <div id="logoAndNav" class="container">

            <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
                <a class="navbar-brand" href="{{ route('home') }}" aria-label="logo">
                    <img src="{{ asset('common/images/new_logo/logo2.png') }}" alt="Logo" height="39" style="width: auto;">
                </a>

                <button type="button" class="navbar-toggler navbar-nav-wrap-toggler btn btn-icon btn-sm rounded-circle" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                    <span class="navbar-toggler-default">
                    <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z"></path>
                    </svg>
                    </span>
                                        <span class="navbar-toggler-toggled">
                    <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"></path>
                    </svg>
                    </span>
                </button>

                <div id="navBar" class="collapse navbar-collapse navbar-nav-wrap-collapse">
                    <div class="navbar-body header-abs-top-inner">
                        <ul class="js-scroll-nav navbar-nav header-navbar-nav">
                            <li class="header-nav-item">
                                <a class="nav-link header-nav-link" href="{{ route('home') }}">Trang chủ</a>
                            </li>
                            <li class="header-nav-item">
                                <a class="nav-link header-nav-link" href="{{ route('blog_list') }}">Blog</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>