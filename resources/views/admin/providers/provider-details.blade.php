@extends('layouts.admin')

@section('title', 'Driver Details ')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">@lang('admin.provides.Provider_Details') </li>
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
<div class="panel">
<div class="panel-body container-fluid">
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <h4 class="example-title">@lang('admin.provides.Provider_Details')</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="box bg-white user-1">
                        <?php $background = asset('admin/assets/img/photos-1/4.jpg'); ?>
                        <div class="u-img img-cover" style="background-image: url({{$background}});"></div>
                        <div class="u-content">
                            <div class="avatar box-64">
                                <img class="b-a-radius-circle shadow-white" src="{{img($provider->picture)}}" alt="">
                                <i class="status bg-success bottom right"></i>
                            </div>
                            <p class="text-muted">
                                @if($provider->is_approved == 1)
                                <span class="tag tag-success">@lang('admin.provides.Approved')</span>
                                @else
                                <span class="tag tag-success">@lang('admin.provides.Not_Approved')</span>
                                @endif
                            </p>
                            <h5><a class="text-black" href="#">{{$provider->first_name}} {{$provider->last_name}}</a></h5>
                            <p class="text-muted">@lang('admin.email') : {{$provider->email}}</p>
                            <p class="text-muted">@lang('admin.mobile') : {{$provider->mobile}}</p>
                            <p class="text-muted">@lang('admin.gender') : {{$provider->gender}}</p>
                            <p class="text-muted">@lang('admin.address') : {{$provider->address}}</p>
                            <p class="text-muted">
                                @if($provider->is_activated == 1)
                                <span class="tag tag-warning">">@lang('admin.provides.Activated')</span>
                                @else
                                <span class="tag tag-warning">">@lang('admin.provides.Not_Activated')</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
