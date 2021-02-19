@extends('layouts.admin')

@section('title', 'Create Transfer ')

@section('content')

<?php
if ($type == 1) {
    $title = Lang::get('admin.prd_settle');
    $back_route = "admin.providertransfer";
} else {
    $title = Lang::get('admin.flt_settle');
    $back_route = "admin.fleettransfer";
}
?>
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
          <li class="breadcrumb-item active">{{$title}}</li>
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
       
            <h5 class="example-title">{{$title}}</h5>

            <form class="form-horizontal" action="{{route('admin.transferstore')}}" method="POST" enctype="multipart/form-data" role="form" autocomplete="off">

                {{csrf_field()}}
                <div class="form-group col-md-4 mb-4">
                    @if($type==1)
                    <label for="namesearch">@lang('admin.service.Provider_Name')</label>
                    @else
                    <label for="namesearch">@lang('admin.fleet.fleet_name')</label>
                    @endif
                    <input class="form-control " type="text" value="{{ old('name') }}" name="name" required id="namesearch" placeholder="Search by Name" >
                    <input type="hidden" name="stype" value="{{$type}}">
                    <input type="hidden" name="from_id" id="from_id" value="">
                </div>
                

                <div class="form-group col-md-4 mb-4">
                    <label for="amount">@lang('admin.amount')</label>
                    <div class="">
                        <input class="form-control" type="text" value="{{ old('amount') }}" name="amount" id="amount" placeholder="Enter the amount" required="" min="1">
                    </div>
                    <div class="">

                        <span class="showcal">
                            <i><b>Wallet Balance:
                                    <span id="wallet_balance">-</span>
                                </b></i>
                        </span>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="type">@lang('admin.type')</label>
                    <div class="">
                        <select class="form-control" name="type">
                            <option value="C">Credit</option>
                            <option value="D">Debit</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="send_by">@lang('admin.by')</label>
                    <div class="">
                        <select class="form-control" name="send_by">
                            <option value="online">Online</option>
                            <option value="online">Offline</option>
                        </select>
                    </div>
                </div>

                <div class="form-footer aproveReject col-12 text-right">
                  
                        <button type="submit" class="btn btn-primary">@lang('admin.settle')</button>
                        <a href="{{route($back_route)}}" class="btn btn-default">@lang('admin.cancel')</a>
                   
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

@section('script')

<script type="text/javascript" src="{{ asset('asset/js/jquery-ui.js') }}"></script>
<script src="{{asset('main/vendor/maskmoney/jquery.maskMoney.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
var sflag = '{{$type}}';
$('#namesearch').autocomplete({
    source: function (request, response) {
        $.ajax
                ({
                    type: "GET",
                    url: '{{ route("admin.transfersearch") }}',
                    data: {stext: request.term, sflag: sflag},
                    dataType: "json",
                    success: function (responsedata, status, xhr)
                    {
                        if (!responsedata.data.length) {
                            var data = [];
                            data.push({
                                id: 0,
                                label: "No Data"
                            });
                            response(data);
                        } else {
                            response($.map(responsedata.data, function (item) {
                                if (sflag == 1)
                                    var name_alias = item.first_name + " " +item.last_name + " - " + item.id;
                                else
                                    var name_alias = item.name + " - " + item.id;

                                return {
                                    value: name_alias,
                                    id: item.id,
                                    bal: item.wallet_balance
                                }
                            }));
                        }
                    }
                });
    },
    minLength: 2,
    change: function (event, ui)
    {
        if (ui.item == null) {
            $("#namesearch").val('');
            $("#namesearch").focus();
            $("#wallet_balance").text("-");
        } else {
            if (ui.item.id == 0) {
                $("#namesearch").val('');
                $("#namesearch").focus();
                $("#wallet_balance").text("-");
            }
        }
    },
    select: function (event, ui) {
        $("#from_id").val(ui.item.id);
        $("#wallet_balance").text(ui.item.bal);
    }
});

$('#amount').maskMoney()

</script>
@endsection
