@extends('layouts.admin')

@section('title', 'Update Dispute ')

@section('content')
<div class="page">
<div class="page-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">@lang('admin.dispute.update_dispute')</li>
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
<div class="panel add-subscription">
<div class="panel-body container-fluid">
<div class="content-area py-1">
    <div class="container-fluid">
    	
    	   <h5 class="example-title">@lang('admin.dispute.update_dispute')</h5>

            <form class="form-horizontal" action="{{route('admin.dispute.update', $dispute->id )}}" method="POST" enctype="multipart/form-data" role="form">
			<div class="row  mb-4 p-4">
				{{csrf_field()}}
            	<input type="hidden" name="_method" value="PATCH">				
				
				<div class="form-group col-md-4 mb-4">
					<label for="dispute_type">@lang('admin.dispute.dispute_type')</label>
					<div class="">
						<select name="dispute_type" class="form-control">
							<option value="user" @if($dispute->dispute_type=='user')selected @endif>User</option>
							<option value="provider" @if($dispute->dispute_type=='provider')selected @endif>Driver</option>
						</select>
					</div>
				</div>

				<div class="form-group col-md-4 mb-4">
					<label for="dispute_name">@lang('admin.dispute.dispute_name')</label>
					<div class="">
						<input class="form-control" autocomplete="off"  type="text" value="{{ $dispute->dispute_name }}" name="dispute_name" required id="dispute_name" placeholder="@lang('admin.dispute.dispute_name')">
					</div>
				</div>

				<div class="form-group col-md-4 mb-4">
					<label for="dispute_status">@lang('admin.dispute.dispute_status')</label>
					<div class="">
						<select name="dispute_status" class="form-control">
							<option value="active" @if($dispute->status=='active')selected @endif>Active</option>
							<option value="inactive" @if($dispute->status=='inactive')selected @endif>Inactive</option>
						</select>
					</div>
				</div>

				<div class="form-footer aproveReject col-12 text-right">
					
						<button type="submit" class="btn btn-primary">@lang('admin.dispute.update_dispute')</button>
						<a href="{{route('admin.dispute.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
				
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
