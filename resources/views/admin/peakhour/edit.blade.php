@extends('layouts.admin')

@section('title', 'Actualize Peak Time ')

@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/bootstrap-material-datetimepicker.css') }}" />
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">@lang('admin.peakhour.update_time')</li>
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
    	<h5 class="example-title">@lang('admin.peakhour.update_time')</h5>

            <form class="form-horizontal" action="{{route('admin.peakhour.update', $peakhour->id )}}" method="POST" enctype="multipart/form-data" role="form">
			<div class="row  mb-4 p-4">
				{{csrf_field()}}
            	<input type="hidden" name="_method" value="PATCH">				
				
				<div class="form-group col-md-4 mb-4">
					<label for="start_time">@lang('admin.peakhour.start_time')</label>
					<div class="">
						<input class="form-control" autocomplete="off"  type="text" value="{{ date('h:i A', strtotime($peakhour->start_time)) }}" name="start_time" required id="start_time" placeholder="@lang('admin.peakhour.start_time')">
					</div>
				</div>

				<div class="form-group col-md-4 mb-4">
					<label for="end_time">@lang('admin.peakhour.end_time')</label>
					<div class="">
						<input class="form-control" autocomplete="off"  type="text" value="{{ date('h:i A', strtotime($peakhour->end_time)) }}" name="end_time" required id="end_time" placeholder="@lang('admin.peakhour.end_time')">
					</div>
				</div>

				<div class="form-footer aproveReject col-12 text-right">
					
						<button type="submit" class="btn btn-primary">@lang('admin.peakhour.update_time')</button>
						<a href="{{route('admin.peakhour.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
				
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


@section('script')
<script type="text/javascript" src="{{asset('asset/js/moment.js')}}"></script>
<script type="text/javascript" src="{{asset('asset/js/bootstrap-material-datetimepicker.js')}}"></script>

<script type="text/javascript">
$(document).ready(function()
{    
    $('#start_time').bootstrapMaterialDatePicker({  
        format: 'hh:mm A' ,
        date: false,
     });
    $('#end_time').bootstrapMaterialDatePicker({  
        format: 'hh:mm A' ,
        date: false,
     });

});  
</script>
@endsection