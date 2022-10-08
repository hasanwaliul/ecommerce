@extends('admin.layouts.master')
@section('title', 'Brands')
@section('categories')
active show-sub
@endsection
@section('add-brands')
active
@endsection
@section('content')

<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="">All Brands</a>
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
                <h6 class="card-body-title">Update Brand Data</h6>
                <form action=" {{ route('brand-data-update') }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value=" {{ $brandData->brand_image }} ">
                    <input type="hidden" name="id" value=" {{ $brandData->brand_id }} ">
                    <div class="row mg-t-20 form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                        {{-- Select option with search facility --}}
                        <label class="col-sm-4 form-control-label">Select Category: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2-show-search" name="category_id" id=""
                                data-placeholder="Choose one">
                                <option label="Choose one" selected>Choose one</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}" {{ $category->category_id == $brandData->category_id ?
                                    'selected':'' }}> {{ $category->category_name_en }} </option>

                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20 form-group  {{ $errors->has('subcategory_id') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Select Sub Category: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2-show-search" name="subcategory_id"
                                data-placeholder="Choose one">
                                <option label="Choose one" selected>Choose one</option>
                                @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->subcategory_id  }}" {{ $subcategory->subcategory_id ==
                                    $brandData->subcategory_id ? 'selected' : '' }}> {{ $subcategory->subcategory_name_en }}
                                </option>
                                @endforeach
                            </select>
                            @error('subcategory_id')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20 form-group {{ $errors->has('brand_name_en') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Brand Name EN: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Brand Name English"
                                name="brand_name_en" value=" {{ $brandData->brand_name_en }} ">

                            @error('brand_name_en')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20  form-group {{ $errors->has('brand_name_bn') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Brand Name BN: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Brand Name Bangla"
                                name="brand_name_bn" value=" {{ $brandData->brand_name_bn }} ">

                            @error('brand_name_bn')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mg-t-20  form-group {{ $errors->has('brand_image') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Brand Image: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="file" class="custom-file-input" name="brand_image"
                                value=" {{ $brandData->brand_image }} ">
                            <span class="custom-file-control custom-file-control-inverse">
                                @error('brand_image')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </span>
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
