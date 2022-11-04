<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\ProductTypeDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    public function index(){
        $banners = (new ProductTypeDataService())->BannerInfoCollect();
        return view('admin.banner.index', compact('banners'));
    }

    public function bannerDataAdd(Request $request){
        // dd($request->all());

        $this->validate($request, [
            'banner_img' => 'required',
        ],[
            'banner_img.required' => 'Please Choose Banner Image',
        ]);
        // dd('After validation');

        $banner = (new ProductTypeDataService())->BannerDataInsert($request->banner_title_en, $request->banner_title_bn, $request->banner_subtitle_en, $request->banner_subtitle_bn, $request->banner_img);
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
        $bannerData = (new ProductTypeDataService())->SingleBannerDataCollect($id);
        return view('admin.banner.edit', compact('bannerData'));
    }

    public function bannerDataUpdate(Request $request){
        // dd($request->all());

        $this->validate($request, [
            'banner_img' => 'required',
        ],[
            'banner_img.required' => 'Please Choose Banner Image',
        ]);
        // dd('After Validation');

        $bannerUpdate = (new ProductTypeDataService())->BannerDataUpdate(
            $request->old_image, $request->id, $request->banner_title_en, $request->banner_title_bn,
            $request->banner_subtitle_en, $request->banner_subtitle_bn, $request->banner_img);

        if($bannerUpdate){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('banners')->with('message','Brand Data Updated Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function bannerDataDelete($id){
        // dd('This is for Delete request');
        $bannerDelete = (new ProductTypeDataService())->BannerDataDeleteWithImage($id);

        if($bannerDelete){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('banners')->with('message','Banner Data Deleted Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    // ############################## Banner Active & Inactive Start ################################
    public function BannerDataInactive($id){
        // dd('This is for inactive request');
        $bannerDective = (new ProductTypeDataService())->BannerInfoDeactive($id);


        if($bannerDective){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('banners')->with('error','Banner Inactive Now!'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function BannerDataActive($id){
        // dd('This is for active request');
        $bannerActive = (new ProductTypeDataService())->BannerInfoActive($id);


        if($bannerActive){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('banners')->with('message','Banner Activated Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    // ############################## Banner Active & Inactive End ################################




}
