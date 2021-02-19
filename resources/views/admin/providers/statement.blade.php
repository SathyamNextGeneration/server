@extends('layouts.admin')

@section('title', $page)

@section('content')
<!-- //TODO ALLAN - Alterações débito na máquina e voucher -->
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">Statement</li>
        </ol>
        <!-- <div class="page-header-actions">
        <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="@lang('admin.back')">
            <a href="{{ URL::previous() }}"> <i class="fa fa-angle-left" aria-hidden="true"></i> @lang('admin.back')</a>
          </button>
        </div> -->
</div>

<div class="page-content">
@if(Session::has('flash_success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_success') !!}</em></div>
@endif
<div class="panel add-subscription">
<div class="panel-body container-fluid">
<div class="content-area py-1">
    <div class="container-fluid">
       
            <h3>{{$page}}</h3>
            @if(isset($statement_for) && $statement_for =="provider")
            <p>Nome: <b>{{$Provider->first_name}} {{$Provider->last_name}}</b></p>
            <p>Telefone: <b>{{$Provider->mobile}}</b></p>
            <p>E-mail: <b>{{$Provider->email}}</b></p>
            @endif
            <div class="datemenu" style="visibility: hidden;">
                <span>
                    <a style="cursor:pointer" id="tday" class="showdate badge badge-lg badge-warning">Today</a>
                    <a style="cursor:pointer" id="yday" class="showdate badge badge-lg badge-warning ">Yesterday</a>
                    <a style="cursor:pointer" id="cweek" class="badge badge-lg badge-warning showdate">This week</a>
                    <a style="cursor:pointer" id="pweek" class="badge badge-lg badge-warning showdate">Last week</a>
                    <a style="cursor:pointer" id="cmonth" class="badge badge-lg badge-warning showdate">This month</a>
                    <a style="cursor:pointer" id="pmonth" class="badge badge-lg badge-warning showdate">Last month</a>
                    <a style="cursor:pointer" id="cyear" class="badge badge-lg badge-warning showdate">This year</a>
                    <a style="cursor:pointer" id="pyear" class="badge badge-lg badge-warning showdate">Last year</a>
                </span>
            </div>	
            
            <div class="clearfix" style="margin-top: 15px;">
                
                <form class="form-horizontal" action="{{route('admin.ride.statement.range')}}" method="GET" enctype="multipart/form-data" role="form">
                <div class="row  mb-4 p-4">
                    <div class="form-group col-md-4 mb-4">
                        <label for="name">In</label>
                       
                            @if(isset($statement_for) && $statement_for =="provider")
                            <input type="hidden" name="provider_id" id="provider_id" value="{{$id}}">
                            @elseif(isset($statement_for) && $statement_for =="user")
                            <input type="hidden" name="user_id" id="user_id" value="{{$id}}">
                            @elseif(isset($statement_for) && $statement_for =="fleet")
                            <input type="hidden" name="fleet_id" id="fleet_id" value="{{$id}}">
                            @endif
                            <input class="form-control" type="date" name="from_date" id="from_date" required placeholder="Date of">
                       
                    </div>

                    <div class="form-group col-md-4 mb-4">
                        <label for="email">Up until</label>
                       
                            <input class="form-control" type="date" required name="to_date" id="to_date" placeholder="Date to">
                       
                    </div>
                    
                    <div class="form-group col-md-4 mb-4">
                        <label for="email">Status</label>
                       
                            <select class="form-control" name="payment_status">
                                <option value="all">Select</option>
                                <option value="paid">Paid out</option>
                                <option value="not_paid">Unpaid</option>
                            </select>
                      
                    </div>
                    
                    <div class="form-group col-md-4 mb-4">
                        <label for="email">Payment</label>
                      
                            <select class="form-control" name="payment_mode">
                                <option value="all">Select</option>
                                <option value="cash">Cash</option>
                                <option value="card">Credit card</option>
                                <option value="debit_machine">Machine debit</option>
                                <option value="voucher">Voucher</option>
                            </select>
                    
                    </div>
                    
                    <div class="form-footer aproveReject col-12 text-right">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
                </form>
            </div>

<div style="text-align: center;padding: 20px;color: blue;font-size: 24px;">
    @if(isset($statement_for) && $statement_for =="provider")
    <p><strong>
            <span>@lang('admin.dashboard.over_earning') : {{currency($revenue[0]->overall)}}</span>
            <br>
            <span>@lang('admin.dashboard.over_commission') : {{currency($revenue[0]->commission)}}</span>
        </strong></p>
    @elseif(isset($statement_for) && $statement_for =="user")
    <span>@lang('admin.dashboard.over_commission') : {{currency($revenue[0]->commission)}}</span>
    @elseif(isset($statement_for) && $statement_for =="fleet")
    <span>@lang('admin.dashboard.over_commission') :
        {{currency($revenue[0]->overall - $revenue[0]->commission)}}</span>
    @else
    <span>@lang('admin.dashboard.over_commission') : {{currency($revenue[0]->commission)}}</span>
    @endif
</div>

            <div class="row">

                <div class="col-lg-4  col-md-12">
                    <div class="box box-block tile tile-1 mb-2"  style="border-top-color: #3e70c9 !important;">
                        <div class="t-icon right"><span class="bg-danger" style="background-color: #3e70c9 !important;"></span><i class="ti-rocket"></i></div>
                        <div class="t-content">
                            <h6 class="text-uppercase mb-1">@lang('admin.dashboard.Rides')</h6>
                            <h1 class="mb-1">{{$pagination->total}}</h1>
                            <i class="fa fa-caret-up text-success mr-0-5"></i><span>Trips started</span>
                        </div>
                    </div>
                </div>

                @if(isset($statement_for) && $statement_for !="user")
                <div class="col-lg-4  col-md-12">
                    <div class="box box-block tile tile-1 mb-2" style="border-top-color: #4bcb73 !important;">
                        <div class="t-icon right"><span class="bg-success" style="background-color: #4bcb73 !important;"></span><i class="ti-money"></i></div>
                        <div class="t-content">
                            <h6 class="text-uppercase mb-1">@lang('admin.dashboard.Revenue')</h6>
                            <h1 class="mb-1">{{currency($revenue[0]->overall)}}</h1>
                            <i class="fa fa-caret-up text-success mr-0-5"></i><span>in {{$pagination->total}} travels</span>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-4  col-md-12">
                    <div class="box box-block tile tile-1 mb-2" style="border-top-color: #4bcb73 !important;">
                        <div class="t-icon right"><span class="bg-success" style="background-color: #4bcb73 !important;"></span><i class="ti-money"></i></div>
                        <div class="t-content">
                            <h6 class="text-uppercase mb-1">@lang('admin.dashboard.total')</h6>
                            <h1 class="mb-1">{{currency($revenue[0]->overall)}}</h1>
                            <i class="fa fa-caret-up text-success mr-0-5"></i><span>in {{$pagination->total}} travels</span>
                        </div>
                    </div>
                </div>
                @endif

                <div class="col-lg-4  col-md-12">
                    <div class="box box-block tile tile-1 mb-2" style="border-top-color: #f44236 !important;">
                        <div class="t-icon right"><span class="bg-primary" style="background-color: #f44236 !important;"></span><i class="ti-bar-chart"></i></div>
                        <div class="t-content">
                            <h6 class="text-uppercase mb-1">@lang('admin.dashboard.cancel_rides')</h6>
                            <h1 class="mb-1">{{$cancel_rides}}</h1>
                            <i class="fa fa-caret-down text-danger mr-0-5"></i><span>Canceled trips</span>
                        </div>
                    </div>
                </div>

                <div class="row row-md mb-2" style="padding: 15px;">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-block clearfix">
                                <h5 class="float-md-left">{{$listname}}</h5>
                                <div class="float-md-right">
                                </div>
                            </div>

                            @if(count($rides) != 0)
                            <table class="table table-striped table-bordered dataTable" id="table-4">
                                <thead>
                                    <tr>
                                        <th>@lang('admin.request.Booking_ID')</th>
                                        <th>Request Type</th>
                                        <th>@lang('admin.request.picked_up')</th>
                                        <th>@lang('admin.request.dropped')</th>
                                        @if(isset($statement_for) && $statement_for !="user")
                                        <th>@lang('admin.request.commission')</th>
                                        @endif
                                        @if(isset($statement_for) && $statement_for !="user")
                                        <th>@lang('admin.request.earned')</th>
                                        @else
                                        <th>@lang('admin.dashboard.total')</th>
                                        @endif
                                        <th>@lang('admin.request.date')</th>
                                        <th>@lang('admin.request.status')</th>
                                        <th>@lang('admin.request.Payment_Mode')</th>
                                        <th>@lang('admin.request.Payment_Status')</th>
                                        <th>@lang('admin.request.request_details')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $diff = ['-success', '-info', '-warning-lg', '-danger']; ?>
                                    @foreach($rides as $index => $ride)
                                    <tr>
                                        <td>{{$ride->booking_id}}</td>
                                        @if($ride->service_required =='none')
                                        <td >Daily Ride</td>
                                        @elseif($ride->service_required =='rental')
                                        <td >Rental</td>
                                        @elseif($ride->service_required =='outstation')
                                        <td >Out Station</td>
                                        @endif
                                        <td>
                                            @if($ride->s_address != '')
                                            {{$ride->s_address}}
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if($ride->d_address != '')
                                            {{$ride->d_address}}
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        @if(isset($statement_for) && $statement_for !="user")
                                        <td>{{currency($ride->payment['commision'])}}</td>
                                        @endif
                                        @if(isset($statement_for) && $statement_for !="user")
                                        <td>{{currency($ride->payment['total'])}}</td>
                                        @else
                                        <td>{{currency($ride->payment['total'])}}</td>
                                        @endif
                                        <td>
                                            <span class="text-muted">{{date('d M Y',strtotime($ride->created_at))}}</span>
                                        </td>
                                        <td>
                                            @if($ride->status == "COMPLETED")
                                            <span class="tag tag-success">DONE</span>
                                            @elseif($ride->status == "CANCELLED")
                                            <span class="tag tag-danger">CANCELED</span>
                                            @else
                                            <span class="tag tag-info">{{$ride->status}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($ride->payment_mode == "CASH")
                                            CASH
                                            @elseif($ride->payment_mode == "DEBIT_MACHINE")
                                            DEBIT MACHINE
                                            @elseif($ride->payment_mode == "VOUCHER")
                                                VOUCHER
                                            @elseif($ride->payment_mode == "CARD")
                                            CARD
                                            @elseif($ride->payment_mode != null)
                                                {{$ride->payment_mode}}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if($ride->paid)
                                            Paid out
                                            @else
                                            Unpaid
                                            @endif
                                        </td>
                                        <td>
                                            <a class="text-primary" href="{{route('admin.requests.show',$ride->id)}}"><span class="underline">See Details</span></a>									
                                        </td>
                                    </tr>
                                    @endforeach

                                <tfoot>
                                    <tr>
                                        <th>@lang('admin.request.Booking_ID')</th>
                                        <th>@lang('admin.request.picked_up')</th>
                                        <th>@lang('admin.request.dropped')</th>
                                        @if(isset($statement_for) && $statement_for !="user")
                                        <th>@lang('admin.request.commission')</th>
                                        @endif
                                        @if(isset($statement_for) && $statement_for !="user")
                                        <th>@lang('admin.request.earned')</th>
                                        @else
                                        <th>@lang('admin.dashboard.total')</th>
                                        @endif
                                        <th>@lang('admin.request.date')</th>
                                        <th>@lang('admin.request.status')</th>
                                        <th>@lang('admin.request.Payment_Mode')</th>
                                        <th>@lang('admin.request.Payment_Status')</th>
                                        <th>@lang('admin.request.request_details')</th>
                                    </tr>
                                </tfoot>
                            </table>
                            @include('common.pagination')
                            @else
                            <h6 class="no-result">There are no records</h6>
                            @endif 

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(".showdate").on('click', function () {
        var ddattr = $(this).attr('id');
        //console.log(ddattr);
        if (ddattr == 'tday') {
            $("#from_date").val('{{$dates["today"]}}');
            $("#to_date").val('{{$dates["today"]}}');
        } else if (ddattr == 'yday') {
            $("#from_date").val('{{$dates["yesterday"]}}');
            $("#to_date").val('{{$dates["yesterday"]}}');
        } else if (ddattr == 'cweek') {
            $("#from_date").val('{{$dates["cur_week_start"]}}');
            $("#to_date").val('{{$dates["cur_week_end"]}}');
        } else if (ddattr == 'pweek') {
            $("#from_date").val('{{$dates["pre_week_start"]}}');
            $("#to_date").val('{{$dates["pre_week_end"]}}');
        } else if (ddattr == 'cmonth') {
            $("#from_date").val('{{$dates["cur_month_start"]}}');
            $("#to_date").val('{{$dates["cur_month_end"]}}');
        } else if (ddattr == 'pmonth') {
            $("#from_date").val('{{$dates["pre_month_start"]}}');
            $("#to_date").val('{{$dates["pre_month_end"]}}');
        } else if (ddattr == 'pyear') {
            $("#from_date").val('{{$dates["pre_year_start"]}}');
            $("#to_date").val('{{$dates["pre_year_end"]}}');
        } else if (ddattr == 'cyear') {
            $("#from_date").val('{{$dates["cur_year_start"]}}');
            $("#to_date").val('{{$dates["cur_year_end"]}}');
        } else {
            alert('invalid dates');
        }
    });
</script>
@endsection