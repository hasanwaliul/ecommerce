<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\FrontendDataService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

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
                'options' => [
                    'color' => $request->color,
                    'size' => $request->size,
                    'image' => $produtDetails->product_thumbnail,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added On Your Cart']);
        }else {
            Cart::add([
                'id' => $prdId,
                'name' => $request->prod_name,
                'qty' => $request->quantity,
                'price' => $produtDetails->discount_price,
                'weight' => 1,
                'options' => [
                    'color' => $request->color,
                    'size' => $request->size,
                    'image' => $produtDetails->product_thumbnail,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added On Your Cart']);

        }
    }

    public function productBuyInfoOnMiniCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQuantity' => $cartQty,
            'cartTotalPrice' => $cartTotal,
            // 'cartTotalPrice' => round($cartTotal),
        ));
    }

    public function productRemoveFromMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Removed From Cart']);
    }


    // ####################### Product Add To Wishlist #######################
    public function productAddToWishlist(Request $request, $product_id){
        dd($product_id);
        return response()->data();
    }
}
