<!-- ==================================(Sidebar Special Deals part) SPECIAL OFFER : START ================================== -->
<div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Special Deals</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

            <div class="item">
                <div class="products special-product">
                    @foreach ($special_deals as $product)
                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="#">
                                                <img src=" {{ asset($product->product_thumbnail) }}" alt="">
                                            </a>
                                        </div><!-- /.image -->
                                    </div><!-- /.product-image -->
                                </div><!-- /.col -->
                                <div class="col col-xs-7">
                                    <div class="product-info">
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
                                            <span class="price">
                                                @if (Session()->get('language') == 'bangla') {{
                                                bn_price($product->actual_price) }} @else {{ $product->actual_price}}
                                                @endif
                                            </span>
                                        </div><!-- /.product-price -->
                                    </div>
                                </div><!-- /.col -->
                            </div><!-- /.product-micro-row -->
                        </div><!-- /.product-micro -->
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ==================================(Sidebar Special Deals part) SPECIAL OFFER : END ================================== -->
