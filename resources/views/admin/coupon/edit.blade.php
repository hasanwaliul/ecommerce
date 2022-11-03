@extends('admin.layouts.master')
@section('title', 'Coupon')
@section('coupon')
active
@endsection
@section('content')

<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="">Coupon Data Edit</a>
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
                <h6 class="card-body-title">Update Coupon Information</h6>
                <form action=" {{ route('coupon--data-update') }} " method="post">
                    @csrf
                    <input type="hidden" name="coupon_id" value=" {{ $singleCoupon->coupon_id }} ">
                    <div class="row mg-t-10 form-group  {{ $errors->has('coupon_name') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Coupon Name: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Your Coupon Name"
                                name="coupon_name" value="{{ $singleCoupon->coupon_name }}">

                            @error('coupon_name')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20  form-group  {{ $errors->has('coupon_discount') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Coupon Discount (%): <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Coupon Discount"
                                name="coupon_discount" value="{{ $singleCoupon->coupon_discount }}" min="1" max="99">

                            @error('coupon_discount')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mg-t-20  form-group  {{ $errors->has('coupon_validity') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Coupon Validity: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="date" class="form-control" name="coupon_validity" value="{{ $singleCoupon->coupon_validity }}"
                            min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                            @error('coupon_validity')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-layout-footer mg-t-30  form-group">
                        <button type="submit" class="btn btn-info mg-r-5">Update</button>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->
        </div>
        <div class="col-md-2"></div>
    </div>
    {{-- Form part End --}}
    <br><br><br>
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection
@section('scripts')
<script type="text/javascript">


</script>

@endsection
