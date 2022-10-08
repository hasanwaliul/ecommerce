@extends('admin.layouts.master')
@section('title', 'Sub Subcategory')
@section('categories')
active show-sub
@endsection
@section('add-sub-sub-categories')
active
@endsection
@section('content')

<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="">Sub Sub-Category Edit</a>
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
                <h6 class="card-body-title">Update Sub Subcategory Data</h6>
                <form action=" {{ route('sub-sub-category-data-update') }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value=" {{ $subsubcategoryData->subsubcategory_id  }} ">
                    <div class="row mg-t-20 form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                        {{-- Select option with search facility --}}
                        <label class="col-sm-4 form-control-label">Select Category: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2-show-search" name="category_id" id=""
                                data-placeholder="Choose one">
                                <option label="Choose one" selected>Choose one</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}" {{ $category->category_id == $subsubcategoryData->category_id ?
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
                                    $subsubcategoryData->subcategory_id ? 'selected' : '' }}> {{ $subcategory->subcategory_name_en }}
                                </option>
                                @endforeach
                            </select>
                            @error('subcategory_id')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-10 form-group  {{ $errors->has('subsubcateg_name_en') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Sub Subcategory Name EN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Sub Subcategory Name in English"
                                name="subsubcateg_name_en" value="{{ $subsubcategoryData->subsubcategory_name_en }}">

                            @error('subsubcateg_name_en')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20  form-group  {{ $errors->has('subsubcateg_name_bn') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Sub Subcategory Name BN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Sub Subcategory Name in Bangla"
                                name="subsubcateg_name_bn" value="{{ $subsubcategoryData->subsubcategory_name_bn }}">

                            @error('subsubcateg_name_bn')
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
@section('scripts')
    <script>
         $("select[name='category_id']").on('change', function (event) {
        var catg_id = $(this).val();

        /* ==== ajax request ==== */
        if (catg_id) {
            $.ajax({
                url: "{{ url('category-wise/subcategory/') }}/" + catg_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    // response
                    if (data == "") {
                        $('select[name="subcategory_id"]').empty();
                        $('select[name="subcategory_id"]').append('<option value="">Sub Category Not Found!</option>');
                    } else {
                        $('select[name="subcategory_id"]').empty();
                        $('select[name="subcategory_id"]').append('<option value="">Select Sub Category</option>');
                        // data load
                        $.each(data, function (key, value) {
                            $('select[name="subcategory_id"]').append('<option value="' + value.subcategory_id + '">' + value.subcategory_name_en + '</option>');
                        });
                        // data load
                    }
                    // response
                },
            });
        }
        /* ==== ajax request ==== */
    });
    </script>

@endsection
