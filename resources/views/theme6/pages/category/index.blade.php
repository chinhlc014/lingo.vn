@extends('theme6.layouts.master')
@section('header_bottom')
    @widget('App\Widgets\Theme6\Common\HeaderBottom')
@endsection
@section('meta_data')
    @include('common.meta_data')
@endsection
@section('schema_data')
    @include('common.schema')
@endsection
@section('title'){{ data_get($metaData, 'meta_og_title')  }}@endsection
@section('main')
    <main class="main">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home')  }}"><i class="icon-home"></i></a></li>
                    @if($category->parent)
                        <li class="breadcrumb-item"><a href="#">{{ $category->parent->display_name }}</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->display_name }}</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-9">

                    <div class="row">
                        @foreach($items as $item)
                            <div class="col-6 col-sm-4 col-md-3">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="{{ route('item', ['slug' => $item->present()->slugForDetailPage]) }}">
                                        <img alt="{{ $item->name }}" class="lazy" src="{{ asset('common/images/product_temp.svg') }}" data-src="{{ $item->present()->imageThumb }}">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        @if($item->discount)
                                            <div class="product-label label-sale">-{{ $item->discount }}</div>
                                        @endif
                                    </div>
                                </figure>
                                <div class="product-details">

                                    <h2 class="product-title">
                                        <a href="{{ route('item', ['slug' => $item->present()->slugForDetailPage]) }}">{{ $item->name }}</a>
                                    </h2>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:{{ $item->present()->getRatingStar*20 }}%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
{{--                                        <span class="old-price">$90.00</span>--}}
                                        <span class="product-price">{{ $item->present()->priceFormatWithCurrency }}</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div><!-- End .col-md-3 -->
                        @endforeach
                    </div><!-- End .row -->

                    <nav class="toolbox toolbox-pagination">
                        <div class="toolbox-item toolbox-show">
{{--                            <label>Show:</label>--}}

{{--                            <div class="select-custom">--}}
{{--                                <select name="count" class="form-control">--}}
{{--                                    <option value="12">12</option>--}}
{{--                                    <option value="24">24</option>--}}
{{--                                    <option value="36">36</option>--}}
{{--                                </select>--}}
{{--                            </div><!-- End .select-custom -->--}}
                        </div><!-- End .toolbox-item -->

                        <ul class="pagination toolbox-item">
                            {{ $items->onEachSide(0)->appends(request()->query())->links() }}
                        </ul>
                    </nav>
                </div><!-- End. col-lg-9 -->

                <div class="sidebar-overlay"></div>
                @include('theme6.pages.category.partials.sidebar_shop')
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-3"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
