<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $banners = Banner::where('banner_status', 1)->orderBy('banner_id', 'DESC')->limit(5)->get();
        $products = Product::where('product_status', 1)->orderBy('product_id', 'DESC')->get();
        return view('frontend.index', compact('categories', 'banners', 'products'));
    }

    public function SingleProductDetails($id){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $singleProduct = Product::where('product_id', $id)->first();
        $multiImages = MultiImg::where('product_id', $id)->get();
        // dd($multiImages);
        return view('frontend.product-details', compact('singleProduct', 'multiImages'));
    }
}
