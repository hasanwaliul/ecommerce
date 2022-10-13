@extends('admin.layouts.master')
@section('title', 'Product')
@section('products')
active show-sub
@endsection
@section('manage-products')
active
@endsection
@section('content')
{{-- Breadcrumb part start --}}
<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="">Product View</a>
</nav>
{{-- Breadcrumb part End --}}

{{-- Page Content Start --}}
<div class="sl-pagebody">
    {{-- Form part start --}}
    <div class="row row-sm">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card pd-20 pd-sm-40">
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
                    <h6 class="card-body-title">Update Product Information</h6>
                    <form action=" {{ route('product-data-update') }} " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20">
                                        <label class="form-control-label">Select Category Name: <span
                                                class="tx-danger">*</span></label>
                                        <select class="form-control select2-show-search" name="category_id" id=""
                                            data-placeholder="Choose one">
                                            <option label="Choose one"></option>
                                            {{-- @foreach ($categories as $category)
                                            <option value=" {{ $category->category_id }} " {{ $category->category_id ==
                                                $productData->category_id ? 'selected' : ''}} > {{
                                                $category->category_name_en }}
                                            </option>
                                            @endforeach --}}
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20">
                                        <label class="form-control-label">Select Subcategory Name: <span
                                                class="tx-danger">*</span></label>
                                        <select class="form-control select2-show-search" name="subcategory_id" id=""
                                            data-placeholder="Choose one">
                                            <option label="Choose one"></option>
                                            </option>
                                        </select>
                                        @error('subcategory_id')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20">
                                        <label class="form-control-label">Select Sub Subcategory Name: <span
                                                class="tx-danger">*</span></label>
                                        <select class="form-control select2-show-search" name="subsubcategory_id" id=""
                                            data-placeholder="Choose one">
                                            <option label="Choose one"></option>
                                        </select>
                                        @error('subsubcategory_id')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20">
                                        <label class="form-control-label">Select Brand Name: <span
                                                class="tx-danger">*</span></label>
                                        <select class="form-control select2-show-search" name="brand_id" id=""
                                            data-placeholder="Choose one">
                                            <option label="Choose one"></option>
                                        </select>
                                        @error('brand_id')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Product Name EN: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_name_en"
                                            value=" {{ $productData->product_name_en }} "
                                            placeholder="Enter Product Name EN">
                                        @error('product_name_en')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Product Name BN: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_name_bn"
                                            value=" {{ $productData->product_name_bn }} "
                                            placeholder="Enter Product Name BN">
                                        @error('product_name_bn')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Product Code: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_code"
                                            value=" {{ $productData->product_code }} "
                                            placeholder="Enter Product Code Here">
                                        @error('product_code')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Product Quantity: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_qty"
                                            value=" {{ $productData->product_qty }} "
                                            placeholder="Enter Product Quantity">
                                        @error('product_qty')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Product Selling Price: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_selling_price"
                                            value=" {{ $productData->selling_price }} "
                                            placeholder="Enter Product Selling Price">
                                        @error('product_selling_price')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Product Discount Price: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_disc_price"
                                            value=" {{ $productData->discount_price }} "
                                            placeholder="Enter Product Discount Price">
                                        @error('product_disc_price')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Product Tags EN: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_tags_en"
                                            value=" {{ $productData->product_tags_en }} "
                                            placeholder="Enter Product Tags EN" data-role="tagsinput">
                                        @error('product_tags_en')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Product Tags BN: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_tags_bn"
                                            value=" {{ $productData->product_tags_bn }} "
                                            placeholder="Enter Product Tags BN" data-role="tagsinput">
                                        @error('product_tags_bn')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Product Size EN: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_size_en"
                                            value=" {{ $productData->product_size_en }} "
                                            placeholder="Enter Product Size EN" data-role="tagsinput">
                                        @error('product_size_en')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Product Size BN: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_size_bn"
                                            value="{{ $productData->product_size_bn }} "
                                            placeholder="Enter Product Size BN" data-role="tagsinput">
                                        @error('product_size_bn')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Product Color EN: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_color_en"
                                            value=" {{ $productData->product_color_en }} "
                                            placeholder="Enter Product Color EN" data-role="tagsinput">
                                        @error('product_color_en')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Product Color BN: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_color_bn"
                                            value=" {{ $productData->product_color_bn }} "
                                            placeholder="Enter Product Color BN" data-role="tagsinput">
                                        @error('product_color_bn')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4  mg-t-60">
                                    <label class="ckbox">
                                        <input type="checkbox" name="hot_deals" value="1" {{ $productData->hot_deals ==
                                        1 ? 'checked' : '' }} ><span>Hot Deals</span>
                                    </label>
                                    @error('hot_deals')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div><!-- col-4 -->
                                <div class="col-lg-4  mg-t-60">
                                    <label class="ckbox">
                                        <input type="checkbox" name="featured" value="1" {{ $productData->featured == 1
                                        ? 'checked' : '' }} ><span>Featured</span>
                                    </label>
                                    @error('featured')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div><!-- col-4 -->
                                <div class="col-lg-6 mg-t-20 mg-b-20">
                                    <label class="ckbox">
                                        <input type="checkbox" name="special_offer" value="1" {{
                                            $productData->special_offer == 1 ? 'checked' : '' }} ><span>Special
                                            Offers</span>
                                    </label>
                                    @error('special_offer')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div><!-- col-6 -->
                                <div class="col-lg-6 mg-t-20 mg-b-20">
                                    <label class="ckbox">
                                        <input type="checkbox" name="special_deals" value="1" {{
                                            $productData->special_deals == 1 ? 'checked' : '' }} ><span>Special
                                            Deals</span>
                                    </label>
                                    @error('special_deals')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div><!-- col-6 -->
                                <div class="col-lg-6">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Short Description EN: <span
                                                class="tx-danger">*</span></label>
                                        <textarea name="short_descp_en" id="summernote3" cols="10"
                                            rows="5"> {{ $productData->short_descp_en }} </textarea>
                                        @error('short_descp_en')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-6 -->
                                <div class="col-lg-6">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Short Description BN: <span
                                                class="tx-danger">*</span></label>
                                        <textarea name="short_descp_bn" id="summernote4" cols="10"
                                            rows="5"> {{ $productData->short_descp_bn }} </textarea>
                                        @error('short_descp_bn')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-6 -->
                                <div class="col-lg-6">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Long Description EN: <span
                                                class="tx-danger">*</span></label>
                                        <textarea name="long_descp_en" id="summernote1" cols="10"
                                            rows="5"> {{ $productData->long_descp_en }} </textarea>
                                        @error('long_descp_en')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-6 -->
                                <div class="col-lg-6">
                                    <div class="form-group mg-t-20-force">
                                        <label class="form-control-label">Long Description BN: <span
                                                class="tx-danger">*</span></label>
                                        <textarea name="long_descp_bn" id="summernote2" cols="10"
                                            rows="5"> {{ $productData->long_descp_bn }} </textarea>
                                        @error('long_descp_bn')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div><!-- col-6 -->
                                <div class="col-lg-3 mg-t-50">
                                </div><!-- col-3 -->
                                <div class="col-lg-3 mg-t-50">
                                </div><!-- col- -->
                            </div><!-- row -->

                            <div class="text-center form-layout-footer mg-t-30-force">
                                <button type="submit" class="btn btn-info mg-r-5">Update Product</button>
                            </div><!-- form-layout-footer -->
                        </div><!-- form-layout -->
                    </form>
                </div><!-- card -->
            </div><!-- card -->
        </div>
        <div class="col-md-1"></div>
    </div>
    {{-- Form part End --}}

    {{-- Miltiple Image Part Start --}}
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h5 class="card-body-title">Update Product Image</h5>
        <form action=" {{ route('product-multiImg-update') }} " method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                @foreach ($multiImage as $image)
                    <div class="col-lg-3 card bg-gray-300">
                        <div class="card-body">
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                    <img src="{{ asset($image->photo_name) }}" alt="" width="100%">
                                            </div><!-- /.image -->
                                        </div><!-- /.product-image -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <a href=" {{ url('admin/product-multiImg/delete/'. $image->multiImg_id ) }} " data-toggle="tooltip" class="btn btn-primary" title="Delete" id="delete">
                                                            <i class="tx-18 fa fa-trash">  </i>
                                                        </a>
                                                        <button class="btn btn-danger cart-btn" type="button">Delete</button>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->
                                </div><!-- /.products -->
                            </div><!-- /.item -->
                        </div><!-- /.card -->
                        <br>
                        <div class="card-text">
                            <div class="form-group mg-t-5-force">
                                <label class="form-control-label">Product Multiple Image: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="product_mtpImg[{{$image->multiImg_id}}]"
                                    value=" {{ old('product_mtpImg') }} "multiple>
                                @error('product_mtpImg')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                    </div><!-- col-4 -->
                @endforeach
                </div><!-- row -->

                <div class="text-center form-layout-footer mg-t-30-force">
                    <button type="submit" class="btn btn-info mg-r-5">Update Image</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </form>

    {{-- Miltiple Image Part End --}}

</div>
{{-- Page Content End --}}
<br><br><br>

@endsection
