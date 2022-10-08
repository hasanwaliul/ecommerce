@extends('admin.layouts.master')
@section('title', 'Sub Category')
@section('categories')
active show-sub
@endsection
@section('add-sub-categories')
active
@endsection
@section('content')

<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="">Sub Category Edit</a>
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
            <h6 class="card-body-title">Update Sub Category Information</h6>
            <form action=" {{ route('subcategory-data-update') }} " method="post">
                @csrf
                <input type="hidden" name="subcategory_id" value=" {{ $subcategories->subcategory_id }} ">
                <div class="row mg-t-20 form-group">
                    {{-- Select option with search facility  --}}
                    <label class="col-sm-4 form-control-label">Select Category: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <select class="form-control select2-show-search" name="category_id" data-placeholder="Choose one">
                            <option label="Choose one"></option>
                            @foreach ($categories as $category)
                            <option value=" {{ $category->category_id  }} "> {{ $category->category_name_en }} </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div><!-- row -->
                <div class="row mg-t-20 form-group">
                    <label class="col-sm-4 form-control-label">Name EN: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" placeholder="Sub Category Name English"
                            name="subcategory_name_en" value="{{ $subcategories->subcategory_name_en }}">

                        @error('subcategory_name_en')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div><!-- row -->
                <div class="row mg-t-20 form-group">
                    <label class="col-sm-4 form-control-label">Name BN: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" placeholder="Sub Category Name Bangla"
                            name="subcategory_name_bn" value="{{ $subcategories->subcategory_name_bn }}">

                        @error('subcategory_name_bn')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div><!-- row -->
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
