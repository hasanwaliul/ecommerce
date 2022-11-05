@extends('admin.layouts.master')
@section('title', 'Division')
@section('shipping-area')
active show-sub
@endsection
@section('divisions')
active
@endsection
@section('content')

<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="">Divisions</a>
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
                <h6 class="card-body-title">Update Division</h6>
                <form action=" {{ route('division-data-update') }} " method="post">
                    @csrf
                    <input type="hidden" name="divId" value="{{$SingleDivision->division_id}}">
                    <div class="row mg-t-10 form-group  {{ $errors->has('division_name') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Division Name: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Division Name"
                                name="division_name" value="{{ $SingleDivision->division_name }}">

                            @error('division_name')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="form-layout-footer mg-t-30  form-group">
                        <button type="submit" class="btn btn-info mg-r-5">Update</button>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->
        </div>
        <div class="col-md-2"></div>
    </div>
    {{-- Form part End --}}
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection
@section('scripts')
<script type="text/javascript">


</script>

@endsection
