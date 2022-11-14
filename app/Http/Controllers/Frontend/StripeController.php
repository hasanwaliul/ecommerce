<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Error;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function stripePaymentRequestFromCheckoutPage(){
            // Set your secret key. Remember to switch to your live secret key in production.
            // Those php code from: (https://stripe.com/docs/payments/charges-api)

            // This is the secrate Key From: (https://dashboard.stripe.com/apikeys)
            \Stripe\Stripe::setApiKey('sk_test_51M3f7tBk9uu7umqzkXdtElc5aSE4fLWYQHpa65HVJeNRmiuYJfO0QrGYY4CcXjJAHRbll0KxUMzTdhrCqGUakPDe00e0Ka7yKA');

            // // Token is created using Checkout or Elements!
            // // Get the payment token ID submitted by the form:
            $token = $_POST['stripeToken'];

            $charge = \Stripe\Charge::create([
            'amount' => 999*100,
            'currency' => 'usd',
            'description' => 'This is for testing payment',
            'source' => $token,
            'metadata' => ['order_id' => '01'],
            ]);

            dd($charge);



    }




          // Enter Your Stripe Secret
            // \Stripe\Stripe::setApiKey('sk_test_51M3f7tBk9uu7umqzkXdtElc5aSE4fLWYQHpa65HVJeNRmiuYJfO0QrGYY4CcXjJAHRbll0KxUMzTdhrCqGUakPDe00e0Ka7yKA');

            // $amount = 100;
            // $amount *= 100;
            // $amount = (int) $amount;

            // $payment_intent = \Stripe\PaymentIntent::create([
            //     'description' => 'Stripe Test Payment',
            //     'amount' => $amount,
            //     'currency' => 'INR',
            //     'description' => 'Payment From Waliul Hasan',
            //     'payment_method_types' => ['card'],
            //     'metadata' => ['order_id' == '01'],
            // ]);
            // $intent = $payment_intent->client_secret;
            // dd($intent);
            // return view('checkout.credit-card',compact('intent'));






}
