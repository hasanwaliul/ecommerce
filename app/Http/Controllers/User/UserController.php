<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\UserDataService;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index(){
        return view('user.home');
    }

    public function updateData(Request $request){
        // dd('calling');
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
        $update = (new UserDataService())->updateUserData($request->name, $request->email, $request->phone);

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

    // Profile Image Show and  Start
    public function profileImage(){
        // dd('Profile Image');
        return view('user.profile-image');
    }

    public function profileImageUpdate(Request $request){
        // dd('Now you can change your image here');
        // dd($request->all());
        $old_image = $request->old_profile_image;

        if(Auth::user()->image == 'frontend/media/avater.jpg') {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('frontend/media/'.$name_gen);
            $save_url = 'frontend/media/'.$name_gen;
             User::findOrFail(Auth::id())->update([
                'image' => $save_url,
             ]);
             return redirect()->back()->with('message','Profile Image Updated Successfully');
            }else{
                unlink($old_image);
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('frontend/media/'.$name_gen);
                $save_url = 'frontend/media/'.$name_gen;
                User::findOrFail(Auth::id())->update([
                    'image' => $save_url,
             ]);
             return redirect()->back()->with('message','Profile Image Updated Successfully');
            }
        }
        // Profile Image End

        public function userPassword(){
            return view('user.changePassword');
        }
        public function userPasswordUpdate(Request $request){
            // dd('This is for password change request');
            // dd($request->all());
            $this->validate($request,[
                'old_pass' => 'required',
                'new_pass' => 'required',
                'con_pass' => 'required',
            ],[
                'old_pass.required' => 'Please enter your old password please....',
                'new_pass.required' => 'Please enter your new password please....',
                'con_pass.required' => 'Please enter your confirm password please....',
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



