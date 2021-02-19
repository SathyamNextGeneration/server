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
          <li class="breadcrumb-item active">Add State</li>
        </ol>
        @can('lost-item-create')
        <div class="page-header-actions">
                  <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="Add Role">
            <a href="{{ route('admin.state.create') }}"> <i class="icon wb-plus" aria-hidden="true"></i>Add State</a>
          </button>
        </div>
        @endcan
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
                <h5 class="example-title">Add State</h5>
             <table class="table table-striped" id="table-5">
                    <thead>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>Name </th>
                            <th>Letter </th>                           
                            <th>Population</th>                           
                            <th>ISO </th>                           
                                                     
                            <th>@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pagination as $index => $state)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $state->title }}</td>
                            <td>{{ $state->letter }}</td>
                            <td>{{ $state->population }}</td>
                            <td>{{ $state->iso }}</td>
                            
                            <td>
                                <a href="{{ route('admin.state.edit', $state->id) }}" href="#" class="btn btn-info waves-effect waves-classic waveieffect waves-classic"><i class="icon md-edit" aria-hidden="true"></i></a>
                                <a href="{{ url('admin/state/delete/'.$state->id) }}" href="#" class="btn btn-danger waves-effect waves-classic waves-effect waves-effect waves-classic"><i class="icon wb-close-mini"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>Name </th>
                            <th>Letter </th>                           
                            <th>Population</th>                           
                            <th>ISO </th>                             
                                                     
                            <th>@lang('admin.action')</th>
                        </tr>
                    </tfoot>
                </table>
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