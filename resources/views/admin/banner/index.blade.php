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
    <a class="breadcrumb-item" href="">All Banner</a>
</nav>

<div class="sl-pagebody">
    {{-- Form part Start --}}
    <div class="row row-sm">
        <div class="col-md-2"></div>
        <div class="col-md-8">

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
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                <h6 class="card-body-title">Add New Banner</h6>
                <form action=" {{ route('banner-add') }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mg-t-10 form-group  {{ $errors->has('banner_title_en') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Banner Title EN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Banner Title In English"
                                name="banner_title_en" value="{{ old('banner_title_en') }}">

                            @error('banner_title_en')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-10 form-group  {{ $errors->has('banner_title_bn') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Banner Title BN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Banner Title In Bangla"
                                name="banner_title_bn" value="{{ old('banner_title_bn') }}">

                            @error('banner_title_bn')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-10 form-group  {{ $errors->has('banner_subtitle_en') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Banner Sub Title EN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Banner Sub Title In English"
                                name="banner_subtitle_en" value="{{ old('banner_subtitle_en') }}">

                            @error('banner_subtitle_en')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-10 form-group  {{ $errors->has('banner_subtitle_bn') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Banner Sub Title BN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Banner Sub Title IN Bangla"
                                name="banner_subtitle_bn" value="{{ old('banner_subtitle_bn') }}">

                            @error('banner_subtitle_bn')
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
                        <button type="submit" class="btn btn-info mg-r-5">Add New</button>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->
        </div>
        <div class="col-md-2"></div>
    </div>
    {{-- Form part End --}}
    <br><br><br>
    {{-- Table Part Start --}}
    <div class="row row-sm">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">All Banner</h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-20p">Banner Img</th>
                                <th class="wd-25p">Banner Title EN</th>
                                <th class="wd-25p">Created At</th>
                                <th class="wd-15p">Status</th>
                                <th class="wd-15p">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($banners as $banner )
                            <tr>
                                <td>
                                    <img src=" {{ asset($banner->banner_img) }} " alt="" style="width: 100px">
                                </td>
                                <td> {{ $banner->banner_title_en }} </td>
                                <td> {{ Carbon\Carbon::parse($banner->created_at)->format('D, d F Y') }} </td>
                                <td>
                                    @if ($banner->banner_status == 1)
                                        <span class="badge badge-pill badge-success">Active</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">InActive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href=" {{ url('admin/banner-edit/'. $banner->banner_id) }} "
                                        class="btn btn-primary" title="Edit"><i
                                            class="tx-18 fa fa-pencil-square-o"></i></a>
                                    <a href=" {{ url('admin/banner-delete/'. $banner->banner_id) }} "
                                        class="btn btn-danger" title="Delete" id="delete"><i
                                            class="tx-18 fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>
        <div class="col-md-1"></div>
    </div><!-- row -->
</div>
<br><br><br>
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
