<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
   public function wishlistItemView(){
    // dd('calling');
    return view('user.wishlist-page');
   }

   public function wishsistProducts(){
    $wishlist = Wishlist::with('wishlistProd')->where('user_id', Auth::id())->latest()->get();

    $wishlistData = json_encode($wishlist);

    return response()->json($wishlist);
   }

   public function wishlistProductRemove($product_id){
    Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->delete();

    return response()->json(['success' => 'Product successfully removed from wishlist']);
   }
}

