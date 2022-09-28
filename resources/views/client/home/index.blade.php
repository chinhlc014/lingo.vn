@extends('client.layouts.index')
@section("title", "Lingo.vn")
@section('bottom-header')
    <div class="bottom-header">
        <div class="container">
            <nav class="d-nav">
                <ul>
                    {{--@foreach($fields as $field)
                        <li>
                            <a class="smooth" href="#" title="">{{ $field->name }}</a>
                        </li>
                        <ul>
                            --}}{{--@foreach($field->cate)
                            @endforeach--}}{{--
                        </ul>
                    @endforeach--}}
                    <li>
                        <a class="smooth" href="product-cate.html" title="">Điện máy</a>
                        <div class="mega-menu">
                            <div class="row">
                                <div class="col-3">
                                    <div class="item-cate">
                                        <a href="javascript:;" class="title-cate">Máy ảnh</a>
                                        <ul>
                                            <li><a href="javascript:;" title="">Máy ảnh chụp lấy liền</a></li>
                                            <li><a href="javascript:;" title="">Phụ kiện máy ảnh</a></li>
                                            <li><a href="javascript:;" title="">Thẻ nhớ máy ảnh</a></li>
                                            <li><a href="javascript:;" title="">Máy ảnh compact</a></li>
                                            <li><a href="javascript:;" title="">Máy ảnh DSLR</a></li>
                                            <li><a href="javascript:;" title="">Ống kính máy ảnh</a></li>
                                            <li><a href="javascript:;" title="">Máy ảnh không gương lật</a></li>
                                            <li><a href="javascript:;" title="">Filter máy ảnh</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="item-cate">
                                        <a href="javascript:;" class="title-cate">Đồ gia dụng</a>
                                        <ul>
                                            <li><a href="javascript:;" title="">Tủ lạnh</a></li>
                                            <li><a href="javascript:;" title="">Máy lọc không khí</a></li>
                                            <li><a href="javascript:;" title="">Máy pha cà phê</a></li>
                                            <li><a href="javascript:;" title="">Máy xay sinh tố</a></li>
                                            <li><a href="javascript:;" title="">Quạt</a></li>
                                            <li><a href="javascript:;" title="">Máy hút bụi</a></li>
                                            <li><a href="javascript:;" title="">Máy ép trái cây</a></li>
                                            <li><a href="javascript:;" title="">Lò vi sóng</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="item-cate">
                                        <a href="javascript:;" class="title-cate">Di động thông minh</a>
                                        <ul>
                                            <li><a href="javascript:;" title="">Máy ảnh chụp lấy liền</a></li>
                                            <li><a href="javascript:;" title="">Phụ kiện máy ảnh</a></li>
                                            <li><a href="javascript:;" title="">Thẻ nhớ máy ảnh</a></li>
                                            <li><a href="javascript:;" title="">Máy ảnh compact</a></li>
                                            <li><a href="javascript:;" title="">Máy ảnh DSLR</a></li>
                                            <li><a href="javascript:;" title="">Ống kính máy ảnh</a></li>
                                            <li><a href="javascript:;" title="">Máy ảnh không gương lật</a></li>
                                            <li><a href="javascript:;" title="">Filter máy ảnh</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="item-cate">
                                        <a href="javascript:;" class="title-cate">Thiết bị số</a>
                                        <ul>
                                            <li><a href="javascript:;" title="">Tủ lạnh</a></li>
                                            <li><a href="javascript:;" title="">Máy lọc không khí</a></li>
                                            <li><a href="javascript:;" title="">Máy pha cà phê</a></li>
                                            <li><a href="javascript:;" title="">Máy xay sinh tố</a></li>
                                            <li><a href="javascript:;" title="">Quạt</a></li>
                                            <li><a href="javascript:;" title="">Máy hút bụi</a></li>
                                            <li><a href="javascript:;" title="">Máy ép trái cây</a></li>
                                            <li><a href="javascript:;" title="">Lò vi sóng</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="item-cate">
                                        <a href="javascript:;" class="title-cate">Máy chơi game</a>
                                        <ul>
                                            <li><a href="javascript:;" title="">Máy ảnh chụp lấy liền</a></li>
                                            <li><a href="javascript:;" title="">Phụ kiện máy ảnh</a></li>
                                            <li><a href="javascript:;" title="">Thẻ nhớ máy ảnh</a></li>
                                            <li><a href="javascript:;" title="">Máy ảnh compact</a></li>
                                            <li><a href="javascript:;" title="">Máy ảnh DSLR</a></li>
                                            <li><a href="javascript:;" title="">Ống kính máy ảnh</a></li>
                                            <li><a href="javascript:;" title="">Máy ảnh không gương lật</a></li>
                                            <li><a href="javascript:;" title="">Filter máy ảnh</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="item-cate">
                                        <a href="javascript:;" class="title-cate">Tin học</a>
                                        <ul>
                                            <li><a href="javascript:;" title="">Tủ lạnh</a></li>
                                            <li><a href="javascript:;" title="">Máy lọc không khí</a></li>
                                            <li><a href="javascript:;" title="">Máy pha cà phê</a></li>
                                            <li><a href="javascript:;" title="">Máy xay sinh tố</a></li>
                                            <li><a href="javascript:;" title="">Quạt</a></li>
                                            <li><a href="javascript:;" title="">Máy hút bụi</a></li>
                                            <li><a href="javascript:;" title="">Máy ép trái cây</a></li>
                                            <li><a href="javascript:;" title="">Lò vi sóng</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="item-cate">
                                        <a href="javascript:;" class="title-cate">Thiết bị âm thanh</a>
                                        <ul>
                                            <li><a href="javascript:;" title="">Máy ảnh chụp lấy liền</a></li>
                                            <li><a href="javascript:;" title="">Phụ kiện máy ảnh</a></li>
                                            <li><a href="javascript:;" title="">Thẻ nhớ máy ảnh</a></li>
                                            <li><a href="javascript:;" title="">Máy ảnh compact</a></li>
                                            <li><a href="javascript:;" title="">Máy ảnh DSLR</a></li>
                                            <li><a href="javascript:;" title="">Ống kính máy ảnh</a></li>
                                            <li><a href="javascript:;" title="">Máy ảnh không gương lật</a></li>
                                            <li><a href="javascript:;" title="">Filter máy ảnh</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="item-cate">
                                        <a href="javascript:;" class="title-cate">TV, Video & DVD</a>
                                        <ul>
                                            <li><a href="javascript:;" title="">Tủ lạnh</a></li>
                                            <li><a href="javascript:;" title="">Máy lọc không khí</a></li>
                                            <li><a href="javascript:;" title="">Máy pha cà phê</a></li>
                                            <li><a href="javascript:;" title="">Máy xay sinh tố</a></li>
                                            <li><a href="javascript:;" title="">Quạt</a></li>
                                            <li><a href="javascript:;" title="">Máy hút bụi</a></li>
                                            <li><a href="javascript:;" title="">Máy ép trái cây</a></li>
                                            <li><a href="javascript:;" title="">Lò vi sóng</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a class="smooth" href="product-cate.html" title="">Thể thao dã ngoại</a></li>
                    <li><a class="smooth" href="product-cate.html" title="">Nhà cửa & đời sống</a></li>
                    <li><a class="smooth" href="product-cate.html" title="">Đồ trẻ em</a></li>
                    <li><a class="smooth" href="product-cate.html" title="">Sức khoẻ & làm đẹp</a></li>
                    <li><a class="smooth" href="product-cate.html" title="">Ôtô xe máy</a></li>
                    <li><a class="smooth" href="product-cate.html" title="">Trang sức nữ</a></li>
                    <li><a class="smooth" href="product-cate.html" title="">Thiết bị số</a></li>
                    <li><a href="danh-muc.html"  class="ic-readmore"><img src="{{ asset("client/images/ic-cate.svg") }}" alt=""><span>Xem thêm</span></a></li>
                </ul>
            </nav>

        </div>
    </div>
@endsection
@section('content')
    <section class="home-banner">
        <div class="container">
            <div class="cas-home">
                <a href="javascript:;" class="item"><img class="wow fadeIn" src="{{ asset("client/images/banner-home.jpg") }}" alt=""></a>
                <a href="javascript:;" class="item"><img class="wow fadeIn" src="{{ asset("client/images/banner-home.jpg") }}" alt=""></a>
                <a href="javascript:;" class="item"><img class="wow fadeIn" src="{{ asset("client/images/banner-home.jpg") }}" alt=""></a>
            </div>
        </div>
    </section>
    <section class="home-block">
        <div class="container">
            <h2 class="head-pri">Ưu đãi tốt nhất</h2>
            <div class="cas-mar cas-pri">
                @foreach($shops as $shop)
                    <a href="javascript:;" class="item">
                        <img src="{{ $shop->present()->image }}" alt="">
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <section class="home-block cate">
        <div class="container">
            <h2 class="head-pri">Danh mục nổi bật</h2>
            <div class="wrap-cate-home">
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate-hot1.jpg" alt=""></span>
                    <span class="title">Điện tử & công nghệ</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate-hot2.jpg" alt=""></span>
                    <span class="title">Thời trang phụ kiện</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate-hot3.jpg" alt=""></span>
                    <span class="title">Làm đẹp</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate-hot4.jpg" alt=""></span>
                    <span class="title">Đồ chơi & game</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate-hot5.jpg" alt=""></span>
                    <span class="title">Nội thất kiến trúc</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate-hot6.jpg" alt=""></span>
                    <span class="title">Đồ gia dụng</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate-hot7.jpg" alt=""></span>
                    <span class="title">Đồng hồ</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate-hot8.jpg" alt=""></span>
                    <span class="title">Giày dép</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate-hot9.jpg" alt=""></span>
                    <span class="title">Nước hoa</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate-hot10.jpg" alt=""></span>
                    <span class="title">Giày dép</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate-hot11.jpg" alt=""></span>
                    <span class="title">Camera an ninh</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate-hot12.jpg" alt=""></span>
                    <span class="title">Máy hút bụi</span>
                </a>
            </div>
        </div>
    </section>
    <section class="home-block">
        <div class="container">
            <div class="wrap-bn-home">
                <div class="row">
                    <div class="col-md-4">
                        <a href="javascript:;" title="" class="item"><img src="images/bn-home1.jpg" alt=""></a>
                    </div>
                    <div class="col-md-4">
                        <a href="javascript:;" title="" class="item"><img src="images/bn-home2.jpg" alt=""></a>
                    </div>
                    <div class="col-md-4">
                        <a href="javascript:;" title="" class="item"><img src="images/bn-home3.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="home-block">
        <div class="container">
            <h2 class="head-pri">Top sản phẩm bán chạy</h2>
            <div class="cas-serried cas-pri">
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate1.jpg" alt=""></span>
                    <span class="title">Tai nghe không dây</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate2.jpg" alt=""></span>
                    <span class="title">Kem chống nắng</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate3.jpg" alt=""></span>
                    <span class="title">Bàn trang điểm</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate4.jpg" alt=""></span>
                    <span class="title">Túi đeo chéo</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate5.jpg" alt=""></span>
                    <span class="title">Bình giữ nhiệt</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate6.jpg" alt=""></span>
                    <span class="title">Bếp ga</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate3.jpg" alt=""></span>
                    <span class="title">Bàn trang điểm</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate4.jpg" alt=""></span>
                    <span class="title">Túi đeo chéo</span>
                </a>
                <a href="javascript:;" class="item">
                    <span class="img"><img src="images/cate5.jpg" alt=""></span>
                    <span class="title">Bình giữ nhiệt</span>
                </a>
            </div>
        </div>
    </section>
    <section class="home-block">
        <div class="container">
            <h2 class="head-pri">So sánh giá thiết bị thông minh</h2>
            <div class="cas-mar cas-pri">
                <a href="javascript:;" class="item-prd-cate">
                    <span class="img"><img src="images/prd-cate1.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Samsung</h3>
                        <span class="desc">Samsung</span>
                    </div>
                </a>
                <a href="javascript:;" class="item-prd-cate">
                    <span class="img"><img src="images/prd-cate2.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Sony</h3>
                        <span class="desc">Máy ảnh</span>
                    </div>
                </a>
                <a href="javascript:;" class="item-prd-cate">
                    <span class="img"><img src="images/prd-cate3.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Oppo</h3>
                        <span class="desc">Điện thoại</span>
                    </div>
                </a>
                <a href="javascript:;" class="item-prd-cate">
                    <span class="img"><img src="images/prd-cate4.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Apple</h3>
                        <span class="desc">Đồng hồ thông minh</span>
                    </div>
                </a>
                <a href="javascript:;" class="item-prd-cate">
                    <span class="img"><img src="images/prd-cate5.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Samsung</h3>
                        <span class="desc">Điện thoại</span>
                    </div>
                </a>
                <a href="javascript:;" class="item-prd-cate">
                    <span class="img"><img src="images/prd-cate6.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Apple</h3>
                        <span class="desc">Macbook</span>
                    </div>
                </a>
                <a href="javascript:;" class="item-prd-cate">
                    <span class="img"><img src="images/prd-cate3.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Oppo</h3>
                        <span class="desc">Điện thoại</span>
                    </div>
                </a>
                <a href="javascript:;" class="item-prd-cate">
                    <span class="img"><img src="images/prd-cate4.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Apple</h3>
                        <span class="desc">Đồng hồ thông minh</span>
                    </div>
                </a>
                <a href="javascript:;" class="item-prd-cate">
                    <span class="img"><img src="images/prd-cate5.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Samsung</h3>
                        <span class="desc">Điện thoại</span>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="home-block">
        <div class="container">
            <div class="cas-five cas-pri">
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Điện thoại & Máy tính</a></h3>
                    <ul>
                        <li><a href="javascript:;">Điện thoại</a></li>
                        <li><a href="javascript:;">Đồng hồ thông minh</a></li>
                        <li><a href="javascript:;">Máy tính bảng</a></li>
                        <li><a href="javascript:;">Tai nghe bluetooth</a></li>
                        <li><a href="javascript:;">Sim điện thoại</a></li>
                        <li><a href="javascript:;">Máy tính</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Tin học</a></h3>
                    <ul>
                        <li><a href="javascript:;">Laptop</a></li>
                        <li><a href="javascript:;">Phụ kiện tin học</a></li>
                        <li><a href="javascript:;">Phần mềm</a></li>
                        <li><a href="javascript:;">Thiết bị văn phòng</a></li>
                        <li><a href="javascript:;">Phần cứng</a></li>
                        <li><a href="javascript:;">Máy in</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Đồ gia dụng</a></h3>
                    <ul>
                        <li><a href="javascript:;">Máy làm bánh</a></li>
                        <li><a href="javascript:;">Máy massage mặt</a></li>
                        <li><a href="javascript:;">Quạt</a></li>
                        <li><a href="javascript:;">Tủ lạnh</a></li>
                        <li><a href="javascript:;">Máy hút bụi</a></li>
                        <li><a href="javascript:;">Nồi chiên không dầu</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Âm thanh & Wifi</a></h3>
                    <ul>
                        <li><a href="javascript:;">Máy nghe nhạc</a></li>
                        <li><a href="javascript:;">MP4</a></li>
                        <li><a href="javascript:;">Tai nghe</a></li>
                        <li><a href="javascript:;">Loa bluetooth</a></li>
                        <li><a href="javascript:;">Micro</a></li>
                        <li><a href="javascript:;">Loa kéo</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Chơi game</a></h3>
                    <ul>
                        <li><a href="javascript:;">Máy chơi game</a></li>
                        <li><a href="javascript:;">Trò chơi điện tử</a></li>
                        <li><a href="javascript:;">Phụ kiện chơi game</a></li>
                        <li><a href="javascript:;">Máy chơi game</a></li>
                        <li><a href="javascript:;">Tay cầm chơi game</a></li>
                        <li><a href="javascript:;">Điện tử</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Đồ gia dụng</a></h3>
                    <ul>
                        <li><a href="javascript:;">Máy làm bánh</a></li>
                        <li><a href="javascript:;">Máy massage mặt</a></li>
                        <li><a href="javascript:;">Quạt</a></li>
                        <li><a href="javascript:;">Tủ lạnh</a></li>
                        <li><a href="javascript:;">Máy hút bụi</a></li>
                        <li><a href="javascript:;">Nồi chiên không dầu</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Âm thanh & Wifi</a></h3>
                    <ul>
                        <li><a href="javascript:;">Máy nghe nhạc</a></li>
                        <li><a href="javascript:;">MP4</a></li>
                        <li><a href="javascript:;">Tai nghe</a></li>
                        <li><a href="javascript:;">Loa bluetooth</a></li>
                        <li><a href="javascript:;">Micro</a></li>
                        <li><a href="javascript:;">Loa kéo</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="home-block">
        <div class="container">
            <div class="cas-five cas-pri">
                <a href="javascript:;" title="" class="item-prd compare">
                        <span class="img">
                            <img src="images/prd1.jpg" alt="">
                            <span class="btn-compare">So sánh giá</span>
                        </span>
                    <div class="ct">
                        <h3 class="title">Iphone 11</h3>
                        <span class="price">10.490.000 <small>đ</small></span>
                        <span class="count-shop">9 cửa hàng</span>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd compare">
                        <span class="img">
                            <img src="images/prd2.jpg" alt="">
                            <span class="btn-compare">So sánh giá</span>
                        </span>
                    <div class="ct">
                        <h3 class="title">Iphone 11 Pro max</h3>
                        <span class="price">10.490.000 <small>đ</small></span>
                        <span class="count-shop">9 cửa hàng</span>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd compare">
                        <span class="img">
                            <img src="images/prd3.jpg" alt="">
                            <span class="btn-compare">So sánh giá</span>
                        </span>
                    <div class="ct">
                        <h3 class="title">Iphone 12 Pro</h3>
                        <span class="price">10.490.000 <small>đ</small></span>
                        <span class="count-shop">9 cửa hàng</span>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd compare">
                        <span class="img">
                            <img src="images/prd4.jpg" alt="">
                            <span class="btn-compare">So sánh giá</span>
                        </span>
                    <div class="ct">
                        <h3 class="title">Iphone 12 Pro max</h3>
                        <span class="price">10.490.000 <small>đ</small></span>
                        <span class="count-shop">9 cửa hàng</span>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd compare">
                        <span class="img">
                            <img src="images/prd5.jpg" alt="">
                            <span class="btn-compare">So sánh giá</span>
                        </span>
                    <div class="ct">
                        <h3 class="title">Iphone 13 Pro</h3>
                        <span class="price">10.490.000 <small>đ</small></span>
                        <span class="count-shop">9 cửa hàng</span>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd compare">
                        <span class="img">
                            <img src="images/prd2.jpg" alt="">
                            <span class="btn-compare">So sánh giá</span>
                        </span>
                    <div class="ct">
                        <h3 class="title">Iphone 13 Pro max</h3>
                        <span class="price">10.490.000 <small>đ</small></span>
                        <span class="count-shop">9 cửa hàng</span>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd compare">
                        <span class="img">
                            <img src="images/prd3.jpg" alt="">
                            <span class="btn-compare">So sánh giá</span>
                        </span>
                    <div class="ct">
                        <h3 class="title">Iphone 13 mini</h3>
                        <span class="price">10.490.000 <small>đ</small></span>
                        <span class="count-shop">9 cửa hàng</span>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd compare">
                        <span class="img">
                            <img src="images/prd4.jpg" alt="">
                            <span class="btn-compare">So sánh giá</span>
                        </span>
                    <div class="ct">
                        <h3 class="title">Iphone XR</h3>
                        <span class="price">10.490.000 <small>đ</small></span>
                        <span class="count-shop">9 cửa hàng</span>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="home-block home-banner-long">
        <div class="container">
            <a href="javascript:;" title=""><img src="images/bn-home-long.jpg" alt=""></a>
        </div>
    </section>
    <section class="home-block">
        <div class="container">
            <h2 class="head-pri">Thương hiệu thời trang yêu thích nhất</h2>
            <div class="cas-mar cas-pri">
                <a href="javascript:;" class="item">
                    <img src="images/logo7.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo8.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo9.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo10.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo11.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo12.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo11.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo10.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo9.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo8.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo7.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo10.jpg" alt="">
                </a>
            </div>
        </div>
    </section>
    <section class="home-block">
        <div class="container">
            <div class="cas-five cas-pri">
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Quần áo</a></h3>
                    <ul>
                        <li><a href="javascript:;">Quần dài</a></li>
                        <li><a href="javascript:;">Áo</a></li>
                        <li><a href="javascript:;">Đầm</a></li>
                        <li><a href="javascript:;">Áo dài truyền thống</a></li>
                        <li><a href="javascript:;">Quần áo thể thao</a></li>
                        <li><a href="javascript:;">Đồ lót</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Giày dép</a></h3>
                    <ul>
                        <li><a href="javascript:;">Giày thể thao</a></li>
                        <li><a href="javascript:;">Giày da</a></li>
                        <li><a href="javascript:;">Sneacker</a></li>
                        <li><a href="javascript:;">Dép</a></li>
                        <li><a href="javascript:;">Giày cao gót</a></li>
                        <li><a href="javascript:;">Giày tây</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Túi</a></h3>
                    <ul>
                        <li><a href="javascript:;">Balo</a></li>
                        <li><a href="javascript:;">Túi sách</a></li>
                        <li><a href="javascript:;">Túi du lịch</a></li>
                        <li><a href="javascript:;">Túi đeo chéo</a></li>
                        <li><a href="javascript:;">Ví</a></li>
                        <li><a href="javascript:;">Túi laptop</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Đồng hồ</a></h3>
                    <ul>
                        <li><a href="javascript:;">Đồng hồ điện tử</a></li>
                        <li><a href="javascript:;">Apple watch</a></li>
                        <li><a href="javascript:;">Dây đồng hồ</a></li>
                        <li><a href="javascript:;">Đồng hồ đeo tay</a></li>
                        <li><a href="javascript:;">Đồng hồ trẻ em</a></li>
                        <li><a href="javascript:;">Đồng hồ thể thao</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Trang sức</a></h3>
                    <ul>
                        <li><a href="javascript:;">Nhẫn</a></li>
                        <li><a href="javascript:;">Vòng đeo tay</a></li>
                        <li><a href="javascript:;">Vương miệng</a></li>
                        <li><a href="javascript:;">Phụ kiện tóc</a></li>
                        <li><a href="javascript:;">Dây chuyền</a></li>
                        <li><a href="javascript:;">Khuyên tai</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Túi</a></h3>
                    <ul>
                        <li><a href="javascript:;">Balo</a></li>
                        <li><a href="javascript:;">Túi sách</a></li>
                        <li><a href="javascript:;">Túi du lịch</a></li>
                        <li><a href="javascript:;">Túi đeo chéo</a></li>
                        <li><a href="javascript:;">Ví</a></li>
                        <li><a href="javascript:;">Túi laptop</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Đồng hồ</a></h3>
                    <ul>
                        <li><a href="javascript:;">Đồng hồ điện tử</a></li>
                        <li><a href="javascript:;">Apple watch</a></li>
                        <li><a href="javascript:;">Dây đồng hồ</a></li>
                        <li><a href="javascript:;">Đồng hồ đeo tay</a></li>
                        <li><a href="javascript:;">Đồng hồ trẻ em</a></li>
                        <li><a href="javascript:;">Đồng hồ thể thao</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="home-block">
        <div class="container">
            <h2 class="head-pri">Thời trang nữ <a href="javascript:;" class="view-all">Xem tất cả <i class="far fa-long-arrow-right"></i></a></h2>
            <div class="cas-five cas-pri">
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd10.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Dép bánh mỳ quai ngang độn đế hi 4cm siêu nhẹ cho nam nữ</h3>
                        <span class="price">10.490.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate1.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd7.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng hồ điện tử mặt vuông 5 màu phong cách Hàn Quốc</h3>
                        <span class="price">36.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate2.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd8.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng Hồ đeo tay mặt vuông dây da PU Phong Cách Doanh Nhân</h3>
                        <span class="price">195.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate3.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd12.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Ốp lưng Nillkin Super Frosted Shield Pro cho iPhone 13 Pro Max</h3>
                        <span class="price">68.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate1.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd11.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Ba Lô Đi Học Bằng Da PU Thời Trang Cho Nam Nữ</h3>
                        <span class="price">195.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate2.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd7.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng hồ điện tử mặt vuông 5 màu phong cách Hàn Quốc</h3>
                        <span class="price">36.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate3.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd8.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng Hồ đeo tay mặt vuông dây da PU Phong Cách Doanh Nhân</h3>
                        <span class="price">195.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate1.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd4.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Ốp lưng Nillkin Super Frosted Shield Pro cho iPhone 13 Pro Max</h3>
                        <span class="price">68.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate2.svg" alt=""></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="home-block">
        <div class="container">
            <h2 class="head-pri">Thời trang nam <a href="javascript:;" class="view-all">Xem tất cả <i class="far fa-long-arrow-right"></i></a></h2>
            <div class="cas-five cas-pri">
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd13.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Dép bánh mỳ quai ngang độn đế hi 4cm siêu nhẹ cho nam nữ</h3>
                        <span class="price">10.490.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate1.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd7.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng hồ điện tử mặt vuông 5 màu phong cách Hàn Quốc</h3>
                        <span class="price">36.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate2.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd8.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng Hồ đeo tay mặt vuông dây da PU Phong Cách Doanh Nhân</h3>
                        <span class="price">195.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate3.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd14.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Ốp lưng Nillkin Super Frosted Shield Pro cho iPhone 13 Pro Max</h3>
                        <span class="price">68.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate1.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd4.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Ba Lô Đi Học Bằng Da PU Thời Trang Cho Nam Nữ</h3>
                        <span class="price">195.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate2.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd7.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng hồ điện tử mặt vuông 5 màu phong cách Hàn Quốc</h3>
                        <span class="price">36.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate3.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd8.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng Hồ đeo tay mặt vuông dây da PU Phong Cách Doanh Nhân</h3>
                        <span class="price">195.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate1.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd4.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Ốp lưng Nillkin Super Frosted Shield Pro cho iPhone 13 Pro Max</h3>
                        <span class="price">68.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate2.svg" alt=""></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="home-block">
        <div class="container">
            <h2 class="head-pri">Công nghệ <a href="javascript:;" class="view-all">Xem tất cả <i class="far fa-long-arrow-right"></i></a></h2>
            <div class="cas-five cas-pri">
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd7.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Dép bánh mỳ quai ngang độn đế hi 4cm siêu nhẹ cho nam nữ</h3>
                        <span class="price">10.490.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate1.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd8.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng hồ điện tử mặt vuông 5 màu phong cách Hàn Quốc</h3>
                        <span class="price">36.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate2.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd4.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng Hồ đeo tay mặt vuông dây da PU Phong Cách Doanh Nhân</h3>
                        <span class="price">195.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate3.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd14.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Ốp lưng Nillkin Super Frosted Shield Pro cho iPhone 13 Pro Max</h3>
                        <span class="price">68.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate1.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd4.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Ba Lô Đi Học Bằng Da PU Thời Trang Cho Nam Nữ</h3>
                        <span class="price">195.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate2.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd7.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng hồ điện tử mặt vuông 5 màu phong cách Hàn Quốc</h3>
                        <span class="price">36.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate3.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd8.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng Hồ đeo tay mặt vuông dây da PU Phong Cách Doanh Nhân</h3>
                        <span class="price">195.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate1.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd4.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Ốp lưng Nillkin Super Frosted Shield Pro cho iPhone 13 Pro Max</h3>
                        <span class="price">68.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate2.svg" alt=""></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="home-block">
        <div class="container">
            <h2 class="head-pri">Giày dép <a href="javascript:;" class="view-all">Xem tất cả <i class="far fa-long-arrow-right"></i></a></h2>
            <div class="cas-five cas-pri">
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd13.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Dép bánh mỳ quai ngang độn đế hi 4cm siêu nhẹ cho nam nữ</h3>
                        <span class="price">10.490.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate1.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd8.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng hồ điện tử mặt vuông 5 màu phong cách Hàn Quốc</h3>
                        <span class="price">36.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate2.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd4.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng Hồ đeo tay mặt vuông dây da PU Phong Cách Doanh Nhân</h3>
                        <span class="price">195.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate3.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd14.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Ốp lưng Nillkin Super Frosted Shield Pro cho iPhone 13 Pro Max</h3>
                        <span class="price">68.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate1.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd4.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Ba Lô Đi Học Bằng Da PU Thời Trang Cho Nam Nữ</h3>
                        <span class="price">195.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate2.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd7.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng hồ điện tử mặt vuông 5 màu phong cách Hàn Quốc</h3>
                        <span class="price">36.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate3.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd8.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Đồng Hồ đeo tay mặt vuông dây da PU Phong Cách Doanh Nhân</h3>
                        <span class="price">195.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate1.svg" alt=""></span>
                        </div>
                    </div>
                </a>
                <a href="javascript:;" title="" class="item-prd">
                    <span class="img"><img src="images/prd4.jpg" alt=""></span>
                    <div class="ct">
                        <h3 class="title">Ốp lưng Nillkin Super Frosted Shield Pro cho iPhone 13 Pro Max</h3>
                        <span class="price">68.000 <small>đ</small></span>
                        <div class="control">
                            <div class="info-shop">
                                <span class="name">Thời_trang_tết</span>
                                <div class="rating">4.8</div>
                            </div>
                            <span class="gate"><img src="images/logo-gate2.svg" alt=""></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="home-block">
        <div class="container">
            <h2 class="head-pri">Làm đẹp và sức khoẻ</h2>
            <div class="cas-mar cas-pri">
                <a href="javascript:;" class="item">
                    <img src="images/logo13.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo14.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo15.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo16.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo17.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo18.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo11.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo10.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo9.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo8.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo7.jpg" alt="">
                </a>
                <a href="javascript:;" class="item">
                    <img src="images/logo10.jpg" alt="">
                </a>
            </div>
        </div>
    </section>
    <section class="home-block">
        <div class="container">
            <div class="cas-five cas-pri">
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Nước hoa</a></h3>
                    <ul>
                        <li><a href="javascript:;">Quần dài</a></li>
                        <li><a href="javascript:;">Áo</a></li>
                        <li><a href="javascript:;">Đầm</a></li>
                        <li><a href="javascript:;">Áo dài truyền thống</a></li>
                        <li><a href="javascript:;">Quần áo thể thao</a></li>
                        <li><a href="javascript:;">Đồ lót</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Chăm sóc da</a></h3>
                    <ul>
                        <li><a href="javascript:;">Giày thể thao</a></li>
                        <li><a href="javascript:;">Giày da</a></li>
                        <li><a href="javascript:;">Sneacker</a></li>
                        <li><a href="javascript:;">Dép</a></li>
                        <li><a href="javascript:;">Giày cao gót</a></li>
                        <li><a href="javascript:;">Giày tây</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Thiết bị y tế</a></h3>
                    <ul>
                        <li><a href="javascript:;">Balo</a></li>
                        <li><a href="javascript:;">Túi sách</a></li>
                        <li><a href="javascript:;">Túi du lịch</a></li>
                        <li><a href="javascript:;">Túi đeo chéo</a></li>
                        <li><a href="javascript:;">Ví</a></li>
                        <li><a href="javascript:;">Túi laptop</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Thực phẩm bổ sung</a></h3>
                    <ul>
                        <li><a href="javascript:;">Đồng hồ điện tử</a></li>
                        <li><a href="javascript:;">Apple watch</a></li>
                        <li><a href="javascript:;">Dây đồng hồ</a></li>
                        <li><a href="javascript:;">Đồng hồ đeo tay</a></li>
                        <li><a href="javascript:;">Đồng hồ trẻ em</a></li>
                        <li><a href="javascript:;">Đồng hồ thể thao</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Sản phẩm tắm</a></h3>
                    <ul>
                        <li><a href="javascript:;">Nhẫn</a></li>
                        <li><a href="javascript:;">Vòng đeo tay</a></li>
                        <li><a href="javascript:;">Vương miệng</a></li>
                        <li><a href="javascript:;">Phụ kiện tóc</a></li>
                        <li><a href="javascript:;">Dây chuyền</a></li>
                        <li><a href="javascript:;">Khuyên tai</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Túi</a></h3>
                    <ul>
                        <li><a href="javascript:;">Balo</a></li>
                        <li><a href="javascript:;">Túi sách</a></li>
                        <li><a href="javascript:;">Túi du lịch</a></li>
                        <li><a href="javascript:;">Túi đeo chéo</a></li>
                        <li><a href="javascript:;">Ví</a></li>
                        <li><a href="javascript:;">Túi laptop</a></li>
                    </ul>
                </div>
                <div class="item-link-cate">
                    <h3 class="title"><a href="javascript:;">Đồng hồ</a></h3>
                    <ul>
                        <li><a href="javascript:;">Đồng hồ điện tử</a></li>
                        <li><a href="javascript:;">Apple watch</a></li>
                        <li><a href="javascript:;">Dây đồng hồ</a></li>
                        <li><a href="javascript:;">Đồng hồ đeo tay</a></li>
                        <li><a href="javascript:;">Đồng hồ trẻ em</a></li>
                        <li><a href="javascript:;">Đồng hồ thể thao</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="home-block home-news">
        <div class="container">
            <h2 class="head-pri">Xu hướng <a href="javascript:;" class="view-all">Xem tất cả <i class="far fa-long-arrow-right"></i></a></h2>
            <div class="wrap-block-home">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="item-news">
                            <a href="javascript:;" title="" class="img"><img src="images/news1.jpg" alt=""></a>
                            <div class="ct">
                                <h3 class="title"><a href="javascript:;" title="">How Long Should You Wait to Purchase AppleWatch 7 the iPhone 13?</a></h3>
                                <div class="desc">
                                    With the latest release of the AppleWatch 7, the iPad Mini, and the iPhone 13, we’re left with so much excitement after Apple’s keynote event last September.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="item-news">
                            <a href="javascript:;" title="" class="img"><img src="images/news2.jpg" alt=""></a>
                            <div class="ct">
                                <h3 class="title"><a href="javascript:;" title="">Dự đoán thời điểm giảm giá máy chơi game tuognlai PlayStation 5</a></h3>
                                <div class="desc">
                                    With the latest release of the AppleWatch 7, the iPad Mini, and the iPhone 13, we’re left with so much excitement after Apple’s keynote event last September.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="item-news">
                            <a href="javascript:;" title="" class="img"><img src="images/news3.jpg" alt=""></a>
                            <div class="ct">
                                <h3 class="title"><a href="javascript:;" title="">Which upcoming PlayStation 5 game are worldwide gamers most excited about?</a></h3>
                                <div class="desc">
                                    With the latest release of the AppleWatch 7, the iPad Mini, and the iPhone 13, we’re left with so much excitement after Apple’s keynote event last September.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="item-news">
                            <a href="javascript:;" title="" class="img"><img src="images/news4.jpg" alt=""></a>
                            <div class="ct">
                                <h3 class="title"><a href="javascript:;" title="">How Long Should You Wait to Purchase AppleWatch 7 the iPhone 13?</a></h3>
                                <div class="desc">
                                    With the latest release of the AppleWatch 7, the iPad Mini, and the iPhone 13, we’re left with so much excitement after Apple’s keynote event last September.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="item-news">
                            <a href="javascript:;" title="" class="img"><img src="images/news5.jpg" alt=""></a>
                            <div class="ct">
                                <h3 class="title"><a href="javascript:;" title="">Dự đoán thời điểm giảm giá máy chơi game tuognlai PlayStation 5</a></h3>
                                <div class="desc">
                                    With the latest release of the AppleWatch 7, the iPad Mini, and the iPhone 13, we’re left with so much excitement after Apple’s keynote event last September.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="item-news">
                            <a href="javascript:;" title="" class="img"><img src="images/news6.jpg" alt=""></a>
                            <div class="ct">
                                <h3 class="title"><a href="javascript:;" title="">Which upcoming PlayStation 5 game are worldwide gamers most excited about?</a></h3>
                                <div class="desc">
                                    With the latest release of the AppleWatch 7, the iPad Mini, and the iPhone 13, we’re left with so much excitement after Apple’s keynote event last September.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

