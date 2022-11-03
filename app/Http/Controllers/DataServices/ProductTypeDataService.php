<?php
    namespace App\Http\Controllers\DataServices;

use App\Models\Coupon;
use Carbon\Carbon;

class ProductTypeDataService {

    public function CouponInfoCollect(){
        return Coupon::where('coupon_status', 1)->latest()->get();
    }

    public function CouponDataInsert($name, $discount, $validaty){
        // dd("this is from method");
        return Coupon::insert([
            'coupon_name' => $name,
            'coupon_discount' => $discount,
            'coupon_validity' => $validaty,
            'created_at' => Carbon::now(),
        ]);
    }

    public function SingleCouponDataCollect($couponId){
        return Coupon::where('coupon_status', 1)->where('coupon_id', $couponId)->first();
    }

    public function CouponInfoUpdate($couponId, $name, $discount, $validaty){
        return Coupon::where('coupon_status', 1)->where('coupon_id', $couponId)->update([
            'coupon_name' => $name,
            'coupon_discount' => $discount,
            'coupon_validity' => $validaty,
            'updated_at' => Carbon::now(),
        ]);
    }

    public function CouponDataDelete($coupon_Id){
        return Coupon::where('coupon_status', 1)->where('coupon_id', $coupon_Id)->delete();
    }
}
