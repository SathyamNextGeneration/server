@extends('layouts.admin')

@section('title', 'User Disputes ')
@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css"/>
@endsection
@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">@lang('admin.dispute.title1')</li>
        </ol>
        <div class="page-header-actions">
        @can('lost-item-create')
                <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="@lang('admin.dispute.add_dispute')">
                    <a href="{{ route('admin.userdisputecreate') }}"> <i class="icon wb-plus" aria-hidden="true"></i> @lang('admin.dispute.add_dispute')</a>
                </button>
            @endcan
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
                @if(Setting::get('demo_mode', 0) == 1)
                    <div class="col-md-12" style="height:50px;color:red;">
                        ** Demo Mode : @lang('admin.demomode')
                    </div>
                @endif
                <h5 class="example-title">@lang('admin.dispute.title1')</h5>
                <div class="table-responsive">
                <table class="table table-striped" id="table-5">
                    <thead>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.dispute.dispute_request') </th>
                            <th>@lang('admin.users.name') </th>                           
                            <th>@lang('admin.dispute.dispute_request_id') </th>
                            <th>@lang('admin.dispute.dispute_name') </th>                           
                            <th>@lang('admin.dispute.dispute_comments') </th>                           
                            <th>@lang('admin.dispute.dispute_refund') </th>                           
                            <th>@lang('admin.dispute.dispute_status') </th>                           
                            <th>@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($disputes as $index => $dispute)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $dispute->dispute_type == "provider" ? "Motorista" : "Passageiro" }}</td>
                            <td>@if($dispute->dispute_type=='user') @if($dispute->user != null) {{ $dispute->user->first_name." ".$dispute->user->last_name }} @endif @else  @if($dispute->provider != null)  {{ $dispute->provider->first_name." ".$dispute->provider->last_name }} @endif @endif</td>
                            <td>{{ $dispute->request->booking_id }}</td>
                            <td>{{ $dispute->dispute_name }}</td>
                            <td>{{ $dispute->comments }}</td>
                            <td>{{ currency($dispute->refund_amount) }}</td>
                            <td>
                                @if($dispute->status=='open')
                                    <span class="tag tag-success">Open</span>
                                @else
                                    <span class="tag tag-danger">Finished</span>
                                @endif
                            </td>
                            <td>
                                @can('dispute-edit')
                                    @if($dispute->status=='open')
                                        <a href="{{ route('admin.userdisputeedit', $dispute->id) }}" href="#" class="btn btn-info"><i class="fa fa-pencil"></i> To analyze</a>
                                    @endif   
                                @endcan 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.dispute.dispute_request') </th>
                            <th>@lang('admin.users.name') </th>                           
                            <th>@lang('admin.dispute.dispute_request_id') </th>
                            <th>@lang('admin.dispute.dispute_name') </th>                           
                            <th>@lang('admin.dispute.dispute_comments') </th>                           
                            <th>@lang('admin.dispute.dispute_refund') </th>                           
                            <th>@lang('admin.dispute.dispute_status') </th>                           
                            <th>@lang('admin.action')</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
                @include('common.pagination')
            </div>
            
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

<script type="text/javascript">
    $('#table-5').DataTable( {
        responsive: true,
        paging:true,
            info:false,
            dom: 'Bfrtip',
            buttons: [

            ]
    } );
</script>
@endsection