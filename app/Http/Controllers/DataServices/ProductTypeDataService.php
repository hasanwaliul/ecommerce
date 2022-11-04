<?php
    namespace App\Http\Controllers\DataServices;

use App\Models\Banner;
use Intervention\Image\Facades\Image;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class ProductTypeDataService {

    // ###################################### Coupon Related Database Operation Start ######################################
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
    // ###################################### Coupon Related Database Operation End ######################################

    // ###################################### Banner Related Database Operation Start ######################################
    public function BannerInfoCollect(){
        return Banner::latest()->get();
    }

    public function BannerDataInsert($title_en, $title_bn, $subtitle_en, $subtitle_bn, $img){
        $image = $img;
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('uploads/banner/'.$name_gen);
        $save_url = 'uploads/banner/'.$name_gen;

        return Banner::insert([
            'banner_title_en' => $title_en,
            'banner_title_bn' => $title_bn,
            'banner_subtitle_en' => $subtitle_en,
            'banner_subtitle_bn' => $subtitle_bn,
            'banner_slug_en' => strtolower(str_replace(' ','-', $title_en)),
            'banner_slug_bn' => strtolower(str_replace(' ','-', $title_bn)),
            'banner_img' => $save_url,
            'created_at' => Carbon::now(),
        ]);
    }

    public function SingleBannerDataCollect($bannerId){
        return Banner::where('banner_id', $bannerId)->first();
    }

    public function BannerDataUpdate($oldImg, $bannerId, $title_en, $title_bn, $subtitle_en, $subtitle_bn, $img){

        if ($img) {
            unlink($oldImg);
            $image = $img;
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('uploads/banner/'.$name_gen);
            $save_url = 'uploads/banner/'.$name_gen;

            return Banner::where('banner_id', $bannerId)->update([
                'banner_title_en' => $title_en,
                'banner_title_bn' => $title_bn,
                'banner_subtitle_en' =>  $subtitle_en,
                'banner_subtitle_bn' =>  $subtitle_bn,
                'banner_slug_en' => strtolower(str_replace(' ','-', $title_en)),
                'banner_slug_bn' => strtolower(str_replace(' ','-', $title_bn)),
                'banner_img' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

        } else {
            return Banner::where('banner_id', $bannerId)->update([
                'banner_title_en' => $title_en,
                'banner_title_bn' => $title_bn,
                'banner_subtitle_en' =>  $subtitle_en,
                'banner_subtitle_bn' =>  $subtitle_bn,
                'banner_slug_en' => strtolower(str_replace(' ','-', $title_en)),
                'banner_slug_bn' => strtolower(str_replace(' ','-', $title_bn)),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

    public function BannerDataDeleteWithImage($bannerId){
        $banner = Banner::where('banner_id', $bannerId)->first();
        $img = $banner->banner_img;
        unlink($img);

        return Banner::where('banner_id', $bannerId)->delete();
    }

    // ###################################### Banner Related Database Operation End ######################################
}
