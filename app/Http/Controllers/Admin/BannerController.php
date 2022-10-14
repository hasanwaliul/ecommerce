<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    public function index(){
        $banners = Banner::latest()->get();
        return view('admin.banner.index', compact('banners'));
    }

    public function bannerDataAdd(Request $request){
        // dd($request->all());

        $this->validate($request, [
            'banner_title_en' => 'required',
            'banner_title_bn' => 'required',
            'banner_subtitle_en' => 'required',
            'banner_subtitle_bn' => 'required',
            'banner_img' => 'required',
        ],[
            'banner_title_en.required' => 'Please Enter Banner Title In English name',
            'banner_title_bn.required' => 'Please Enter Banner Title In Bangla name',
            'banner_subtitle_en.required' => 'Please Enter Banner Title In English',
            'banner_subtitle_bn.required' => 'Please Enter Banner Title In Bangla',
            'banner_img.required' => 'Please Choose Banner Image',
        ]);
        // dd('After validation');

        $image = $request->file('banner_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('uploads/banner/'.$name_gen);
        $save_url = 'uploads/banner/'.$name_gen;

        $banner = Banner::insert([
            'banner_title_en' => $request->banner_title_en,
            'banner_title_bn' => $request->banner_title_bn,
            'banner_subtitle_en' => $request->banner_subtitle_en,
            'banner_subtitle_bn' => $request->banner_subtitle_bn,
            'banner_slug_en' => strtolower(str_replace(' ','-', $request->banner_title_en)),
            'banner_slug_bn' => strtolower(str_replace(' ','-', $request->banner_title_bn)),
            'banner_img' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        // dd('After Insertion ');

        if($banner){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function bannerDataEdit($id){
        // dd('Calling for edit');

        $bannerData = Banner::where('banner_id', $id)->first();
        return view('admin.banner.edit', compact('bannerData'));
    }

    public function bannerDataUpdate(Request $request){
        // dd($request->all());

        $this->validate($request, [
            'banner_title_en' => 'required',
            'banner_title_bn' => 'required',
            'banner_subtitle_en' => 'required',
            'banner_subtitle_bn' => 'required',
            'brand_status' => 'required',
            'banner_img' => 'required',
        ],[
            'banner_title_en.required' => 'Please Enter Banner Title In English name',
            'banner_title_bn.required' => 'Please Enter Banner Title In Bangla name',
            'banner_subtitle_en.required' => 'Please Enter Banner Title In English',
            'banner_subtitle_bn.required' => 'Please Enter Banner Title In Bangla',
            'brand_status.required' => 'Please Choose Banner Status',
            'banner_img.required' => 'Please Choose Banner Image',
        ]);
        // dd('After Validation');

        $old_image = $request->old_image;
        $banner_id = $request->id;

        if ($request->file('banner_img')) {
            unlink($old_image);
            $image = $request->file('banner_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('uploads/banner/'.$name_gen);
            $save_url = 'uploads/banner/'.$name_gen;

            $bannerUpdate = Banner::where('banner_id', $banner_id)->update([
                'banner_title_en' => $request->banner_title_en,
                'banner_title_bn' => $request->banner_title_bn,
                'banner_subtitle_en' => $request->banner_subtitle_en,
                'banner_subtitle_bn' => $request->banner_subtitle_bn,
                'banner_slug_en' => strtolower(str_replace(' ','-', $request->banner_title_en)),
                'banner_slug_bn' => strtolower(str_replace(' ','-', $request->banner_title_bn)),
                'banner_status' => $request->brand_status,
                'banner_img' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            if($bannerUpdate){
                // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
                return redirect()->route('banners')->with('message','Brand Data Updated Successfully'); //Toastr alert
            }else {
                // Session::flash('error', 'Somthing Went wrong! Please try again later');
                Session::flash('error', 'Somthing Went wrong! Please try again later');
                return redirect()->back();
            }
        } else {
            $bannerUpdate = Banner::where('banner_id', $banner_id)->update([
                'banner_title_en' => $request->banner_title_en,
                'banner_title_bn' => $request->banner_title_bn,
                'banner_subtitle_en' => $request->banner_subtitle_en,
                'banner_subtitle_bn' => $request->banner_subtitle_bn,
                'banner_slug_en' => strtolower(str_replace(' ','-', $request->banner_title_en)),
                'banner_slug_bn' => strtolower(str_replace(' ','-', $request->banner_title_bn)),
                'banner_status' => $request->brand_status,
                'updated_at' => Carbon::now(),
            ]);

            if($bannerUpdate){
                // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
                return redirect()->route('banners')->with('message','Brand Data Updated Successfully'); //Toastr alert
            }else {
                // Session::flash('error', 'Somthing Went wrong! Please try again later');
                Session::flash('error', 'Somthing Went wrong! Please try again later');
                return redirect()->back();
            }
        }
    }

    public function bannerDataDelete($id){
        // dd('This is for Delete request');

        $banner = Banner::where('banner_id', $id)->first();
        $img = $banner->banner_img;
        unlink($img);

        $bannerData = Banner::where('banner_id', $id)->delete();

        if($bannerData){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('banners')->with('message','Banner Data Deleted Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }



}
