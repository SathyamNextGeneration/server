@extends('layouts.admin')

@section('title', 'Edit Fleet ')

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">@lang('admin.fleet.update_fleet')</li>
        </ol>
        <div class="page-header-actions">
        
        <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="Back">
          <a href="{{ URL::previous() }}"> <i class="fa fa-angle-left" aria-hidden="true"></i>  @lang('admin.back')</a>
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
        <h5 class="example-title">@lang('admin.fleet.update_fleet')</h5>

            <form class="form-horizontal" action="{{route('admin.fleet.update', $fleet->id )}}" method="POST" enctype="multipart/form-data" role="form">
            <div class="row  mb-4 p-4">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group col-md-4 mb-4">
                    <label for="name">Franchise Name</label>
                    <div class="">
                        <input class="form-control" type="text" value="{{ $fleet->name }}" name="name" required id="name" placeholder="Franchise Name">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="company">@lang('admin.fleet.company_name')</label>
                    <div class="">
                        <input class="form-control" type="text" value="{{ $fleet->company }}" name="company" required id="company" placeholder="Company Name">
                    </div>
                </div>
                
                <div class="form-group col-md-4 mb-4">
                    <label for="mobile">@lang('admin.mobile')</label>
                    <div class="">
                        <input class="form-control" type="number" value="{{ $fleet->mobile }}" name="mobile" required id="mobile" placeholder="Telephone">
                    </div>
                </div>
                
                <div class="form-group col-md-4 mb-4">
                    <label for="email">@lang('admin.email')</label>
                    <div class="">
                        <input class="form-control" type="text" value="{{ $fleet->email }}" name="email" required id="email" placeholder="E-mail">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="logo">@lang('admin.fleet.company_logo')</label>
                    <div class="">
                        @if(isset($fleet->logo))
                        <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="{{img($fleet->logo)}}">
                        @endif
                        <input type="file" accept="image/*" name="logo" class="dropify form-control-file" id="logo" aria-describedby="fileHelp">
                    </div>
                </div>
                
                <div class="form-group col-md-4 mb-4">
                    <label>Password:</label>
                    <div class="">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label>Repeat Password:</label>
                    <div class="">
                        <input type="password" class="form-control" name="password_confirm">
                    </div>
                </div>

                <div class="form-footer aproveReject col-12 text-right">
                  
                        <button type="submit" class="btn btn-primary">@lang('admin.fleet.update_fleet_owner')</button>
                        <a href="{{route('admin.fleet.index')}}" class="btn btn-default">@lang('admin.cancel')</a>
                 
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
<script type="text/javascript">
    var states = $('#states');
    var fleetCity = "{{ $fleet->city_id }}";

    states.change(function () {
        var idEstado = $(this).val();
        $.get('/admin/cities/' + idEstado, function (cidades) {
            $('#cities').empty();
            $.each(cidades, function (key, value) {
                $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
            });
        });
    });

    if (states.val() != null) {
        $.get('/admin/cities/' + states.val(), function (cidades) {
            $('#cities').empty();
            $.each(cidades, function (key, value) {
                if (value.id == fleetCity) {
                    $('#cities').append('<option value=' + value.id + ' selected>' + value.title + '</option>');
                } else {
                    $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
                }
            });
        });
    }
</script>
@endsection
