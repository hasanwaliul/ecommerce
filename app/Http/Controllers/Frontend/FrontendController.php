<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\FrontendDataService;

class FrontendController extends Controller
{
    public function index(){
        $categories = (new FrontendDataService())->CategoryInfoCollect();
        $banners = (new FrontendDataService())->BannerInfoCollect();
        $products = (new FrontendDataService())->ActiveProductInfoCollect();
        $featureds = (new FrontendDataService())->FeaturedProductInfoCollect();
        $hot_deals = (new FrontendDataService())->HotDealsRelatedProductInfoCollect();
        $special_offers = (new FrontendDataService())->SpecialOfferRelatedProductInfoCollect();
        $special_deals = (new FrontendDataService())->SpecialDealRelatedProductInfoCollect();
        //  Collect Specific Category Wise Products with skip query
        $skip_catg_id0 = (new FrontendDataService())->FindCategoryWithSkip0(); // For 1st Category
        $skip_products0 = (new FrontendDataService())->FindProductsForSkipCatgId0($skip_catg_id0); // 1st Catagory Wise Products

        // dd( $skip_products0);
        return view('frontend.index',
        compact('categories', 'banners', 'products', 'featureds', 'hot_deals', 'special_offers',
        'special_deals', 'skip_catg_id0', 'skip_products0'));
    }

    public function SingleProductDetails($id, $slug){
        $categories = (new FrontendDataService())->CategoryInfoCollect();
        $singleProduct = (new FrontendDataService())->SingleProductDetails($id);
        $multiImages = (new FrontendDataService())->SingleProductWiseMultiImgCollect($id);
        // dd($multiImages);
        return view('frontend.product-details', compact('singleProduct', 'multiImages'));
    }
}
