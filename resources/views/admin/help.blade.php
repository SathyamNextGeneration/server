@extends('layouts.admin')

@section('title', 'Help ')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Help</li>
        </ol>
     
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
                We would like to thank you for deciding to use our script. We like to create it and hope you enjoy using it to achieve your goals :) If you want something better to better meet the needs of your business, please contact us: contato@programmerweb.com.br
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
