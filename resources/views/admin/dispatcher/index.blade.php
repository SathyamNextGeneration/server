@extends('layouts.admin')

@section('title', 'Dispatcher ')
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
          <li class="breadcrumb-item active"> @lang('admin.dispatcher.dispatcher')
          @if(Setting::get('demo_mode', 0) == 1)
                <span class="pull-right">(*personal information hidden in demo)</span>
                @endif
        </li>
        </ol>
        @can('dispatcher-providers')
        <div class="page-header-actions">
                  <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="@lang('admin.dispatcher.add_new_dispatcher')">
            <a href="{{ route('admin.dispatch-manager.create') }}"> <i class="icon wb-plus" aria-hidden="true"></i> @lang('admin.dispatcher.add_new_dispatcher')</a>
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
            <h5 class="example-title">
                @lang('admin.dispatcher.dispatcher')
                @if(Setting::get('demo_mode', 0) == 1)
                <span class="pull-right">(*personal information hidden in demo)</span>
                @endif
            </h5>
            @can('dispatcher-providers')
            <a href="{{ route('admin.dispatch-manager.create') }}" style="margin-left: 1em;" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> @lang('admin.dispatcher.add_new_dispatcher')</a>
            @endcan
            <table class="table table-striped" id="table-4">
                <thead>
                    <tr>
                        <th>@lang('admin.id')</th>
                        <th>@lang('admin.account-manager.full_name')</th>
                        <th>@lang('admin.email')</th>
                        <th>@lang('admin.mobile')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dispatchers as $index => $dispatcher)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $dispatcher->name }}</td>
                        @if(Setting::get('demo_mode', 0) == 1)
                        <td>{{ substr($dispatcher->email, 0, 3).'****'.substr($dispatcher->email, strpos($dispatcher->email, "@")) }}</td>
                        @else
                        <td>{{ $dispatcher->email }}</td>
                        @endif
                        @if(Setting::get('demo_mode', 0) == 1)
                        <td>+919876543210</td>
                        @else
                        <td>{{ $dispatcher->mobile }}</td>
                        @endif
                        <td>
                            <form action="{{ route('admin.dispatch-manager.destroy', $dispatcher->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{ route('admin.dispatch-manager.edit', $dispatcher->id) }}" class="btn btn-info waves-effect waves-classic waveieffect waves-classic"><i class="icon md-edit" aria-hidden="true"></i></a>
                                <button class="btn btn-danger waves-effect waves-classic waves-effect waves-effect waves-classic" onclick="return confirm('Are you sure?')"><i class="icon wb-close-mini"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>@lang('admin.id')</th>
                        <th>@lang('admin.account-manager.full_name')</th>
                        <th>@lang('admin.email')</th>
                        <th>@lang('admin.mobile')</th>
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