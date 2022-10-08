<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\AdminDataService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function adminProfile(){
        return view('admin.profile.index');
    }

    public function adminProfileUpdate(Request $request){   // dd('calling');
        // dd($request->all());

        // form Validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        // custom Validation
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'phone' => 'required',
        // ],[
        //     'name.required' => 'Please Enter Your Name Here.....',
        //     'email.required' => 'Please Enter Your Email Here.....',
        //     'phone.required' => 'Please Enter Your Phone Here.....',
        // ]);
        // dd('This is after validation');

        // insert Data into Database
            $update = (new AdminDataService())->updataAdminData($request->name, $request->email, $request->phone);
        // dd('After User Data Update');
        if($update){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->back()->with('message','Information Updated Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function adminProfileImage(){
        return view('admin.profile.image');
    }

    public function adminProfileImageUpdate(Request $request){
        // dd('Now you can change your image here');
        // dd($request->all());
        $old_image = $request->old_profile_image;

        if(Auth::user()->image == 'backend/media/avater.jpg') {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('backend/media/'.$name_gen);
            $save_url = 'backend/media/'.$name_gen;
             User::findOrFail(Auth::id())->update([
                'image' => $save_url,
             ]);
             return redirect()->back()->with('message','Profile Image Updated Successfully');
            }else{
                unlink($old_image);
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('backend/media/'.$name_gen);
                $save_url = 'backend/media/'.$name_gen;
                User::findOrFail(Auth::id())->update([
                    'image' => $save_url,
             ]);
             return redirect()->back()->with('message','Profile Image Updated Successfully');
            }
        }
        // Profile Image End

        public function adminPassword(){
            return view('admin.profile.changePassword');
        }

        public function adminPasswordUpdate(Request $request){
            // dd($request->all());
            $this->validate($request, [
                'old_pass' => 'required',
                'new_pass' => 'required',
                'con_pass' => 'required',
            ]);
            // dd('After validation');
            $dbPass = Auth::user()->password;
            $logPass = $request->old_pass;
            $newPass = $request->new_pass;
            $conPass = $request->con_pass;

            if(Hash::check($logPass,$dbPass)){
                if ($newPass === $conPass) {
                    // return "It's ok to go now";
                    User::findOrfail(Auth::id())->update([
                        'password'=>Hash::make($newPass)
                    ]);
                    Auth::logout();
                    return redirect()->route('login')->with('message', "Password changed succesfully now login with new password");
                } else {
                    return redirect()->back()->with('error', "New password & Confirm password didn't match");
                }

            }else{
                return redirect()->back()->with('error', "Old password didn't match");
            }
        }
}
