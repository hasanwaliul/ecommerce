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
        // return Product::where('special_offer', 1)->where('product_status', 1)->orderBy('product_id', 'DESC')->get();
        return Product::where('special_offer', 1)->where('product_status', 1)->orderBy('product_id', 'DESC')->paginate();
    }

    public function SpecialDealRelatedProductInfoCollect(){
        return Product::where('special_deals', 1)->where('product_status', 1)->orderBy('product_id', 'DESC')->paginate();
    }

    /* ##################################  Find Category With (skip) Query For Products Details  ################################## */
     // Collect Products for Specific Catagory  with skip(0)

     public function FindCategoryWithSkip0(){
        return Category::skip(0)->first();
     }
     public function FindProductsForSkipCatgId0($skip_catg_id0){
        // dd($skip_catg_id0->category_name_en);
        // dd($skip_catg_id0->category_id);
        return Product::where('product_status',1)->where('category_id', $skip_catg_id0->category_id)->orderBy('product_id', 'DESC')->get();
     }
    // Collect Products for Specific Catagory  with skip(1)
     public function FindCategoryWithSkip1(){
        return Category::skip(1)->first();
     }
     public function FindProductsForSkipCatgId1($skip_catg_id1){
        // dd($skip_catg_id1->category_name_en);
        // dd($skip_catg_id0->category_id);
        return Product::where('product_status',1)->where('category_id', $skip_catg_id1->category_id)->orderBy('product_id', 'DESC')->get();
     }


}
