@extends('layouts.admin')

@section('title', 'Fleets ')
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
    <li class="breadcrumb-item active">@lang('admin.fleet.add_new_fleet_owner')</li>
</ol>
@can('fleet-create')
<div class="page-header-actions">
            <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="@lang('admin.fleet.add_new_fleet_owner')">
    <a href="{{ route('admin.fleet.create') }}"> <i class="icon wb-plus" aria-hidden="true"></i> @lang('admin.fleet.add_new_fleet_owner')</a>
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
        <div class="col-md-12" style="hSetting::get('demo_mode', 0) == height:50px;color:red;">
                    ** Demo Mode : @lang('admin.demomode')
                </div>
                @endif
            <h5 class="example-title">
                @lang('admin.fleet.fleet_owners')
                @if(config('constants.demo_mode', 1) == 1)
                <span class="pull-right">(*personal information hidden in demo)</span>
                @endif
            </h5>
            <div class="table-responsive">
            <table class="table table-striped" id="table-2">
                <thead>
                    <tr>
                        <th>@lang('admin.id')</th>
                        <th>Franchise Name</th>
                        <th>@lang('admin.fleet.company_name')</th>
                        <th>@lang('admin.city')</th>
                        <th>@lang('admin.mobile')</th>
                        <th>@lang('admin.picture')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fleets as $index => $fleet)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $fleet->name }}</td>
                        <td>{{ $fleet->company }}</td>
                        <td>{{ isset($fleet->city) ? $fleet->city->title : '' }}</td>
                        <td>{{ $fleet->mobile }}</td>
                        <td><img src="{{img($fleet->logo)}}" style="height: 100px;"></td>
                        <td>
                            <form action="{{ route('admin.fleet.destroy', $fleet->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                @can('fleet-providers')
                                <a href="{{ route('admin.provider.index') }}?fleet={{$fleet->id}}" class="btn btn-info btn-sm"> @lang('admin.fleet.show_provider')</a>
                                @endcan

                                @if( Setting::get('demo_mode', 0) == 0)
                                @can('fleet-edit')
                                 <a href="{{ route('admin.fleet.edit', $fleet->id) }}" class="btn btn-info waves-effect waves-classic waves-effect waves-classic"><i class="icon md-edit" aria-hidden="true"></i></a>
                                 @endcan
                                 @can('fleet-delete')
                                <button class="btn btn-danger waves-effect waves-classic waves-effect waves-effect waves-classic" onclick="return confirm('Are you sure?')"><i class="icon wb-close-mini"></i></button>
                                @endcan
                                @endif

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>@lang('admin.id')</th>
                        <th>Franchise Name</th>
                        <th>@lang('admin.fleet.company_name')</th>
                        <th>@lang('admin.city')</th>
                        <th>@lang('admin.mobile')</th>
                        <th>@lang('admin.picture')</th>
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
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

<script type="text/javascript">
    $('#table-2').DataTable( {
        responsive: true,
        paging:true,
            info:false,
            dom: 'Bfrtip',
            buttons: [

            ]
    } );
</script>
@endsection