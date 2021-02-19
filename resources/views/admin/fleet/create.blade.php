@extends('layouts.admin')

@section('title', 'New Fleet Manager ')

@section('content')
<div class="page">
<div class="page-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">@lang('admin.fleet.add_fleet_owner')</li>
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
            
               <h5 class="example-title">@lang('admin.fleet.add_fleet_owner')</h5>

                <form class="form-horizontal" action="{{route('admin.fleet.store')}}" method="POST"
                      enctype="multipart/form-data" role="form">
                    <div class="row  mb-4 p-4">
                    {{csrf_field()}}
                    <div class="form-group col-md-4 mb-4">
                        <label for="name"
                            >Franchise Name</label>
                        <div class="">
                            <input class="form-control" type="text" value="{{ old('name') }}" name="name" required
                                   id="name" placeholder="Franchise Name">
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-4">
                        <label for="company">@lang('admin.fleet.company_name')</label>
                        <div class="">
                            <input class="form-control" type="text" value="{{ old('company') }}" name="company" required
                                   id="company" placeholder="Company Name">
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-4">
                        <label for="email">@lang('admin.email')</label>
                        <div class="">
                            <input class="form-control" type="email" required name="email" value="{{old('email')}}"
                                   id="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-4">
                        <label for="password">@lang('admin.password')</label>
                        <div class="">
                            <input class="form-control" type="password" name="password" id="password"
                                   placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-4">
                        <label for="password_confirmation"
                            >@lang('admin.account-manager.password_confirmation')</label>
                        <div class="">
                            <input class="form-control" type="password" name="password_confirmation"
                                   id="password_confirmation" placeholder="Confirm the Password">
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-4">
                        <label for="logo">@lang('admin.fleet.company_logo')</label>
                        <div class="">
                            <input type="file" accept="image/*" name="logo" class="dropify form-control-file" id="logo"
                                   aria-describedby="fileHelp">
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-4">
                        <label for="mobile">@lang('admin.mobile')</label>
                        <div class="">
                            <input class="form-control" type="number" value="{{ old('mobile') }}" name="mobile" required
                                   id="mobile" placeholder="Telephone">
                        </div>
                    </div>


                    <div class="form-footer aproveReject col-12 text-right">
                     
                            <button type="submit" class="btn btn-primary">@lang('admin.create')</button>
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
        $('#states').change(function () {
            var idEstado = $(this).val();
            $.get('/admin/cities/' + idEstado, function (cidades) {
                $('#cities').empty();
                $.each(cidades, function (key, value) {
                    $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
                });
            });
        });
    </script>
@endsection
