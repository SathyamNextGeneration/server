@extends('layouts.admin')

@section('title', 'Edit Dispatcher ')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">@lang('admin.dispatcher.update_dispatcher')</li>
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
           <h5 class="example-title">@lang('admin.dispatcher.update_dispatcher')</h5>

            <form class="form-horizontal" action="{{route('admin.dispatch-manager.update', $dispatcher->id )}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">

                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">@lang('admin.account-manager.full_name')</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" value="{{ $dispatcher->name }}" name="name" required id="name" placeholder="Full Name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label">@lang('admin.email')</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" value="{{ $dispatcher->email }}" readonly="true" name="email" required id="email" placeholder="Full Name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mobile" class="col-md-3 col-form-label">@lang('admin.mobile')</label>
                    <div class="col-md-6">
                        <input class="form-control numbers" type="number" value="{{ $dispatcher->mobile }}" name="mobile" required id="mobile" placeholder="Mobile">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Repeat Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password_confirm">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="zipcode" class="col-md-3 col-form-label"></label>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">@lang('admin.dispatcher.update_dispatcher')</button>
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
