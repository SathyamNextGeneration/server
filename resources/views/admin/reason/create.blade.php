@extends('layouts.admin')
@section('title', 'New Reason for Cancellation ')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">@lang('admin.reason.title')</li>
        </ol>
        
        <div class="page-header-actions">
            <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
        </div>
      
</div>

<div class="page-content">
@if(Session::has('flash_success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_success') !!}</em></div>
@endif
<div class="panel add-subscription">
<div class="panel-body container-fluid">
<div class="content-area py-1">
    <div class="container-fluid">
       <h5 class="example-title">@lang('admin.reason.add_reason')</h5>

            <form class="form-horizontal" action="{{route('admin.reason.store')}}" method="POST" enctype="multipart/form-data" role="form">
            <div class="row  mb-4 p-4">
                {{csrf_field()}}
                <div class="form-group col-md-4 mb-4">
                    <label for="type">@lang('admin.reason.type')</label>
                    <div class="">
                        <select class="form-control" name="type" id="type">
                            <option value="">Select</option>
                            <option value="USER">User</option>
                            <option value="PROVIDER">Driver</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="reason">@lang('admin.reason.reason')</label>
                    <div class="">
                        <input class="form-control" autocomplete="off"  type="text" value="{{ old('reason') }}" name="reason" required id="reason" placeholder="@lang('admin.reason.reason')">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="max_amount">@lang('admin.reason.status')</label>
                    <div class="">
                        <select class="form-control" name="status" id="status">
                            <option value="">Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="form-footer aproveReject col-12 text-right">
                    
                        <button type="submit" class="btn btn-primary">@lang('admin.reason.add_reason')</button>
                        <a href="{{route('admin.reason.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                   
                </div>
                </div>
            </form>
    </div>
</div>

</div>
</div>
</div>
</div>

@endsection

