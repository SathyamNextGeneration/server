@extends('layouts.admin')

@section('title', 'Update User ')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">@lang('admin.admins.Add_User')</li>
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
       <h5 class="example-title">@lang('admin.admins.update_User')</h5>

            <form class="form-horizontal" action="{{route('admin.sub-admins.update', $user->id )}}" method="POST" role="form">
            <div class="row  mb-4 p-4">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group col-md-4 mb-4">
                    <label for="name">@lang('admin.name')</label>
                    <div class="">
                        <input class="form-control" type="text" value="{{ $user->name }}" name="name" required id="name" placeholder="First Name">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="name">@lang('admin.email')</label>
                    <div class="">
                        <input class="form-control" type="text" value="{{ $user->email }}" name="email" required id="email" placeholder="First Name">
                    </div>
                </div>


                <!-- <div class="form-group col-md-4 mb-4">
                    <label for="name">@lang('admin.name')</label>
                    <div class="">
                        <input class="form-control" type="password" value="" name="password" id="name" placeholder="First Name">
                    </div>
                </div>
                
                <div class="form-group col-md-4 mb-4">
                    <label for="name">@lang('admin.name')</label>
                    <div class="">
                        <input class="form-control" type="password" value="" name="password_confirmation" id="password_confirmation" placeholder="First Name">
                    </div>
                </div> -->

                <div class="form-group col-md-12 mb-4">
                    <label for="permission">@lang('admin.role')</label>
                    <div class="">
                        @foreach($roles as $role)
                        <label><input type="checkbox" @php if(in_array($role->id, $userRole)) { echo 'checked'; } @endphp value="{{ $role->id }}" name="roles[]" id="roles" />
                        {{ $role->name }}</label>
                        @endforeach
                    </div>
                </div>

                <div class="form-footer aproveReject col-12 text-right">
                   
                        <button type="submit" class="btn btn-primary">@lang('admin.admins.update_User')</button>
                        <a href="{{route('admin.sub-admins.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
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
