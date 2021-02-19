@extends('layouts.admin')

@section('title', 'Translation ')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Translation</li>
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
        	<div class="embed-responsive embed-responsive-16by9">
            	<iframe src="" allowfullscreen style="width: 100%;height: 800px;border:none;" class="embed-responsive-item"></iframe>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
</div>

@endsection
