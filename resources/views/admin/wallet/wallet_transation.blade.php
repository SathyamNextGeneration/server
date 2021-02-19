@extends('layouts.admin')

@section('title', 'Admin transactions ')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Total Transaction (@lang('provider.current_balance') : {{currency($wallet_balance)}})</li>
        </ol>
        
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
                <h5 class="example-title">Total Transaction (@lang('provider.current_balance') : {{currency($wallet_balance)}})</h5>
                <table class="table table-striped" id="table-4">
                    <thead>
                        <tr>
                            <th>@lang('admin.sno')</th>
                            <th>@lang('admin.transaction_ref')</th>
                            <th>@lang('admin.datetime')</th>
                            <th>@lang('admin.transaction_desc')</th>
                            <th>@lang('admin.status')</th>
                            <th>@lang('admin.amount')</th>
                        </tr>
                    </thead>
                    <tbody>
                       @php($page = ($pagination->currentPage-1)*$pagination->perPage)
                       @foreach($wallet_transation as $index=>$wallet)
                       @php($page++)
                            <tr>
                                <td>{{$page}}</td>
                                <td>{{$wallet->transaction_alias}}</td>
                                <td>{{$wallet->created_at->diffForHumans()}}</td>
                                <td>{{$wallet->transaction_desc}}</td>
                                <td>{{$wallet->type == 'C' ? 'Credit' : 'Debit'}}</td>
                                <td>{{currency($wallet->amount)}}</td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('common.pagination')
                <p style="color:red;">{{config('constants.booking_prefix', '') }} - Ride Transactions, PSET - Driver Transaction, FSET - Fleet Transaction, URC - User Refills</p>
            </div>
            
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection



