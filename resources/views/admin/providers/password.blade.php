@extends('layouts.admin')
@section('title', 'Change Driver Password')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">Change Password </li>
        </ol>
        <div class="page-header-actions">
        <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="@lang('admin.back')">
            <a href="{{ URL::previous() }}"> <i class="fa fa-angle-left" aria-hidden="true"></i> @lang('admin.back')</a>
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
          
                        <h5 class="example-title">Change password</h5>
                        <form class="form-horizontal"  action="{{ route('admin.provider.password',['id'=>$provider->id]) }}" method="POST" role="form">
                        <div class="row  mb-4 p-4">
                            @csrf
                            @method('PATCH')
                          
                                <div class="form-group col-md-4 mb-4">
                                    <div class="form-group">
                                        <label for="">password:</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mb-4">
                                    <div class="form-group">
                                        <label for="">Repeat Password:</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-footer aproveReject col-12 text-right">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
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

@section('scripts')

@endsection
