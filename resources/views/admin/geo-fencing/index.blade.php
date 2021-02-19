@extends('layouts.admin')

@section('title', 'Geo Fencings')

@section('content')
<div class="page">
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a>
            </li>
            <li class="breadcrumb-item active">Geo Fencings</li>
        </ol>
        <div class="page-header-actions">

            <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip"
                data-original-title="Back">
                <a href="{{ route('admin.geo-fencing.create') }}" style="margin-left: 1em;"
                    class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add</a>
            </button>

        </div>
    </div>

    <div class="page-content">
        @if(Session::has('flash_success'))
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_success')
                !!}</em></div>
        @endif
        <div class="content-area py-1">
            <div class="container-fluid">
                <div class="box box-block bg-white">
                    @if(Setting::get('demo_mode') == 1)
                    <div class="col-md-12" style="height:50px;color:red;">
                        ** Demo Mode : No Permission to Edit and Delete.
                    </div>
                    @endif


                    <table class="table table-striped table-bordered dataTable" id="table-2">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>City Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($geo_fencings as $index => $geo)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $geo->city_name }}</td>
                                <td>
                                    <form action="{{ route('admin.geo-fencing.destroy', $geo->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        @if( Setting::get('demo_mode') == 0)
                                        <a href="{{ route('admin.geo-fencing.edit', $geo->id) }}"
                                            class="btn btn-info btn-block">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <button class="btn btn-danger btn-block"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>City Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection