<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function shippingFormDataFromCheckoutPage(Request $request){
        // dd($request->all());
        $data = array();
        $data['shippingName'] = $request->shippingName;
        $data['shippingEmail'] = $request->shippingEmail;
        $data['shippingPhone'] = $request->shippingPhone;
        $data['shippingPostCode'] = $request->shippingPostCode;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['paymentMethod'] = $request->paymentMethod;


        $cartTotal = Cart::total();

        // dd($data['paymentMethod']);

        if ($request->paymentMethod == 'stripe') {
            // Enter Your Stripe Secret
            \Stripe\Stripe::setApiKey('sk_test_51M3f7tBk9uu7umqzkXdtElc5aSE4fLWYQHpa65HVJeNRmiuYJfO0QrGYY4CcXjJAHRbll0KxUMzTdhrCqGUakPDe00e0Ka7yKA');

            $amount = 100;
            $amount *= 100;
            $amount = (int) $amount;

            $payment_intent = \Stripe\PaymentIntent::create([
                'description' => 'Stripe Test Payment',
                'amount' => $amount,
                'currency' => 'INR',
                'description' => 'Payment From Waliul Hasan',
                'payment_method_types' => ['card'],
                'metadata' => ['order_id' == '01'],
            ]);
            // dd($payment_intent);

            $intent = $payment_intent->client_secret;
            // dd($intent);

            return view('frontend.payment.stripe', compact('data', 'cartTotal', 'intent'));
        } elseif ($request->paymentMethod == 'card') {
            return 'card';
        }else {
            return 'Cash On Delivery';
        }
    }


    public function afterpaymentFromCheckoutPage()
    {
       echo 'Payment Has been Received';
    }

}
