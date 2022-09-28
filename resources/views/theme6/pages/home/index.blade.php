@extends('theme6.layouts.master')
@section('meta_data')
    @include('common.meta_data')
@endsection
@section('schema_data')
    @include('common.schema')
@endsection
@section('title'){{ data_get($metaData, 'meta_og_title')  }}@endsection
@section('main')
    <main class="main">
        <div class="container mb-2">
            <div class="row pt-5">
                @if($dailyDealItems->count())
                    <div class="col-lg-12">
                    <h2 class="section-title ls-n-10 m-b-4">Giá Tốt Hôm Nay</h2>
                    <div class="row">
                        @foreach($dailyDealItems as $dailyDealItem)
                            <div class="col-6 col-sm-3">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="{{ route('item', ['slug' => $dailyDealItem->shopeeItem->present()->slugForDetailPage]) }}">
                                        <img alt="{{ $dailyDealItem->shopeeItem->name }}" src="{{ asset('common/images/product_temp.svg') }}" class="lazy" data-src="{{ $dailyDealItem->shopeeItem->present()->imageThumb }}">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        <div class="product-label label-sale">-{{ $dailyDealItem->shopeeItem->discount }}</div>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h2 class="product-title">
                                        <a href="{{ route('item', ['slug' => $dailyDealItem->shopeeItem->present()->slugForDetailPage]) }}">{{ $dailyDealItem->shopeeItem->name }}</a>
                                    </h2>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:{{ $dailyDealItem->shopeeItem->present()->getRatingStar*20 }}%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
{{--                                        <span class="old-price">$90.00</span>--}}
                                        <span class="product-price">{{ $dailyDealItem->shopeeItem->present()->priceFormatWithCurrency }}</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="col-lg-12">
                        <h2 class="section-title ls-n-10 m-b-4">Bán chạy</h2>
                        <div class="row">
                            @foreach($items as $item)
                                <div class="col-6 col-sm-3">
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
                                </div>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </main>
@endsection
