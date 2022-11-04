<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\ProductInfoDataService;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{

    public function index(){
        $categories = (new ProductInfoDataService())->CategoryInfoCollect();
        $brands = (new ProductInfoDataService())->BrandInfoCollect();
        return view('admin.brand.index', compact('brands', 'categories'));
    }

    public function brandDataAdd(Request $request){
        // dd($request->all());

        $this->validate($request, [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
            'brand_image' => 'required',
        ],[
            'category_id.required' => 'Please choose any of this Category name',
            'subcategory_id.required' => 'Please choose any of this Sub Category name',
            'brand_name_en.required' => 'Please input brand name in English',
            'brand_name_bn.required' => 'Please input brand name in Bangla',
            'brand_image.required' => 'Please input brand image',
        ]);
            // dd('After validation');
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('uploads/brands/'.$name_gen);
            $save_url = 'uploads/brands/'.$name_gen;

            $brandInsert = (new ProductInfoDataService())->BrandDataInsert($request->category_id, $request->subcategory_id, $request->brand_name_en, $request->brand_name_bn, $save_url);
            // dd('After Insertion ');

            if($brandInsert){
                // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
                return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
            }else {
                // Session::flash('error', 'Somthing Went wrong! Please try again later');
                Session::flash('error', 'Somthing Went wrong! Please try again later');
                return redirect()->back();
            }
    }

    public function brandDataEdit($id){
        $brandData = (new ProductInfoDataService())->BrandInfoEdit($id);
        $categories = (new ProductInfoDataService())->CategoryInfoCollect();
        $subcategories = (new ProductInfoDataService())->SubCategoryInfoColloct();
        return view('admin.brand.edit', compact('brandData', 'categories', 'subcategories'));
    }

    public function brandDataUpdate(Request $request){
        // dd($request->all());

        $this->validate($request, [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
        ],[
            'category_id.required' => 'Please any of this Category name',
            'subcategory_id.required' => 'Please any of this Sub Category name',
            'brand_name_en.required' => 'Please input brand name in English',
            'brand_name_bn.required' => 'Please input brand name in Bangla',
        ]);
        // dd('After Validation');

        $old_image = $request->old_image;

        if ($request->file('brand_image')) {
            unlink($old_image);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('uploads/brands/'.$name_gen);
            $save_url = 'uploads/brands/'.$name_gen;

            $brandUpdate = (new ProductInfoDataService())->ProductInfoUpdatIfHasImg($request->id, $request->category_id, $request->subcategory_id, $request->brand_name_en, $request->brand_name_bn, $save_url);

            if($brandUpdate){
                // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
                return redirect()->route('brands')->with('message','Brand Data Updated Successfully'); //Toastr alert
            }else {
                // Session::flash('error', 'Somthing Went wrong! Please try again later');
                Session::flash('error', 'Somthing Went wrong! Please try again later');
                return redirect()->back();
            }
        } else {
            $brandUpdate = (new ProductInfoDataService())->ProductInfoUpdatIfNOImg($request->id, $request->category_id, $request->subcategory_id, $request->brand_name_en, $request->brand_name_bn,);

            if($brandUpdate){
                // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
                return redirect()->route('brands')->with('message','Brand Data Updated Successfully'); //Toastr alert
            }else {
                // Session::flash('error', 'Somthing Went wrong! Please try again later');
                Session::flash('error', 'Somthing Went wrong! Please try again later');
                return redirect()->back();
            }
        }
    }

    public function brandDataDelete($id){
        $brandDataDelete = (new ProductInfoDataService())->BrandDataDelete($id);

        if($brandDataDelete){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('brands')->with('message','Brand Data Deleted Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }
}
