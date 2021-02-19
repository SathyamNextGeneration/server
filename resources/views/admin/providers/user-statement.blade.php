@extends('layouts.admin')

@section('title', ' Users History' )

@section('content')
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">@lang('admin.include.user_ride_histroy')</li>
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
            <!-- <h3>Historical Users</h3> -->

        
                                <h5 class="float-xs-left">@lang('admin.include.user_ride_histroy')</h5>
                              
                            @if(count($Users) != 0)
                            <table class="table table-striped" id="table-4">
                                <thead>
                                    <tr>
                                        <td>S.No.</td>
                                        <td>@lang('admin.fleets.name')</td>
                                        <td>@lang('admin.mobile')</td>
                                        <td>@lang('admin.fleets.Total_Rides')</td>
                                        <td>@lang('admin.users.Total_Spending')</td>
                                        <td>@lang('admin.fleets.Joined_at')</td>
                                        <td>@lang('admin.fleets.Details')</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $diff = ['-success', '-info', '-warning', '-danger']; ?>
                                    @foreach($Users as $index => $user)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>
                                            {{$user->first_name}} 
                                            {{$user->last_name}}
                                        </td>
                                        <td>
                                            {{$user->mobile}}
                                        </td>

                                        <td>
                                            @if($user->rides_count)
                                            {{$user->rides_count}}
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->payment)
                                            {{currency($user->payment[0]->overall)}}
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->created_at)
                                            <span class="text-muted">{{$user->created_at->diffForHumans()}}</span>
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.statement_user', $user->id)}}">View History</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                <tfoot>
                                    <tr>
                                        <td>@lang('admin.fleets.name')</td>
                                        <td>@lang('admin.mobile')</td>
                                        <td>@lang('admin.fleets.Total_Rides')</td>
                                        <td>@lang('admin.users.Total_Spending')</td>
                                        <td>@lang('admin.fleets.Joined_at')</td>
                                        <td>@lang('admin.fleets.Details')</td>
                                    </tr>
                                </tfoot>
                            </table>
                            @include('common.pagination')
                            @else
                            <h6 class="no-result">Results not found</h6>
                            @endif 

                        <!-- </div>
                    </div>

                </div>

            </div> -->

        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection
