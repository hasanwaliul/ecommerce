@extends('frontend.layouts.master')
@section('title', 'Easy Shopping')
@section('content')
<div class="row">
    {{-- Breadcrumb Start --}}
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    {{-- Breadcrumb End --}}


    {{-- Checkbox Page Content Start --}}
    <div class="checkout-box ">
        <div class="row">
            <div class="col-md-5">

                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Total Amount Of Your Cart Products</h4>
                                </div>
                                @if (Session()->has('coupon'))
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        <li><strong>Sub Total: &nbsp; &nbsp;</strong>
                                            {{session()->get('coupon')['subTotal']}}
                                        </li>
                                        <li><strong>Coupon Name: &nbsp; &nbsp;</strong>
                                            {{session()->get('coupon')['coupon_name']}}
                                            {{session()->get('coupon')['coupon_discount']}}
                                        </li>
                                        <li><strong>Coupon Discount: &nbsp; &nbsp;</strong>
                                            -{{session()->get('coupon')['discount_amount_withCoupon']}}
                                         </li>
                                        <li><strong>Grand Total: &nbsp; &nbsp;</strong>
                                            {{session()->get('coupon')['discount_amount_withCoupon']}}
                                        </li>
                                    </ul>
                                </div>
                                @else
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        <li><strong>Sub Total: &nbsp; &nbsp;</strong></li>
                                        <li><strong>Grand Total: &nbsp; &nbsp;</strong></li>
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div> <!-- checkout-progress-sidebar -->
            </div>

            <div class="col-md-7">
                <div class="panel-group checkout-steps" id="accordion">

                    <!-- checkout-step-01  -->
                    <div class="panel panel-default checkout-step-01">

                        <!-- panel-heading -->
                        <div class="panel-heading">
                            <h4 class="unicase-checkout-title">
                                <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                    <span><i class="tx-20 fa fa-briefcase"></i></span> Enter your credit card information:
                                </a>
                            </h4>
                        </div>
                        <!-- panel-heading -->

                        <div id="collapseOne" class="panel-collapse collapse in">

                            <!-- panel-body  -->
                            <div class="panel-body">
                                <div class="row">

                                    <div class="card">
                                        <form action="{{route('checkout.credit-card')}}" method="post"
                                            id="payment-form">
                                            @csrf
                                            <div class="form-group">
                                                <div class="card-header">
                                                    <label for="card-element">

                                                    </label>
                                                </div>
                                                <div class="card-body">
                                                    <div id="card-element">
                                                        <!-- A Stripe Element will be inserted here. -->
                                                    </div>
                                                    <!-- Used to display form errors. -->
                                                    <div id="card-errors" role="alert"></div>
                                                    <input type="hidden" name="plan" value="" />
                                                </div>
                                            </div><br>
                                            <div class="card-footer">
                                                <button id="card-button" class="btn btn-primary" type="submit"
                                                    data-secret="{{ $intent }}"> Complete Payment </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- panel-body  -->

                        </div><!-- row -->
                    </div>
                    <!-- checkout-step-01  -->

                </div><!-- /.checkout-steps -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.checkout-box -->
    {{-- Checkbox Page Content End --}}
</div><!-- /.row -->

@endsection

    @php
    // This is the publishable key from (https://dashboard.stripe.com/apikeys)
        $stripe_key = 'pk_test_51M3f7tBk9uu7umqz7inOoz6IDUTsnH86g1VqzndWKsvNigpnBW337tXnVzLqhgkL32JHnhhcopmzAfHeZNdQOTtV00ImUHuFJy';
    @endphp


@section('script')

<script src="https://js.stripe.com/v3/"></script>
<script>
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)

    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
    const elements = stripe.elements(); // Create an instance of Elements.
    const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

    // Handle real-time validation errors from the card Element.
    cardElement.addEventListener('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        stripe.handleCardPayment(clientSecret, cardElement, {
            payment_method_data: {
                //billing_details: { name: cardHolderName.value }
            }
        })
            .then(function (result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    console.log(result);
                    form.submit();
                }
            });
    });
</script>

@endsection
