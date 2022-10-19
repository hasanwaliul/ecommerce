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
        // dd($special_offers);
        return view('frontend.index', compact('categories', 'banners', 'products', 'featureds', 'hot_deals', 'special_offers'));
    }

    public function SingleProductDetails($id, $slug){
        $categories = (new FrontendDataService())->CategoryInfoCollect();
        $singleProduct = (new FrontendDataService())->SingleProductDetails($id);
        $multiImages = (new FrontendDataService())->SingleProductWiseMultiImgCollect($id);
        // dd($multiImages);
        return view('frontend.product-details', compact('singleProduct', 'multiImages'));
    }
}
