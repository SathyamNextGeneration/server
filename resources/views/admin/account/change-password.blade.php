@extends('layouts.admin')

@section('title', 'Change Password')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Password</li>
        </ol>
        <!-- <div class="page-header-actions">
          <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="Edit">
            <i class="icon wb-pencil" aria-hidden="true"></i>
          </button>
          <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="Refresh">
            <i class="icon wb-refresh" aria-hidden="true"></i>
          </button>
          <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="Setting">
            <i class="icon wb-settings" aria-hidden="true"></i>
          </button>
        </div> -->
</div>

<div class="page-content">
@if(Session::has('flash_success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_success') !!}</em></div>
@endif
<div class="panel">
<div class="panel-body container-fluid">
<div class="row row-lg">
<div class="col-md-12 col-lg-9">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">@lang('admin.account.change_password')</h4>
                  <div class="example">
                  <form class="form-horizontal" action="{{route('admin.password.update')}}" method="POST" role="form">
                    {{csrf_field()}}
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">@lang('admin.account.old_password'): </label>
                        <div class="col-md-9">
                        <input class="form-control" type="password" name="old_password" id="old_password" placeholder="@lang('admin.account.old_password')">
                          @if($errors->has('old_password'))
                              <div class="error">{{ $errors->first('old_password') }}</div>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">@lang('admin.account.password'): </label>
                        <div class="col-md-9">
                        <input class="form-control" type="password" name="password" id="password" placeholder="@lang('admin.account.password')">
                        @if($errors->has('password'))
                              <div class="error">{{ $errors->first('password') }}</div>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">@lang('admin.account.password_confirmation'): </label>
                        <div class="col-md-9">
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="@lang('admin.account.password_confirmation')">
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <div class="col-md-9 offset-md-3">
                          <button type="submit" class="btn btn-primary">@lang('admin.account.change_password')</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- End Example Horizontal Form -->
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection