@extends('layouts.admin')

@section('title', 'Add Rental Hour Package ')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">Add Rental Hour Package</li>
        </ol>
        <div class="page-header-actions">
        
        <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="Back">
        <a href="{{ route('admin.servicerentalhourpackage.index') }}?service_type_id={{Request::get('service_type_id')}}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> @lang('admin.back')</a>
        </button>
     
      </div>
</div>

<div class="page-content">
@if(Session::has('flash_success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_success') !!}</em></div>
@endif
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            

            <h5 style="margin-bottom: 2em;">Add Rental Hour Package</h5>

            <form class="form-horizontal" action="{{route('admin.servicerentalhourpackage.store')}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
                <div class="form-group row">
                    <label for="hour" class="col-md-2 col-form-label">Hour</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" value="{{ old('hour') }}" name="hour" required id="hour" placeholder="Hour">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="km" class="col-md-2 col-form-label">KM</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" value="{{ old('km') }}" name="km" required id="km" placeholder="KM">
                    </div>
                </div>  
                <div class="form-group row">
                    <label for="price" class="col-md-2 col-form-label">Price</label>
                    <div class="col-md-6">
                        <input class="form-control" type="number" value="{{ old('price') }}" name="price" required id="price" placeholder="Price"> 
                        <input class="form-control" type="hidden" value="{{ Request::get('service_type_id') }}" name="service_type_id">
                    </div>
                </div>               
                
                <div class="form-group row">
                    <label for="zipcode" class="col-md-12 col-form-label"></label>
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-primary">Add Rental Hour Package</button>
                        <a href="{{route('admin.servicerentalhourpackage.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
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
