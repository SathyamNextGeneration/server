@extends('layouts.admin')

@section('title', 'Add State')

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
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Edit State</li>
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
    	<h5 class="example-title">Edit State</h5>

            <form class="form-horizontal" action="{{url('admin/state/update/'.$data->id)}}" method="POST" enctype="multipart/form-data" role="form">
            <div class="row  mb-4 p-4">
				{{csrf_field()}}

				<div class="form-group col-md-4 mb-4">

				<div class="form-group">
					<label for="" class="label">State * </label>
				<input type="text" name="title" class="form-control" value="{{ $data->title}}" required/>
				</div>
				</div>
				<div class="form-group col-md-4 mb-4">
				<div class="form-group">
					<label for="" class="label">Letter * </label>
					<input type="text" name="letter" class="form-control" value="{{ $data->letter}}" required/>
				</div>
				</div>
				<div class="form-group col-md-4 mb-4">
					<div class="form-group">
						<label for="" class="label">Population * </label>
						<input type="text" name="population" class="form-control" value="{{ $data->population}}" required/>
					</div>
					</div>
					<div class="form-group col-md-4 mb-4">
						<div class="form-group">
							<label for="" class="label">ISO * </label>
							<input type="text" name="iso" class="form-control" value="{{ $data->iso}}" required/>
						</div>
						</div>
				
				
					<div class="form-footer aproveReject col-12 text-right">
					
						<button type="submit" class="btn btn-primary">Add State</button>
						<a href="{{route('admin.state.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
				
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
