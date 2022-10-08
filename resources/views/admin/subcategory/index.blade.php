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
    <a class="breadcrumb-item" href="">Sub Category</a>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-8">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">All Sub Categories</h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-25p">Category Name</th>
                                <th class="wd-30p">Sub Category Name EN</th>
                                <th class="wd-30p">Sub Category Name BN</th>
                                <th class="wd-15p">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($subcategories as $subcategory )
                            <tr>
                                <td><p>{{ isset($subcategory->categoryfunc) ? $subcategory->categoryfunc->category_name_en: '-'}}</p></td>
                                {{-- <td> {{ $subcategory->category->category_name_en }} </td> --}}
                                <td> {{ $subcategory->subcategory_name_en }} </td>
                                <td> {{ $subcategory->subcategory_name_bn }} </td>
                                <td>
                                    <a href=" {{ url('admin/subcategory-edit/'.$subcategory->subcategory_id) }} " class="btn btn-primary" title="Edit"><i class="tx-18 fa fa-pencil-square-o"></i></a>
                                    <a href=" {{ url('admin/subcategory-delete/'.$subcategory->subcategory_id) }} " class="btn btn-danger" title="Delete" id="delete"><i class="tx-18 fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>
        <div class="col-md-4">
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
                <h6 class="card-body-title">Add New Sub Category</h6>
                <form action=" {{ route('subcategory-add') }} " method="post">
                    @csrf
                    <div class="row mg-t-20 form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                        {{-- Select option with search facility  --}}
                        <label class="col-sm-4 form-control-label">Select Category: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2-show-search" name="category_id" data-placeholder="Choose one">
                                <option label="Choose one"></option>
                                @foreach ($categories as $category)
                                <option value=" {{ $category->category_id }} "> {{ $category->category_name_en }} </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20 form-group {{ $errors->has('subcategory_name_en') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Name EN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Sub Category Name English"
                                name="subcategory_name_en" value="{{ old('subcategory_name_en') }}">

                            @error('subcategory_name_en')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20 form-group {{ $errors->has('subcategory_name_bn') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Name BN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Sub Category Name Bangla"
                                name="subcategory_name_bn" value="{{ old('subcategory_name_bn') }}">

                            @error('subcategory_name_bn')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="form-layout-footer mg-t-30  form-group">
                        <button type="submit" class="btn btn-info mg-r-5">Add New</button>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->
        </div>
    </div><!-- row -->
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection
