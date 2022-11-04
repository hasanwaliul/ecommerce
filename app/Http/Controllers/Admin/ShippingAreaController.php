<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\ProductTypeDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShippingAreaController extends Controller
{
    // ################################### Shipping area (division) Part Start ###################################
    public function index(){
        $divisions = (new ProductTypeDataService())->ShippingAreaAllDivisions();
        return view('admin.divisions.index', compact('divisions'));
    }

    public function divisionDataAdd(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'division_name' =>'required',
        ], [
            'division_name.required' => 'Please Enter Division Name Here....',
        ]);
        // dd('After validation');

        $divisionInsert = (new ProductTypeDataService())->DivisionDataInsert($request->division_name);

        // dd('After insertion');

        if($divisionInsert){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }

    }
}
