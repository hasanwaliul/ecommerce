<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\ProductInfoDataService;
use Illuminate\Http\Request;

class ShippingController extends Controller
{

    // Division wise District Data show
    public function DivisionWisedistrictData($id){
        $data = (new ProductInfoDataService())->DivisionWiseDistrictDataShow($id);
        return json_encode($data);
    }

}
