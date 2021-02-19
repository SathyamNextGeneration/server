@extends('layouts.admin')

@section('title', 'Service Rental Hour Package ')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">Rental Hour Package</li>
        </ol>
        <div class="page-header-actions">
        
        <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="Back">
            <a href="{{ route('admin.servicerentalhourpackage.create') }}?service_type_id={{Request::get('service_type_id')}}" style="margin-left: 1em;" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Add Rental Hour Package</a>
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
                <table class="table table-striped table-bordered dataTable" id="table-2">
                    <thead>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>Hour</th>
                            <th>KM</th>
                            <th>Price</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($package as $index => $packages)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$packages->hour}}</td>
                            <td>{{$packages->km}}</td>
                            <td>{{$packages->price}}</td>
                            
                            
                            <td>
                                <form action="{{ route('admin.servicerentalhourpackage.destroy', $packages->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    @if( Setting::get('demo_mode') == 0)
                                    <a href="{{ route('admin.servicerentalhourpackage.edit', $packages->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i> @lang('admin.edit')</a>
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> @lang('admin.delete')</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>Hour</th>
                            <th>KM</th>
                            <th>Price</th>
                            <th>Action</th> 
                            
                        </tr>
                    </tfoot>
                </table>
            </div>
            
        </div>
    </div>
    </div>
</div>
</div>
</div>
@endsection