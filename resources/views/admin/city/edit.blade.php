@extends('layouts.admin')

@section('title', 'Add City')

@section('content')
<style>
.input-group{
	width: none;
}
.input-group .fa-search{
  display: table-cell;
}
</style>
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">@lang('admin.city.edit_city')</li>
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
    	
          <h5 class="example-title">@lang('admin.city.edit_city')</h5>
		
            <form class="form-horizontal" action="{{route('admin.city.update',$data->id)}}" method="POST" enctype="multipart/form-data" role="form">
            <div class="row  mb-4 p-4">
				{{csrf_field()}}

				<div class="form-group col-md-4 mb-4">

				<div class="form-group">
					<label for="" class="label">City * </label>
				<input type="text" name="title" class="form-control" value="{{ $data->title}}" required/>
				</div>
				</div>
				<div class="form-group col-md-4 mb-4">
				<div class="form-group">
					<label for="" class="label">State * </label>
					<select class="form-control" name="state_id">
						@foreach ($state as $id => $item)
						<option value="{{ $id}}" {{ $id==$data->state_id?'selected':''}}>{{ $item}}</option>
							
						@endforeach
					</select>
				</div>
				</div>
				<div class="form-group col-md-4 mb-4">
					<div class="form-group">
						<label for="" class="label">Status * </label>
						<label class="radio-inline"><input type="radio" value="active" name="status" {{ $data->status=='active'?'checked':''}}>Active</label>
						<label class="radio-inline"><input type="radio"  value="inactive" name="status" {{ $data->status=='inactive'?'checked':''}}>Inactive</label>
							
					</div>
				</div>
				

				<input type="hidden" id="latitude" name="latitude" value="0" />
				<input type="hidden"  id="longitude" name="longitude" value="0" />
					<div class="form-footer aproveReject col-12 text-right">
					
						<button type="submit" class="btn btn-primary">@lang('admin.city.add_city')</button>
						<a href="{{route('admin.city.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
				
				</div>
				</div>
				</div>
			</form>
		
    </div>
</div>
</div>
</div>
</div>
</div>
<link href="{{ asset('asset/css/jquery-ui.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('asset/js/jquery-ui.js') }}"></script>


@endsection
