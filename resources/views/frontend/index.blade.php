@extends('frontend.layouts.master')
@if (Session()->get('language') == 'bangla')
    @section('title', 'সহজ কেনাকাটা')
@else
    @section('title', 'Easy Shopping')
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

    <!-- ============================================== SIDEBAR Categories Start ============================================== -->
    <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

    <!-- ==================================(Sidebar Categories part) TOP NAVIGATION : START ================================== -->
        @include('frontend.include.sidebar-categories')
    <!-- ==================================(Sidebar Categories part) TOP NAVIGATION : END ================================== -->

    <!-- ==================================(Sidebar Special shopping part) SPECIAL SHOPPING : START ================================== -->
        @include('frontend.include.sidebar-special-shop')
    <!-- ==================================(Sidebar Special shopping part) SPECIAL SHOPPING : END ================================== -->

    <!-- ==================================(Sidebar Special offer part) SPECIAL OFFER : START ================================== -->
        @include('frontend.include.sidebar-special-offer')
    <!-- ==================================(Sidebar Special offer part) SPECIAL OFFER : END ================================== -->

        <!-- ============================================== PRODUCT TAGS ============================================== -->

        <div class="sidebar-widget product-tag wow fadeInUp">
            <h3 class="section-title">Product tags</h3>
            <div class="sidebar-widget-body outer-top-xs">
                <div class="tag-list">
                    @if (Session()->get('language') == 'bangla')
                        @foreach ($tags_bn as $tag)
                            <a class="item" title="Phone" href="#"> {{ $tag }} </a>
                        @endforeach
                    @else
                    @foreach ($tags_en as $tag)
                        <a class="item" title="Phone" href="#"> {{ $tag }} </a>
                    @endforeach
                    @endif
                </div><!-- /.tag-list -->
            </div><!-- /.sidebar-widget-body -->
        </div><!-- /.sidebar-widget -->
        <!-- ============================================== PRODUCT TAGS : END ============================================== -->

        <!-- ==================================(Sidebar Special Deals part) SPECIAL OFFER : START ================================== -->
            @include('frontend.include.sidebar-special-deals')
        <!-- ==================================(Sidebar Special Deals part) SPECIAL OFFER : END ================================== -->
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
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
        </div><!-- /.sidebar-widget -->
        <!-- ============================================== NEWSLETTER: END ============================================== -->

        <!-- ============================================== Testimonials============================================== -->
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

        <!-- ============================================== Testimonials: END ============================================== -->

        <div class="home-banner">
            <img src=" {{ asset('frontend') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
        </div>




    </div><!-- /.sidemenu-holder -->
    <!-- ============================================== SIDEBAR Categories Start  ============================================== -->

    <!-- ============================================== CONTENT ============================================== -->
    <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <!-- ========================================== SECTION – Banner ========================================= -->

        <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                @foreach ($banners as $banner)
                <div class="item" style="background-image: url({{ asset($banner->banner_img) }});">
                    <div class="container-fluid">
                        <div class="caption bg-color vertical-center text-left">
                            @if ($banner->banner_title_en == null)
                            @else
                                <div class="slider-header fadeInDown-1"> @if (Session()->get('language') == 'bangla') সহজ কেনাকাটায় @else Easy Sopping @endif </div>
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
                                    <a href="index6c11.html?page=single-product"class="btn-lg btn btn-uppercase btn-primary shop-now-button">
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

        <!-- ========================================= SECTION – Banner : END ========================================= -->

        <!-- ============================================== BANNER INFO BOXES ============================================== -->
        {{-- <div class="info-boxes wow fadeInUp">
            <div class="info-boxes-inner">
                <div class="row">
                    <div class="col-md-6 col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row">

                                <div class="col-xs-12">
                                    <h4 class="info-box-heading green">money back</h4>
                                </div>
                            </div>
                            <h6 class="text">30 Days Money Back Guarantee</h6>
                        </div>
                    </div><!-- .col -->

                    <div class="hidden-md col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row">

                                <div class="col-xs-12">
                                    <h4 class="info-box-heading green">free shipping</h4>
                                </div>
                            </div>
                            <h6 class="text">Shipping on orders over $99</h6>
                        </div>
                    </div><!-- .col -->

                    <div class="col-md-6 col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row">

                                <div class="col-xs-12">
                                    <h4 class="info-box-heading green">Special Sale</h4>
                                </div>
                            </div>
                            <h6 class="text">Extra $5 off on all items </h6>
                        </div>
                    </div><!-- .col -->
                </div><!-- /.row -->
            </div><!-- /.info-boxes-inner -->

        </div><!-- /.info-boxes --> --}}
        <!-- ============================================== BANNER INFO BOXES : END ============================================== -->
        <!-- ============================================== NEW PRODUCTS SCROLL TABS START ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
                @if (Session()->get('language') == 'bangla')
                    <h3 class="new-product-title pull-left"> নতুন পণ্যসমূহ </h3>
                @else
                    <h3 class="new-product-title pull-left">New Products</h3>
                @endif
                <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                    <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab"> @if (Session()->get('language') == 'bangla') সকল @else All @endif </a></li>
                    @foreach ($categories as $category)
                        @if (Session()->get('language') == 'bangla')
                            <li><a data-transition-type="backSlide" href="#category{{ $category->category_id }}" data-toggle="tab">{{ $category->category_name_bn }}</a></li>
                        @else
                            <li><a data-transition-type="backSlide" href="#category{{ $category->category_id }}" data-toggle="tab">{{ $category->category_name_en }}</a></li>
                        @endif
                    @endforeach
                </ul><!-- /.nav-tabs -->
            </div>
            <div class="tab-content outer-top-xs">
                {{-- Products Tab Part Start --}}
                <div class="tab-pane in active" id="all">
                    <div class="product-slider">
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                            {{-- Single Product Part Start --}}
                            @foreach ($products as $product )
                                <div class="item item-carousel">
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
                                                            <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn" type="button">
                                                                @if (Session()->get('language') == 'bangla') ব্যাগে যুক্ত করুন @else Add to cart @endif
                                                            </button>
                                                        </li>

                                                        <li class="lnk wishlist">
                                                            <a data-toggle="tooltip" class="add-to-cart" href="#"
                                                                title="Wishlist">
                                                                <i class="icon fa fa-heart"></i>
                                                            </a>
                                                        </li>

                                                        <li class="lnk">
                                                            <a data-toggle="tooltip" class="add-to-cart" href="#"
                                                                title="Compare">
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                            @endforeach
                            {{-- Single Product Part End --}}
                        </div><!-- /.home-owl-carousel -->
                    </div><!-- /.product-slider -->
                </div><!-- /.tab-pane -->
                {{-- Products Tab Part Start --}}

                @foreach ($categories as $category )

                    <div class="tab-pane" id="category{{ $category->category_id }}">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                {{-- Category Wise Product Show Start --}}
                                @php
                                    $categWiseProduct = App\Models\Product::where('category_id', $category->category_id)->orderBy('product_id', 'DESC')->get();
                                @endphp

                                @forelse ($categWiseProduct as $product)
                                    <div class="item item-carousel">
                                        <div class="products">

                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src=" {{ asset($product->product_thumbnail) }}" alt="">
                                                        </a>
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
                                                        <h3 class="name"><a href="#"> {{ $product->product_name_bn }} </a></h3>
                                                    @else
                                                        <h3 class="name"><a href="#"> {{ $product->product_name_en }} </a></h3>
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
                                                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                                <button class="btn btn-primary cart-btn" type="button">
                                                                    @if (Session()->get('language') == 'bangla') ব্যাগে যুক্ত করুন @else Add to cart @endif
                                                                </button>
                                                            </li>

                                                            <li class="lnk wishlist">
                                                                <a data-toggle="tooltip" class="add-to-cart" href="#"
                                                                    title="Wishlist">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            </li>

                                                            <li class="lnk">
                                                                <a data-toggle="tooltip" class="add-to-cart" href="#"
                                                                    title="Compare">
                                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div><!-- /.action -->
                                                </div><!-- /.cart -->
                                            </div><!-- /.product -->

                                        </div><!-- /.products -->
                                    </div><!-- /.item -->
                                    @empty
                                    @if (Session()->get('language') == 'bangla')
                                        <h4 class="text-danger text-center" > দুঃখিত এই সম্পর্কিত কোনো পণ্য পাওয়া যায়নি  </h4>
                                    @else
                                        <h4 class="text-danger text-center" style="padding: 20px;">No Products Found</h4>
                                    @endif
                                @endforelse
                                {{-- Category Wise Product Show Start --}}
                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div><!-- /.tab-pane -->

                @endforeach
            </div><!-- /.tab-content -->
        </div><!-- /.scroll-tabs -->
        <!-- ============================================== NEW PRODUCTS SCROLL TABS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->

        <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <div class="wide-banner cnt-strip">
                        <div class="image">
                            <img class="img-responsive"
                                src=" {{ asset('frontend') }}/assets/images/banners/home-banner1.jpg" alt="">
                        </div>

                    </div><!-- /.wide-banner -->
                </div><!-- /.col -->
                <div class="col-md-5 col-sm-5">
                    <div class="wide-banner cnt-strip">
                        <div class="image">
                            <img class="img-responsive"
                                src=" {{ asset('frontend') }}/assets/images/banners/home-banner2.jpg" alt="">
                        </div>

                    </div><!-- /.wide-banner -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.wide-banners -->

        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============================================== FEATURED PRODUCTS START ============================================== -->
        <section class="section featured-product wow fadeInUp">
            @if (Session()->get('language') == 'bangla')
                <h3 class="section-title"> বিশেষ পণ্যসমূহ </h3>
            @else
                <h3 class="section-title">Featured products</h3>
            @endif
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                @foreach ($featureds as $product)
                    <div class="item item-carousel">
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

                                    @if (Session()->get('language') == 'bangla')
                                        {{-- <div class="tag hot"><span>দুর্দান্ত</span></div> --}}
                                        <div class="tag hot"><span>লক্ষণীয়</span></div>
                                    @else
                                        <div class="tag hot"><span>Hot</span></div>
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
                                                <a class="add-to-cart" href="#" title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>

                                            <li class="lnk">
                                                <a class="add-to-cart" href="#" title="Compare">
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->
                        </div><!-- /.products -->
                    </div><!-- /.item -->
                @endforeach

            </div><!-- /.home-owl-carousel -->
        </section><!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="wide-banner cnt-strip">
                        <div class="image">
                            <marquee behavior="scroll" direction="left"><h2 class="text-success" style="text-align: center">Category Wise Products Show</h2></marquee>
                        </div>

                    </div><!-- /.wide-banner -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->

        <!-- ============================================== Category Wise PRODUCTS Show Start ============================================== -->
        {{-- Category with skip(0) for Products --}}
        <section class="section featured-product wow fadeInUp">
            @if (Session()->get('language') == 'bangla')
                <h3 class="section-title"> {{ $skip_catg_id0->category_name_bn }}</h3>
            @else
                <h3 class="section-title"> {{ $skip_catg_id0->category_name_en }} </h3>
            @endif
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                @foreach ($skip_products0 as $product)
                    <div class="item item-carousel">
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

                                    @if (Session()->get('language') == 'bangla')
                                        {{-- <div class="tag hot"><span>দুর্দান্ত</span></div> --}}
                                        <div class="tag hot"><span>লক্ষণীয়</span></div>
                                    @else
                                        <div class="tag hot"><span>Hot</span></div>
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
                                                <a class="add-to-cart" href="#" title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>

                                            <li class="lnk">
                                                <a class="add-to-cart" href="#" title="Compare">
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->
                        </div><!-- /.products -->
                    </div><!-- /.item -->
                @endforeach

            </div><!-- /.home-owl-carousel -->
        </section><!-- /.section -->

        {{-- Category with skip(1) for Products --}}
        <section class="section featured-product wow fadeInUp">
            @if (Session()->get('language') == 'bangla')
                <h3 class="section-title"> {{ $skip_catg_id1->category_name_bn }}</h3>
            @else
                <h3 class="section-title"> {{ $skip_catg_id1->category_name_en }} </h3>
            @endif
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                @foreach ($skip_products1 as $product)
                    <div class="item item-carousel">
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

                                    @if (Session()->get('language') == 'bangla')
                                        {{-- <div class="tag hot"><span>দুর্দান্ত</span></div> --}}
                                        <div class="tag hot"><span>লক্ষণীয়</span></div>
                                    @else
                                        <div class="tag hot"><span>Hot</span></div>
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
                                                <a class="add-to-cart" href="#" title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>

                                            <li class="lnk">
                                                <a class="add-to-cart" href="#" title="Compare">
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->
                        </div><!-- /.products -->
                    </div><!-- /.item -->
                @endforeach

            </div><!-- /.home-owl-carousel -->
        </section><!-- /.section -->
        <!-- ============================================== Category Wise PRODUCTS Show End ============================================== -->

        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="wide-banner cnt-strip">
                        <div class="image">
                            <marquee behavior="scroll" direction="left"><h2 class="text-success" style="text-align: center">Brand Wise Products Show</h2></marquee>
                        </div>
                    </div><!-- /.wide-banner -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->

        <!-- ============================================== Brand Wise PRODUCTS Show Start ============================================== -->
        {{-- Brand with skip(0) for Products --}}
        <section class="section featured-product wow fadeInUp">
            @if (Session()->get('language') == 'bangla')
                <h3 class="section-title"> {{ $skip_brand_id0->brand_name_bn }}</h3>
            @else
                <h3 class="section-title"> {{ $skip_brand_id0->brand_name_en }} </h3>
            @endif
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                @foreach ($skip_brand_products0 as $product)
                    <div class="item item-carousel">
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

                                    @if (Session()->get('language') == 'bangla')
                                        {{-- <div class="tag hot"><span>দুর্দান্ত</span></div> --}}
                                        <div class="tag hot"><span>লক্ষণীয়</span></div>
                                    @else
                                        <div class="tag hot"><span>Hot</span></div>
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
                                                <a class="add-to-cart" href="#" title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>

                                            <li class="lnk">
                                                <a class="add-to-cart" href="#" title="Compare">
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->
                        </div><!-- /.products -->
                    </div><!-- /.item -->
                @endforeach

            </div><!-- /.home-owl-carousel -->
        </section><!-- /.section -->
        <!-- ============================================== Brand Wise PRODUCTS Show End ============================================== -->

        <!-- ============================================== BEST SELLER ============================================== -->
        <div class="best-deal wow fadeInUp outer-bottom-xs">
            <h3 class="section-title">Best seller</h3>
            <div class="sidebar-widget-body outer-top-xs">
                <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                    <div class="item">
                        <div class="products best-product">
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src=" {{ asset('frontend') }}/assets/images/products/p20.jpg"
                                                            alt="">
                                                    </a>
                                                </div><!-- /.image -->



                                            </div><!-- /.product-image -->
                                        </div><!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
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
                                                        <img src=" {{ asset('frontend') }}/assets/images/products/p21.jpg"
                                                            alt="">
                                                    </a>
                                                </div><!-- /.image -->


                                            </div><!-- /.product-image -->
                                        </div><!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
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
                        <div class="products best-product">
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
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
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
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
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
                        <div class="products best-product">
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
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
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
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
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
                        <div class="products best-product">
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
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
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
                                                        <img src=" {{ asset('frontend') }}/assets/images/products/p27.jpg"
                                                            alt="">
                                                    </a>
                                                </div><!-- /.image -->


                                            </div><!-- /.product-image -->
                                        </div><!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
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
        </div><!-- /.sidebar-widget -->
        <!-- ============================================== BEST SELLER : END ============================================== -->

        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
            <h3 class="section-title">latest form blog</h3>
            <div class="blog-slider-container outer-top-xs">
                <div class="owl-carousel blog-slider custom-carousel">

                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image">
                                    <a href="blog.html"><img
                                            src=" {{ asset('frontend') }}/assets/images/blog-post/post1.jpg" alt=""></a>
                                </div>
                            </div><!-- /.blog-post-image -->


                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="#">Voluptatem accusantium doloremque
                                        laudantium</a></h3>
                                <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                                <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et
                                    dolore magnam aliquam quaerat voluptatem.</p>
                                <a href="#" class="lnk btn btn-primary">Read more</a>
                            </div><!-- /.blog-post-info -->


                        </div><!-- /.blog-post -->
                    </div><!-- /.item -->


                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image">
                                    <a href="blog.html"><img
                                            src=" {{ asset('frontend') }}/assets/images/blog-post/post2.jpg" alt=""></a>
                                </div>
                            </div><!-- /.blog-post-image -->


                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                        pariatur</a></h3>
                                <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et
                                    dolore magnam aliquam quaerat voluptatem.</p>
                                <a href="#" class="lnk btn btn-primary">Read more</a>
                            </div><!-- /.blog-post-info -->


                        </div><!-- /.blog-post -->
                    </div><!-- /.item -->


                    <!-- /.item -->


                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image">
                                    <a href="blog.html"><img
                                            src=" {{ asset('frontend') }}/assets/images/blog-post/post1.jpg" alt=""></a>
                                </div>
                            </div><!-- /.blog-post-image -->


                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                        pariatur</a></h3>
                                <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                    voluptatem accusantium</p>
                                <a href="#" class="lnk btn btn-primary">Read more</a>
                            </div><!-- /.blog-post-info -->


                        </div><!-- /.blog-post -->
                    </div><!-- /.item -->


                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image">
                                    <a href="blog.html"><img
                                            src=" {{ asset('frontend') }}/assets/images/blog-post/post2.jpg" alt=""></a>
                                </div>
                            </div><!-- /.blog-post-image -->


                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                        pariatur</a></h3>
                                <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                    voluptatem accusantium</p>
                                <a href="#" class="lnk btn btn-primary">Read more</a>
                            </div><!-- /.blog-post-info -->


                        </div><!-- /.blog-post -->
                    </div><!-- /.item -->


                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image">
                                    <a href="blog.html"><img
                                            src=" {{ asset('frontend') }}/assets/images/blog-post/post1.jpg" alt=""></a>
                                </div>
                            </div><!-- /.blog-post-image -->


                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                        pariatur</a></h3>
                                <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                    voluptatem accusantium</p>
                                <a href="#" class="lnk btn btn-primary">Read more</a>
                            </div><!-- /.blog-post-info -->


                        </div><!-- /.blog-post -->
                    </div><!-- /.item -->


                </div><!-- /.owl-carousel -->
            </div><!-- /.blog-slider-container -->
        </section><!-- /.section -->
        <!-- ============================================== BLOG SLIDER : END ============================================== -->

        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section wow fadeInUp new-arriavls">
            <h3 class="section-title">New Arrivals</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                <div class="item item-carousel">
                    <div class="products">

                        <div class="product">
                            <div class="product-image">
                                <div class="image">
                                    <a href="detail.html"><img
                                            src=" {{ asset('frontend') }}/assets/images/products/p19.jpg" alt=""></a>
                                </div><!-- /.image -->

                                <div class="tag new"><span>new</span></div>
                            </div><!-- /.product-image -->


                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>

                                <div class="product-price">
                                    <span class="price">
                                        $450.99 </span>
                                    <span class="price-before-discount">$ 800</span>

                                </div><!-- /.product-price -->

                            </div><!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
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
                                                <i class="fa fa-signal" aria-hidden="true"></i>
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
                                            src=" {{ asset('frontend') }}/assets/images/products/p28.jpg" alt=""></a>
                                </div><!-- /.image -->

                                <div class="tag new"><span>new</span></div>
                            </div><!-- /.product-image -->


                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>

                                <div class="product-price">
                                    <span class="price">
                                        $450.99 </span>
                                    <span class="price-before-discount">$ 800</span>

                                </div><!-- /.product-price -->

                            </div><!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
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
                                                <i class="fa fa-signal" aria-hidden="true"></i>
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
                                            src=" {{ asset('frontend') }}/assets/images/products/p30.jpg" alt=""></a>
                                </div><!-- /.image -->

                                <div class="tag hot"><span>hot</span></div>
                            </div><!-- /.product-image -->


                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>

                                <div class="product-price">
                                    <span class="price">
                                        $450.99 </span>
                                    <span class="price-before-discount">$ 800</span>

                                </div><!-- /.product-price -->

                            </div><!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
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
                                                <i class="fa fa-signal" aria-hidden="true"></i>
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
                                            src=" {{ asset('frontend') }}/assets/images/products/p1.jpg" alt=""></a>
                                </div><!-- /.image -->

                                <div class="tag hot"><span>hot</span></div>
                            </div><!-- /.product-image -->


                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>

                                <div class="product-price">
                                    <span class="price">
                                        $450.99 </span>
                                    <span class="price-before-discount">$ 800</span>

                                </div><!-- /.product-price -->

                            </div><!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
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
                                                <i class="fa fa-signal" aria-hidden="true"></i>
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
                                            src=" {{ asset('frontend') }}/assets/images/products/p2.jpg" alt=""></a>
                                </div><!-- /.image -->

                                <div class="tag sale"><span>sale</span></div>
                            </div><!-- /.product-image -->


                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>

                                <div class="product-price">
                                    <span class="price">
                                        $450.99 </span>
                                    <span class="price-before-discount">$ 800</span>

                                </div><!-- /.product-price -->

                            </div><!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
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
                                                <i class="fa fa-signal" aria-hidden="true"></i>
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
                                            src=" {{ asset('frontend') }}/assets/images/products/p3.jpg" alt=""></a>
                                </div><!-- /.image -->

                                <div class="tag sale"><span>sale</span></div>
                            </div><!-- /.product-image -->


                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>

                                <div class="product-price">
                                    <span class="price">
                                        $450.99 </span>
                                    <span class="price-before-discount">$ 800</span>

                                </div><!-- /.product-price -->

                            </div><!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
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
                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- /.action -->
                            </div><!-- /.cart -->
                        </div><!-- /.product -->

                    </div><!-- /.products -->
                </div><!-- /.item -->
            </div><!-- /.home-owl-carousel -->
        </section><!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

    </div><!-- /.homebanner-holder -->
    <!-- ============================================== CONTENT : END ============================================== -->
</div><!-- /.row -->
@include('frontend.layouts.footer-slider')

@endsection
