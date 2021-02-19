@extends('layouts.admin')

@section('title', 'Update Account Manager ')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Account</li>
        </ol>
        <div class="page-header-actions">
          <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="Back">
            <a href="{{ URL::previous() }}"> <i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
          </button>
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
       
            <h5 class="example-title">@lang('admin.account-manager.update_account_manager')</h5>

            <form class="form-horizontal" action="{{route('admin.account-manager.update', $account->id )}}" method="POST" enctype="multipart/form-data" role="form">
            <div class="row  mb-4 p-4">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">

                <div class="form-group col-md-4 mb-4">
                    <label for="name">@lang('admin.account-manager.full_name')</label>
                    <div class="">
                        <input class="form-control" type="text" value="{{ $account->name }}" name="name" required id="name" placeholder="@lang('admin.account-manager.full_name')">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="email">@lang('admin.email')</label>
                    <div class="">
                        <input class="form-control" type="text" value="{{ $account->email }}" name="email" required id="email" placeholder="@lang('admin.email')">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="mobile">@lang('admin.mobile')</label>
                    <div class="">
                        <input class="form-control" type="number" value="{{ $account->mobile }}" name="mobile" required id="mobile" placeholder="@lang('admin.mobile')">
                    </div>
                </div>
                
                <div class="form-group col-md-4 mb-4">
                    <label>@lang('admin.password')</label>
                    <div class="">
                        <input type="password" class="form-control" name="password" placeholder="@lang('admin.password')">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label>@lang('admin.account-manager.password_confirmation')</label>
                    <div class="">
                        <input type="password" class="form-control" name="password_confirm" placeholder="@lang('admin.account-manager.password_confirmation')">
                    </div>
                </div>

                <div class="form-footer aproveReject col-12 text-right">
                  
                        <button type="submit" class="btn btn-primary">@lang('admin.account-manager.update_account_manager')</button>
                        <a href="{{route('admin.account-manager.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
            
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
