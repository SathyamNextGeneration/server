@extends('layouts.admin')

@section('title', 'Drivers ')

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
          <li class="breadcrumb-item active">@lang('admin.provides.providers')</li>
        </ol>
        <div class="page-header-actions">
        @can('provider-create')
          <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="@lang('admin.provides.add_new_provider')">
            <a href="{{ route('admin.provider.create') }}"> <i class="icon wb-plus" aria-hidden="true"></i> @lang('admin.provides.add_new_provider')</a>
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
                @lang('admin.provides.providers')
            </h5>
                        
            <form action="{{ route('admin.provider.index') }}" method="get">
                
                <div class="form-group row col-md-12" style="padding-left:0 !important; padding-right:0 !important; margin-bottom: 20px;">
                    <div class="col-md-4">
                        <input name="name" type="text" class="form-control" placeholder="Driver Name" aria-label="Driver Name" aria-describedby="basic-addon2">
                    </div>

                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="A" class="radio"{{ request()->has('status')&&request()->get('status')=="A"?" checked":"" }}> Regularized
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="P" class="radio"{{ request()->has('status')&&request()->get('status')=="P"?" checked":"" }}> Pending Docs
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="F" class="radio"{{ request()->has('status')&&request()->get('status')=="F"?" checked":"" }}> Missing Docs
                        </label>
                    </div>
                    <div class="col col-md-3"><button class="btn btn-primary" type="submit">Search</button></div>
                    <div class="col">
                        
                    </div>
                </div>                
            </form>
            
            
            <table class="table table-striped" id="table-5">
                <thead>
                    <tr>
                        <th>@lang('admin.id')</th>
                        <td>Avatar</td>
                        <th>@lang('admin.provides.full_name')</th>
                        <th>@lang('admin.email')</th>
                        <th>@lang('admin.mobile')</th>
                        <th>@lang('admin.users.Wallet_Amount')</th>
                        <th>@lang('admin.provides.total_requests')</th>
                        <th>@lang('admin.provides.accepted_requests')</th>
                        <!-- <th>@lang('admin.provides.created_at')</th> -->
                        @can('provider-documents')
                        <th>@lang('admin.provides.service_type')</th>
                        @endcan
                        <th>@lang('admin.provides.online')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                {{-- @php($page = ($pagination->currentPage-1)*$pagination->perPage) --}}
                @foreach($providers as $index => $provider)
                {{-- @php($page++) --}}
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><span class="avatar
                            @if($provider->service)
                                @if($provider->service->status == 'active')
                                    avatar-online
                                @else
                                    avatar-offline
                                @endif
                            @else
                                avatar-busy
                            @endif
                            ">
                        <img src="{{img($provider->avatar)}}" alt="" with="40px;" height="40px;">
                        <i></i>
                        </span></td>
                        <td>{{ $provider->first_name }} {{ $provider->last_name }}</td>
                        @if(Setting::get('demo_mode', 0) == 1)
                        <td>{{ substr($provider->email, 0, 3).'****'.substr($provider->email, strpos($provider->email, "@")) }}</td>
                        @else
                        <td>{{ $provider->email }}</td>
                        @endif
                        @if(Setting::get('demo_mode', 0) == 1)
                        <td>+919876543210</td>
                        @else
                        <td>{{ $provider->mobile }}</td>
                        @endif
                        <td>
                            @if($provider->wallet_balance < 0)
                                <label style="cursor: default;" class="btn small btn-block btn-danger btn-sm">{{ currency($provider->wallet_balance) }}</label>
                            @elseif($provider->wallet_balance == 0)
                                <label style="cursor: default;" class="btn small btn-block btn-warning btn-sm">{{ currency($provider->wallet_balance) }}</label>
                            @else
                                <label style="cursor: default;" class="btn small btn-block btn-success btn-sm">{{ currency($provider->wallet_balance) }}</label>
                            @endif
                        </td>
                        <td>{{ $provider->total_requests() }}</td>
                        <td>{{ $provider->accepted_requests() }}</td>
                        <!-- <td>{{ $provider->created_at->format('d/m/Y H:i:s') }}</td> -->
                        @can('provider-documents')
                        <td>
                            @if($provider->active_documents() == $total_documents && $provider->service != null)
                                 <a class="btn btn-success btn-block btn-sm" href="{{route('admin.provider.document.index', $provider->id )}}">Verified</a>
                            @else
                                <a class="btn btn-danger btn-block label-right btn-sm" href="{{route('admin.provider.document.index', $provider->id )}}">Pending<span class="btn-label"> [ {{ $provider->pending_documents() }} ]</span></a>
                            @endif
                        </td>
                        @endcan
                        <td>
                            @if($provider->service)
                                @if($provider->service->status == 'active')
                                    <label class="btn btn-block btn-primary btn-sm">Yes</label>
                                @else
                                    <label class="btn btn-block btn-warning btn-sm">No</label>
                                @endif
                            @else
                                <label class="btn btn-block btn-danger btn-sm">N/A</label>
                            @endif
                        </td>
                        <td>
                            <div class="input-group-btn">
                                @can('provider-status')
                                @if($provider->status == 'approved')
                                <a class="btn btn-danger btn-sm btn-block" href="{{ route('admin.provider.disapprove', $provider->id ) }}">Disable</a>
                                @else
                                <a class="btn btn-success btn-sm btn-block" href="{{ route('admin.provider.approve', $provider->id ) }}">To approve</a>
                                @endcan
                                @endif
                            @if($user->hasAnyPermission(['provider-history', 'provider-statements', 'provider-edit','provider-delete']))
                                <button type="button"
                                    class="btn btn-info btn-block dropdown-toggle btn-sm"
                                    data-toggle="dropdown">@lang('admin.action')
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    @can('provider-history')
                                    <li>
                                        <a href="{{ route('admin.provider.request', $provider->id) }}" class="dropdown-item"><i class="fa fa-search"></i> @lang('admin.History')</a>
                                    </li>
                                    @endcan
                                        <li>
                                            <a href="{{ route('admin.provider.password', $provider->id) }}" class="dropdown-item"><i class="fa fa-user-secret"></i> @lang('admin.provides.password')</a>
                                        </li>
                                    @can('provider-statements')
                                    <li>
                                        <a href="{{ route('admin.provider.statement', $provider->id) }}" class="dropdown-item"><i class="fa fa-account"></i> @lang('admin.Statements')</a>
                                    </li>
                                    @endcan
                                    @if( Setting::get('demo_mode', 0) == 0)
                                    @can('provider-edit')
                                    <li>
                                        <a href="{{ route('admin.provider.edit', $provider->id) }}" class="dropdown-item"><i class="fa fa-pencil"></i> @lang('admin.edit')</a>
                                    </li>
                                    @endcan
                                    @endif
                                    @can('provider-delete')
                                    <li>
                                        <form action="{{ route('admin.provider.destroy', $provider->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            @if( Setting::get('demo_mode', 0) == 0)
                                            <a class="dropdown-item" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i>@lang('admin.delete')</a>
                                            @endif
                                        </form>
                                    </li>
                                    @endcan
                                </ul>
                            @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>@lang('admin.id')</th>
                        <th>@lang('admin.provides.full_name')</th>
                        <th>@lang('admin.email')</th>
                        <th>@lang('admin.mobile')</th>
                        <th>@lang('admin.users.Wallet_Amount')</th>
                        <th>@lang('admin.provides.total_requests')</th>
                        <th>@lang('admin.provides.accepted_requests')</th>
                        <!-- <th>@lang('admin.provides.created_at')</th> -->
                        @can('provider-documents')
                        <th>@lang('admin.provides.service_type')</th>
                        @endcan
                        <th>@lang('admin.provides.online')</th>
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
        searching: false,
            info:false,
            dom: 'Bfrtip',
            buttons: [
            ]
    } );
</script>
@endsection
