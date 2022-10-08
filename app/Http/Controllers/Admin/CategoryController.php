<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubsubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;

class CategoryController extends Controller
{
    // Category Wise SubCategory Data show
    public function categoryWiseSubcategory($id){
        $data = Subcategory::select('subcategory_id', 'subcategory_name_en')->where('category_id',$id)->get();
        return json_encode($data);
    }



    public function index(){
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function categoryDataAdd(Request $request){
        //   dd($request->all());

          $this->validate($request, [
            'category_image' => 'required',
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
        ],[
            'category_name_en.required' => 'Please input category name in English',
            'category_name_bn.required' => 'Please input category name in Bangla',
            'category_image.required' => 'Please input category image',
        ]);
        // dd('After validation');

            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('uploads/categories/'.$name_gen);
            $save_url = 'uploads/categories/'.$name_gen;

        $categoryAdd = Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => strtolower(str_replace(' ','-', $request->category_name_en)),
            'category_slug_bn' => strtolower(str_replace(' ','-', $request->category_name_bn)),
            'category_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);


        if($categoryAdd){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function categoryDataEdit($id){
        $category = Category::where('category_id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function categoryDataUpdate(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'category_image' => 'required',
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
        ], [
            'category_image.required' => 'Please Enter Category Image Here.....',
            'category_name_en.required' => 'Please Enter Category English Name Here.....',
            'category_name_bn.required' => 'Please Enter Category Bangla Name Here.....',
        ]);
        // dd('After validation');

        $old_image = $request->old_image;
        $category_id = $request->category_id;

        if ($request->file('category_image')) {
            unlink($old_image);
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('uploads/categories/'.$name_gen);
            $save_url = 'uploads/categories/'.$name_gen;

            $category = Category::where('category_id', $category_id)->update([
                'category_name_en' => $request->category_name_en,
                'category_name_bn' => $request->category_name_bn,
                'category_slug_en' => strtolower(str_replace(' ','-', $request->category_name_en)),
                'category_slug_bn' => strtolower(str_replace(' ','-', $request->category_name_bn)),
                'category_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            if($category){
                // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
                return redirect()->route('categories')->with('message','Category Data Updated Successfully'); //Toastr alert
            }else {
                // Session::flash('error', 'Somthing Went wrong! Please try again later');
                Session::flash('error', 'Somthing Went wrong! Please try again later');
                return redirect()->back();
            }
        } else {
            $category = Category::where('category_id', $category_id)->update([
                'category_name_en' => $request->category_name_en,
                'category_name_bn' => $request->category_name_bn,
                'category_slug_en' => strtolower(str_replace(' ','-', $request->category_name_en)),
                'category_slug_bn' => strtolower(str_replace(' ','-', $request->category_name_bn)),
                'updated_at' => Carbon::now(),
            ]);

            if($category){
                // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
                return redirect()->route('categories')->with('message','Category Data Updated Successfully'); //Toastr alert
            }else {
                // Session::flash('error', 'Somthing Went wrong! Please try again later');
                Session::flash('error', 'Somthing Went wrong! Please try again later');
                return redirect()->back();
            }
        }
    }

    public function categoryDataDelete($id){
        // dd('This is from delete method');
        $category = Category::where('category_id', $id)->first();
        $oldCategoryImage = $category->category_image;
        unlink($oldCategoryImage);

        $categoryDataDelete = Category::where('category_id', $id)->delete();

        if($categoryDataDelete){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('categories')->with('message','Category Data Deleted Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    // ########################################  Sub Category Part  ########################################

    public function subCategoryIndex(){
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.subcategory.index', compact('subcategories','categories'));
    }

    public function subCategoryAdd(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
        ],[
            'category_id.required' => 'Please choose any category option',
            'subcategory_name_en.required' => 'Please input sub category name in English',
            'subcategory_name_bn.required' => 'Please input sub category name in Bangla',
        ]);
        // dd('After validation');

        $subcategoryAdd = Subcategory::insert([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ','-', $request->subcategory_name_en)),
            'subcategory_slug_bn' => strtolower(str_replace(' ','-', $request->subcategory_name_bn)),
            'category_id' => $request->category_id,
            'created_at' => Carbon::now(),
        ]);


        if($subcategoryAdd){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function subcategoryDataEdit($id){
        $categories = Category::latest()->get();
        $subcategories = Subcategory::where('subcategory_id', $id)->first();
        return view('admin.subcategory.edit', compact('subcategories', 'categories'));
    }

    public function subcategoryDataUpdate(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
        ], [
            'category_id.required' => 'Please Choose any Category Name.....',
            'subcategory_name_en.required' => 'Please Enter Sub Category English Name Here.....',
            'subcategory_name_bn.required' => 'Please Enter Sub Category Bangla Name Here.....',
        ]);
        // dd('After validation');
        $subcategory_id = $request->subcategory_id;

        $update = Subcategory::where('subcategory_id', $subcategory_id)->update([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ','-', $request->subcategory_name_en)),
            'subcategory_slug_bn' => strtolower(str_replace(' ','-', $request->subcategory_name_bn)),
            'category_id' => $request->category_id,
            'updated_at' => Carbon::now(),
        ]);
        if($update){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('subcategories')->with('message','Sub Category Information Updated Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function subcategoryDataDelete($id){
        // dd('This is from delete method');
        $subcategoryData = Subcategory::where('subcategory_id', $id)->delete();
        if($subcategoryData){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('subcategories')->with('message','Sub Category Data Deleted Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    // ########################################  Sub Subcategory Part  ########################################

    public function subSubCategoryIndex(){
        $categories = Category::latest()->get();
        $subsubcategories = SubsubCategory::latest()->get();
        return view('admin.subsubcategory.index', compact('categories', 'subsubcategories'));
    }

    public function subSubCategoryAdd(Request $request){
        // dd($request->all());

        $this->validate($request, [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcateg_name_en' => 'required',
            'subsubcateg_name_bn' => 'required',
        ], [
            'category_id.required' => 'Please select any category name',
            'subcategory_id.required' => 'Please select any Sub category name',
            'subsubcateg_name_en.required' => 'Please Enter Sub sub category name in English',
            'subsubcateg_name_bn.required' => 'Please Enter Sub sub category name in Bangla',
        ]);
        // dd('After validation');

        $subsubcategory = SubsubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcateg_name_en,
            'subsubcategory_name_bn' => $request->subsubcateg_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subsubcateg_name_en )),
            'subsubcategory_slug_bn' => strtolower(str_replace(' ', '-',$request->subsubcateg_name_bn )),
            'created_at' => Carbon::now(),
        ]);

        if($subsubcategory){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function subSubCategoryDataEdit($id){
        // dd('Edit request');
        $subsubcategoryData = SubsubCategory::where('subsubcategory_id', $id)->first();
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.subsubcategory.edit', compact('subsubcategoryData', 'categories', 'subcategories'));
    }









}

