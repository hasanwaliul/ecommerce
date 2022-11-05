@extends('admin.layouts.master')
@section('title', 'States')
@section('shipping-area')
active show-sub
@endsection
@section('states')
active
@endsection
@section('content')

<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="">States</a>
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
                <h6 class="card-body-title">Add New States/Upazilla</h6>
                <form action=" {{ route('district-add') }} " method="post">
                    @csrf
                    <div class="row mg-t-20 form-group {{ $errors->has('division_id') ? ' has-error' : '' }}">
                        {{-- Select option with search facility --}}
                        <label class="col-sm-4 form-control-label">Select Division: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2-show-search" name="division_id" id=""
                                data-placeholder="Choose one">
                                <option label="Choose one"></option>
                                @foreach ($divisions as $division)
                                <option value=" {{ $division->division_id }} "> {{ $division->division_name }}
                                </option>
                                @endforeach
                            </select>
                            @error('division_id')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20 form-group  {{ $errors->has('district_id') ? ' has-error' : '' }}">
                        {{-- Select option with search facility  --}}
                        <label class="col-sm-4 form-control-label">Select District: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2-show-search" name="district_id" data-placeholder="Choose one">
                                <option label="Choose one"></option>
                            </select>
                            @error('district_id')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-10 form-group  {{ $errors->has('state_name') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">State Name: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter State/Upazilla Name"
                                name="state_name" value="{{ old('state_name') }}">

                            @error('state_name')
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
        <div class="col-md-2"></div>
    </div>
    {{-- Form part End --}}
    <br><br><br>
    {{-- Table Part Start --}}
    <div class="row row-sm">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">All Districts</h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap table-primary mg-b-0">
                        <thead>
                            <tr>
                                <th class="wd-20p"> Division Name</th>
                                <th class="wd-25p"> District Name</th>
                                <th class="wd-30p"> State Name</th>
                                <th class="wd-25p">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($states as $state)
                            <tr>
                                <td> {{ $state->division->division_name }} </td>
                                <td> {{ $state->district->district_name }} </td>
                                <td> {{ $state->state_name }} </td>

                                <td>
                                    <a href=" {{ url('admin/district-edit/'.$state->state_id  ) }} "
                                        class="btn btn-primary" title="Edit"><i
                                            class="tx-18 fa fa-pencil-square-o"></i></a>
                                    <a href=" {{ url('admin/district-delete/'.$state->state_id  ) }} "
                                        class="btn btn-danger" title="Delete" id="delete"><i
                                            class="tx-18 fa fa-trash"></i></a>
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

            {{-- Division Wise District Name With Ajax Request --}}
    <script>
         $("select[name='division_id']").on('change', function (event) {
        var divId = $(this).val();

        /* ==== ajax request ==== */
        if (divId) {
            $.ajax({
                url: "{{ url('division-wise/districts/') }}/" + divId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    // response
                    if (data == "") {
                        $('select[name="district_id"]').empty();
                        $('select[name="district_id"]').append('<option value="">Districts Not Found!</option>');
                    } else {
                        $('select[name="district_id"]').empty();
                        $('select[name="district_id"]').append('<option value="">Select Any Districts</option>');
                        // data load
                        $.each(data, function (key, value) {
                            $('select[name="district_id"]').append('<option value="' + value.district_id + '">' + value.district_name + '</option>');
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
