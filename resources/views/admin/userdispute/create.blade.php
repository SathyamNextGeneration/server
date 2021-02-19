@extends('layouts.admin')

@section('title', 'Add User Dispute')

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
          <li class="breadcrumb-item active">@lang('admin.dispute.update_dispute')</li>
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
<div class="panel">
<div class="panel-body container-fluid">
<div class="content-area py-1">
    <div class="container-fluid">
    	<div class="box box-block bg-white">
           <h5 class="example-title">@lang('admin.dispute.add_dispute')</h5>

            <form class="form-horizontal" action="{{route('admin.userdisputestore')}}" method="POST" enctype="multipart/form-data" role="form">
            	{{csrf_field()}}

				<div class="form-group row">
					<label for="user" class="col-md-3 col-form-label">@lang('admin.dispute.dispute_type')</label>
					<div class="col-md-6">
						<select class="form-control" name="dispute_type" id="dispute_type">
							<option value="user">User</option>
							<option value="provider">Driver</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="user" class="col-md-3 col-form-label">@lang('admin.dispute.dispute_user') / @lang('admin.dispute.dispute_provider')</label>

					<div class="col-md-6">
						<div class="input-group">
							<input class="form-control" type="text" value="{{ old('name') }}" name="name" id="namesearch" placeholder="username" required="" aria-describedby="basic-addon2" autocomplete="off">
						 	<span class="input-group-addon fa fa-search"  id="basic-addon2"></span>
						</div>
						<input type="hidden" name="user_id1" id="user_id1" value="">
					</div>
				</div>

				<div class="form-group row">
					<label for="lost_item_name" class="col-md-3 col-form-label">@lang('admin.lostitem.request')</label>
					<div class="col-md-6">
		                <table class="table table-striped table-bordered dataTable requestList">
		                    <thead>
		                        <tr>
		                            <th>Travel ID</th>
		                            <th>In </th>
		                            <th>For </th>
		                            <th>Select</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                   		<tr><td colspan="4">No results</td></tr>
		                    </tbody>
		                </table>
					</div>
				</div>

				<div class="form-group row">
					<label for="lost_item_name" class="col-md-3 col-form-label">@lang('admin.dispute.dispute_name')</label>
					<div class="col-md-6">
						<select class="form-control" name="dispute_name" id="dispute_name" required="">
							<option value="">Select</option>
						</select>
						<textarea style="display: none;margin-top:5px;" class="form-control" name="dispute_other" required id="dispute_other" placeholder="@lang('admin.dispute.dispute_name')">{{ old('dispute_other') }}</textarea>
					</div>
				</div>

				<div class="form-group row">
					<label for="" class="col-md-3 col-form-label"></label>
					<div class="col-md-6">
						<input type="hidden" name="is_admin" value="1" />
						<button type="submit" class="btn btn-primary">@lang('admin.dispute.add_dispute')</button>
						<a href="{{route('admin.userdisputes')}}" class="btn btn-default">@lang('admin.cancel')</a>
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
<link href="{{ asset('asset/css/jquery-ui.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('asset/js/jquery-ui.js') }}"></script>

<script type="text/javascript">
var sflag='';
get_disputes('user');
$("#dispute_type").on('change', function(){
	$("#namesearch").val('');
	$('.requestList tbody').html('<tr><td colspan="4">No Results</td></tr>');
	get_disputes($(this).val());
	$("#dispute_other").hide();
	$("#dispute_other").attr('required', false);
});

$("#dispute_name").on('change', function(){
	if($(this).val()=='others'){
		$("#dispute_other").show();
		$("#dispute_other").attr('required', true);
	}
	else{
		$("#dispute_other").hide();
		$("#dispute_other").attr('required', false);
	}
});

$('#namesearch').autocomplete({
    source: function(request, response) {
    	var url='{{ route("admin.usersearch") }}';
    	sflag=0;
    	if($("#dispute_type").val()=='provider'){
    		sflag=1;
    		url='{{ route("admin.userprovider") }}';
    	}
	    $.ajax
	    ({
	        type: "GET",
	        url: url,
	        data: {stext:request.term},
	        dataType: "json",
	        success: function(responsedata, status, xhr)
	        {
	            if (!responsedata.data.length) {
	                var data=[];
	                data.push({
	                        id: 0,
	                        label:"@lang('No Records')"
	                });
	                response(data);
	            }
	            else{
	             response( $.map(responsedata.data, function( item ) {
	                    var name_alias=item.first_name+" - "+item.id;
	                  	$('#user_id').val(item.id);
	                    return {
	                        value: name_alias,
	                        id: item.id
	                    }
	                }));
	            }
	        }
	    });
	},
	minLength: 2,
	change:function(event,ui)
	{
	    if (ui.item==null){
	        $("#namesearch").val('');
	        $("#namesearch").focus();
	    }
	    else{
	        if(ui.item.id==0){
	            $("#namesearch").val('');
	            $("#namesearch").focus();
	        }
	    }
	},
	select: function (event, ui) {

		$.ajax({
			url: "{{ route('admin.ridesearch') }}",
			type: 'post',
			data: {
				_token : '{{ csrf_token() }}',
				id: ui.item.id,
				sflag:sflag
			},
			success:function(data, textStatus, jqXHR) {
				var requestList = $('.requestList tbody');
				requestList.html(`<tr><td colspan="4">@lang('No Records')</td></tr>`);
				if(data.data.length > 0) {
					var result = data.data;
					for(var i in result) {
						requestList.html(`<tr><td>`+result[i].booking_id+`</td><td>`+result[i].s_address+`</td><td>`+result[i].d_address+`</td><td><input name="request_id" value="`+result[i].id+`" type="radio" /><input name="user_id" value="`+result[i].user_id+`" type="hidden" /><input name="provider_id" value="`+result[i].provider_id+`" type="hidden" /></td></tr>`);
					}
				} else {
					requestList.html(`<tr><td colspan="4">No Results</td></tr>`);
				}
			}
		});

	    $("#user_id1").val(ui.item.id);
	}
});

function get_disputes(dispute_type){
	$.ajax({
		url: "{{ url('admin/disputelist') }}",
		type: 'get',
		data: {
			dispute_type: dispute_type
		},
		success:function(data, textStatus, jqXHR) {
			$('#dispute_name').empty();
			$.each(data, function(key, value) {
			    $('#dispute_name').append($("<option/>", {
			        value: value.dispute_name,
			        text: value.dispute_name
			    }));
			});
			$('#dispute_name').append($("<option/>", {
		        value: 'others',
		        text: 'others'
			}));
			if(data.length > 0) {
				$("#dispute_other").hide();
				$("#dispute_other").attr('required', false);
			}
			else{
				$("#dispute_other").show();
				$("#dispute_other").attr('required', true);
			}
		}
	});
}

</script>
@endsection
