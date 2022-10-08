@extends('admin.layouts.master')
@section('title', 'Category')
@section('categories')
active show-sub
@endsection
@section('add-categories')
    active
@endsection
@section('content')

<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="">Category Edit</a>
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
            <h6 class="card-body-title">Update Category Information</h6>
            <form action=" {{ route('category-data-update') }} " method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="old_image" value=" {{ $category->category_image }} ">
                <input type="hidden" name="category_id" value=" {{ $category->category_id }} ">
                <div class="row mg-t-20  form-group {{ $errors->has('category_image') ? ' has-error' : '' }}">
                    <label class="col-sm-4 form-control-label">Category Image: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="file" class="custom-file-input" name="category_image" value=" {{ $category->category_image }} ">
                        <span class="custom-file-control custom-file-control-inverse">
                            @error('category_image')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row mg-t-20 form-group {{ $errors->has('category_name_en') ? ' has-error' : '' }}">
                    <label class="col-sm-4 form-control-label">Category Name EN: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" placeholder="Enter Category Name English"
                            name="category_name_en" value=" {{ $category->category_name_en }} ">

                        @error('category_name_en')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div><!-- row -->
                <div class="row mg-t-20  form-group {{ $errors->has('category_name_bn') ? ' has-error' : '' }}">
                    <label class="col-sm-4 form-control-label">Category Name BN: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" placeholder="Enter Category Name Bangla"
                            name="category_name_bn" value=" {{ $category->category_name_bn }} ">

                        @error('category_name_bn')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
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
