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
                <h6 class="card-body-title">Add New Division</h6>
                <form action=" {{ route('division-add') }} " method="post">
                    @csrf
                    <div class="row mg-t-10 form-group  {{ $errors->has('division_name') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Division Name: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Division Name"
                                name="division_name" value="{{ old('division_name') }}">

                            @error('division_name')
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
                <h6 class="card-body-title">All Divisions</h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap table-primary mg-b-0">
                        <thead>
                            <tr>
                                <th class="wd-70p"> Division Name</th>
                                <th class="wd-30p">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($divisions as $division)
                            <tr>
                                <td> {{ $division->division_name }} </td>

                                <td>
                                    <a href=" {{ url('admin/division-edit/'.$division->division_id  ) }} " class="btn btn-primary" title="Edit"><i class="tx-18 fa fa-pencil-square-o"></i></a>
                                    <a href=" {{ url('admin/division-delete/'.$division->division_id  ) }} " class="btn btn-danger" title="Delete" id="delete"><i class="tx-18 fa fa-trash"></i></a>
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

                    // var value = $('select#searchItype_id option:selected').val(response.itemInfos[0].itype_id);
                    // let element = document.getElementById('searchItype_id');
                    // element.value = response.itemInfos[0].itype_id;

                    // let catg = document.getElementById('searchIcateg_id');
                    // catg.value = response.itemInfos[0].icatg_id;

                    // let subCatg = document.getElementById('searchIsubCateg_id');
                    // subCatg.value = response.itemInfos[0].iscatg_id;

                    // let itemCode = document.getElementById('searchItemCode');
                    // itemCode.value = response.itemInfos[0].item_deta_code;

</script>

@endsection
