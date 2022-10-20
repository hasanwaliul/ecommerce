<!-- ==================================(Sidebar Special shopping part) SPECIAL SHOPPING : START ================================== -->
<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    @if (Session()->get('language') == 'bangla')
    <h3 class="section-title"> আকর্ষনীয় কেনাবেচা </h3>
    @else
    <h3 class="section-title">Special shopping</h3>
    @endif
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

        @foreach ($hot_deals as $product)
        <div class="item">
            <div class="products">
                <div class="hot-deal-wrapper">
                    <div class="image">
                        <img src=" {{ asset($product->product_thumbnail) }}" alt="">
                    </div>

                    @php
                    $amount = $product->actual_price - $product->discount_price;
                    $discount = ($amount / $product->actual_price) * 100;
                    @endphp

                    <div class="sale-offer-tag">
                        @if ($product->discount_price == null)
                        @else
                        <span> @if (Session()->get('language') == 'bangla') {{ bn_price(round($discount)) }}% @else {{
                            round($discount) }}% @endif <br> @if (Session()->get('language') == 'bangla') ছাড় @else Off
                            @endif </span>
                        @endif
                    </div>
                    <div class="timing-wrapper">
                        <div class="box-wrapper">
                            <div class="date box">
                                @if (Session()->get('language') == 'bangla')
                                <span class="key"> {{ bn_price(round(122)) }} </span>
                                @else
                                <span class="key"> 122 </span>
                                @endif
                                @if (Session()->get('language') == 'bangla')
                                <span class="value">দিন</span>
                                @else
                                <span class="value">DAYS</span>
                                @endif
                            </div>
                        </div>

                        <div class="box-wrapper">
                            <div class="hour box">
                                @if (Session()->get('language') == 'bangla')
                                <span class="key"> {{ bn_price(round(20)) }}</span>
                                @else
                                <span class="key"> 20 </span>
                                @endif
                                @if (Session()->get('language') == 'bangla')
                                <span class="value">ঘণ্টা</span>
                                @else
                                <span class="value">HRS</span>
                                @endif
                            </div>
                        </div>

                        <div class="box-wrapper">
                            <div class="minutes box">
                                @if (Session()->get('language') == 'bangla')
                                <span class="key"> {{ bn_price(round(36)) }}</span>
                                @else
                                <span class="key"> 36 </span>
                                @endif
                                @if (Session()->get('language') == 'bangla')
                                <span class="value">মিনিট</span>
                                @else
                                <span class="value">MINS</span>
                                @endif
                            </div>
                        </div>

                        <div class="box-wrapper hidden-md">
                            <div class="seconds box">
                                @if (Session()->get('language') == 'bangla')
                                <span class="key"> {{ bn_price(round(60)) }}</span>
                                @else
                                <span class="key"> 60 </span>
                                @endif
                                @if (Session()->get('language') == 'bangla')
                                <span class="value">সেকেন্ড</span>
                                @else
                                <span class="value">SEC</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div><!-- /.hot-deal-wrapper -->

                <div class="product-info text-left m-t-20">
                    @if (Session()->get('language') == 'bangla')
                    <h3 class="name"><a
                            href=" {{ url('single-prduct/details/'. $product->product_id . '/' . $product->product_slug_bn) }} ">
                            {{ $product->product_name_bn }} </a></h3>
                    @else
                    <h3 class="name"><a
                            href=" {{ url('single-prduct/details/'. $product->product_id . '/' . $product->product_slug_en) }} ">
                            {{ $product->product_name_en }} </a></h3>
                    @endif
                    <div class="rating rateit-small"></div>
                    <div class="product-price">
                        @if ($product->discount_price == null)
                        <span class="price">
                            @if (Session()->get('language') == 'bangla') {{ bn_price($product->actual_price) }} @else {{
                            $product->actual_price}} @endif
                        </span>
                        @else
                        <span class="price">
                            @if (Session()->get('language') == 'bangla') {{ bn_price($product->discount_price) }} @else
                            {{ $product->discount_price }} @endif
                        </span>
                        <span class="price-before-discount">
                            @if (Session()->get('language') == 'bangla') {{ bn_price($product->actual_price) }} @else {{
                            $product->actual_price }} @endif
                        </span>
                        @endif
                    </div><!-- /.product-price -->

                </div><!-- /.product-info -->

                <div class="cart clearfix animate-effect">
                    <div class="action">

                        <div class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                            <button class="btn btn-primary cart-btn" type="button">
                                @if (Session()->get('language') == 'bangla') ব্যাগে যুক্ত করুন @else Add to cart @endif
                            </button>
                        </div>

                    </div><!-- /.action -->
                </div><!-- /.cart -->
            </div>
        </div>
        @endforeach

    </div><!-- /.sidebar-widget -->
</div>
<!-- ==================================(Sidebar Special shopping part) SPECIAL SHOPPING : END ================================== -->
