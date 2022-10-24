<?php
    namespace App\Http\Controllers\DataServices;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use PhpParser\Node\Expr\FuncCall;

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

    // Single Product Details Start
    public function SingleProductDetails($product_id){
        return Product::where('product_id', $product_id)->first();
    }
    public function SingleProductWiseMultiImgCollect($product_id){
        return MultiImg::where('product_id', $product_id)->get();
    }
    public function GetCategoryWiseRelatedProducts($catg_id, $productId){
        return Product::where('product_status', 1)->where('category_id', $catg_id)->where('product_id', '!=', $productId)->orderBy('product_id', 'DESC')->get();
    }
    // Single Product Details End

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

    /* ##################################  Find Specific Category With (skip) Query For Products Details  ################################## */
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
     /* ##################################  Find Specific Brand With (skip) Query For Products Details  ################################## */
     // Collect Products for Specific Brand with skip(0)
     public function FindBrandWithSkip0(){
        return Brand::skip(0)->first();
     }
     public function FindProductsForSkipBrandId0($skip_brand_id0){
        return Product::where('product_status', 1)->where('brand_id', $skip_brand_id0->brand_id)->orderBy('product_id', 'DESC')->get();
     }

     // Collect Product Tags From Database
     public function CollectProductsTagsEnglish(){
        // return Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $products = Product::get();
        return $products->map(fn($product) => explode(',', $product->product_tags_en))->flatten()->unique()->sort()->values('product_tags_en');
      }
      public function CollectProductsTagsBangla(){
        $products = Product::get();
        return $products->map(fn($product) => explode(',', $product->product_tags_bn))->flatten()->unique()->sort()->values('product_tags_bn');
      }

      public function FindTagWiseProductsInfo($tag){
        // dd($tag);
        return Product::where('product_status',1)->where('product_tags_en', $tag)->orWhere('product_tags_bn', $tag)->orderBy('product_id', 'DESC')->paginate(1);
      }

/* ################################## Sub Category Wise Product Show  ################################## */
      public function SubCategoryWiseProductInfo($subCatId, $slug){
        // dd('Calling from method');
        return Product::where('product_status', 1)->where('subcategory_id', $subCatId)->orderBy('product_id', 'DESC')->paginate(1);
        // return Product::where('product_status', 1)->where('subcategory_id', $subCatId)->orWhere('subcategory_slug_en', $slug)->orWhere('subcategory_slug_bn', $slug)->orderBy('product_id', 'DESC')->get();
      }

/* ##################################  Sub Sub Category Wise Product Show  ################################## */
public function SubSubCategoryWiseProductsInfo($subsubCatId, $slug){
    // dd('Calling from method');
    return Product::where('product_status', 1)->where('subsubcategory_id', $subsubCatId)->orderBy('product_id', 'DESC')->paginate(1);
}

/* ##################################  Product info for modal  ################################## */
public function FindSingleProductInfoForModal($prodId){
    return Product::where('product_id', $prodId)->first();
}
}
