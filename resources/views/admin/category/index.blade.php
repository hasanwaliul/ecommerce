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
    <a class="breadcrumb-item" href="">Categories</a>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-8">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">All Categories</h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-20p">Category Icon</th>
                                <th class="wd-30p">Category Name EN</th>
                                <th class="wd-30p">Category Name BN</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($categories as $category )
                            <tr>
                                <td>
                                    <img src=" {{ asset($category->category_image) }} " alt="" style="width: 80px">
                                </td>
                                <td> {{ $category->category_name_en }} </td>
                                <td> {{ $category->category_name_bn }} </td>
                                <td>
                                    <a href=" {{ url('admin/category-edit/'.$category->category_id) }} " class="btn btn-primary" title="Edit"><i class="tx-18 fa fa-pencil-square-o"></i></a>
                                    <a href=" {{ url('admin/category-delete/'.$category->category_id) }} " class="btn btn-danger" title="Delete" id="delete"><i class="tx-18 fa fa-trash"></i></a>
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
                <h6 class="card-body-title">Add New Category</h6>
                <form action=" {{ route('category-add') }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mg-t-20  form-group {{ $errors->has('category_image') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Category Image: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="file" class="custom-file-input" name="category_image" id="categImg">
                            <span class="custom-file-control custom-file-control-inverse"></span>
                            @error('category_image')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <div class="row" id="preview_image"></div>
                        </div>
                    </div>
                    <div class="row mg-t-20 form-group {{ $errors->has('category_name_en') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Name EN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Category Name English"
                                name="category_name_en" value="{{ old('category_name_en') }}">

                            @error('category_name_en')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20 form-group {{ $errors->has('category_name_bn') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Name BN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Category Name Bangla"
                                name="category_name_bn" value="{{ old('category_name_bn') }}">

                            @error('category_name_bn')
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
@section('scripts')
<script>
    //  ################## Selected Image preview ###################
    $(document).ready(function () {
        $('#categImg').on('change', function () { //on file input change
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
