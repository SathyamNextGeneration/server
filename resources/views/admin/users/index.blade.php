@extends('layouts.admin')

@section('title', 'Users ')
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
          <li class="breadcrumb-item active">@lang('admin.users.Users')</li>
        </ol>
        <div class="page-header-actions">
            @can('user-create')
            <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="Add New">
                <a href="{{ route('admin.user.create') }}"> <i class="icon wb-plus" aria-hidden="true"></i> Add New</a>
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
            <h5 class="example-title">
                    @lang('admin.users.Users')
            </h5>
            
            <form action="{{ route('admin.user.index') }}" method="get">
                <div class="form-group row col-md-12" style="padding-left:0 !important; padding-right:0 !important; margin-bottom: 20px;">
                    <div class="col-md-6">
                        <input name="name" type="text" class="form-control" placeholder="User Name or Email" aria-label="User name" aria-describedby="basic-addon2">
                    </div>

                    <div class="col-md-3">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>

                    
                </div>
            </form>
            <div class="table-responsive">
            <table class="table  table-striped" id="exampleTableTools">
                <thead>
                    <tr>
                        <th>@lang('admin.id')</th>
                        <th>Avatar</th>
                        <th>@lang('admin.first_name')</th>
                        <th>@lang('admin.last_name')</th>
                        <th>@lang('admin.email')</th>
                        <th>@lang('admin.mobile')</th>
                        <th>@lang('admin.users.Rating')</th>
                        <th>@lang('admin.users.Wallet_Amount')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @php($page = ($pagination->currentPage-1)*$pagination->perPage)
                    @foreach($users as $index => $user)
                    @php($page++)
                    <tr>
                        <td>{{ $page }}</td>
                        <td><span class="avatar">
                            <img src="{{img($user->picture)}}" alt="" with="40px;" height="40px;">
                            <i></i>
                        </span></td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        @if(Setting::get('demo_mode', 0) == 1)
                        <td>{{ substr($user->email, 0, 3).'****'.substr($user->email, strpos($user->email, "@")) }}</td>
                        @else
                        <td>{{ $user->email }}</td>
                        @endif
                        @if(Setting::get('demo_mode', 0) == 1)
                        <td>+919876543210</td>
                        @else
                        <td>{{ $user->mobile }}</td>
                        @endif
                        <td>{{ $user->rating }}</td>
                        <td>{{currency($user->wallet_balance)}}</td>
                        <td>
                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                @can('user-history')
                                <a href="{{ route('admin.user.request', $user->id) }}" class="btn btn-info btn-sm"><i class="fa fa-search"></i> @lang('admin.History')</a>
                                @endcan
                                @if( Setting::get('demo_mode', 0) == 0)

                                @can('user-create')
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-info waves-effect waves-classic waves-effect waves-classic"><i class="icon md-edit" aria-hidden="true"></i></a>
                                @endcan

                                @can('user-delete')
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
                        <th>@lang('admin.first_name')</th>
                        <th>@lang('admin.last_name')</th>
                        <th>@lang('admin.email')</th>
                        <th>@lang('admin.mobile')</th>
                        <th>@lang('admin.users.Rating')</th>
                        <th>@lang('admin.users.Wallet_Amount')</th>
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
@endsection

@section('script')
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

    $('#exampleTableTools').DataTable( {
        responsive: true,
        paging:true,
        searching: false,
            info:false,
            dom: 'Bfrtip',
            buttons: [
// 'copyHtml5',
//                 'excelHtml5',
//                 'csvHtml5',
//                 'pdfHtml5'
            ]
    } );
</script>
@endsection
