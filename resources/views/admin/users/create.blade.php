@extends('layouts.admin')

@section('title', 'Add User ')
@section('style')
<link rel="stylesheet" href="{{asset('asset/css/intlTelInput.css')}}">
@endsection

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">@lang('admin.users.Add_User')</li>
        </ol>
        <div class="page-header-actions">
        
          <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="@lang('admin.back')">
            <a href="{{ URL::previous() }}"> <i class="fa fa-angle-left" aria-hidden="true"></i> @lang('admin.back')</a>
          </button>
       
        </div>
</div>

<div class="page-content">
@if(Session::has('flash_success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_success') !!}</em></div>
@endif
<div class="panel add-subscription">
<div class="panel-body container-fluid">
<div class="content-area py-1">
    <div class="container-fluid">
    <h5 class="example-title">@lang('admin.users.Add_User')</h5>
    <form class="form-horizontal" action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
    <div class="row  mb-4 p-4">
                      <div class="form-group col-md-4 mb-4">
                        <label>@lang('admin.first_name')</label>
                        <input class="form-control" type="text" value="{{ old('first_name') }}" name="first_name" required id="first_name" placeholder="@lang('admin.first_name')">
                      </div>
                      <div class="form-group col-md-4 mb-4">
                          <label>@lang('admin.last_name')</label>
                          <input class="form-control" type="text" value="{{ old('last_name') }}" name="last_name" required id="last_name" placeholder="@lang('admin.last_name')">
                        </div>
                        <div class="form-group col-md-4 mb-4">
                          <label>@lang('admin.email')</label>
                          <input class="form-control" type="email" required name="email" value="{{old('email')}}" id="email" placeholder="@lang('admin.email')">
                        </div>
                        <div class="form-group col-md-4 mb-4">
                          <label>@lang('admin.password')</label>
                          <input class="form-control" type="password" name="password" id="password" placeholder="@lang('admin.password')">
                        </div>
                        <div class="form-group col-md-4 mb-4">
                          <label>@lang('admin.account.password_confirmation')</label>
                          <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="@lang('admin.account.password_confirmation')">
                        </div>
                        <div class="form-group col-md-4 mb-4">
                          <label>@lang('admin.picture')</label>
                          <input type="file" accept="image/*" name="picture" class="dropify form-control-file" id="picture" aria-describedby="fileHelp">
                        </div>
                        <div class="form-group col-md-4 mb-4">
                          <label>@lang('admin.users.country_code')</label>
                          <input type="text" name="country_code" value="+55" class="form-control country-name" id="country_code">
                        </div>
                        <div class="form-group col-md-4 mb-4">
                          <label>@lang('admin.mobile')</label>
                          <input class="form-control" type="number" value="{{ old('mobile') }}" name="mobile" required id="mobile" placeholder="@lang('admin.mobile')">
                        </div>
                        <div class="form-footer aproveReject col-12 text-right">
                            <button type="submit" class="btn btn-primary">@lang('admin.create')</button>
                            <a href="{{route('admin.user.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                        </div>
                    </div>
        </from>
    </div>
    </div>
</div>
</div>
</div>
</div>

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('asset/js/intlTelInput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/intlTelInput-jquery.min.js') }}"></script>
<script type="text/javascript">
  var input = document.querySelector("#country_code");

       var states = $('#states');
       var providerCity = "{{ $provider->city_id }}";

       states.change(function () {
           var idEstado = $(this).val();
           $.get('/admin/cities/' + idEstado, function (cidades) {
               $('#cities').empty();
               $.each(cidades, function (key, value) {
                   $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
               });
           });
       });

       if(states.val() != null){
           $.get('/admin/cities/' + states.val(), function (cidades) {
               $('#cities').empty();
               $.each(cidades, function (key, value) {
                   if(value.id == providerCity){
                       $('#cities').append('<option value=' + value.id + ' selected>' + value.title + '</option>');
                   }else{
                       $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
                   }
               });
           });
       }

       window.intlTelInput(input,({
           // separateDialCode:true,
       }));
       $(".country-name").click(function(){
           var myVar = $(this).closest('.country').find(".dial-code").text();
           $('#country_code').val(myVar);
        });
</script>
@endsection
