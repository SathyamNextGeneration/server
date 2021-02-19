@extends('layouts.admin')

@section('title', 'Lost Items ')
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
          <li class="breadcrumb-item active">@lang('admin.lostitem.title')</li>
        </ol>
        <div class="page-header-actions">
        @can('lost-item-create')
          <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="@lang('admin.lostitem.add')">
            <a href="{{ route('admin.lostitem.create') }}"> <i class="icon wb-plus" aria-hidden="true"></i> @lang('admin.lostitem.add')</a>
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
            <h5 class="example-title">@lang('admin.lostitem.title')</h5>
           
           
            <div class="table-responsive">
            <table class="table table-striped" id="lostitem">
                <thead>
                    <tr>
                        <th>@lang('admin.id')</th>
                        <th>@lang('admin.lostitem.lost_id') </th>
                        <th>@lang('admin.lostitem.lost_user') </th>                           
                        <th>@lang('admin.lostitem.lost_item') </th>
                        <th>@lang('admin.lostitem.lost_comments') </th>                           
                        <th>@lang('admin.lostitem.lost_status') </th>                           
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lostitem as $index => $lost)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $lost->request_id }}</td>
                        <td>{{ $lost->user_id }}</td>
                        <td>{{ $lost->lost_item_name }}</td>
                        <td>{{ $lost->comments }}</td>
                        <td>
                            @if($lost->status=='open')
                            <span class="tag tag-success">Open</span>
                            @else
                            <span class="tag tag-danger">Closed</span>
                            @endif
                        </td>
                        <td>
                            @if( Setting::get('demo_mode', 0) == 0)
                            @can('lost-item-edit')
                            @if($lost->status=='open')
                            <a href="{{ route('admin.lostitem.edit', $lost->id) }}" href="#" class="btn btn-info waves-effect waves-classic waves-effect waves-classic"><i class="icon md-edit" aria-hidden="true"></i></a>
                            @endif   
                            @endcan 
                            @endif                                
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>@lang('admin.id')</th>
                        <th>@lang('admin.lostitem.lost_id') </th>
                        <th>@lang('admin.lostitem.lost_user') </th>                           
                        <th>@lang('admin.lostitem.lost_item') </th>
                        <th>@lang('admin.lostitem.lost_comments') </th>                           
                        <th>@lang('admin.lostitem.lost_status') </th>                           
                        <th>@lang('admin.action')</th>
                    </tr>
                </tfoot>
            </table>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script type="text/javascript">
 $('#lostitem').DataTable( {
        responsive: true,
        paging:true,
            info:false,
            dom: 'Bfrtip',
            buttons: [

            ]
    } );

</script>
@endsection