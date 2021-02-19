@extends('layouts.admin')

@section('title', 'Transfers ')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Pending request @if($type=='provider')Drivers @else Fleets @endif</li>
        </ol>
        @if($type=='provider') @php($flag=1) @else @php($flag=2) @endif
        <!-- <div class="page-header-actions">
                  <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round waves-effect waves-classic" data-toggle="tooltip" data-original-title="Add New Driver">
                  @if(Setting::get('demo_mode', 0) == 0)
                    <a href="{{route('admin.transfercreate', $flag)}}" style="margin-left: 1em;" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> @lang('admin.addsettle')</a>
                @endif
                </button>
        </div> -->
        
        @if(Setting::get('demo_mode', 0) == 0)
        <div class="page-header-actions">
                        <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round waves-effect waves-classic" data-toggle="tooltip" data-original-title="@lang('admin.addsettle')">
                <a href="{{route('admin.transfercreate', $flag)}}"> <i class="icon wb-plus" aria-hidden="true"></i> @lang('admin.addsettle')</a>
            </button>
        </div>
        @endif
        
        
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
                @if(Setting::get('demo_mode', 0) == 1)
                <div class="col-md-12" style="hSetting::get('demo_mode', 0) == 0eight:50px;color:red;">
                    ** Demo Mode : No Permission to create or send settlements.
                </div>
                @endif
                <h5 class="example-title">Pending request @if($type=='provider')Drivers @else Fleets @endif</h5>

               
                <table class="table table-striped" id="table-4">
                    <thead>
                        <tr>
                            <th>@lang('admin.sno')</th>
                            <th>@lang('admin.transaction_ref')</th>
                            <th>@lang('admin.datetime')</th>
                            @if($type=='provider')
                                <th>@lang('admin.provides.provider_name')</th>
                            @else
                                <th>@lang('admin.fleet.fleet_name')</th>
                            @endif        
                            <th>@lang('admin.amount')</th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                       @php($total=0)
                       @foreach($pendinglist as $index=>$pending)
                            @php($total+=$pending->amount)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$pending->alias_id}}</td>                               
                                <td>{{$pending->created_at->diffForHumans()}}</td>
                                @if($type=='provider')
                                    <td>{{$pending->provider->first_name." ".$pending->provider->last_name}} </td>
                                @endif
                                @if($type=='fleet')
                                    <td>{{$pending->fleet->name}} </td>
                                @endif
                                <td>{{currency($pending->amount)}}</td>
                                <td> 
                                    @if( Setting::get('demo_mode', 0) == 0)                                   
                                        <!-- <a class="btn btn-success btn-block" href="{{ route('admin.approve', $pending->id) }}">@lang('admin.approve')</a> -->
                                        <button type="button" class="btn btn-success btn-block transferClass" data-toggle="modal" data-target="#transferModal" data-id="send" data-href="{{route('admin.approve', $pending->id) }}" data-rid="{{$pending->id}}">@lang('admin.approve')</button>
                                        <!-- <a class="btn btn-danger btn-block" href="{{ route('admin.cancel') }}?id={{$pending->id}}">@lang('admin.cancel')</a> -->

                                        <button type="button" class="btn btn-danger btn-block transferClass" data-toggle="modal" data-target="#transferModal" data-id="cancel" data-href="{{ route('admin.cancel') }}?id={{$pending->id}}" data-rid="{{$pending->id}}">@lang('admin.cancel')</button>
                                    @endif    
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

    <!-- Modal -->
    <div id="transferModal" class="modal fade" role="dialog" data-backdrop="static" aria-hidden="true" data-keyboard="false">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            <h4 class="modal-title" id="settitle"></h4>
          </div>
          <form action="" method="Get" id="transurl">
          <div class="modal-body">
            <div id="sendbody" style="display:none">
                <div class="form-group row">
                    <label for="send_by" class="col-xs-3 col-form-label" required>Payment</label>
                    <div class="col-xs-5">
                        <select class="form-control" name="send_by" id="send_by">
                            @if(config("constants.card")==1)
                                <option value="online">Stripe</option>
                            @endif    
                            @if(config("constants.cash")==1)    
                                <option value="offline">Money</option>
                            @endif                         
                        </select>
                    </div>
                </div>
                <div id="show_alert_text" class="alert alert-warning alert-dismissible" style="display:none">
                    <strong>Attention!</strong> <span id="setbody">Are you sure you want to complete this transaction in cash mode?</span>
                </div>
            </div>
            <div id="cancelbody" style="display:none">
                <input type="hidden" value="" name="id" id="transfer_id">
                <div class="alert alert-warning alert-dismissible">
                    <strong>Atenção!</strong> <span id="setbody">Are you sure you want to cancel this transaction?</span>
                </div>
            </div>    
          </div>
          <div class="modal-footer">
            @if(config("constants.card")==1 || config("constants.cash")==1)
                <!-- <a class="btn btn-success" href="#" id="transurl">Confirm</a> -->
                <button type="submit" class="btn btn-success">Confirmar</button>
            @endif    
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

@section('script')
<script type="text/javascript">
    var card='{{config("constants.card")}}';
    @if(config("constants.card")==0)
        $("#show_alert_text").show();
    @endif
    $(function () {
        $(".transferClass").click(function () {
            var curl = $(this).attr('data-href');
            var page = $(this).attr('data-id');
            $("#transurl").attr('action',curl);
            if(page=='send'){
                $("#settitle").text('Confirmar Transferência');
                $("#cancelbody").hide();
                $("#sendbody").show();
                $("#send_by").on('change', function(){
                    var ddval=$("#send_by").val();
                    if(ddval=="offline"){
                        $("#show_alert_text").show();
                    }
                    else{
                        $("#show_alert_text").hide();
                    }
                })
                
            }
            else{
                $("#transfer_id").val($(this).attr('data-rid'));
                $("#settitle").text('Cancelar Transferência');
                $("#sendbody").hide();
                $("#cancelbody").show();
            }
            
        })
    });
</script>
@endsection