@extends('layouts.admin')

@section('title', 'Update Profile')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">@lang('admin.account.update_profile')</li>
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

              <div class="col-md-12 col-lg-6">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">@lang('admin.account.update_profile')</h4>
                 
                  <div class="example">
                  <form class="form-horizontal" action="{{route('admin.profile.update')}}" method="POST" enctype="multipart/form-data" role="form">
                     {{csrf_field()}}
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">@lang('admin.name'): </label>
                        <div class="col-md-9">
                        <input class="form-control" type="text" value="{{ Auth::guard('admin')->user()->name }}" name="name" required id="name" placeholder=" @lang('admin.name')">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">@lang('admin.email'): </label>
                        <div class="col-md-9">
                            <input class="form-control" type="email" required name="email" value="{{ isset(Auth::guard('admin')->user()->email) ? Auth::guard('admin')->user()->email : '' }}" id="email" placeholder="@lang('admin.email')">
                        </div>
                      </div>
                      <!-- <div class="form-group row">
                      <label class="col-md-3 form-control-label">@lang('user.profile.language')</label>
                        <div class="col-md-9">
                        @php($language=get_all_language())
                        <select class="form-control" name="language" id="language">
                            @foreach($language as $lkey=>$lang)
                            <option value="{{$lkey}}" @if(Auth::user()->language==$lkey) selected @endif>{{$lang}}</option>
                            @endforeach
                        </select>
                        </div>
                      </div> -->
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">@lang('admin.picture'): </label>
                        <div class="col-md-9">
                        @if(isset(Auth::guard('admin')->user()->picture))
                        <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="{{Auth::guard('admin')->user()->picture}}">
                        @endif
                        <input type="file" accept="image/*" name="picture" class=" dropify form-control-file" aria-describedby="fileHelp">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-9 offset-md-3">
                          <button type="submit" class="btn btn-primary">@lang('admin.account.update_profile') </button>
                          <button type="reset" class="btn btn-default btn-outline">Reset</button>
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
