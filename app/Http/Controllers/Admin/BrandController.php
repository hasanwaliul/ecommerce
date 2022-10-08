<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    // Subcategory Wise Brand Data
    public function subcategoryWiseBrandData($id){
        $data = Brand::select('brand_id', 'brand_name_en')->where('subcategory_id', $id)->get();
        return json_encode($data);
    }



    public function index(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
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

            $brand = Brand::insert([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ','-', $request->brand_name_en)),
                'brand_slug_bn' => strtolower(str_replace(' ','-', $request->brand_name_bn)),
                'brand_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
            // dd('After Insertion ');

            if($brand){
                // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
                return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
            }else {
                // Session::flash('error', 'Somthing Went wrong! Please try again later');
                Session::flash('error', 'Somthing Went wrong! Please try again later');
                return redirect()->back();
            }
    }

    public function brandDataEdit($id){
        $brandData = Brand::where('brand_id', $id)->first();
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.brand.edit', compact('brandData', 'categories', 'subcategories'));
    }

    public function brandDataUpdate(Request $request){
        // dd($request->all());

        $this->validate($request, [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
            'brand_image' => 'required',
        ],[
            'category_id.required' => 'Please any of this Category name',
            'subcategory_id.required' => 'Please any of this Sub Category name',
            'brand_name_en.required' => 'Please input brand name in English',
            'brand_name_bn.required' => 'Please input brand name in Bangla',
            'brand_image.required' => 'Please input brand image',
        ]);
        // dd('After Validation');

        $old_image = $request->old_image;
        $brand_id = $request->id;

        if ($request->file('brand_image')) {
            unlink($old_image);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('uploads/brands/'.$name_gen);
            $save_url = 'uploads/brands/'.$name_gen;

            $brand = Brand::where('brand_id',$brand_id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ','-', $request->brand_name_en)),
                'brand_slug_bn' => strtolower(str_replace(' ','-', $request->brand_name_bn)),
                'brand_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            if($brand){
                // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
                return redirect()->route('brands')->with('message','Brand Data Updated Successfully'); //Toastr alert
            }else {
                // Session::flash('error', 'Somthing Went wrong! Please try again later');
                Session::flash('error', 'Somthing Went wrong! Please try again later');
                return redirect()->back();
            }
        } else {
            $brand = Brand::where('brand_id',$brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ','-', $request->brand_name_en)),
                'brand_slug_bn' => strtolower(str_replace(' ','-', $request->brand_name_bn)),
                'created_at' => Carbon::now(),
            ]);

            if($brand){
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
        // dd('This is from method');
        // dd($brand->brand_image);
        $brand = Brand::where('brand_id', $id)->first();
        $img = $brand->brand_image;
        unlink($img);

        $brandData = Brand::where('brand_id', $id)->delete();
        if($brandData){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('brands')->with('message','Brand Data Deleted Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }
}
