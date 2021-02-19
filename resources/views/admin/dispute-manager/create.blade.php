@extends('layouts.admin')

@section('title', 'New Dispute Manager ')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">@lang('admin.dispute-manager.add_dispute_manager')</li>
        </ol>
        <div class="page-header-actions">
        
        <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="Back">
          <a href="{{ URL::previous() }}"> <i class="fa fa-angle-left" aria-hidden="true"></i> @lang('admin.back')</a>
        </button>
     
      </div>
</div>

<div class="page-content">
@if(Session::has('flash_success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_success') !!}</em></div>
@endif

@if(Session::has('flash_error'))
<div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_error') !!}</em>
</div>
@endif

<div class="panel add-subscription">
<div class="panel-body container-fluid">
<div class="content-area py-1">
    <div class="container-fluid">
       <h5 class="example-title">@lang('admin.dispute-manager.add_dispute_manager')</h5>

            <form class="form-horizontal" action="{{route('admin.dispute-manager.store')}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
                <div class="row  mb-4 p-4">
                <div class="form-group col-md-4 mb-4">
                    <label for="name">@lang('admin.account-manager.full_name')</label>
                    <div class="">
                        <input class="form-control" type="text" value="{{ old('name') }}" name="name" required id="name" placeholder="@lang('admin.account-manager.full_name')">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="email">@lang('admin.email')</label>
                    <div class="">
                        <input class="form-control" type="email" required name="email" value="{{old('email')}}" id="email" placeholder="@lang('admin.email')">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="password">@lang('admin.password')</label>
                    <div class="">
                        <input class="form-control" type="password" name="password" id="password" placeholder="@lang('admin.password')">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="password_confirmation">@lang('admin.account-manager.password_confirmation')</label>
                    <div class="">
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="@lang('admin.dispute-manager.password_confirmation')">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="mobile">@lang('admin.mobile')</label>
                   <input class="form-control" type="number" value="{{ old('mobile') }}" name="mobile" required id="mobile" placeholder="@lang('admin.mobile')">
                  
                </div>

                <div class="form-footer aproveReject col-12 text-right">
                    
                        <button type="submit" class="btn btn-primary">@lang('admin.dispute-manager.add_dispute_manager')</button>
                        <a href="{{route('admin.dispute-manager.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                  
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
