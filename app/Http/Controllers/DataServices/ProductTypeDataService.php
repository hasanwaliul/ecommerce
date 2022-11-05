<?php
    namespace App\Http\Controllers\DataServices;

use App\Models\Banner;
use Intervention\Image\Facades\Image;
use App\Models\Coupon;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use App\Models\ShippingState;
use Carbon\Carbon;

class ProductTypeDataService {
                    /* ###########################################################################################
                        ################## Coupon Related Database Operation Start  ##################
                ########################################################################################### */
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
                    /* ###########################################################################################
                        ################## Coupon Related Database Operation End  ##################
                ########################################################################################### */

                /* ###########################################################################################
                        ################## Banner Related Database Operation Start  ##################
                ########################################################################################### */
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

    // ############################## Banner Active & Inactive Start ################################
    public function BannerInfoDeactive($bannerId){
        return Banner::where('banner_id', $bannerId)->update([
            'banner_status' => 0,
            'updated_at' => Carbon::now(),
        ]);
    }

    public function BannerInfoActive($bannerId){
        return Banner::where('banner_id', $bannerId)->update([
            'banner_status' => 1,
            'updated_at' => Carbon::now(),
        ]);
    }
                /* ###########################################################################################
                        ################## Banner Related Database Operation End  ##################
                ########################################################################################### */

            /* ###########################################################################################
                        ############ Shipping Area Related Database Operation Start ############
                ########################################################################################### */
    public function ShippingAreaAllDivisions(){
        return ShippingDivision::orderBy('division_id', 'DESC')->latest()->get();
    }

    public function DivisionDataInsert($divisionName){
        return ShippingDivision::insert([
            'division_name' => $divisionName,
            'created_at' => Carbon::now(),
        ]);
    }

    public function SingleDivisionDataCollect($divId){
        return ShippingDivision::where('division_id', $divId)->first();
    }

    public function DivisionDataUpdate($divId,$divName){
        // dd($divId);
        return ShippingDivision::where('division_id', $divId)->update([
            'division_name' => $divName,
            'updated_at' => Carbon::now(),
        ]);
    }

    public function DivisionDataDelete($divId){
        return ShippingDivision::where('division_id',$divId)->delete();
    }

    // ################### Districts ###################
    public function ShippingAreaAllDistricts(){
        return ShippingDistrict::with('division')->orderBy('district_id', 'DESC')->latest()->get();
    }

    public function ShippingAreaDistrictInsert($divId, $distName){
        return ShippingDistrict::insert([
            'division_id' => $divId,
            'district_name' => $distName,
            'created_at' => Carbon::now(),
        ]);
    }

    public function ShippingAreaSingleDistrictInfo($disId){
        // dd('call from method');
        return ShippingDistrict::where('district_id', $disId)->first();
    }

    public function ShippingAreaDistrictDataUpdate($disId, $divId, $distName){
        return ShippingDistrict::where('district_id', $disId)->update([
            'division_id' => $divId,
            'district_name' => $distName,
            'updated_at' => Carbon::now(),
        ]);
    }

    public function ShippingAreaDistrictDataDelete($disId){
        return ShippingDistrict::where('district_id',$disId)->delete();
    }

    // ################### States/Upazilla ###################
    public function ShippingAreaAllStates(){
        return ShippingState::orderBy('state_id', 'DESC')->latest()->get();
    }


            /* ###########################################################################################
                                ############ Shipping Area Related Database Operation End ############
                ########################################################################################### */

}
