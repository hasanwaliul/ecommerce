@extends('admin.layouts.master')
@section('title', 'Coupon')
@section('coupon')
active
@endsection
@section('content')

<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="">All Coupon</a>
</nav>

<div class="sl-pagebody">
    {{-- Form part Start --}}
    <div class="row row-sm">
        <div class="col-md-2"></div>
        <div class="col-md-8">

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
                <h6 class="card-body-title">Add New Coupon</h6>
                <form action=" {{ route('coupon-add') }} " method="post">
                    @csrf
                    <div class="row mg-t-10 form-group  {{ $errors->has('coupon_name') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Coupon Name: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Your Coupon Name"
                                name="coupon_name" value="{{ old('coupon_name') }}">

                            @error('coupon_name')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20  form-group  {{ $errors->has('coupon_discount') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Coupon Discount (%): <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Coupon Discount"
                                name="coupon_discount" value="{{ old('coupon_discount') }}" min="1" max="99">

                            @error('coupon_discount')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mg-t-20  form-group  {{ $errors->has('coupon_validity') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Coupon Validity: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="date" class="form-control" name="coupon_validity" value="{{ old('coupon_validity') }}"
                            min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                            @error('coupon_validity')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-layout-footer mg-t-30  form-group">
                        <button type="submit" class="btn btn-info mg-r-5">Add New</button>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->
        </div>
        <div class="col-md-2"></div>
    </div>
    {{-- Form part End --}}
    <br><br><br>
    {{-- Table Part Start --}}
    <div class="row row-sm">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">All Brand Items</h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap table-primary mg-b-0">
                        <thead>
                            <tr>
                                <th class="wd-20p">Name</th>
                                <th class="wd-15p">Discount</th>
                                <th class="wd-25p">Validity</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($coupons as $coupon)
                            <tr>
                                <td> {{ $coupon->coupon_name }} </td>
                                <td> {{ $coupon->coupon_discount }} % </td>
                                <td>
                                    {{ Carbon\Carbon::parse($coupon->coupon_validity)->format('D, d F Y') }}
                                </td>
                                <td>
                                    @if ($coupon->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                        <span class="badge badge-pill badge-success">Valid</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">Invalid</span>
                                    @endif
                                </td>
                                <td>
                                    <a href=" {{ url('admin/coupon-edit/'.$coupon->coupon_id ) }} " class="btn btn-primary" title="Edit"><i class="tx-18 fa fa-pencil-square-o"></i></a>
                                    <a href=" {{ url('admin/coupon-delete/'.$coupon->coupon_id ) }} " class="btn btn-danger" title="Delete" id="delete"><i class="tx-18 fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>
        <div class="col-md-1"></div>
    </div><!-- row -->
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection
@section('scripts')
<script type="text/javascript">


</script>

@endsection
