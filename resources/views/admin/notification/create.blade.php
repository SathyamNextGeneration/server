@extends('layouts.admin')

@section('title', 'Add Notification ')

@section('content')
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" />
<link rel="stylesheet" type="text/css" href="{{asset('asset/css/jquery-ui.css')}}" />
<div class="page">
    <div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a>
            </li>
            <li class="breadcrumb-item active">@lang('admin.notification.add')</li>
        </ol>
        <div class="page-header-actions">
            <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip"
                data-original-title="@lang('admin.notification.add')">
                <a href="{{ URL::previous() }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i>
                    @lang('admin.back')</a>
            </button>
        </div>
    </div>

    <div class="page-content">
        @if(Session::has('flash_success'))
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_success')
                !!}</em></div>
        @endif
        <div class="panel add-subscription">
            <div class="panel-body container-fluid">
                <div class="content-area py-1">
                    <div class="container-fluid">
                        <h5 class="example-title">@lang('admin.notification.add')</h5>
                        <form class="form-horizontal" action="{{route('admin.notification.store')}}" method="POST"
                            enctype="multipart/form-data" role="form">
                            <div class="row  mb-4 p-4">
                                {{csrf_field()}}

                                <div class="form-group col-md-4 mb-4">
                                    <label for="notify_type">@lang('admin.notification.notify_type')</label>
                                    <div class="">
                                        <select name="notify_type" class="form-control">
                                            <option value="all">All</option>
                                            <option value="user">Users</option>
                                            <option value="provider">Drivers</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-4 mb-4">
                                    <label for="picture">@lang('admin.notification.notify_image')</label>
                                    <div class="">
                                        <input type="file" accept="image/*" name="image"
                                            class="dropify form-control-file" id="picture" aria-describedby="fileHelp">
                                    </div>
                                </div>

                                <div class="form-group col-md-4 mb-4">
                                    <label for="notify_desc">@lang('admin.notification.notify_desc')</label>
                                    <div class="">
                                        <input class="form-control" autocomplete="off" type="text"
                                            value="{{ old('description') }}" name="description" required
                                            id="description" placeholder="@lang('admin.notification.notify_desc')">
                                    </div>
                                </div>

                                <div class="form-group col-md-4 mb-4">
                                    <label for="expiry_date">@lang('admin.notification.notify_expiry')</label>
                                    <div class="">
                                        <input class="form-control datetimepicker" id="datetimepicker"
                                            autocomplete="off" type="text" value="{{ old('expiry_date') }}"
                                            name="expiry_date" required id="expiry_date"
                                            placeholder="@lang('admin.notification.notify_expiry')">
                                    </div>
                                </div>

                                <div class="form-group col-md-4 mb-4">
                                    <label for="notify_status">@lang('admin.notification.notify_status')</label>
                                    <div class="">
                                        <select name="status" class="form-control">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-footer aproveReject col-12 text-right">

                                    <button type="submit"
                                        class="btn btn-primary">@lang('admin.notification.add')</button>
                                    <a href="{{route('admin.notification.index')}}"
                                        class="btn btn-default">@lang('admin.cancel')</a>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js">
</script>
<script type="text/javascript" src="{{asset('asset/js/moment-with-locales.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
    //your code here
    $(function () {
        $('#datetimepicker').datetimepicker();
    });
});

</script>
@endsection