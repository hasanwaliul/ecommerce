@extends('admin.layouts.master')
@section('title', 'Profile')
@section('content')
{{-- Breadcrumb part start --}}
<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="">Admin Password</a>
</nav>
{{-- Breadcrumb part end --}}

{{-- Page Contents Start --}}
<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img src=" {{asset(Auth::user()->image)}} " alt="card-image" style="border-radius:50%" height="100%"
                    width="100%">
                <ul class="list-group list-group-flush">
                    <a href=" {{ route('admin-profile') }} " class="btn btn-secondary btn-sm btn-block ">Profile</a>
                    <a href=" {{ route('admin-profile-image') }} " class="btn btn-secondary btn-sm btn-block">Update
                        Image</a>
                    <a href=" {{ route('admin-password') }} " class="btn btn-secondary btn-sm btn-block">Update Password</a>
                    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> Logout </a>
                </ul>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    @if(Session::has('success'))
                    <div class="alert alert-success alertsuccess" role="alert">
                        <strong> {{ Session::get('success')}} </strong>
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-warning alerterror" role="alert">
                        <strong> {{ Session::get('error') }} </strong>
                    </div>
                    @endif
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="card">
                <h3 class="text-center mt-4"><span class="text-danger">Hi...!</span><strong class="text-primary">
                        {{Auth::user()->name}} </strong>Update Your Password Here... </h3>
                <div class="card-body">
                    <form method="POST" action=" {{ route('admin-password-update') }} ">
                        @csrf
                        <div class="form-group {{ $errors->has('old_pass') ? ' has-error' : '' }}">
                            <label for="userOldPass">Old Password</label>
                            <input type="text" class="form-control" id="userOldPass" name="old_pass"
                                placeholder="Enter your old password" aria-describedby="emailHelp">
                            @error('old_pass')
                            <span class="text-danger"> {{ $message}} </span>
                            @enderror
                        </div>
                        <div class="form-group {{ $errors->has('new_pass') ? ' has-error' : '' }}">
                            <label for="userNewPass">New Password</label>
                            <input type="text" class="form-control" id="userNewPass" name="new_pass"
                                placeholder="Enter your new password" aria-describedby="emailHelp">
                            @error('new_pass')
                            <span class="text-danger"> {{ $message}} </span>
                            @enderror
                        </div>
                        <div class="form-group {{ $errors->has('con_pass') ? ' has-error' : '' }}">
                            <label for="userConfPass">Confirm Password</label>
                            <input type="text" class="form-control" id="userConfPass" name="con_pass"
                                placeholder="Enter your Confirm password" aria-describedby="emailHelp">
                            @error('con_pass')
                            <span class="text-danger"> {{ $message}} </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- row -->
    <br><br><br><br><br>
</div><!-- sl-pagebody -->
<br><br><br><br><br>
{{-- Page Contents Start --}}
@endsection
