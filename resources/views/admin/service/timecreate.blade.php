@extends('layouts.admin')
@section('title', 'Add Time')

@section('style')

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
<link rel="stylesheet" href="{{ asset('asset/bdt/css/bootstrap-material-datetimepicker.css') }}" />
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

@endsection


@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">Add Time</li>
        </ol>
        <div class="page-header-actions">
        
        <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="Back">
          <a href="{{ URL::previous() }}"> <i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
        </button>
     
      </div>
</div>

<div class="page-content">
@if(Session::has('flash_success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_success') !!}</em></div>
@endif
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <form class="form-horizontal" action="{{route('admin.time.store')}}" method="POST" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                <div class="form-group col-md-12 mb-4">
                    <label for="name" class="col-md-2 col-form-label">From</label>
                    <div class="col-md-6">
                        <input class="form-control from" type="text"  name="from_time" required id="from"    placeholder="From">
                    </div>
                </div>

                <div class="form-group col-md-12 mb-4">
                    <label for="provider_name" class="col-md-2 col-form-label">To</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text"  name="to_time" required id="to" placeholder="to"> 
                    </div>
                </div>
                

                <div class="form-group col-md-12 mb-4">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-md-3">
                                <a href="{{ route('admin.time.index') }}" class="btn btn-danger btn-block">@lang('admin.cancel')</a>
                            </div>
                            <div class="col-md-3 col-sm-6 offset-md-6 col-md-3">
                                <button type="submit" class="btn btn-primary btn-block">Add Time</button>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.5.0/react.js"></script>

<script type="text/javascript" src="{{asset('main/vendor/moment/moment.js')}}"></script>
   <script type="text/javascript" src="{{asset('main/vendor/bdt/js/bootstrap-material-datetimepicker.js')}}"></script>


   <script type="text/javascript">
   $(document).ready(function()
    {
        $('#from').timepicker({  
            format: 'hh:mm tt' ,
            date: false,
        });
        $('#to').timepicker({  
            format: 'hh:mm tt' ,
            date: false,
        });
    });  
</script>
@endsection

