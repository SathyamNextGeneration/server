@extends('layouts.admin')

@section('title', 'Drivers Earnings ')
@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css"/>
@endsection
@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">Drivers Earnings</li>
        </ol>
        
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
            <h3 class="example-title">@lang('admin.include.provider_earnings')</h3>

            <div class="row">
                <div class="col-md-12">
                        <div class="box bg-white">
                            <div class="box-block clearfix">
                                <!-- <h5 class="float-xs-left"></h5> -->
                                <div class="float-xs-right">
                                </div>
                            </div>

                            @if(count($Providers) != 0)
                            <table class="table table-striped" id="table-4">
                                <thead>
                                    <tr>
                                        <td>S.No.</td>
                                        <td>@lang('admin.provides.provider_name')</td>
                                        <td>@lang('admin.mobile')</td>
                                        <td>@lang('admin.status')</td>
                                        <td>@lang('admin.provides.Total_Rides')</td>
                                        <td>@lang('admin.provides.Total_Earning')</td>
                                        <td>@lang('admin.provides.Commission')</td>
                                        <td>@lang('admin.provides.Joined_at')</td>
                                        <td>@lang('admin.provides.Details')</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $diff = ['-success', '-info', '-warning', '-danger']; ?>
                                    @foreach($Providers as $index => $provider)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>
                                            {{$provider->first_name}}
                                            {{$provider->last_name}}
                                        </td>
                                        <td>
                                            {{$provider->mobile}}
                                        </td>
                                        <td>
                                            @if($provider->status == "approved")
                                                <span class="tag tag-success">Approved</span>
                                            @elseif($provider->status == "banned")
                                                <span class="tag tag-danger">Banned</span>
                                            @elseif($provider->status == "document")
                                                <span class="tag tag-warning">Awaiting validation</span>
                                            @elseif($provider->status == "onboarding")
                                                <span class="tag tag-danger">Missing Documents</span>
                                            @else
                                                <span class="tag tag-info">{{$provider->status}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($provider->rides_count)
                                            {{$provider->rides_count}}
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            @if($provider->payment)
                                            {{currency($provider->payment[0]->overall)}}
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            @if($provider->payment)
                                            {{currency($provider->payment[0]->commission)}}
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            @if($provider->created_at)
                                            <span class="text-muted">{{$provider->created_at->diffForHumans()}}</span>
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.statement', $provider->id)}}">View History</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                <tfoot>
                                    <tr>
                                        <td>@lang('admin.provides.provider_name')</td>
                                        <td>@lang('admin.mobile')</td>
                                        <td>@lang('admin.status')</td>
                                        <td>@lang('admin.provides.Total_Rides')</td>
                                        <td>@lang('admin.provides.Total_Earning')</td>
                                        <td>@lang('admin.provides.Commission')</td>
                                        <td>@lang('admin.provides.Joined_at')</td>
                                        <td>@lang('admin.provides.Details')</td>
                                    </tr>
                                </tfoot>
                            </table>
                            @include('common.pagination')
                            @else
                            <h6 class="no-result">Results not found</h6>
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
@section('script')
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script type="text/javascript">
   $('#table-4').DataTable( {
        responsive: true,
        paging:true,
            info:false,
            dom: 'Bfrtip',
            buttons: [
            ]
    } );

</script>
@endsection