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

    public function divisionDataEdit($id){
        // dd('Call for edit');
        $SingleDivision = (new ProductTypeDataService())->SingleDivisionDataCollect($id);
        // dd($SingleDivision);
        return view('admin.divisions.edit', compact('SingleDivision'));
    }

    public function divisionDataUpdate(Request $request){
        // dd($request->all());

        $divisioUpdate = (new ProductTypeDataService())->DivisionDataUpdate($request->divId,$request->division_name);
        // dd('After update');

        if($divisioUpdate){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('divisions')->with('message','Division Data Updated Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function divisionDataDelete($id){
        // dd($id);
        $divisionDelete = (new ProductTypeDataService())->DivisionDataDelete($id);

        if($divisionDelete){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('divisions')->with('message','Division Deleted Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    // ################################### Shipping area (district) Part Start ###################################
    public function districtIndex(){
        $divisions = (new ProductTypeDataService())->ShippingAreaAllDivisions();
        $districts = (new ProductTypeDataService())->ShippingAreaAllDistricts();

        return view('admin.districts.index', compact('divisions', 'districts'));
    }

    public function districtDataAdd(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'division_id' => 'required',
            'district_name' => 'required',
        ], [
            'division_id.required' => 'Please Select Division Name First.....',
            'district_name.required' => 'Please Enter District Name Here.....',
        ]);
        // dd('after validation');

        $districInsert = (new ProductTypeDataService())->ShippingAreaDistrictInsert($request->division_id, $request->district_name);
        // dd('after insertion');

        if($districInsert){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function districtDataEdit($id){
        $divisions = (new ProductTypeDataService())->ShippingAreaAllDivisions();
        $singleDistrict = (new ProductTypeDataService())->ShippingAreaSingleDistrictInfo($id);

        // dd($singleDistric);
        return view('admin.districts.edit', compact('singleDistrict' , 'divisions'));
    }

    public function districtDataUpdate(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'division_id' =>'required',
            'district_name' =>'required',
        ], [
            'division_id.required' => 'Please Select Division Name First.....',
            'district_name.required' => 'Please Enter District Name Here.....',
        ]);
        // dd('After validation');

        $districtUpdate = (new ProductTypeDataService())->ShippingAreaDistrictDataUpdate($request->disId,$request->division_id,$request->district_name);
        // dd('after update');

        if($districtUpdate){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('districts')->with('message','District Data Updated Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function districtDataDelete($id){
        // dd('Call for delete');
        $districtDelete = (new ProductTypeDataService())->ShippingAreaDistrictDataDelete($id);

        if($districtDelete){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('districts')->with('message','District Deleted Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    // ################################### Shipping area (States / Upazilla) Part Start ###################################
    public function stateIndex(){
        // dd('call for states');
        $divisions = (new ProductTypeDataService())->ShippingAreaAllDivisions();
        $states = (new ProductTypeDataService())->ShippingAreaAllStates();

        return view('admin.states.index', compact('divisions','states'));
    }

    public function statesDataAdd(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ], [
            'division_id.required' => 'Please Select Any Division Name Please .....',
            'district_id.required' => 'Please Select Any District Name Please .....',
            'state_name.required' => 'Please Enter States/Upazilla Name Here .....',
        ]);
        // dd('After validation');

        $statesInsert = (new ProductTypeDataService())->ShippingAreaStatesDataInsert($request->division_id,$request->district_id,$request->state_name);

        if($statesInsert){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function statesDataEdit($id){
        // dd('Call for edit');
        $divisions = (new ProductTypeDataService())->ShippingAreaAllDivisions();
        $districts = (new ProductTypeDataService())->ShippingAreaAllDistricts();
        $singleState = (new ProductTypeDataService())->ShippingAreaSingleStateInfoCollect($id);
        // dd($singleState);
        return view('admin.states.edit', compact('singleState', 'divisions', 'districts'));

    }

    public function stateDataUpdate(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ], [
            'division_id.required' => 'Please Select Any Division Name Please .....',
            'district_id.required' => 'Please Select Any District Name Please .....',
            'state_name.required' => 'Please Enter States/Upazilla Name Here .....',
        ]);
        // dd('After validation');

        $stateUpdate = (new ProductTypeDataService())->ShippingAreaSingleStateDataUpdate($request->stateId,$request->division_id,$request->district_id,$request->state_name);

        if($stateUpdate){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('states')->with('message','State Data Updated Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function statesDataDelete($id){
        $stateDelete = (new ProductTypeDataService())->ShippingAreaStateDataDelete($id);

        if($stateDelete){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('states')->with('message','District Deleted Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }



}
