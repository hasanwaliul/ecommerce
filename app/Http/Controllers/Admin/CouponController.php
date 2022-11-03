<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\ProductTypeDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function index(){
        // dd('Calling from coupon page');
        $coupons = (new ProductTypeDataService())->CouponInfoCollect();
        return view('admin.coupon.index', compact('coupons'));
    }

    public function couponDataAdd(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);
        // dd('After validation');

        $couponInsert = (new ProductTypeDataService())->CouponDataInsert($request->coupon_name, $request->coupon_discount, $request->coupon_validity,);

        // dd('after insertion');

        if($couponInsert){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function couponDataEdit($id){
        // dd('call for edit');
        $singleCoupon = (new ProductTypeDataService())->SingleCouponDataCollect($id);
        // dd($singleCoupon);
        return view('admin.coupon.edit', compact('singleCoupon'));
    }

    public function couponDataUpdate(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);
        // dd('After validation');

        $couponUpdate = (new ProductTypeDataService())->CouponInfoUpdate($request->coupon_id, $request->coupon_name, $request->coupon_discount, $request->coupon_validity);

        if($couponUpdate){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('coupons')->with('message','Coupon Data Updated Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function couponDataDelete($couponId){
        // dd('Call for delete');
        $couponDelete = (new  ProductTypeDataService())->CouponDataDelete($couponId);

        // dd('After Delete');
        if($couponDelete){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('coupons')->with('message','Coupon Deleted Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }
}
