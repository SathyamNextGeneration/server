@extends('layouts.admin')

@section('title', 'Fleet Revenue' )
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
          <li class="breadcrumb-item active">Total Transaction (@lang('provider.current_balance') : {{currency($wallet_balance)}})</li>
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
            <h3 class="example-title">@lang('admin.include.fleet_ride_histroy')</h3>

            <!-- <div class="row">
                <div class="col-md-12">
                        <div class="box bg-white">
                            <div class="box-block clearfix">
                                <h5 class="float-xs-left"></h5>
                                <div class="float-xs-right">
                                </div>
                            </div> -->

                            @if(count($Fleets) != 0)
                            <table class="table table-striped" id="table-4">
                                <thead>
                                    <tr><td>S.No.</td>
                                        <td>@lang('admin.users.name')</td>
                                        <td>@lang('admin.mobile')</td>
                                        <td>Completed Trips</td>
                                        <td>Recipe</td>
                                        <td>@lang('admin.users.Joined_at')</td>
                                        <td>@lang('admin.users.Details')</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $diff = ['-success', '-info', '-warning', '-danger']; ?>
                                    @foreach($Fleets as $index => $fleet)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>
                                            {{$fleet->name}}
                                        </td>
                                        <td>
                                            {{$fleet->mobile}}
                                        </td>

                                        <td>
                                            @if($fleet->rides_count)
                                            {{$fleet->rides_count}}
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            @if($fleet->payment)
                                            {{currency($fleet->payment[0]->overall)}}
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            @if($fleet->created_at)
                                            <span class="text-muted">{{$fleet->created_at->diffForHumans()}}</span>
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.statement_fleet', $fleet->id)}}">View History</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                <tfoot>
                                    <tr>
                                        <td>@lang('admin.users.name')</td>
                                        <td>@lang('admin.mobile')</td>
                                        <td>Completed Trips</td>
                                        <td>Recipe</td>
                                        <td>@lang('admin.users.Joined_at')</td>
                                        <td>@lang('admin.users.Details')</td>
                                    </tr>
                                </tfoot>
                            </table>
                            @include('common.pagination')
                            @else
                            <h6 class="no-result">Results not found</h6>
                            @endif 

                        </div>
                    </div>

                <!-- </div>

            </div>

        </div> -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
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