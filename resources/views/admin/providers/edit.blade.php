@extends('layouts.admin')

@section('title', 'Edit Driver ')
@section('style')
<link rel="stylesheet" href="{{asset('asset/css/intlTelInput.css')}}">
@endsection
@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">@lang('admin.provides.update_provider')</li>
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
        
           <h5 class="example-title">@lang('admin.provides.update_provider')</h5>

            <form class="form-horizontal" action="{{route('admin.provider.update', $provider->id )}}" method="POST" enctype="multipart/form-data" role="form">
            <div class="row  mb-4 p-4">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group col-md-4 mb-4">
                    <label for="first_name">@lang('admin.first_name')</label>
                    <div class="">
                        <input class="form-control" type="text" value="{{ $provider->first_name }}" name="first_name" required id="first_name" placeholder="First Name">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="last_name">@lang('admin.last_name')</label>
                    <div class="">
                        <input class="form-control" type="text" value="{{ $provider->last_name }}" name="last_name" required id="last_name" placeholder="Last Name">
                    </div>
                </div>
                
                <!-- <div class="form-group col-md-4 mb-4">
                    <label for="last_name">CPF</label>
                    <div class="">
                        <input class="form-control" type="text" value="{{ $provider->cpf }}" name="cpf" required id="cpf" placeholder="CPF">
                    </div>
                </div> -->

                <div class="form-group col-md-4 mb-4">
                    
                    <label for="picture">@lang('admin.picture')</label>
                    <div class="">
                    @if(isset($provider->avatar))
                        <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="{{img($provider->avatar)}}">
                    @endif
                        <input type="file" accept="image/*" name="avatar" class="dropify form-control-file" id="picture" aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="country_code">Country code</label>
                    <div class="">
                    <input type="text" name="country_code" style ="padding-bottom:5px;" id="country_code" class="form-control country-name"  value="{{ $provider->country_code}}" >
                    </div>
                </div>
                <div class="form-group col-md-4 mb-4">
                    <label for="mobile">@lang('admin.mobile')</label>
                    <div class="">
                        <input class="form-control" type="number" value="{{ $provider->mobile }}" name="mobile" required id="mobile" placeholder="Mobile">
                    </div>
                </div>
                
                <div class="form-group col-md-4 mb-4">
                    <label>@lang('admin.password')</label>
                    <div class="">
                        <input type="password" class="form-control" name="password" placeholder="@lang('admin.password')">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label>@lang('admin.account-manager.password_confirmation')</label>
                    <div class="">
                        <input type="password" class="form-control" name="password_confirm" placeholder="@lang('admin.account-manager.password_confirmation')">
                    </div>
                </div>

                <div class="form-footer aproveReject col-12 text-right">
                   
                        <button type="submit" class="btn btn-primary">@lang('admin.provides.update_provider')</button>
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