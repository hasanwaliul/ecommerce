@extends('frontend.layouts.master')
@if (Session()->get('language') == 'bangla')
    @section('title', $singleProduct->product_name_bn )
@else
    @section('title',  $singleProduct->product_name_en )
@endif
@section('content')
<div class="row">
    {{-- For Number Conversion --}}
    @php
        function bn_price($str){
            $en = array(1,2,3,4,5,6,7,8,9,0);
            $bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
            $str = str_replace($en,$bn,$str);

            return $str;
        }
    @endphp

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                @if (Session()->get('language') == 'bangla')
                    <ul class="list-inline list-unstyled">
                        <li><a href="#">হোম</a></li>
                        <li class='active'>পণ্যের বিস্তারিত তথ্য</li>
                    </ul>
                @else
                    <ul class="list-inline list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li class='active'>Product Details Information</li>
                    </ul>
                @endif
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class='row single-product'>

        <!-- ============================================== SIDEBAR Categories Start ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

            <!-- ================================== TOP NAVIGATION ================================== -->
            <div class="side-menu animate-dropdown outer-bottom-xs">
                <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> @if (Session()->get('language') ==
                    'bangla') আমাদের পণ্যের বিভাগ সমূহ @else Categories @endif </div>
                <nav class="yamm megamenu-horizontal" role="navigation">
                    <ul class="nav">
                        @php
                        $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                        @endphp
                        @foreach ($categories as $category)
                        <li class="dropdown menu-item">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{-- <i class="icon fa fa-shopping-bag" aria-hidden="true"></i> --}}
                                <img src=" {{ asset($category->category_image) }} " alt="" height="40" width="40">
                                {{-- Adding Spaces --}} &nbsp;
                                @if (Session()->get('language') == 'bangla')
                                {{ $category->category_name_bn }}
                                @else
                                {{ $category->category_name_en }}
                                @endif
                            </a>
                            <ul class="dropdown-menu mega-menu">
                                <li class="yamm-content">
                                    @php
                                    $subcategories = App\Models\Subcategory::where('category_id',
                                    $category->category_id)->orderBy('subcategory_name_en',
                                    'ASC')->get();
                                    @endphp
                                    <div class="row">
                                        <div class="col-sm-12 col-md-3">
                                            @foreach ($subcategories as $subcategory)
                                            <ul class="links list-unstyled">
                                                @if (Session()->get('language') == 'bangla')
                                                <li><a href="#"> {{ $subcategory->subcategory_name_bn }} </a></li>
                                                @else
                                                <li><a href="#"> {{ $subcategory->subcategory_name_en }} </a></li>
                                                @endif
                                            </ul>
                                            @endforeach
                                        </div>

                                    </div> <!-- /.row -->
                                </li><!-- /.yamm-content -->
                            </ul><!-- /.dropdown-menu -->
                        </li><!-- /.menu-item -->
                        @endforeach
                    </ul><!-- /.nav -->
                </nav><!-- /.megamenu-horizontal -->
            </div><!-- /.side-menu -->

            <!-- ==================== HOT DEALS ==================== -->
            {{-- <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                <h3 class="section-title">hot deals</h3>
                <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

                    <div class="item">
                        <div class="products">
                            <div class="hot-deal-wrapper">
                                <div class="image">
                                    <img src="{{ asset('frontend') }}/assets/images/hot-deals/p25.jpg" alt="">
                                </div>
                                <div class="sale-offer-tag"><span>49%<br>off</span></div>
                                <div class="timing-wrapper">
                                    <div class="box-wrapper">
                                        <div class="date box">
                                            <span class="key">120</span>
                                            <span class="value">DAYS</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper">
                                        <div class="hour box">
                                            <span class="key">20</span>
                                            <span class="value">HRS</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper">
                                        <div class="minutes box">
                                            <span class="key">36</span>
                                            <span class="value">MINS</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper hidden-md">
                                        <div class="seconds box">
                                            <span class="key">60</span>
                                            <span class="value">SEC</span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.hot-deal-wrapper -->

                            <div class="product-info text-left m-t-20">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>

                                <div class="product-price">
                                    <span class="price">
                                        $600.00
                                    </span>

                                    <span class="price-before-discount">$800.00</span>

                                </div><!-- /.product-price -->

                            </div><!-- /.product-info -->

                            <div class="cart clearfix animate-effect">
                                <div class="action">

                                    <div class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                            cart</button>

                                    </div>

                                </div><!-- /.action -->
                            </div><!-- /.cart -->
                        </div>
                    </div>
                    <div class="item">
                        <div class="products">
                            <div class="hot-deal-wrapper">
                                <div class="image">
                                    <img src=" {{ asset('frontend') }}/assets/images/hot-deals/p5.jpg" alt="">
                                </div>
                                <div class="sale-offer-tag"><span>35%<br>off</span></div>
                                <div class="timing-wrapper">
                                    <div class="box-wrapper">
                                        <div class="date box">
                                            <span class="key">120</span>
                                            <span class="value">Days</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper">
                                        <div class="hour box">
                                            <span class="key">20</span>
                                            <span class="value">HRS</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper">
                                        <div class="minutes box">
                                            <span class="key">36</span>
                                            <span class="value">MINS</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper hidden-md">
                                        <div class="seconds box">
                                            <span class="key">60</span>
                                            <span class="value">SEC</span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.hot-deal-wrapper -->

                            <div class="product-info text-left m-t-20">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>

                                <div class="product-price">
                                    <span class="price">
                                        $600.00
                                    </span>

                                    <span class="price-before-discount">$800.00</span>

                                </div><!-- /.product-price -->

                            </div><!-- /.product-info -->

                            <div class="cart clearfix animate-effect">
                                <div class="action">

                                    <div class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                            cart</button>

                                    </div>

                                </div><!-- /.action -->
                            </div><!-- /.cart -->
                        </div>
                    </div>
                    <div class="item">
                        <div class="products">
                            <div class="hot-deal-wrapper">
                                <div class="image">
                                    <img src=" {{ asset('frontend') }}/assets/images/hot-deals/p10.jpg" alt="">
                                </div>
                                <div class="sale-offer-tag"><span>35%<br>off</span></div>
                                <div class="timing-wrapper">
                                    <div class="box-wrapper">
                                        <div class="date box">
                                            <span class="key">120</span>
                                            <span class="value">Days</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper">
                                        <div class="hour box">
                                            <span class="key">20</span>
                                            <span class="value">HRS</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper">
                                        <div class="minutes box">
                                            <span class="key">36</span>
                                            <span class="value">MINS</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper hidden-md">
                                        <div class="seconds box">
                                            <span class="key">60</span>
                                            <span class="value">SEC</span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.hot-deal-wrapper -->

                            <div class="product-info text-left m-t-20">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>

                                <div class="product-price">
                                    <span class="price">
                                        $600.00
                                    </span>

                                    <span class="price-before-discount">$800.00</span>

                                </div><!-- /.product-price -->

                            </div><!-- /.product-info -->

                            <div class="cart clearfix animate-effect">
                                <div class="action">

                                    <div class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                            cart</button>

                                    </div>

                                </div><!-- /.action -->
                            </div><!-- /.cart -->
                        </div>
                    </div>


                </div><!-- /.sidebar-widget -->
            </div> --}}
            <!-- ==================== HOT DEALS: END ==================== -->

            <!-- ==================== SPECIAL OFFER ==================== -->
            {{-- <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                <h3 class="section-title">Special Offer</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                        <div class="item">
                            <div class="products special-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p30.jpg"
                                                                alt="">
                                                        </a>
                                                    </div><!-- /.image -->



                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p29.jpg"
                                                                alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p28.jpg"
                                                                alt="">

                                                        </a>
                                                    </div><!-- /.image -->



                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products special-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p27.jpg"
                                                                alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p26.jpg"
                                                                alt="">
                                                        </a>
                                                    </div><!-- /.image -->

                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p25.jpg"
                                                                alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products special-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p24.jpg"
                                                                alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p23.jpg"
                                                                alt="">
                                                        </a>
                                                    </div><!-- /.image -->



                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->
                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p22.jpg"
                                                                alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.sidebar-widget-body -->
            </div><!-- /.sidebar-widget --> --}}

            <!-- ==================== SPECIAL OFFER : END ==================== -->

            <!-- ==================== PRODUCT TAGS ==================== -->
            {{-- <div class="sidebar-widget product-tag wow fadeInUp">
                <h3 class="section-title">Product tags</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <div class="tag-list">
                        <a class="item" title="Phone" href="category.html">Phone</a>
                        <a class="item active" title="Vest" href="category.html">Vest</a>
                        <a class="item" title="Smartphone" href="category.html">Smartphone</a>
                        <a class="item" title="Furniture" href="category.html">Furniture</a>
                        <a class="item" title="T-shirt" href="category.html">T-shirt</a>
                        <a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
                        <a class="item" title="Sneaker" href="category.html">Sneaker</a>
                        <a class="item" title="Toys" href="category.html">Toys</a>
                        <a class="item" title="Rose" href="category.html">Rose</a>
                    </div><!-- /.tag-list -->
                </div><!-- /.sidebar-widget-body -->
            </div><!-- /.sidebar-widget --> --}}

            <!-- ========================= PRODUCT TAGS : END ========================= -->

            <!-- ==================== SPECIAL DEALS ==================== -->
            {{-- <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                <h3 class="section-title">Special Deals</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                        <div class="item">
                            <div class="products special-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p28.jpg"
                                                                alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p15.jpg"
                                                                alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img data-echo=" {{ asset('frontend') }}/assets/images/products/p26.jpg"
                                                                alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products special-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p18.jpg"
                                                                alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p17.jpg"
                                                                alt="">
                                                        </a>
                                                    </div><!-- /.image -->



                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p16.jpg"
                                                                alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->
                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products special-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img data-echo=" {{ asset('frontend') }}/assets/images/products/p15.jpg"
                                                                alt="">
                                                            <div class="zoom-overlay"></div>
                                                        </a>
                                                    </div><!-- /.image -->



                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p14.jpg"
                                                                alt="">
                                                            <div class="zoom-overlay"></div>
                                                        </a>
                                                    </div><!-- /.image -->



                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset('frontend') }}/assets/images/products/p13.jpg"
                                                                alt="">
                                                        </a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $450.99 </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.sidebar-widget-body -->
            </div><!-- /.sidebar-widget --> --}}

            <!-- ==================== SPECIAL DEALS : END ==================== -->

            <!-- ========================= NEWSLETTER ============================== -->
            {{-- <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                <h3 class="section-title">Newsletters</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <p>Sign Up for Our Newsletter!</p>
                    <form role="form">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                placeholder="Subscribe to our newsletter">
                        </div>
                        <button class="btn btn-primary">Subscribe</button>
                    </form>
                </div><!-- /.sidebar-widget-body -->
            </div><!-- /.sidebar-widget --> --}}

            <!-- ========================= NEWSLETTER: END ============================== -->

            <!-- ============================= Testimonials ============================= -->
            {{-- <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                <div id="advertisement" class="advertisement">
                    <div class="item">
                        <div class="avatar"><img src=" {{ asset('frontend') }}/assets/images/testimonials/member1.png"
                                alt="Image"></div>
                        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                            mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                        <div class="clients_author">John Doe <span>Abc Company</span> </div>
                        <!-- /.container-fluid -->
                    </div><!-- /.item -->

                    <div class="item">
                        <div class="avatar"><img src=" {{ asset('frontend') }}/assets/images/testimonials/member3.png"
                                alt="Image"></div>
                        <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port
                            mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                        <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                    </div><!-- /.item -->

                    <div class="item">
                        <div class="avatar"><img src=" {{ asset('frontend') }}/assets/images/testimonials/member2.png"
                                alt="Image"></div>
                        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                            mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                        <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                        <!-- /.container-fluid -->
                    </div><!-- /.item -->

                </div><!-- /.owl-carousel -->
            </div> --}}

            <!-- ============================= Testimonials End ============================= -->

        </div><!-- /.sidemenu-holder Col-md-3 -->
        <!-- ============================================== SIDEBAR Categories Start  ============================================== -->
        <div class='col-md-9'>
            <div class="detail-block">
                <div class="row  wow fadeInUp">

                    <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                        <div class="product-item-holder size-big single-product-gallery small-gallery">

                            <div id="owl-single-product">
                                @foreach ($multiImages as $multiImg )
                                    <div class="single-product-gallery-item" id="slide{{$multiImg->multiImg_id }} ">
                                        <a data-lightbox="image-1" data-title="Gallery"
                                            href=" {{ asset($multiImg->photo_name) }}">
                                            <img class="img-responsive" alt="Multiple Img" src=" {{ asset($multiImg->photo_name) }}"
                                                data-echo=" {{ asset($multiImg->photo_name) }}" />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->
                                @endforeach
                            </div><!-- /.single-product-slider -->

                            <div class="single-product-gallery-thumbs gallery-thumbs">
                                <div id="owl-single-product-thumbnails">
                                    @foreach ($multiImages as $multiImg )
                                        <div class="item">
                                            <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                data-slide="{{ $multiImg->multiImg_id }}" href="#slide{{ $multiImg->multiImg_id }}">
                                                <img class="img-responsive" width="85" alt="Multiple Img Thumb" src=" {{ asset($multiImg->photo_name) }}"
                                                    data-echo=" {{ asset($multiImg->photo_name) }}"/>
                                            </a>
                                        </div>
                                    @endforeach

                                </div><!-- /#owl-single-product-thumbnails -->
                            </div><!-- /.gallery-thumbs -->

                        </div><!-- /.single-product-gallery -->
                    </div><!-- /.gallery-holder -->
                    <div class='col-sm-6 col-md-7 product-info-block'>
                        <div class="product-info">
                            @if (Session()->get('language') == 'bangla')
                                <h1 class="name"> {{ $singleProduct->product_name_bn }} </h1>
                            @else
                                <h1 class="name"> {{ $singleProduct->product_name_en }} </h1>
                            @endif

                            <div class="rating-reviews m-t-20">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="rating rateit-small"></div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="reviews">
                                            <a href="#" class="lnk">(13 Reviews)</a>
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                            </div><!-- /.rating-reviews -->

                            <div class="stock-container info-container m-t-10">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="stock-box">
                                            @if (Session()->get('language') == 'bangla')
                                                <span class="label">উপস্থিতি :</span>
                                            @else
                                                <span class="label">Availability :</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="stock-box">
                                            @if ($singleProduct->product_qty == null)
                                                @if (Session()->get('language') == 'bangla')
                                                    <span class="value">ফুরিয়ে গেছে</span>
                                                @else
                                                    <span class="value">Out Of Stock</span>
                                                @endif
                                            @else
                                                @if (Session()->get('language') == 'bangla')
                                                    <span class="value" style="color: green">এখন মজুদ আছে</span>
                                                @else
                                                    <span class="value" style="color: green">In Stock</span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                            </div><!-- /.stock-container -->

                            <div class="description-container m-t-20">
                                @if (Session()->get('language') == 'bangla')
                                    {!! $singleProduct->short_descp_bn !!}
                                @else
                                    {!! $singleProduct->short_descp_en !!}
                                @endif
                            </div><!-- /.description-container -->

                            <div class="price-container info-container m-t-20">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="price-box">

                                            @if ($singleProduct->discount_price == null)
                                            <span class="price">
                                                @if (Session()->get('language') == 'bangla') {{ bn_price($singleProduct->actual_price) }} @else {{ $singleProduct->actual_price}} @endif
                                             </span>
                                        @else
                                            <span class="price">
                                                @if (Session()->get('language') == 'bangla') {{ bn_price($singleProduct->discount_price) }} @else {{ $singleProduct->discount_price }} @endif
                                            </span>
                                            <span class="price-strike">
                                                @if (Session()->get('language') == 'bangla') {{ bn_price($singleProduct->actual_price) }} @else {{ $singleProduct->actual_price }} @endif
                                             </span>
                                        @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="favorite-button m-t-10">
                                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                title="Wishlist" href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                title="Add to Compare" href="#">
                                                <i class="fa fa-signal"></i>
                                            </a>
                                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                title="E-mail" href="#">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div><!-- /.row -->
                            </div><!-- /.price-container -->

                            <div class="quantity-container info-container">
                                <div class="row">

                                    <div class="col-sm-2">
                                        @if (Session()->get('language') == 'bangla')
                                            <span class="label">পরিমাণ :</span>
                                        @else
                                            <span class="label">Qty :</span>
                                        @endif
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="cart-quantity">
                                            <div class="quant-input">
                                                <div class="arrows">
                                                    <div class="arrow plus gradient"><span class="ir"><i
                                                                class="icon fa fa-sort-asc"></i></span></div>
                                                    <div class="arrow minus gradient"><span class="ir"><i
                                                                class="icon fa fa-sort-desc"></i></span></div>
                                                </div>
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-7">
                                        <a href="#" class="btn btn-primary">
                                            @if (Session()->get('language') == 'bangla')
                                                <i class="fa fa-shopping-cart inner-right-vs"></i> ব্যাগে যুক্ত করুন
                                            @else
                                                <i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART
                                            @endif
                                        </a>
                                    </div>

                                </div><!-- /.row -->
                            </div><!-- /.quantity-container -->

                        </div><!-- /.product-info -->
                    </div><!-- /.col-sm-7 -->
                </div><!-- /.row -->
            </div>

            <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                <div class="row">
                    <div class="col-sm-3">
                        <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">

                            @if (Session()->get('language') == 'bangla')
                                <li class="active"><a data-toggle="tab" href="#description">পণ্যের বর্ণনা</a></li>
                            @else
                                <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                            @endif

                            @if (Session()->get('language') == 'bangla')
                                <li><a data-toggle="tab" href="#review">মতামত</a></li>
                            @else
                                <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                            @endif

                            @if (Session()->get('language') == 'bangla')
                                <li><a data-toggle="tab" href="#tags">ট্যাগ</a></li>
                            @else
                                <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                            @endif
                        </ul><!-- /.nav-tabs #product-tabs -->
                    </div>
                    <div class="col-sm-9">

                        <div class="tab-content">

                            <div id="description" class="tab-pane in active">
                                <div class="product-tab">
                                    <p class="text">
                                        @if (Session()->get('language') == 'bangla')
                                            {!! $singleProduct->long_descp_bn !!}
                                        @else
                                            {!! $singleProduct->long_descp_en !!}
                                        @endif
                                    </p>
                                </div>
                            </div><!-- /.tab-pane -->

                            <div id="review" class="tab-pane">
                                <div class="product-tab">

                                    <div class="product-reviews">
                                        <h4 class="title">Customer Reviews</h4>

                                        <div class="reviews">
                                            <div class="review">
                                                <div class="review-title"><span class="summary">We love this
                                                        product</span><span class="date"><i
                                                            class="fa fa-calendar"></i><span>1 days ago</span></span>
                                                </div>
                                                <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit.Aliquam suscipit."</div>
                                            </div>

                                        </div><!-- /.reviews -->
                                    </div><!-- /.product-reviews -->



                                    <div class="product-add-review">
                                        <h4 class="title">Write your own review</h4>
                                        <div class="review-table">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="cell-label">&nbsp;</th>
                                                            <th>1 star</th>
                                                            <th>2 stars</th>
                                                            <th>3 stars</th>
                                                            <th>4 stars</th>
                                                            <th>5 stars</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="cell-label">Quality</td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                    value="1"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                    value="2"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                    value="3"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                    value="4"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                    value="5"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cell-label">Price</td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                    value="1"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                    value="2"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                    value="3"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                    value="4"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                    value="5"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cell-label">Value</td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                    value="1"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                    value="2"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                    value="3"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                    value="4"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                    value="5"></td>
                                                        </tr>
                                                    </tbody>
                                                </table><!-- /.table .table-bordered -->
                                            </div><!-- /.table-responsive -->
                                        </div><!-- /.review-table -->

                                        <div class="review-form">
                                            <div class="form-container">
                                                <form role="form" class="cnt-form">

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputName">Your Name <span
                                                                        class="astk">*</span></label>
                                                                <input type="text" class="form-control txt"
                                                                    id="exampleInputName" placeholder="">
                                                            </div><!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label for="exampleInputSummary">Summary <span
                                                                        class="astk">*</span></label>
                                                                <input type="text" class="form-control txt"
                                                                    id="exampleInputSummary" placeholder="">
                                                            </div><!-- /.form-group -->
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputReview">Review <span
                                                                        class="astk">*</span></label>
                                                                <textarea class="form-control txt txt-review"
                                                                    id="exampleInputReview" rows="4"
                                                                    placeholder=""></textarea>
                                                            </div><!-- /.form-group -->
                                                        </div>
                                                    </div><!-- /.row -->

                                                    <div class="action text-right">
                                                        <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                    </div><!-- /.action -->

                                                </form><!-- /.cnt-form -->
                                            </div><!-- /.form-container -->
                                        </div><!-- /.review-form -->

                                    </div><!-- /.product-add-review -->

                                </div><!-- /.product-tab -->
                            </div><!-- /.tab-pane -->

                            <div id="tags" class="tab-pane">
                                <div class="product-tag">

                                    <h4 class="title">Product Tags</h4>
                                    <form role="form" class="form-inline form-cnt">
                                        <div class="form-container">

                                            <div class="form-group">
                                                <label for="exampleInputTag">Add Your Tags: </label>
                                                <input type="email" id="exampleInputTag" class="form-control txt" data-role="tagsinput">
                                            </div>

                                            <button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
                                        </div><!-- /.form-container -->
                                    </form><!-- /.form-cnt -->

                                    <form role="form" class="form-inline form-cnt">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                        </div>
                                    </form><!-- /.form-cnt -->

                                </div><!-- /.product-tab -->
                            </div><!-- /.tab-pane -->

                        </div><!-- /.tab-content -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.product-tabs -->

            <!-- ============================================== UPSELL PRODUCTS ============================================== -->
            {{-- <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">upsell products</h3>
                <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img
                                                src="{{ asset('frontend') }}/assets/images/products/p1.jpg" alt=""></a>
                                    </div><!-- /.image -->

                                    <div class="tag sale"><span>sale</span></div>
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">
                                        <span class="price">
                                            $650.99 </span>
                                        <span class="price-before-discount">$ 800</span>

                                    </div><!-- /.product-price -->

                                </div><!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                    type="button">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to
                                                    cart</button>

                                            </li>

                                            <li class="lnk wishlist">
                                                <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>

                                            <li class="lnk">
                                                <a class="add-to-cart" href="detail.html" title="Compare">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img
                                                src="{{ asset('frontend') }}/assets/images/products/p2.jpg" alt=""></a>
                                    </div><!-- /.image -->

                                    <div class="tag sale"><span>sale</span></div>
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">
                                        <span class="price">
                                            $650.99 </span>
                                        <span class="price-before-discount">$ 800</span>

                                    </div><!-- /.product-price -->

                                </div><!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                    type="button">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to
                                                    cart</button>

                                            </li>

                                            <li class="lnk wishlist">
                                                <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>

                                            <li class="lnk">
                                                <a class="add-to-cart" href="detail.html" title="Compare">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img
                                                src="{{ asset('frontend') }}/assets/images/products/p3.jpg" alt=""></a>
                                    </div><!-- /.image -->

                                    <div class="tag hot"><span>hot</span></div>
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">
                                        <span class="price">
                                            $650.99 </span>
                                        <span class="price-before-discount">$ 800</span>

                                    </div><!-- /.product-price -->

                                </div><!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                    type="button">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to
                                                    cart</button>

                                            </li>

                                            <li class="lnk wishlist">
                                                <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>

                                            <li class="lnk">
                                                <a class="add-to-cart" href="detail.html" title="Compare">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img
                                                src="{{ asset('frontend') }}/assets/images/products/p4.jpg" alt=""></a>
                                    </div><!-- /.image -->

                                    <div class="tag new"><span>new</span></div>
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">
                                        <span class="price">
                                            $650.99 </span>
                                        <span class="price-before-discount">$ 800</span>

                                    </div><!-- /.product-price -->

                                </div><!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                    type="button">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to
                                                    cart</button>

                                            </li>

                                            <li class="lnk wishlist">
                                                <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>

                                            <li class="lnk">
                                                <a class="add-to-cart" href="detail.html" title="Compare">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img src="{{ asset('frontend') }}/assets/images/blank.gif"
                                                data-echo="{{ asset('frontend') }}/assets/images/products/p5.jpg"
                                                alt=""></a>
                                    </div><!-- /.image -->

                                    <div class="tag hot"><span>hot</span></div>
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">
                                        <span class="price">
                                            $650.99 </span>
                                        <span class="price-before-discount">$ 800</span>

                                    </div><!-- /.product-price -->

                                </div><!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                    type="button">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to
                                                    cart</button>

                                            </li>

                                            <li class="lnk wishlist">
                                                <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>

                                            <li class="lnk">
                                                <a class="add-to-cart" href="detail.html" title="Compare">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img src="{{ asset('frontend') }}/assets/images/blank.gif"
                                                data-echo="{{ asset('frontend') }}/assets/images/products/p6.jpg"
                                                alt=""></a>
                                    </div><!-- /.image -->

                                    <div class="tag new"><span>new</span></div>
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">
                                        <span class="price">
                                            $650.99 </span>
                                        <span class="price-before-discount">$ 800</span>

                                    </div><!-- /.product-price -->

                                </div><!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                    type="button">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to
                                                    cart</button>

                                            </li>

                                            <li class="lnk wishlist">
                                                <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>

                                            <li class="lnk">
                                                <a class="add-to-cart" href="detail.html" title="Compare">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->
                </div><!-- /.home-owl-carousel -->
            </section> /.section --}}
            <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

        </div><!-- /.sidemenu-holder Col-md-9 -->
        <div class="clearfix"></div>
    </div><!-- /.row -->


    <br><br><br>
</div><!-- /.row -->
@include('frontend.layouts.footer-slider')
<br>
@endsection
