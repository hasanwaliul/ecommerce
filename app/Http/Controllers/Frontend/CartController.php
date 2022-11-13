<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\FrontendDataService;
use App\Http\Controllers\DataServices\ProductTypeDataService;
use App\Models\Coupon;
use App\Models\Wishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cartDataStore(Request $request, $prdId){
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

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
            return response()->json(['error' => 'At first Login here to put this product in wishlist']);
        }
    }

  // ####################### Cart Product View On Cart Page #######################
    public function cartItemView(){
        return view('user.cart-page');
    }

    public function cartProducts(){
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

    public function cartProductRemoveFromCartPage($rowId){
        Cart::remove($rowId);

        if (Session::has('coupon')) {
           Session::forget('coupon');
        }
        return response()->json(['success' => 'This Product Has Been Removed From Cart']);
    }

    public function cartProductIncrementFromCartPage($rowId){
        $row = Cart::get($rowId); // Get the row id for cart product
        Cart::update($rowId, $row->qty + 1); // Will update the quantity with One

        if (Session::has('coupon')) {
            $coupon_name = session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount_withCoupon' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount / 100)),
            ]);
        }

        return response()->json('Incremented');
    }

    public function cartProductDecrementFromCartPage($rowId){
        $row = Cart::get($rowId); // Get the row id for cart product

        if ($row->qty == 1) {
            return response()->json('Not Applicable');
        } else {
            Cart::update($rowId, $row->qty - 1); // Will update the quantity with One

            if (Session::has('coupon')) {
                $coupon_name = session::get('coupon')['coupon_name'];
                $coupon = Coupon::where('coupon_name', $coupon_name)->first();
                Session::put('coupon', [
                    'coupon_name' => $coupon->coupon_name,
                    'coupon_discount' => $coupon->coupon_discount,
                    'discount_amount_withCoupon' => round(Cart::total() * $coupon->coupon_discount / 100),
                    'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount / 100)),
                ]);
            }

            return response()->json('Decremented');
        }
    }

    // ########################## Apply Coupon For Cart Page ##########################
    public function couponApplyForCartPage(Request $request){
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();


        if ($coupon) {
            return  Cart::total()*$coupon->coupon_discount/100;

            // Session::put('coupon', [
            //     'coupon_name' => $coupon->coupon_name,
            //     'coupon_discount' => $coupon->coupon_discount,
            //     'discount_amount_withCoupon' => round(Cart::total() * $coupon->coupon_discount / 100),
            //     'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100),
            // ]);
            // return response()->json(['success' => 'Coupon Applied Successfully']);
        }else {
            return response()->json(['error' => 'You have entered an invalid coupon']);
        }
    }

    public function couponCalculatedDataForCouponPage(){
        if (Session::has('coupon')) {
            return response()->json(array(
                'subTotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount_withCoupon' => session()->get('coupon')['discount_amount_withCoupon'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        } else {
            return response()->json(array(
                'totalprice' => Cart::total(),
            ));
        }
    }

    public function appliedCouponDataRemoveFromCartPage(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon removed successfully']);
    }

    // ######################### Checkout Page For Cart Products #########################
    public function checkoutPageForSelectedCartProducts(){
        if (Auth::check()) {
            if (Cart::total() > 0) {

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                $divisions = (new ProductTypeDataService())->ShippingAreaAllDivisions();
                $districts = (new ProductTypeDataService())->ShippingAreaAllDistricts();
                $states = (new ProductTypeDataService())->ShippingAreaAllStates();
                // dd($districts);
                return view('user.checkout-page', compact('carts', 'cartQty', 'cartTotal', 'divisions', 'districts', 'states'));
            } else {
                return redirect()->route('frontend')->with('error','You Need To Shop Here'); //Toastr alert
            }

        }else {
            return redirect()->route('login')->with('error','You Have To Login First'); //Toastr alert
        }
    }
    



}
