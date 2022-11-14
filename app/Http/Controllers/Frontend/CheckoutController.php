<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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

        // dd($data['shippingPhone']);

        if ($request->paymentMethod == 'stripe') {
            return view('frontend.payment.stripe', compact('data'));
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
