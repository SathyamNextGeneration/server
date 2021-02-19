@extends('layouts.admin')

@section('title', 'Update Document ')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">@lang('admin.document.add_Document')</li>
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
    	
    	   <h5 class="example-title">@lang('admin.document.update_document')</h5>

            <form class="form-horizontal" action="{{route('admin.document.update', $document->id )}}" method="POST" enctype="multipart/form-data" role="form">
            <div class="row  mb-4 p-4">
              {{csrf_field()}}
            	<input type="hidden" name="_method" value="PATCH">
				<div class="form-group col-md-4 mb-4">
					<label for="name">@lang('admin.document.document_name')</label>
					<div class="">
						<input class="form-control" type="text" value="{{ $document->name }}" name="name" required id="name" placeholder="@lang('admin.document.document_name')">
					</div>
				</div>

                <div class="form-group col-md-4 mb-4">
                    <label for="name">@lang('admin.document.document_type')</label>
                    <div class="">
                        <select name="type" class="form-control">
                            <option value="DRIVER" @if($document->type == 'DRIVER') selected @endif>@lang('admin.document.driver_review')</option>
                            <option value="VEHICLE" @if($document->type == 'VEHICLE') selected @endif>@lang('admin.document.vehicle_review')</option>
                        </select>
                    </div>
                </div>

				<div class="form-footer aproveReject col-12 text-right">
				
						<button type="submit" class="btn btn-primary">@lang('admin.document.update_document')</button>
						<a href="{{route('admin.document.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
				
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
