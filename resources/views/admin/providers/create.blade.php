@extends('layouts.admin')

@section('title', 'New Driver ')
@section('style')
<link rel="stylesheet" href="{{asset('asset/css/intlTelInput.css')}}">
@endsection
@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">@lang('admin.provides.add_provider')</li>
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
        <h5 class="examples-title">@lang('admin.provides.add_provider')</h5>
        <form class="form-horizontal" action="{{route('admin.provider.store')}}" method="POST" enctype="multipart/form-data" role="form">
        <div class="row  mb-4 p-4">
                {{csrf_field()}}
                <div class="form-group col-md-4 mb-4">
                    <label for="first_name">@lang('admin.first_name')</label>
                    <div class="">
                        <input class="form-control" type="text" value="{{ old('first_name') }}" name="first_name" required id="first_name" placeholder="@lang('admin.first_name')">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="last_name">@lang('admin.last_name')</label>
                    <div class="">
                        <input class="form-control" type="text" value="{{ old('last_name') }}" name="last_name" required id="last_name" placeholder="@lang('admin.last_name')">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="email">@lang('admin.email')</label>
                    <div class="">
                        <input class="form-control" type="email" required name="email" value="{{old('email')}}" id="email" placeholder="@lang('admin.email')">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="password">@lang('admin.password')</label>
                    <div class="">
                        <input class="form-control" type="password" name="password" id="password" placeholder="@lang('admin.password')">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="password_confirmation">@lang('admin.provides.password_confirmation')</label>
                    <div class="">
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="@lang('admin.provides.password_confirmation')">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="picture">@lang('admin.picture')</label>
                    <div class="">
                        <input type="file" accept="image/*" name="avatar" class="dropify form-control-file" id="picture" aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="country_code">Country code</label>
                    <div class="">
                        <input type="text" name="country_code" style ="padding-bottom:5px;" class="form-control country-name" id="country_code" >
                    </div>
                </div>
                <div class="form-group col-md-4 mb-4">
                    <label for="mobile">@lang('admin.mobile')</label>
                    <div class="">
                        <input class="form-control" type="number" value="{{ old('mobile') }}" name="mobile" required id="mobile" placeholder="@lang('admin.mobile')">
                    </div>
                </div>


                <div class="form-footer aproveReject col-12 text-right">
                 
                        <button type="submit" class="btn btn-primary">@lang('admin.create')</button>
                        <a href="{{route('admin.provider.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                  
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
<script type="text/javascript" src="{{ asset('asset/js/intlTelInput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/intlTelInput-jquery.min.js') }}"></script>
<script type="text/javascript">
       var input = document.querySelector("#country_code");

       var states = $('#states');

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
                   $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
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