<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\FrontendDataService;
use App\Models\Wishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Successfully added to your wishlist']);
            }else {
                return response()->json(['error' => 'This product already on your wishlist']);
            }
        }else {
            return response()->json(['error' => 'Login here first to put the product in wishlist']);
        }
    }
}
