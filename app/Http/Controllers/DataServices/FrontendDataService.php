<?php
    namespace App\Http\Controllers\DataServices;

use App\Models\Banner;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;

class FrontendDataService {

    public function CategoryInfoCollect(){
        return Category::orderBy('category_name_en', 'ASC')->get();
    }

    public function BannerInfoCollect(){
        return Banner::where('banner_status', 1)->orderBy('banner_id', 'DESC')->limit(5)->get();
    }

    public function ActiveProductInfoCollect(){
        return Product::where('product_status', 1)->orderBy('product_id', 'DESC')->get();
    }

    public function SingleProductDetails($product_id){
        return Product::where('product_id', $product_id)->first();
    }

    public function SingleProductWiseMultiImgCollect($product_id){
        return MultiImg::where('product_id', $product_id)->get();
    }

    public function FeaturedProductInfoCollect(){
        return Product::where('featured', 1)->where('product_status', 1)->orderBy('product_id', 'DESC')->get();
    }

    public function HotDealsRelatedProductInfoCollect(){
        return Product::where('hot_deals', 1)->where('product_status', 1)->orderBy('product_id', 'DESC')->get();
    }

    public function SpecialOfferRelatedProductInfoCollect(){
        return Product::where('special_offer', 1)->where('product_status', 1)->orderBy('product_id', 'DESC')->get();
    }



}
