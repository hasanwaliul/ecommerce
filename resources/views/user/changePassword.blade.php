@extends('frontend.layouts.master')
@section('title', 'Easy Shopping')
@section('content')
<div class="row">
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Dashboard</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="col-sm-4">
        @include('user.include.sidebar')
    </div>
    <div class="col-sm-8 mt-1">
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
            <h3 class="text-center"><span class="text-danger">Hi...!</span><strong class="text-warning"> {{Auth::user()->name}} </strong>Update Your Password </h3>
            <div class="card-body">
                <form method="POST" action=" {{ route('user-password-update') }} ">
                    @csrf
                    <div class="form-group {{ $errors->has('old_pass') ? ' has-error' : '' }}">
                      <label for="userOldPass">Old Password</label>
                      <input type="password" class="form-control" id="userOldPass" name="old_pass" placeholder="Enter your old password" aria-describedby="emailHelp">
                        @error('old_pass')
                            <span class="text-danger"> {{ $message}} </span>
                        @enderror
                    </div>
                    <div class="form-group {{ $errors->has('new_pass') ? ' has-error' : '' }}">
                      <label for="userNldPass">New Password</label>
                      <input type="password" class="form-control" id="userNldPass" name="new_pass" placeholder="Enter your new password" aria-describedby="emailHelp">
                        @error('new_pass')
                            <span class="text-danger"> {{ $message}} </span>
                        @enderror
                    </div>
                    <div class="form-group {{ $errors->has('con_pass') ? ' has-error' : '' }}">
                      <label for="userConfPass">Confirm Password</label>
                      <input type="password" class="form-control" id="userConfPass" name="con_pass" placeholder="Enter your Confirm password" aria-describedby="emailHelp">
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
</div><!-- /.row -->
@include('frontend.layouts.footer-slider')

@endsection
