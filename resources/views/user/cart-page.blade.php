@extends('frontend.layouts.master')
@section('title', 'Easy Shopping')
@section('content')
<div class="row">
    {{-- Breadcrumb Start --}}
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Carts</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    {{-- Breadcrumb End --}}

    {{-- Wishlist Page Content Start --}}
    <div class="my-wishlist-page">
        <div class="row ">

				<div class="shopping-cart">
					<div class="shopping-cart-table ">
						<div class="table-responsive">
							<table class="table">
								<thead>
                                    <tr>
                                        <th class="cart-romove item">Image</th>
                                        <th class="cart-description item">Name & Price</th>
                                        <th class="cart-product-name item">Color</th>
                                        <th class="cart-edit item">Size</th>
                                        <th class="cart-sub-total item">Subtotal</th>
                                        <th class="cart-qty item">Quantity</th>
                                        <th class="cart-total last-item">Action</th>
                                    </tr>
                                </thead><!-- /thead -->
                                <tbody id="cartProduct" class="text-center">

                                </tbody>
								{{-- <tfoot>
									<tr>
										<td colspan="7">
											<div class="shopping-cart-btn">
												<span class="">
													<a href="#" class="btn btn-upper btn-primary outer-left-xs">Continue
														Shopping</a>
													<a href="#"
														class="btn btn-upper btn-primary pull-right outer-right-xs">Update
														shopping cart</a>
												</span>
											</div><!-- /.shopping-cart-btn -->
										</td>
									</tr>
								</tfoot> --}}

							</table><!-- /table -->
						</div>
					</div><!-- /.shopping-cart-table -->


                    <div class="col-md-6 col-sm-12 estimate-ship-tax">
                        @if (Session()->has('coupon'))

                        @else
                            <table class="table" id="CouponField">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="estimate-title">Discount Code</span>
                                            <p>Enter your coupon code if you have one..</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    placeholder="You Coupon.." id="coupon_name">
                                            </div>
                                            <div class="clearfix pull-right">
                                                <button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupon()">APPLY COUPON</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        @endif
                    </div><!-- /.estimate-ship-tax -->


					<div class="col-md-6 col-sm-12 cart-shopping-total">
						<table class="table">
							<thead id="couponCalculatedDataField">

							</thead><!-- /thead -->
							<tbody>
								<tr>
									<td>
										<div class="cart-checkout-btn pull-right">
											<a href="{{route('checkouts')}}">
                                                <button type="submit" class="btn btn-primary checkout-btn">
                                                PROCCED TO CHEKOUT
                                                </button>
                                            </a>
										</div>
									</td>
								</tr>
							</tbody><!-- /tbody -->
						</table><!-- /table -->
					</div><!-- /.cart-shopping-total -->

				</div><!-- /.shopping-cart -->

        </div><!-- /.row -->
    </div><!-- /.sigin-in-->
    {{-- Wishlist Page Content End --}}

</div><!-- /.row -->
@include('frontend.layouts.footer-slider')

@endsection
