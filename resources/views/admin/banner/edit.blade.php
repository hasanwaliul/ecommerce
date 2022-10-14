@extends('admin.layouts.master')
@section('title', 'Banner')
@section('banners')
active show-sub
@endsection
@section('add-banner')
active
@endsection
@section('content')

<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="">Banner Data Edit</a>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
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
    </div><!-- row -->
    <div class="row row-sm mg-t-20">
        <div class="col-xl-8">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                <h6 class="card-body-title">Update Banner Data</h6>
                <form action=" {{ route('banner-data-update') }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value=" {{ $bannerData->banner_img }} ">
                    <input type="hidden" name="id" value=" {{ $bannerData->banner_id }} ">

                    <div class="row mg-t-10 form-group  {{ $errors->has('banner_title_en') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Banner Title EN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Banner Title In English"
                                name="banner_title_en" value="{{ $bannerData->banner_title_en }}">

                            @error('banner_title_en')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-10 form-group  {{ $errors->has('banner_title_bn') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Banner Title BN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Banner Title In Bangla"
                                name="banner_title_bn" value="{{ $bannerData->banner_title_bn }}">

                            @error('banner_title_bn')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-10 form-group  {{ $errors->has('banner_subtitle_en') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Banner Sub Title EN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Banner Sub Title In English"
                                name="banner_subtitle_en" value="{{ $bannerData->banner_subtitle_en }}">

                            @error('banner_subtitle_en')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-10 form-group  {{ $errors->has('banner_subtitle_bn') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Banner Sub Title BN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Banner Sub Title IN Bangla"
                                name="banner_subtitle_bn" value="{{ $bannerData->banner_subtitle_bn }}">

                            @error('banner_subtitle_bn')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->

                    <div class="row mg-t-20 form-group  {{ $errors->has('brand_status') ? ' has-error' : '' }}">
                        {{-- Select option with search facility --}}
                        <label class="col-sm-4 form-control-label">Select Sub Category: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2-show-search" name="brand_status"
                                data-placeholder="Choose one">
                                <option label="Choose one"></option>
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                            </select>
                            @error('brand_status')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20  form-group  {{ $errors->has('banner_img') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Banner Image: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="file" class="form-control" name="banner_img" id="bannerImg">
                            @error('banner_img')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <div class="row" id="preview_image"></div>
                        </div>
                    </div>

                    <div class="form-layout-footer mg-t-30  form-group">
                        <button type="submit" class="btn btn-info mg-r-5">Update</button>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->
        </div><!-- col-8 -->
        <div class="col-xl-2"></div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection
@section('scripts')
<script>
    //  ################## Selected Image preview ###################
    $(document).ready(function () {
        $('#bannerImg').on('change', function () { //on file input change
            if (window.File && window.FileReader && window.FileList && window
                .Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function (index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                        .type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function (file) { //trigger function on successful read
                            return function (e) {
                                var img = $('<img/>').addClass('thumb').attr('src',
                                    e.target.result).width(80)
                                    .height(80); //create image element
                                $('#preview_image').append(
                                    img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });


</script>
@endsection

