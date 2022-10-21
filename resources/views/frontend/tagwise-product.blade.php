@extends('frontend.layouts.master')
@if (Session()->get('language') == 'bangla')
@section('title', 'সহজ কেনাকাটা')
@else
@section('title', 'Easy Shopping')
@endif
@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Category Wise Product</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
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



    <!-- ============================================== SIDEBAR PART Start ============================================== -->
    <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
        <!-- ==================================(Sidebar Categories part) TOP NAVIGATION : START ================================== -->
        @include('frontend.include.sidebar-categories')
        <!-- ==================================(Sidebar Categories part) TOP NAVIGATION : END ================================== -->

        <!-- ================================== Sidebar Part (Shop By, Price Slider, Menufactures, Colors, Compare Products, Product Tags) : START ================================== -->
        <div class="sidebar-module-container">

            <div class="sidebar-filter">
                <!-- ============================================== (Shop By) SIDEBAR CATEGORY START ============================================== -->
                <div class="sidebar-widget wow fadeInUp">
                    <h3 class="section-title">shop by</h3>
                    <div class="widget-header">
                        <h4 class="widget-title">Category</h4>
                    </div>
                    <div class="sidebar-widget-body">
                        <div class="accordion">
                            @php
                            $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                            @endphp

                            @foreach ($categories as $category)
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    @if (Session()->get('language') == 'bangla')
                                    <a href="#{{ $category->category_id }}" data-toggle="collapse"
                                        class="accordion-toggle collapsed"> {{ $category->category_name_bn }} </a>
                                    @else
                                    <a href="#{{ $category->category_id }}" data-toggle="collapse"
                                        class="accordion-toggle collapsed"> {{ $category->category_name_en }} </a>
                                    @endif
                                </div><!-- /.accordion-heading -->
                                @php
                                $subcategories =
                                App\Models\Subcategory::where('category_id',$category->category_id)->orderBy('subcategory_name_en','ASC')->get();
                                @endphp
                                <div class="accordion-body collapse" id="{{ $category->category_id }}"
                                    style="height: 0px;">
                                    <div class="accordion-inner">
                                        <ul>
                                            @foreach ($subcategories as $subcategory)
                                            @if (Session()->get('language') == 'bangla')
                                            <li><a href="#{{ $category->category_id }}" data-toggle="collapse"
                                                    class="accordion-toggle collapsed"> {{
                                                    $subcategory->subcategory_name_bn }} </a></li>
                                            @else
                                            <li><a href="#{{ $category->category_id }}" data-toggle="collapse"
                                                    class="accordion-toggle collapsed"> {{
                                                    $subcategory->subcategory_name_en }} </a></li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div><!-- /.accordion-inner -->
                                </div><!-- /.accordion-body -->
                            </div><!-- /.accordion-group -->
                            @endforeach

                        </div><!-- /.accordion -->
                    </div><!-- /.sidebar-widget-body -->
                </div><!-- /.sidebar-widget -->
                <!-- ============================================== (Shop By) SIDEBAR CATEGORY : END ============================================== -->

                <!-- ============================================== (Price Slider) PRICE SILDER START ============================================== -->
                <div class="sidebar-widget wow fadeInUp">
                    <div class="widget-header">
                        <h4 class="widget-title">Price Slider</h4>
                    </div>
                    <div class="sidebar-widget-body m-t-10">
                        <div class="price-range-holder">
                            <span class="min-max">
                                <span class="pull-left">$200.00</span>
                                <span class="pull-right">$800.00</span>
                            </span>
                            <input type="text" id="amount"
                                style="border:0; color:#666666; font-weight:bold;text-align:center;">

                            <input type="text" class="price-slider" value="">

                        </div><!-- /.price-range-holder -->
                        <a href="#" class="lnk btn btn-primary">Show Now</a>
                    </div><!-- /.sidebar-widget-body -->
                </div><!-- /.sidebar-widget -->
                <!-- ============================================== (Price Slider) PRICE SILDER : END ============================================== -->

                <!-- ============================================== (Menufactures) MANUFACTURES START  ============================================== -->
                <div class="sidebar-widget wow fadeInUp">
                    <div class="widget-header">
                        <h4 class="widget-title">Manufactures</h4>
                    </div>
                    <div class="sidebar-widget-body">
                        <ul class="list">
                            <li><a href="#">Forever 18</a></li>
                            <li><a href="#">Nike</a></li>
                            <li><a href="#">Dolce & Gabbana</a></li>
                            <li><a href="#">Alluare</a></li>
                            <li><a href="#">Chanel</a></li>
                            <li><a href="#">Other Brand</a></li>
                        </ul>
                        <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                    </div><!-- /.sidebar-widget-body -->
                </div><!-- /.sidebar-widget -->
                <!-- ============================================== (Menufactures) MANUFACTURES: END ============================================== -->

                <!-- ============================================== (Colors) COLOR START ============================================== -->
                <div class="sidebar-widget wow fadeInUp">
                    <div class="widget-header">
                        <h4 class="widget-title">Colors</h4>
                    </div>
                    <div class="sidebar-widget-body">
                        <ul class="list">
                            <li><a href="#">Red</a></li>
                            <li><a href="#">Blue</a></li>
                            <li><a href="#">Yellow</a></li>
                            <li><a href="#">Pink</a></li>
                            <li><a href="#">Brown</a></li>
                            <li><a href="#">Teal</a></li>
                        </ul>
                    </div><!-- /.sidebar-widget-body -->
                </div><!-- /.sidebar-widget -->
                <!-- ============================================== (Colors) COLOR: END ============================================== -->

                <!-- ============================================== (Product Compare) COMPARE START============================================== -->
                <div class="sidebar-widget wow fadeInUp outer-top-vs">
                    <h3 class="section-title">Compare products</h3>
                    <div class="sidebar-widget-body">
                        <div class="compare-report">
                            <p>You have no <span>item(s)</span> to compare</p>
                        </div><!-- /.compare-report -->
                    </div><!-- /.sidebar-widget-body -->
                </div><!-- /.sidebar-widget -->
                <!-- ============================================== (Product Compare) COMPARE: END ============================================== -->

                <!-- ============================================== (Product Tags) PRODUCT TAGS START ============================================== -->
                @include('frontend.include.sidebar-product-tags')
                <!-- ============================================== (Product Tags) PRODUCT TAGS : END ============================================== -->

            </div><!-- /.sidebar-filter -->
        </div><!-- /.sidebar-module-container -->
        <!-- ================================== Sidebar Part (Shop By, Price Slider, Menufactures, Colors, Compare Products, Product Tags) : START ================================== -->

        <!-- ============================================== Sidebar Testimonials START ============================================== -->
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
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
        </div>
        <!-- ============================================== Sidebar Testimonials: END ============================================== -->

        <div class="home-banner">
            <img src=" {{ asset('frontend') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
        </div>

    </div><!-- /.sidemenu-holder -->
    <!-- ============================================== SIDEBAR  PART END  ============================================== -->

    <!-- ============================================== PAGE CONTENT START ============================================== -->
    <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <!-- ========================================== BANNER PART START  ========================================= -->
        <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                @foreach ($banners as $banner)
                <div class="item" style="background-image: url({{ asset($banner->banner_img) }});">
                    <div class="container-fluid">
                        <div class="caption bg-color vertical-center text-left">
                            @if ($banner->banner_title_en == null)
                            @else
                            <div class="slider-header fadeInDown-1"> @if (Session()->get('language') == 'bangla') সহজ
                                কেনাকাটায় @else Easy Sopping @endif </div>
                            @endif
                            <div class="big-text fadeInDown-1">
                                @if (Session()->get('language') == 'bangla')
                                {{ $banner->banner_title_bn }}
                                @else
                                {{ $banner->banner_title_en }}
                                @endif
                            </div>

                            <div class="excerpt fadeInDown-2 hidden-xs">
                                @if (Session()->get('language') == 'bangla')
                                <span> {{ $banner->banner_subtitle_bn }} </span>
                                @else
                                <span> {{ $banner->banner_subtitle_en }} </span>
                                @endif
                            </div>
                            @if ($banner->banner_title_en == null)
                            @else
                            <div class="button-holder fadeInDown-3">
                                <a href="index6c11.html?page=single-product"
                                    class="btn-lg btn btn-uppercase btn-primary shop-now-button">
                                    @if (Session()->get('language') == 'bangla') এখনই কিনুন @else Buy Now @endif
                                </a>
                            </div>
                            @endif
                        </div><!-- /.caption -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.item -->
                @endforeach
            </div><!-- /.owl-carousel -->
        </div>
        <!-- ========================================= BANNER PART : END ========================================= -->

        <!-- ########################################################################################################################
                    ====================================== PRODUCT VIEW PART START ======================================
        ######################################################################################################################## -->

        <!-- ========================= PRODUCT VIEW Top Bar Part START ========================= -->
        <div class="clearfix filters-container m-t-10">
            <div class="row">
                <div class="col col-sm-6 col-md-2">
                    <div class="filter-tabs">
                        <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                            <li class="active">
                                @if (Session()->get('language') == 'bangla')
                                    <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>ব্লক</a>
                                @else
                                    <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a>
                                @endif
                            </li>
                            <li>
                                @if (Session()->get('language') == 'bangla')
                                    <a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>লিস্ট</a>
                                @else
                                    <a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a>
                                @endif
                            </li>
                        </ul>
                    </div><!-- /.filter-tabs -->
                </div><!-- /.col -->
                <div class="col col-sm-12 col-md-6">
                    <div class="col col-sm-3 col-md-6 no-padding">
                        <div class="lbl-cnt">
                            @if (Session()->get('language') == 'bangla')
                                <span class="lbl">ক্রম</span>
                            @else
                                <span class="lbl">Sort by</span>
                            @endif
                            <div class="fld inline">
                                <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                    <button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
                                        @if (Session()->get('language') == 'bangla')
                                            ধারা  <span class="caret"></span>
                                        @else
                                            Position <span class="caret"></span>
                                        @endif
                                    </button>

                                    <ul role="menu" class="dropdown-menu">
                                        <li role="presentation"><a href="#">position</a></li>
                                        <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                        <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                        <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                    </ul>
                                </div>
                            </div><!-- /.fld -->
                        </div><!-- /.lbl-cnt -->
                    </div><!-- /.col -->
                    <div class="col col-sm-3 col-md-6 no-padding">
                        <div class="lbl-cnt">
                            @if (Session()->get('language') == 'bangla')
                                <span class="lbl">দেখুন</span>
                            @else
                                <span class="lbl">Show</span>
                            @endif
                            <div class="fld inline">
                                <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                    @if (Session()->get('language') == 'bangla')
                                    <button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
                                       {{ bn_price(1) }}<span class="caret"></span>
                                    </button>
                                    @else
                                    <button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
                                        1 <span class="caret"></span>
                                    </button>
                                    @endif
                                    <ul role="menu" class="dropdown-menu">
                                        @if (Session()->get('language') == 'bangla')
                                            <li role="presentation"><a href="#">{{ bn_price(1) }}</a></li>
                                        @else
                                            <li role="presentation"><a href="#">1</a></li>
                                        @endif
                                        @if (Session()->get('language') == 'bangla')
                                            <li role="presentation"><a href="#">{{ bn_price(2) }}</a></li>
                                        @else
                                            <li role="presentation"><a href="#">2</a></li>
                                        @endif
                                        @if (Session()->get('language') == 'bangla')
                                            <li role="presentation"><a href="#">{{ bn_price(3) }}</a></li>
                                        @else
                                            <li role="presentation"><a href="#">3</a></li>
                                        @endif
                                        @if (Session()->get('language') == 'bangla')
                                            <li role="presentation"><a href="#">{{ bn_price(4) }}</a></li>
                                        @else
                                            <li role="presentation"><a href="#">4</a></li>
                                        @endif
                                        @if (Session()->get('language') == 'bangla')
                                            <li role="presentation"><a href="#">{{ bn_price(5) }}</a></li>
                                        @else
                                            <li role="presentation"><a href="#">5</a></li>
                                        @endif
                                        @if (Session()->get('language') == 'bangla')
                                            <li role="presentation"><a href="#">{{ bn_price(6) }}</a></li>
                                        @else
                                            <li role="presentation"><a href="#">6</a></li>
                                        @endif
                                        @if (Session()->get('language') == 'bangla')
                                            <li role="presentation"><a href="#">{{ bn_price(7) }}</a></li>
                                        @else
                                            <li role="presentation"><a href="#">7</a></li>
                                        @endif
                                        @if (Session()->get('language') == 'bangla')
                                            <li role="presentation"><a href="#">{{ bn_price(8) }}</a></li>
                                        @else
                                            <li role="presentation"><a href="#">8</a></li>
                                        @endif
                                        @if (Session()->get('language') == 'bangla')
                                            <li role="presentation"><a href="#">{{ bn_price(9) }}</a></li>
                                        @else
                                            <li role="presentation"><a href="#">9</a></li>
                                        @endif
                                        @if (Session()->get('language') == 'bangla')
                                            <li role="presentation"><a href="#">{{ bn_price(10) }}</a></li>
                                        @else
                                            <li role="presentation"><a href="#">10</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div><!-- /.fld -->
                        </div><!-- /.lbl-cnt -->
                    </div><!-- /.col -->
                </div><!-- /.col -->
                <div class="col col-sm-6 col-md-4 text-right">
                    <div class="pagination-container">
                        <ul class="list-inline list-unstyled">
                            <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>

                            @if (Session()->get('language') == 'bangla')
                                <li><a href="#">{{ bn_price(1) }}</a></li>
                            @else
                                <li><a href="#">1</a></li>
                            @endif
                            @if (Session()->get('language') == 'bangla')
                                <li class="active"><a href="#">{{ bn_price(2) }}</a></li>
                            @else
                                <li class="active"><a href="#">2</a></li>
                            @endif
                            @if (Session()->get('language') == 'bangla')
                                <li><a href="#">{{ bn_price(3) }}</a></li>
                            @else
                                <li><a href="#">3</a></li>
                            @endif
                            @if (Session()->get('language') == 'bangla')
                                <li><a href="#">{{ bn_price(4) }}</a></li>
                            @else
                                <li><a href="#">4</a></li>
                            @endif
                            @if (Session()->get('language') == 'bangla')
                                <li><a href="#">{{ bn_price(5) }}</a></li>
                            @else
                                <li><a href="#">5</a></li>
                            @endif
                            <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul><!-- /.list-inline -->
                    </div><!-- /.pagination-container -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <!-- ========================= PRODUCT VIEW Top Bar Part END ========================= -->

        <!-- ========================= PRODUCT VIEW START ========================= -->
        <div class="search-result-container ">
            <div id="myTabContent" class="tab-content category-list">

            <!-- ==================================== PRODUCT VIEW AS A GRID VIEW START ==================================== -->
                <div class="tab-pane active " id="grid-container">
                    <div class="category-product">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-sm-6 col-md-4 wow fadeInUp">
                                    <div class="products">

                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    @if (Session()->get('language') == 'bangla')
                                                        <a href=" {{ url('single-prduct/details/'. $product->product_id . '/' . $product->product_slug_bn) }} ">
                                                            <img src=" {{ asset($product->product_thumbnail) }}" alt="">
                                                        </a>
                                                    @else
                                                        <a href=" {{ url('single-prduct/details/'. $product->product_id . '/' . $product->product_slug_en) }} ">
                                                            <img src=" {{ asset($product->product_thumbnail) }}" alt="">
                                                        </a>
                                                    @endif
                                                </div><!-- /.image -->

                                                @php
                                                    $amount = $product->actual_price - $product->discount_price;
                                                    $discount = ($amount / $product->actual_price) * 100;
                                                @endphp
                                                @if ($product->discount_price == null)
                                                    @if (Session()->get('language') == 'bangla')
                                                        <div class="tag new"><span>নতুন</span></div>
                                                    @else
                                                        <div class="tag new"><span>new</span></div>
                                                    @endif
                                                @else
                                                    <div class="tag sale">
                                                        <span> @if (Session()->get('language') == 'bangla') {{ bn_price(round($discount)) }}% @else {{ round($discount) }}% @endif </span>
                                                    </div>
                                                @endif
                                            </div><!-- /.product-image -->

                                            <div class="product-info text-left">
                                                @if (Session()->get('language') == 'bangla')
                                                    <h3 class="name"><a href=" {{ url('single-prduct/details/'. $product->product_id . '/' . $product->product_slug_bn) }} "> {{ $product->product_name_bn }} </a></h3>
                                                @else
                                                    <h3 class="name"><a href=" {{ url('single-prduct/details/'. $product->product_id . '/' . $product->product_slug_en) }} "> {{ $product->product_name_en }} </a></h3>
                                                @endif

                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">
                                                    @if ($product->discount_price == null)
                                                        <span class="price">
                                                            @if (Session()->get('language') == 'bangla') {{ bn_price($product->actual_price) }} @else {{ $product->actual_price}} @endif
                                                         </span>
                                                    @else
                                                        <span class="price">
                                                            @if (Session()->get('language') == 'bangla') {{ bn_price($product->discount_price) }} @else {{ $product->discount_price }} @endif
                                                        </span>
                                                        <span class="price-before-discount">
                                                            @if (Session()->get('language') == 'bangla') {{ bn_price($product->actual_price) }} @else {{ $product->actual_price }} @endif
                                                         </span>
                                                    @endif
                                                </div><!-- /.product-price -->
                                            </div><!-- /.product-info -->

                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn" type="button">
                                                                @if (Session()->get('language') == 'bangla') ব্যাগে যুক্ত করুন @else Add to cart @endif
                                                            </button>
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
                            @endforeach

                        </div><!-- /.row -->
                    </div><!-- /.category-product -->
                </div><!-- /.tab-pane -->
            <!-- ==================================== PRODUCT VIEW AS A GRID VIEW START ==================================== -->

            <!-- ==================================== PRODUCT VIEW AS A LIST VIEW START ==================================== -->
            <div class="tab-pane " id="list-container">
                    <div class="category-product">


                        <div class="category-product-inner wow fadeInUp">
                            <div class="products">
                                <div class="product-list product">
                                    <div class="row product-list-row">
                                        <div class="col col-sm-4 col-lg-4">
                                            <div class="product-image">
                                                <div class="image">
                                                    <img src="{{ asset('frontend') }}/assets/images/products/p3.jpg"
                                                        alt="">
                                                </div>
                                            </div><!-- /.product-image -->
                                        </div><!-- /.col -->
                                        <div class="col col-sm-8 col-lg-8">
                                            <div class="product-info">
                                                <h3 class="name"><a href="detail.html">Floral Print
                                                        Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price">
                                                    <span class="price">
                                                        $450.99 </span>
                                                    <span class="price-before-discount">$ 800</span>

                                                </div><!-- /.product-price -->
                                                <div class="description m-t-10">Suspendisse posuere arcu
                                                    diam, id accumsan eros pharetra ac. Nulla enim risus,
                                                    facilisis bibendum gravida eget, lacinia id purus.
                                                    Suspendisse posuere arcu diam, id accumsan eros pharetra
                                                    ac. Nulla enim risus, facilisis bibendum gravida eget.
                                                </div>
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon"
                                                                    data-toggle="dropdown" type="button">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                                <button class="btn btn-primary cart-btn"
                                                                    type="button">Add to cart</button>

                                                            </li>

                                                            <li class="lnk wishlist">
                                                                <a class="add-to-cart" href="detail.html"
                                                                    title="Wishlist">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            </li>

                                                            <li class="lnk">
                                                                <a class="add-to-cart" href="detail.html"
                                                                    title="Compare">
                                                                    <i class="fa fa-signal"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div><!-- /.action -->
                                                </div><!-- /.cart -->

                                            </div><!-- /.product-info -->
                                        </div><!-- /.col -->
                                    </div><!-- /.product-list-row -->
                                    <div class="tag new"><span>new</span></div>
                                </div><!-- /.product-list -->
                            </div><!-- /.products -->
                        </div><!-- /.category-product-inner -->


                        <div class="category-product-inner wow fadeInUp">
                            <div class="products">
                                <div class="product-list product">
                                    <div class="row product-list-row">
                                        <div class="col col-sm-4 col-lg-4">
                                            <div class="product-image">
                                                <div class="image">
                                                    <img src="{{ asset('frontend') }}/assets/images/products/p4.jpg"
                                                        alt="">
                                                </div>
                                            </div><!-- /.product-image -->
                                        </div><!-- /.col -->
                                        <div class="col col-sm-8 col-lg-8">
                                            <div class="product-info">
                                                <h3 class="name"><a href="detail.html">Floral Print
                                                        Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price">
                                                    <span class="price">
                                                        $450.99 </span>
                                                    <span class="price-before-discount">$ 800</span>

                                                </div><!-- /.product-price -->
                                                <div class="description m-t-10">Suspendisse posuere arcu
                                                    diam, id accumsan eros pharetra ac. Nulla enim risus,
                                                    facilisis bibendum gravida eget, lacinia id purus.
                                                    Suspendisse posuere arcu diam, id accumsan eros pharetra
                                                    ac. Nulla enim risus, facilisis bibendum gravida eget.
                                                </div>
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon"
                                                                    data-toggle="dropdown" type="button">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                                <button class="btn btn-primary cart-btn"
                                                                    type="button">Add to cart</button>

                                                            </li>

                                                            <li class="lnk wishlist">
                                                                <a class="add-to-cart" href="detail.html"
                                                                    title="Wishlist">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            </li>

                                                            <li class="lnk">
                                                                <a class="add-to-cart" href="detail.html"
                                                                    title="Compare">
                                                                    <i class="fa fa-signal"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div><!-- /.action -->
                                                </div><!-- /.cart -->

                                            </div><!-- /.product-info -->
                                        </div><!-- /.col -->
                                    </div><!-- /.product-list-row -->
                                    <div class="tag sale"><span>sale</span></div>
                                </div><!-- /.product-list -->
                            </div><!-- /.products -->
                        </div><!-- /.category-product-inner -->

                    </div><!-- /.category-product -->
                </div><!-- /.tab-pane #list-container -->
            </div><!-- /.tab-content -->
            <!-- ==================================== PRODUCT VIEW AS A LIST VIEW END ==================================== -->

            <div class="clearfix filters-container">
                <div class="text-right">
                    <div class="pagination-container">
                        <ul class="list-inline list-unstyled">
                            <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>

                            @if (Session()->get('language') == 'bangla')
                                <li><a href="#">{{ bn_price(1) }}</a></li>
                            @else
                                <li><a href="#">1</a></li>
                            @endif
                            @if (Session()->get('language') == 'bangla')
                                <li class="active"><a href="#">{{ bn_price(2) }}</a></li>
                            @else
                                <li class="active"><a href="#">2</a></li>
                            @endif
                            @if (Session()->get('language') == 'bangla')
                                <li><a href="#">{{ bn_price(3) }}</a></li>
                            @else
                                <li><a href="#">3</a></li>
                            @endif
                            @if (Session()->get('language') == 'bangla')
                                <li><a href="#">{{ bn_price(4) }}</a></li>
                            @else
                                <li><a href="#">4</a></li>
                            @endif
                            @if (Session()->get('language') == 'bangla')
                                <li><a href="#">{{ bn_price(5) }}</a></li>
                            @else
                                <li><a href="#">5</a></li>
                            @endif
                            <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul><!-- /.list-inline -->
                    </div><!-- /.pagination-container -->
                </div><!-- /.text-right -->
            </div><!-- /.filters-container -->

        </div><!-- /.search-result-container -->
        <!-- ========================= PRODUCT VIEW END ========================= -->

    </div><!-- /.homebanner-holder -->
    <!-- ============================================== PAGE CONTENT : END ============================================== -->
</div><!-- /.row -->
@include('frontend.layouts.footer-slider')

@endsection
