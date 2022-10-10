<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.product.index', compact('categories'));
    }

    public function productDataAdd(Request $request){
        // dd($request->all());

        $this->validate($request, [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'brand_id' => 'required',
            'product_name_en' => 'required',
            'product_name_bn' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags_en' => 'required',
            'product_tags_bn' => 'required',
            'product_size_en' => 'required',
            'product_size_bn' => 'required',
            'product_color_en' => 'required',
            'product_color_bn' => 'required',
            'product_selling_price' => 'required',
            'product_disc_price' => 'required',
            'long_descp_en' => 'required',
            'long_descp_bn' => 'required',
            'short_descp_en' => 'required',
            'short_descp_bn' => 'required',
            'hot_deals' => 'required',
            'featured' => 'required',
            'special_offer' => 'required',
            'special_deals' => 'required',
            'product_mainthumb' => 'required',
            'product_mtpImg' => 'required',
        ], [
            'category_id.required' => 'Please Enter Category Name',
            'subcategory_id.required' => 'Please Enter Subcategory Name',
            'subsubcategory_id.required' => 'Please Enter Sub Subcategory',
            'brand_id.required' => 'Please Enter Brand Name',
            'product_name_en.required' => 'Please Enter Product Name In English',
            'product_name_bn.required' => 'Please Enter Product Name In Bangla',
            'product_code.required' => 'Please Enter Product Code',
            'product_qty.required' => 'Please Enter Product Quantity',
            'product_tags_en.required' => 'Please Enter Product Tags In English',
            'product_tags_bn.required' => 'Please Enter Product Tags In Bangla',
            'product_size_en.required' => 'Please Enter Product Size In English',
            'product_size_bn.required' => 'Please Enter Product Size In Bangla',
            'product_color_en.required' => 'Please Enter Product Color In English',
            'product_color_bn.required' => 'Please Enter Product Color In Bangla',
            'selling_price.required' => 'Please Enter Product Selling Price',
            'discount_price.required' => 'Please Enter Product Discount Price',
            'long_descp_en.required' => 'Please Enter Product Long Description In English',
            'long_descp_bn.required' => 'Please Enter Product Long Description In Bangla',
            'short_descp_en.required' => 'Please Enter Product Short Description In English',
            'short_descp_bn.required' => 'Please Enter Product Short Description In Bangla',
            'hot_deals.required' => 'Please Check Product Hot deals Option',
            'featured.required' => 'Please Check Product Featured Option',
            'special_offer.required' => 'Please Check Product Special Offer Option',
            'special_deals.required' => 'Please Check Product Special Deals Option',
            'product_mainthumb.required' => 'Please Put Product Thumbnail Image',
            'product_mtpImg.required' => 'Please Put Product Multiple Image',
        ]);

            $image = $request->file('product_mainthumb');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('uploads/products/'.$name_gen);
            $save_url = 'uploads/products/'.$name_gen;


        $productData_Id = Product::insertGetId([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'brand_id' => $request->brand_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bn' => $request->product_name_bn,
            'product_slug_en' => strtolower(str_replace(' ','-', $request->product_name_en)),
            'product_slug_bn' => strtolower(str_replace(' ','-', $request->product_name_bn)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->product_selling_price,
            'discount_price' => $request->product_disc_price,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thumbnail' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        // Multiple Image Upload Start
        $images = $request->file('product_mtpImg');

        foreach ($images as $singleImg) {
            $name_gen = hexdec(uniqid()).'.'.$singleImg->getClientOriginalExtension();
            Image::make($singleImg)->resize(917,1000)->save('uploads/products/thumbnail/multi-image/'.$name_gen);
            $uploadPath = 'uploads/products/thumbnail/multi-image/'.$name_gen;

            $multipleImg = MultiImg::insert([
                'product_id' => $productData_Id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }
        // Multiple Image Upload End

        if($productData_Id){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function productDataManage(){
        $products = Product::latest()->get();
        return view('admin.product.manage', compact('products'));
    }

}
