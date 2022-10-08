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
                    <li class='active'>Profile Image</li>
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
            <h3 class="text-center"><span class="text-danger">Hi...!</span><strong class="text-warning"> {{Auth::user()->name}} </strong>Update Your Profile Image Here..... </h3>
            <div class="card-body">
                <form action=" {{ route('profile-image-update') }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_profile_image" value=" {{Auth::user()->image}} ">
                    <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                      <label for="userImage">Profile Image</label>
                      <input type="file" class="form-control" id="userImage" aria-describedby="emailHelp" name="image">
                        @error('image')
                            <span class="text-danger"> {{ $message}} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div><!-- /.row -->
@include('frontend.layouts.footer-slider')

@endsection
