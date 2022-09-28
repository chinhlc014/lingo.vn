<div class="products-section pt-0">
    <h2 class="section-title">Sản Phẩm Liên Quan</h2>

    <div class="dots-top">
        <div class="row">
            @foreach($otherItems as $item)
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
    </div><!-- End .products-slider -->
</div><!-- End .products-section -->
