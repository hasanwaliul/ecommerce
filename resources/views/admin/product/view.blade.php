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
    <div class="row row-sm">
        <div class="col-md-12">
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
                <div class="card pd-20 pd-sm-40">
                    <h3 class="card-body-title">Product Details</h3>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered mg-b-0">
                            <thead>
                                <tr>
                                    <th class="wd-25p">Category Name</th>
                                    <th class="wd-25p">Sub Category Name</th>
                                    <th class="wd-25p">Sub Subcateg Name </th>
                                    <th class="wd-25p">Brand Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><p> {{ $productData->categoryfuncProd->category_name_en }} </p></td>
                                    <td><p> {{ $productData->subcategoryfuncProd->subcategory_name_en }} </p></td>
                                    <td><p> {{ $productData->subsubcategoryfuncProd->subsubcategory_name_en }} </p></td>
                                    <td><p> {{ $productData->brandfuncProd->brand_name_en }} </p></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th class="wd-25p">Product Name</th>
                                    <th class="wd-25p">Product Code</th>
                                    <th class="wd-25p">Quantity</th>
                                    <th class="wd-25p">Product Tag</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><p> {{ $productData->product_name_en }} </p></td>
                                    <td><p> {{ $productData->product_code }} </p></td>
                                    <td><p> {{ $productData->product_qty }} </p></td>
                                    <td><p> {{ $productData->product_tags_en }} </p></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th class="wd-25p">Product Size</th>
                                    <th class="wd-25p">Product Color</th>
                                    <th class="wd-25p">Selling Price</th>
                                    <th class="wd-25p">Discount Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><p> {{ $productData->product_size_en }} </p></td>
                                    <td><p> {{ $productData->product_color_en }} </p></td>
                                    <td><p> {{ $productData->selling_price }} tk </p></td>
                                    <td><p> {{ $productData->discount_price }} tk </p></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th class="wd-25p">Hot Deals</th>
                                    <th class="wd-25p">Featured</th>
                                    <th class="wd-25p">Special Offer</th>
                                    <th class="wd-25p">Special Deals</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @if ($productData->hot_deals == 1)
                                        <span class="badge badge-pill badge-success">Yes</span>
                                        @else
                                        <span class="badge badge-pill badge-danger">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($productData->featured == 1)
                                        <span class="badge badge-pill badge-success">Yes</span>
                                        @else
                                        <span class="badge badge-pill badge-danger">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($productData->special_offer == 1)
                                            <span class="badge badge-pill badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($productData->special_deals == 1)
                                            <span class="badge badge-pill badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">No</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th class="wd-25p">Insert At</th>
                                    <th class="wd-25p">Update At</th>
                                    <th class="wd-25p">Product Status</th>
                                    <th class="wd-25p">Thumbnail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> {{ Carbon\Carbon::parse($productData->created_at)->format('D, d F Y') }} </td>
                                    <td> {{ Carbon\Carbon::parse($productData->updated_at)->format('D, d F Y') }} </td>
                                    <td>
                                        @if ($productData->product_status == 1)
                                            <span class="badge badge-pill badge-success">Available</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Unavailable</span>
                                        @endif
                                    </td>
                                    <td>
                                        <img src=" {{ asset($productData->product_thumbnail) }} " alt="" height="80" width="80">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- table-responsive -->
                </div><!-- card -->
            </div><!-- card -->
        </div>
    </div>

</div>
{{-- Page Content End --}}
<br><br><br>

@endsection
