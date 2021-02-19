@extends('layouts.admin')

@section('title', 'Configs Site ')

@section('content')
<style>
.form-box.row {
    margin-top: 20px;
}
.panel-group .panel-title {
    position: relative;
    padding: 15px 45px 15px 30px;
    font-size: 25px;
}
h4.example-title.titlebar {
    font-size: 17px;
    color: #3a488a;
}
</style>
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">Settings</li>
        </ol>
        <!-- <div class="page-header-actions">
        @can('role-create')
          <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round" data-toggle="tooltip" data-original-title="@lang('admin.roles.add_role')">
            <a href="{{ route('admin.role.create') }}"> <i class="icon wb-plus" aria-hidden="true"></i> @lang('admin.roles.add_role')</a>
          </button>
        @endcan
        </div> -->
</div>

<div class="page-content">
@if(Session::has('flash_success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_success') !!}</em></div>
@endif
<div class="panel">
<div class="panel-body container-fluid">
<div class="content-area py-1">
<div class="col-xl-12">
              <!-- Example Default Accordion -->
              <div class="examle-wrap">
                <h4 class="example-title">Site Setting</h4>
                <div class="example">
                  <div class="panel-group" id="exampleAccordionDefault" aria-multiselectable="true" role="tablist">
                    <div class="panel">
                      <div class="panel-heading" id="exampleHeadingDefaultOne" role="tab">
                        <a class="panel-title collapsed" data-toggle="collapse" href="#exampleCollapseDefaultOne" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="exampleCollapseDefaultOne">
                        <h4 class="example-title titlebar">General Setting</h4>
                    </a>
                      </div>
                      <div class="panel-collapse collapse" id="exampleCollapseDefaultOne" aria-labelledby="exampleHeadingDefaultOne" role="tabpanel" style="">
                        <div class="panel-body">
                        <div class="form-box row">
                            <div class="col-md-12">
                                <form class="form-horizontal" action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data" role="form" autocomplete="off">
                                    {{csrf_field()}}

                                    <div class="form-group row">
                                        <label for="site_title" class="col-md-3 form-control-label">@lang('admin.setting.Site_Name')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.site_title', 'Tranxit')  }}" name="site_title" required id="site_title" placeholder="@lang('admin.setting.Site_Name')">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="site_logo" class="col-md-3 form-control-label">@lang('admin.setting.Site_Logo')</label>
                                        <div class="col-md-6">
                                            @if(config('constants.site_logo')!='')
                                            <img style="height: 90px; margin-bottom: 15px;" src="{{ config('constants.site_logo', asset('logo-black.png')) }}">
                                            @endif
                                            <input type="file" accept="image/*" name="site_logo" class="dropify form-control-file" id="site_logo" aria-describedby="fileHelp">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="site_icon" class="col-md-3 form-control-label">@lang('admin.setting.Site_Icon')</label>
                                        <div class="col-md-6">
                                            @if(config('constants.site_icon')!='')
                                            <img style="height: 90px; margin-bottom: 15px;" src="{{ config('constants.site_icon') }}">
                                            @endif
                                            <input type="file" accept="image/*" name="site_icon" class="dropify form-control-file" id="site_icon" aria-describedby="fileHelp">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="timezone" class="col-md-3 form-control-label">@lang('admin.setting.timezone')</label>
                                        <div class="col-md-6">
                                            <select class="form-control" id="timezone" name="timezone" autocomplete="off">
                                                <option value="UTC" @if(Config::get('constants.timezone') == 'UTC') selected @endif>Select Timezone</option>
                                                <option value="America/Bahia" @if(Config::get('constants.timezone') == 'America/Bahia') selected @endif>America/Bahia</option>
                                                <option value="Asia/Kolkata" @if(Config::get('constants.timezone') == 'Asia/Kolkata') selected @endif>Asia/Kolkata</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="contact_number" class="col-md-3 form-control-label">@lang('admin.setting.Contact_Number')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" value="{{ config('constants.contact_number', '911')  }}" name="contact_number" required id="contact_number" placeholder="@lang('admin.setting.Contact_Number')">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="contact_email" class="col-md-3 form-control-label">@lang('admin.setting.Contact_Email')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="email" value="{{ config('constants.contact_email', '')  }}" name="contact_email" required id="contact_email" placeholder="@lang('admin.setting.Contact_Email')">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="sos_number" class="col-md-3 form-control-label">@lang('admin.setting.SOS_Number')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" value="{{ config('constants.sos_number', '911')  }}" name="sos_number" required id="sos_number" placeholder="@lang('admin.setting.SOS_Number')">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tax_percentage" class="col-md-3 form-control-label">@lang('admin.setting.Copyright_Content')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.site_copyright', '&copy; '.date('Y').' Appoets') }}" name="site_copyright" id="site_copyright" placeholder="@lang('admin.setting.Copyright_Content')">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-md-2 form-control-label"></label>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-primary">@lang('admin.setting.Update_Site_Settings')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel">
                      <div class="panel-heading" id="exampleHeadingDefaultTwo" role="tab">
                        <a class="panel-title collapsed" data-toggle="collapse" href="#exampleCollapseDefaultTwo" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="exampleCollapseDefaultTwo">
                        <h4 class="example-title titlebar"> Apps Links</h4>
                    </a>
                      </div>
                      <div class="panel-collapse collapse" id="exampleCollapseDefaultTwo" aria-labelledby="exampleHeadingDefaultTwo" role="tabpanel">
                        <div class="panel-body">
                        <div class="form-box row">
                            <div class="col-md-12">
                                <form class="form-horizontal" action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data" role="form">
                                    {{csrf_field()}}

                                    <div class="form-group row">
                                        <label for="store_link_android" class="col-md-3 form-control-label">@lang('admin.setting.Android_user_link')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.store_link_android_user', '')  }}" name="store_link_android_user"  id="store_link_android_user" placeholder="@lang('admin.setting.Android_user_link')">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="store_link_ios" class="col-md-3 form-control-label">@lang('admin.setting.Android_provider_link')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.store_link_android_provider', '')  }}" name="store_link_android_provider"  id="store_link_android_provider" placeholder="@lang('admin.setting.Android_provider_link')">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="store_link_ios" class="col-md-3 form-control-label">@lang('admin.setting.Ios_user_Link')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.store_link_ios_user', '')  }}" name="store_link_ios_user"  id="store_link_ios_user" placeholder="@lang('admin.setting.Ios_user_Link')">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="store_link_ios" class="col-md-3 form-control-label">@lang('admin.setting.Ios_provider_Link')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.store_link_ios_provider', '')  }}" name="store_link_ios_provider"  id="store_link_ios_provider" placeholder="@lang('admin.setting.Ios_provider_Link')">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="store_link_ios" class="col-md-3 form-control-label">Andorid User App Version</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.version_android_user', '')  }}" name="version_android_user"  id="version_android_user" placeholder="Version Code">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="store_link_ios" class="col-md-3 form-control-label">Andorid Driver App Version</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.version_android_provider', '')  }}" name="version_android_provider"  id="version_android_provider" placeholder="Version Code">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="store_link_ios" class="col-md-3 form-control-label">IOS User App Version</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.version_ios_user', '')  }}" name="version_ios_user"  id="version_ios_user" placeholder="Version Code">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="store_link_ios" class="col-md-3 form-control-label">IOS Driver App Version</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.version_ios_provider', '')  }}" name="version_ios_provider"  id="version_ios_provider" placeholder="Version Code">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="zipcode" class="col-md-2 form-control-label"></label>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-primary">@lang('admin.setting.Update_Site_Settings')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="panel">
                      <div class="panel-heading" id="provider" role="tab">
                        <a class="panel-title collapsed" data-toggle="collapse" href="#providerDefaultOne" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="providerDefaultOne">
                        <h4 class="example-title titlebar"> Search Algorithm</h4>
                    </a>
                      </div>
                      <div class="panel-collapse collapse" id="providerDefaultOne" aria-labelledby="provider" role="tabpanel" style="">
                        <div class="panel-body">
                        <div class="form-box row">
                            <div class="col-md-12">
                                <form class="form-horizontal" action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data" role="form">
                                    {{csrf_field()}}
                                    <div class="form-group row">
                                        <label for="provider_select_timeout" class="col-md-3 form-control-label">@lang('admin.setting.Provider_Accept_Timeout') (Secs)</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" value="{{ config('constants.provider_select_timeout', '60')  }}" name="provider_select_timeout" required id="provider_select_timeout" placeholder="Provider Timout">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="provider_search_radius" class="col-md-3 form-control-label">@lang('admin.setting.Provider_Search_Radius') (Kms)</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" value="{{ config('constants.provider_search_radius', '100')  }}" name="provider_search_radius" required id="provider_search_radius" placeholder="Provider Search Radius">
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label for="distance" class="col-md-3 form-control-label">@lang('admin.setting.distance')</label>
                                        <div class="col-md-6">
                                            <select name="distance" class="form-control">
                                                <option value="Kms" @if(config('constants.distance') == 'Kms') selected @endif>Kms</option>
                                                <option value="Miles" @if(config('constants.distance') == 'Miles') selected @endif>Miles</option>
                                            </select>	
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="zipcode" class="col-md-2 form-control-label"></label>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-primary">@lang('admin.setting.Update_Site_Settings')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>



                    <div class="panel">
                      <div class="panel-heading" id="api-tabOne" role="tab">
                        <a class="panel-title collapsed" data-toggle="collapse" href="#api-tabDefaultOne" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="api-tabDefaultOne">
                        <h4 class="example-title titlebar"> Map Keys</h4>
                    </a>
                      </div>
                      <div class="panel-collapse collapse" id="api-tabDefaultOne" aria-labelledby="api-tabOne" role="tabpanel" style="">
                        <div class="panel-body">
                        <div class="form-box row">
                            <div class="col-md-10">
                                <form class="form-horizontal" action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data" role="form">
                                    {{csrf_field()}}
                                    <div class="form-group row">

                                        <label for="map_key" class="col-md-3 form-control-label">@lang('admin.setting.map_key')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ Config::get('constants.map_key')  }}" name="map_key" required id="map_key" placeholder="@lang('admin.setting.map_key')">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="zipcode" class="col-md-2 form-control-label"></label>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-primary">@lang('admin.setting.Update_Site_Settings')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="panel">
                      <div class="panel-heading" id="mailconfig-tabOne" role="tab">
                        <a class="panel-title collapsed" data-toggle="collapse" href="#mailconfig-tabDefaultOne" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="mailconfig-tabDefaultOne">
                        <h4 class="example-title titlebar"> E-mail</h4>
                    </a>
                      </div>
                      <div class="panel-collapse collapse" id="mailconfig-tabDefaultOne" aria-labelledby="mailconfig-tabOne" role="tabpanel" style="">
                        <div class="panel-body">
                        <div class="form-box row">
                            <div class="col-md-12">
                                <form class="form-horizontal" action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data" role="form">
                                    {{csrf_field()}}


                                    <div class="form-group row" id="mail_request">
                                        <label for="stripe_secret_key" class="col-md-3 form-control-label"> @lang('admin.setting.send_mail') </label>
                                        <div class="col-md-6">
                                            <div class="float-md-left mr-1"><input @if(config('constants.send_email') == 1) checked  @endif  name="send_email" type="checkbox" class="checkbox-custom checkbox-warning" data-color="#43b968" id="mailchk"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row hidemail">
                                        <label for="social_login" class="col-md-3 form-control-label">@lang('admin.setting.mail_driver')</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="mail_driver" required id="mail_driver">
                                                <option value="SMTP" @if(config('constants.mail_driver') == 'SMTP') selected @endif>@lang('admin.setting.smtp')</option>
                                                <option value="MAILGUN" @if(config('constants.mail_driver') == 'MAILGUN') selected @endif>@lang('admin.setting.mailgun')</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row hidemail">
                                        <label for="mail_host" class="col-md-3 form-control-label">@lang('admin.setting.mail_host')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.mail_host')  }}" name="mail_host" required id="mail_host" placeholder="@lang('admin.setting.mail_host')">
                                        </div>
                                    </div>

                                    <div class="form-group row hidemail">
                                        <label for="mail_port" class="col-md-3 form-control-label">@lang('admin.setting.mail_port')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.mail_port')  }}" name="mail_port" required id="mail_port" placeholder="@lang('admin.setting.mail_port')">
                                        </div>
                                    </div>

                                    <div class="form-group row hidemail">
                                        <label for="mail_username" class="col-md-3 form-control-label">@lang('admin.setting.mail_username')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.mail_username')  }}" name="mail_username" required id="mail_username" placeholder="@lang('admin.setting.mail_username')" >
                                        </div>
                                    </div>

                                    <div class="form-group row hidemail">
                                        <label for="mail_password" class="col-md-3 form-control-label">@lang('admin.setting.mail_password')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.mail_password')  }}" name="mail_password" required id="mail_password" placeholder="@lang('admin.setting.mail_password')" >
                                        </div>
                                    </div>

                                    <div class="form-group row hidemail">
                                        <label for="mail_from_address" class="col-md-3 form-control-label">@lang('admin.setting.mail_from_address')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="email" value="{{ config('constants.mail_from_address')  }}" name="mail_from_address" required id="mail_from_address" placeholder="@lang('admin.setting.mail_from_address')" >
                                        </div>
                                    </div>

                                    <div class="form-group row hidemail">
                                        <label for="mail_from_name" class="col-md-3 form-control-label">@lang('admin.setting.mail_from_name')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.mail_from_name')  }}" name="mail_from_name" required id="mail_from_name" placeholder="@lang('admin.setting.mail_from_name')" >
                                        </div>
                                    </div>

                                    <div class="form-group row hidemail">
                                        <label for="mail_encryption" class="col-md-3 form-control-label">@lang('admin.setting.mail_encryption')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.mail_encryption')  }}" name="mail_encryption" required id="mail_encryption" placeholder="@lang('admin.setting.mail_encryption')" >
                                        </div>
                                    </div>

                                    <div class="form-group row hidemail mail_domain">
                                        <label for="mail_domain" class="col-md-3 form-control-label">@lang('admin.setting.mail_domain')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.mail_domain')  }}" name="mail_domain" id="mail_domain" placeholder="@lang('admin.setting.mail_domain')" >
                                        </div>
                                    </div>

                                    <div class="form-group row hidemail mail_secret">
                                        <label for="mail_secret" class="col-md-3 form-control-label">@lang('admin.setting.mail_secret')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ config('constants.mail_secret') }}" name="mail_secret" id="mail_secret" placeholder="@lang('admin.setting.mail_secret')" >
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label for="zipcode" class="col-md-2 form-control-label"></label>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-primary">@lang('admin.setting.Update_Site_Settings')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>


                    <div class="panel">
                      <div class="panel-heading" id="pushnotificationOne" role="tab">
                        <a class="panel-title collapsed" data-toggle="collapse" href="#pushnotificationDefaultOne" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="pushnotificationDefaultOne">
                        <h4 class="example-title titlebar">Push Notifications</h4>
                    </a>
                      </div>
                      <div class="panel-collapse collapse" id="pushnotificationDefaultOne" aria-labelledby="pushnotificationOne" role="tabpanel" style="">
                        <div class="panel-body">
                        <div class="form-box row">
                            <div class="col-md-12">
                                <form class="form-horizontal" action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data" role="form">
                                    {{csrf_field()}}

                                    <div class="form-group row">
                                        <label for="mail_driver" class="col-md-3 form-control-label">@lang('admin.setting.environment')</label>
                                        <div class="col-md-6">
                                            <select name="environment" required id="environment" class="form-control">
                                                <option value="development">Development</option>
                                                <option value="production">Production</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="mail_driver" class="col-md-3 form-control-label">@lang('admin.setting.ios_push_user_pem')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="file" value="" name="user_pem" id="user_pem" placeholder="@lang('admin.setting.ios_push_user_pem')">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="mail_driver" class="col-md-3 form-control-label">@lang('admin.setting.ios_push_provider_pem')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="file" value="" name="provider_pem" id="provider_pem" placeholder="@lang('admin.setting.ios_push_provider_pem')">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="mail_host" class="col-md-3 form-control-label">@lang('admin.setting.ios_push_password')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ Config::get('constants.ios_push_password')  }}" name="ios_push_password" required id="ios_push_password" placeholder="@lang('admin.setting.ios_push_password')">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="mail_port" class="col-md-3 form-control-label">@lang('admin.setting.android_push_key')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" value="{{ Config::get('constants.android_push_key')  }}" name="android_push_key" required id="android_push_key" placeholder="@lang('admin.setting.android_push_key')">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="zipcode" class="col-md-2 form-control-label"></label>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-primary">@lang('admin.setting.Update_Site_Settings')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="panel">
                      <div class="panel-heading" id="othersOne" role="tab">
                        <a class="panel-title collapsed" data-toggle="collapse" href="#othersDefaultOne" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="othersDefaultOne">
                        <h4 class="example-title titlebar">Others</h4>
                    </a>
                      </div>
                      <div class="panel-collapse collapse" id="othersDefaultOne" aria-labelledby="othersOne" role="tabpanel" style="">
                        <div class="panel-body">
                        <div class="form-box row">
                            <div class="col-md-12">
                                <form class="form-horizontal" action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data" role="form">
                                    {{csrf_field()}}

                                    <div class="form-group row" id="referral_request">
                                        <label for="stripe_secret_key" class="col-md-3 form-control-label"> Rental </label>
                                        <div class="col-md-6">
                                            <div class="float-md-left mr-1"><input @if(config('constants.rental') == 1) checked  @endif  name="rental" type="checkbox" class="checkbox-custom checkbox-warning" data-color="#43b968" id="Rental"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="referral_request">
                                        <label for="stripe_secret_key" class="col-md-3 form-control-label"> Out Station </label>
                                        <div class="col-md-6">
                                            <div class="float-md-left mr-1"><input @if(config('constants.outstation') == 1) checked  @endif  name="outstation" type="checkbox" class="checkbox-custom checkbox-warning" data-color="#43b968" id="outstation"></div>
                                        </div>
                                    </div>


                                    <div class="form-group row" id="referral_request">
                                        <label for="stripe_secret_key" class="col-md-3 form-control-label"> @lang('admin.setting.referral') </label>
                                        <div class="col-md-6">
                                            <div class="float-md-left mr-1"><input @if(config('constants.referral') == 1) checked  @endif  name="referral" type="checkbox" class="checkbox-custom checkbox-warning" data-color="#43b968" id="refchk"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row hideref">
                                        <label for="referral_count" class="col-md-3 form-control-label">@lang('admin.setting.referral_count')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" value="{{ config('constants.referral_count')  }}" name="referral_count" required id="referral_count" placeholder="@lang('admin.setting.referral_count')" min="0">
                                        </div>
                                    </div>

                                    <div class="form-group row hideref">
                                        <label for="referral_amount" class="col-md-3 form-control-label">@lang('admin.setting.referral_amount')</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" value="{{ config('constants.referral_amount')  }}" name="referral_amount" required id="referral_amount" placeholder="@lang('admin.setting.referral_amount')" min="0">
                                        </div>
                                    </div>				
                                    <div class="form-group row">
                                        <label for="stripe_secret_key" class="col-md-3 form-control-label"> Manual Assignment </label>
                                        <div class="col-md-6">
                                            <div class="float-md-left mr-1"><input @if(config('constants.manual_request') == 1) checked  @endif  name="manual_request" type="checkbox" class="checkbox-custom checkbox-warning" data-color="#43b968"></div>
                                        </div>
                                    </div>



                                    <div class="form-group row" id="broadcast_request">
                                        <label id="unicast" for="broadcast_request" class="col-md-3 form-control-label">Single Request </label>
                                        <div class="col-md-1">
                                            <div class="float-md-left mr-1"><input @if(config('constants.broadcast_request') == 1) checked  @endif  name="broadcast_request" id="bdchk" type="checkbox" class="checkbox-custom checkbox-warning" data-color="#43b968"></div>
                                        </div>
                                        <label id="broadcast" for="broadcast_request" class="col-md-2 form-control-label"></label>
                                    </div>

                                    <div class="form-group row" id="track_distance">
                                        <label id="unicast" for="track_distance" class="col-md-3 form-control-label">Track Distance </label>
                                        <div class="col-md-1">
                                            <div class="float-md-left mr-1"><input @if(config('constants.track_distance')==1) checked @endif
                                                    name="track_distance" id="bdchk" type="checkbox" class="checkbox-custom checkbox-warning" data-color="#43b968"></div>
                                        </div>
                                        <label id="track_distance" for="track_distance" class="col-md-2 form-control-label"></label>
                                    </div>
                                    

                                    <div class="form-group row">
                                        <label for="stripe_secret_key" class="col-md-3 form-control-label">OTP verification</label>
                                        <div class="col-md-6">
                                            <div class="float-md-left mr-1"><input  @if(config('constants.ride_otp') == 1) checked  @endif  name="ride_otp" type="checkbox" class="checkbox-custom checkbox-warning" data-color="#43b968"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="stripe_secret_key" class="col-md-3 form-control-label">Toll Verification</label>
                                        <div class="col-md-6">
                                            <div class="float-md-left mr-1"><input  @if(config('constants.ride_toll') == 1) checked  @endif  name="ride_toll" type="checkbox" class="checkbox-custom checkbox-warning" data-color="#43b968"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="booking_prefix" class="col-md-3 form-control-label">@lang('admin.payment.booking_id_prefix')</label>
                                        <div class="col-md-8">
                                            <input class="form-control"
                                                   type="text"
                                                   value="{{ config('constants.booking_prefix', '0') }}"
                                                   id="booking_prefix"
                                                   name="booking_prefix"
                                                   min="0"
                                                   max="4"
                                                   placeholder="Booking ID Prefix">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label for="outstation_base_km" class="col-md-3 form-control-label">Outstation Base Km</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="number" value="{{ config('constants.outstation_base_km', '0') }}"
                                            id="outstation_base_km" name="outstation_base_km" placeholder="Outstation Base Km">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="limit_message"
                                            class="col-md-3 form-control-label">Limit Message</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" value="{{ config('constants.limit_message', "Message Here") }}"
                                                id="limit_message" name="limit_message" placeholder="Limit Message">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="base_price" class="col-md-3 form-control-label">@lang('admin.payment.currency')
                                            ( <strong>{{ config('constants.currency', '$')  }} </strong>)
                                        </label>
                                        <div class="col-md-8">
                                            <select name="currency" class="form-control" required>
                                                <option @if(config('constants.currency') == "R$") selected @endif value="R$">Real (BRL)</option>
                                                <option @if(config('constants.currency') == "$") selected @endif value="$">US Dollar (USD)</option>
                                                <option @if(config('constants.currency') == "₹") selected @endif value="₹"> Indian Rupee (INR)</option>
                                                <option @if(config('constants.currency') == "د.ك") selected @endif value="د.ك">Kuwaiti Dinar (KWD)</option>
                                                <option @if(config('constants.currency') == "د.ب") selected @endif value="د.ب">Bahraini Dinar (BHD)</option>
                                                <option @if(config('constants.currency') == "﷼") selected @endif value="﷼">Omani Rial (OMR)</option>
                                                <option @if(config('constants.currency') == "£") selected @endif value="£">British Pound (GBP)</option>
                                                <option @if(config('constants.currency') == "€") selected @endif value="€">Euro (EUR)</option>
                                                <option @if(config('constants.currency') == "CHF") selected @endif value="CHF">Swiss Franc (CHF)</option>
                                                <option @if(config('constants.currency') == "ل.د") selected @endif value="ل.د">Libyan Dinar (LYD)</option>
                                                <option @if(config('constants.currency') == "B$") selected @endif value="B$">Bruneian Dollar (BND)</option>
                                                <option @if(config('constants.currency') == "S$") selected @endif value="S$">Singapore Dollar (SGD)</option>
                                                <option @if(config('constants.currency') == "AU$") selected @endif value="AU$"> Australian Dollar (AUD)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="zipcode" class="col-md-2 form-control-label"></label>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-primary">@lang('admin.setting.Update_Site_Settings')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <!-- End Example Default Accordion -->
            </div>
    
</div>

</div>
</div>
</div>
</div>



@endsection

@section('script')
<script type="text/javascript">
    switchbroadcast();
    switchreferral();
    switchmail();
    switchMailDomain();
    $('#broadcast_request').click(function (e) {
        switchbroadcast();
    });
    $('#refchk').click(function () {
        //switchreferral();
         var isChecked = $("#refchk").is(":checked");
        if (isChecked) {
            $(".hideref").show();
            $(".hideref").fadeIn();
        } else {
            $(".hideref").hide();
            $(".hideref").fadeOut();
        }
    });
    $('#mail_request').click(function (e) {
        switchmail();
        switchMailDomain();
    });
    $('#mail_driver').click(function (e) {
        switchMailDomain();
    });


    $('select[name=social_login]').on('change', function (e) {
        var value = $(this).val();
        $('.social_container').hide();
        $('.social_container input').prop('disabled', true);
        if (value == 1) {
            $('.social_container').show();
            $('.social_container input').prop('disabled', false);
        }

    });

    function switchbroadcast() {
        var isChecked = $("#bdchk").is(":checked");
        if (isChecked) {
            $("#broadcast").text('Boradcast Request');
            $("#unicast").text('');
        } else {
            $("#unicast").text('Single Request');
            $("#broadcast").text('');
        }
    }

    function switchreferral() {
        var isChecked = $("#refchk").is(":checked");
        if (isChecked) {
            $(".hideref").show();
            $(".hideref").fadeIn();
        } else {
            $(".hideref").hide();
            $(".hideref").fadeOut();
        }
    }
    function switchmail() {
        var isChecked = $("#mailchk").is(":checked");
        if (isChecked) {
            $(".hidemail").find('input').attr('required', true);
            $(".hidemail").show();
        } else {
            $(".hidemail").find('input').attr('required', false);
            $(".hidemail").hide();
        }
    }
    function switchMailDomain() {
        var mailDriver = $("#mail_driver").val();
        if (mailDriver == "SMTP") {
            $(".hidemail").find('.mail_secret').attr('required', false);
            $(".hidemail").find('.mail_domain').attr('required', false);
            $(".mail_secret").hide();
            $(".mail_domain").hide();
        } else {
            $(".hidemail").find('.mail_secret').attr('required', true);
            $(".hidemail").find('.mail_domain').attr('required', true);
            $(".mail_secret").show();
            $(".mail_domain").show();
        }
    }
</script>
@endsection