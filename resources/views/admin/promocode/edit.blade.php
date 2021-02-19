@extends('layouts.admin')

@section('title', 'Update Promotional Coupon ')

@section('content')
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" />
<link rel="stylesheet" type="text/css" href="{{asset('asset/css/jquery-ui.css')}}" />
<div class="page">
    <div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">@lang('admin.promocode.update_promocode')</li>
        </ol>
        <div class="page-header-actions">

            <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip"
                data-original-title="@lang('admin.back')">
                <a href="{{ URL::previous() }}"> <i class="fa fa-angle-left" aria-hidden="true"></i>
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

                        <h5 class="example-title">@lang('admin.promocode.update_promocode')</h5>

                        <form class="form-horizontal" action="{{route('admin.promocode.update', $promocode->id )}}"
                            method="POST" enctype="multipart/form-data" role="form">
                            <div class="row  mb-4 p-4">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PATCH">

                                <div class="form-group col-md-6 mb-6">
                                    <label for="promo_code">@lang('admin.promocode.promocode')</label>
                                    <div class="">
                                        <input class="form-control" type="text" value="{{ $promocode->promo_code }}"
                                            name="promo_code" required id="promo_code"
                                            placeholder="@lang('admin.promocode.promocode')">
                                    </div>
                                </div>

                                <div class="form-group col-md-6 mb-6">
                                    <label for="percentage">@lang('admin.promocode.percentage')</label>
                                    <div class="">
                                        <input class="form-control" type="number" value="{{ $promocode->percentage }}"
                                            name="percentage" required id="percentage"
                                            placeholder="@lang('admin.promocode.percentage')">
                                    </div>
                                </div>

                                <div class="form-group col-md-4 mb-4">
                                    <label for="max_amount">@lang('admin.promocode.max_amount')</label>
                                    <div class="">
                                        <input type="number" class="form-control" name="max_amount" required
                                            id="max_amount" placeholder="@lang('admin.promocode.max_amount')"
                                            value="{{$promocode->max_amount}}">
                                    </div>
                                </div>


                                <div class="form-group col-md-4 mb-4">
                                    <label for="expiration">@lang('admin.promocode.expiration')</label>
                                    <div class="">
                                        <input class="form-control datetimepicker" type="text"
                                            value="{{ $promocode->expiration }}" name="expiration" required
                                            id="expiration" placeholder="@lang('admin.promocode.expiration')">
                                    </div>
                                </div>

                                <div class="form-group col-md-4 mb-4">
                                    <label for="promo_description">@lang('admin.promocode.promo_description')</label>
                                    <div class="">
                                        <textarea id="promo_description" placeholder="Description" class="form-control"
                                            name="promo_description">{{ $promocode->promo_description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-footer aproveReject col-12 text-right">

                                    <button type="submit"
                                        class="btn btn-primary">@lang('admin.promocode.update_promocode')</button>
                                    <a href="{{route('admin.promocode.index')}}"
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

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js">
</script>
<script type="text/javascript" src="{{asset('asset/js/moment-with-locales.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
    $(function () {
        $('.datetimepicker').datetimepicker();
    });
});

$("#percentage").on('keyup', function () {
    var per = $(this).val() || 0;
    var max = $("#max_amount").val() || 0;
    $("#promo_description").val(per + '% Off! Maximum discount amount ' + max);
});

$("#max_amount").on('keyup', function () {
    var max = $(this).val() || 0;
    var per = $("#percentage").val() || 0;
    $("#promo_description").val(per + '% Off! Maximum discount amount ' + max);
});

</script>
@endsection