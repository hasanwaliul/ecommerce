<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\FrontendDataService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cartDataStore(Request $request, $prdId){
        $produtDetails = (new FrontendDataService())->SingleProductDetails($prdId);

        if ($produtDetails->discount_price == null) {
            Cart::add([
                'id' => $prdId,
                'name' => $request->prod_name,
                'qty' => $request->quantity,
                'price' => $produtDetails->actual_price,
                'weight' => 1,
                'options' => ['color' => $request->color],
                'options' => ['size' => $request->size],
                'options' => ['image' => $produtDetails->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added On Your Cart']);
        }else {
            Cart::add([
                'id' => $prdId,
                'name' => $request->prod_name,
                'qty' => $request->quantity,
                'price' => $produtDetails->discount_price,
                'weight' => 1,
                'options' => ['color' => $request->color],
                'options' => ['size' => $request->size],
                'options' => ['image' => $produtDetails->product_thumbnail],
            ]);
            return response()->json(['success' => 'Successfully Added On Your Cart']);

        }
    }
}
