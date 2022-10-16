@extends('admin.layouts.master')
@section('title', 'Products')
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
    <a class="breadcrumb-item" href="">Products</a>
</nav>
{{-- Breadcrumb part End --}}

{{-- Page Content Start --}}
<div class="sl-pagebody">
    {{-- Table Part Start --}}
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">All Products Items</h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap table-primary mg-b-0">
                        <thead>
                            <tr>
                                <th class="wd-15p">Image</th>
                                <th class="wd-15p">Product Name</th>
                                <th class="wd-15p">Inserted At</th>
                                <th class="wd-10p">Price</th>
                                <th class="wd-10p">Discount</th>
                                <th class="wd-10p">Status</th>
                                <th class="wd-35p">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($products as $product )
                            <tr>
                                <td>
                                    <img src=" {{ asset($product->product_thumbnail) }} " alt="" style="width: 80px" height="50px">
                                </td>
                                <td> {{ $product->product_name_en }} </td>
                                <td> {{ Carbon\Carbon::parse($product->created_at)->format('D, d F Y') }} </td>
                                <td> {{ $product->selling_price }} tk </td>
                                <td>
                                    @if ($product->discount_price == Null)
                                        <span class="badge badge-pill badge-danger">No</span>
                                    @else
                                        @php
                                            $amount = $product->selling_price - $product->discount_price;
                                            $discount = ($amount / $product->selling_price) * 100;
                                        @endphp
                                            <span class="badge badge-pill badge-warning"> {{ round($discount) }}% </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($product->product_status == 1)
                                        <span class="badge badge-pill badge-success">Active</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">In Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href=" {{ url('admin/product-info/'. $product->product_id) }} " class="btn btn-primary" title="View">
                                        <i class="tx-18 fa fa-eye"></i>
                                    </a>

                                    @if ($product->product_status == 1)
                                        <a href=" {{ url('admin/product-inactive/'. $product->product_id) }} " class="btn btn-danger" title=" Inactive ">
                                            <i class="tx-18 fa fa-toggle-on"></i>
                                        </a>
                                    @else
                                        <a href=" {{ url('admin/product-active/'. $product->product_id) }} " class="btn btn-success" title="Active now">
                                            <i class="tx-18 fa fa-toggle-off"></i>
                                        </a>
                                    @endif

                                    <a href=" {{ url('admin/product-edit/'. $product->product_id) }} " class="btn btn-primary" title="Edit">
                                        <i class="tx-18 fa fa-pencil-square-o"></i>
                                    </a>

                                    <a href=" {{ url('admin/brand-delete/'. $product->brand_id) }} " class="btn btn-danger" title="Delete" id="delete">
                                        <i class="tx-18 fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>
    </div><!-- row -->
</div>
{{-- Page Content End --}}
<br><br><br><br>
@endsection
