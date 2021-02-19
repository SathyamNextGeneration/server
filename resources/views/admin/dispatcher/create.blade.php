@extends('layouts.admin')

@section('title', 'Add Dispatcher ')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">@lang('admin.dispatcher.add_dispatcher')</li>
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
<div class="panel">
<div class="panel-body container-fluid">
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
           <h5 class="example-title">@lang('admin.dispatcher.add_dispatcher')</h5>

            <form class="form-horizontal" action="{{route('admin.dispatch-manager.store')}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">@lang('admin.account-manager.full_name')</label>
                    <div class="col-md-9    ">
                        <input class="form-control" type="text" value="{{ old('name') }}" name="name" required id="name" placeholder="@lang('admin.account-manager.full_name')">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label">@lang('admin.email')</label>
                    <div class="col-md-9    ">
                        <input class="form-control" type="email" required name="email" value="{{old('email')}}" id="email" placeholder="@lang('admin.email')">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-3 col-form-label">@lang('admin.password')</label>
                    <div class="col-md-9    ">
                        <input class="form-control" type="password" name="password" id="password" placeholder="@lang('admin.password')">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_confirmation" class="col-md-3 col-form-label">@lang('admin.account-manager.password_confirmation')</label>
                    <div class="col-md-9    ">
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="@lang('admin.account-manager.password_confirmation')">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mobile" class="col-md-3 col-form-label">@lang('admin.mobile')</label>
                    <div class="col-md-9    ">
                        <input class="form-control numbers" type="number" value="{{ old('mobile') }}" name="mobile" required id="mobile" placeholder="@lang('admin.mobile')">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="zipcode" class="col-md-3 col-form-label"></label>
                    <div class="col-md-9    ">
                        <button type="submit" class="btn btn-primary">@lang('admin.dispatcher.add_dispatcher')</button>
                        <a href="{{route('admin.dispatch-manager.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
    </div>
</div>
</div>
@endsection
