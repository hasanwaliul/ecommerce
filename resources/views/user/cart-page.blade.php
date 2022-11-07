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
            {{-- <div class="shopping-cart">
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
                        </table>
                    </div>
                </div>
            </div> --}}



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

                    {{-- This is for Shipping area part Start --}}
					{{-- <div class="col-md-4 col-sm-12 estimate-ship-tax">
						<table class="table">
							<thead>
								<tr>
									<th>
										<span class="estimate-title">Estimate shipping and tax</span>
										<p>Enter your destination to get shipping and tax.</p>
									</th>
								</tr>
							</thead><!-- /thead -->
							<tbody>
								<tr>
									<td>

                                        <div class="row mg-t-20 form-group {{ $errors->has('division_id') ? ' has-error' : '' }}">
                                            <label class="col-sm-4 form-control-label">Division: <span
                                                    class="tx-danger">*</span></label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <select class="form-control select2-show-search" name="division_id" id=""
                                                    data-placeholder="Choose one">
                                                    <option label="Choose one"></option>
                                                    @foreach ($divisions as $division)
                                                    <option value=" {{ $division->division_id }} "> {{ $division->division_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('division_id')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div><!-- row -->

                                        <div class="row mg-t-20 form-group  {{ $errors->has('district_id') ? ' has-error' : '' }}">
                                            <label class="col-sm-4 form-control-label">District: <span class="tx-danger">*</span></label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <select class="form-control select2-show-search" name="district_id" data-placeholder="Choose one">
                                                    <option label="Choose one"></option>
                                                </select>
                                                @error('district_id')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div><!-- row -->

                                        <div class="row mg-t-20 form-group {{ $errors->has('state_id') ? ' has-error' : '' }}">
                                            <label class="col-sm-4 form-control-label">State/Upazilla:<span
                                                    class="tx-danger">*</span></label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <select class="form-control select2-show-search" name="state_id" id=""
                                                    data-placeholder="Choose one">
                                                    <option label="Choose one"></option>
                                                </select>
                                                @error('state_id')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div><!-- row -->

										<div class="form-group">
											<label class="info-title control-label">Zip/Postal Code</label>
											<input type="text" class="form-control unicase-form-control text-input"
												placeholder="">
										</div>
										<div class="pull-right">
											<button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
										</div>

									</td>
								</tr>
							</tbody>
						</table>
					</div><!-- /.estimate-ship-tax --> --}}

                    {{-- This is for Shipping area part End --}}


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
											<button type="submit" class="btn btn-primary checkout-btn">
                                                PROCCED TO CHEKOUT
                                            </button>
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
@section('scripts')

            {{-- Division Wise District Name With Ajax Request --}}
    <script>
         $("select[name='division_id']").on('change', function (event) {
        var divId = $(this).val();
            console.log(divId)

        /* ==== ajax request ==== */
        if (divId) {
            $.ajax({
                url: "{{ url('division-wise/districts/') }}/" + divId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    // response
                    if (data == "") {
                        $('select[name="district_id"]').empty();
                        $('select[name="district_id"]').append('<option value="">Districts Not Found!</option>');
                    } else {
                        $('select[name="district_id"]').empty();
                        $('select[name="district_id"]').append('<option value="">Select Any Districts</option>');
                        // data load
                        $.each(data, function (key, value) {
                            $('select[name="district_id"]').append('<option value="' + value.district_id + '">' + value.district_name + '</option>');
                        });
                        // data load
                    }
                    // response
                },
            });
        }
        /* ==== ajax request ==== */
    });
    </script>
@endsection
