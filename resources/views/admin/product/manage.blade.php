@extends('admin.layouts.master')
@section('title', 'Product')
@section('products')
active show-sub
@endsection
@section('add-products')
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
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-20p">Product Img</th>
                                <th class="wd-15p">Name</th>
                                <th class="wd-10p">Product Qty</th>
                                <th class="wd-15p">Insert At</th>
                                <th class="wd-15p">Updated At</th>
                                <th class="wd-10p">Status</th>
                                <th class="wd-15p">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            {{-- @foreach ($brands as $brandData )
                            <tr>
                                <td>
                                    <img src=" {{ asset($brandData->brand_image) }} " alt="" style="width: 80px">
                                </td>
                                <td>
                                    <p>{{ isset($brandData->categoryfuncB) ?
                                        $brandData->categoryfuncB->category_name_en: '-'}}</p>
                                </td>
                                <td>
                                    <p>{{ isset($brandData->subcategoryfuncB) ?
                                        $brandData->subcategoryfuncB->subcategory_name_en: '-'}}</p>
                                </td>
                                <td> {{ $brandData->brand_name_en }} </td>
                                <td> {{ $brandData->brand_name_bn }} </td>
                                <td>
                                    <a href=" {{ url('admin/brand-edit/'. $brandData->brand_id) }} "
                                        class="btn btn-primary" title="Edit"><i
                                            class="tx-18 fa fa-pencil-square-o"></i></a>
                                    <a href=" {{ url('admin/brand-delete/'. $brandData->brand_id) }} "
                                        class="btn btn-danger" title="Delete" id="delete"><i
                                            class="tx-18 fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach --}}
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
