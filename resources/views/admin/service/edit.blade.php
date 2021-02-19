@extends('layouts.admin')
@section('title', 'Update Service Type ')

@section('content')

<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">@lang('admin.service.Update_User')</li>
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
           <form novalidate class="form-horizontal" action="{{route('admin.service.update', $service->id )}}" method="POST" enctype="multipart/form-data" role="form">
                {{csrf_field()}}
                <div class="row  mb-4 p-4">

                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group col-md-4 mb-4">
                    <label for="name" class="col-xs-2 col-form-label">@lang('admin.service.Service_Name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $service->name }}" name="name" required id="name" placeholder="Service Name">
                        @if($errors->has('name')) 
                            <div class="error">{{$errors->first('name')}}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="provider_name" class="col-xs-2 col-form-label">@lang('admin.service.Provider_Name')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $service->provider_name }}" name="provider_name" required id="provider_name" placeholder="Provider Name">
                        @if($errors->has('provider_name')) 
                            <div class="error">{{$errors->first('provider_name')}}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    
                    <label for="image" class="col-xs-2 col-form-label">@lang('admin.picture')</label>
                    <div class="col-xs-10">
                        
                        <input type="file" accept="image/*" name="image" class="dropify form-control-file" id="image" aria-describedby="fileHelp">
                        @if($errors->has('image')) 
                            <div class="error">{{$errors->first('image')}}</div>
                        @endif
                        @if(isset($service->image))
                        <img style="height: 47px;margin-bottom: 15px;border-radius: 2em;margin-left: 135px;margin-top: -45px;" src="{{ $service->image }}">
                        @endif
                       
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="calculator" class="col-xs-2 col-form-label">@lang('admin.service.Pricing_Logic')</label>
                    <div class="col-xs-10">
                        <select class="form-control" id="calculator" name="calculator">
                            <option value="MIN" @if($service->calculator =='MIN') selected @endif>@lang('servicetypes.MIN')</option>
                            <option value="HOUR" @if($service->calculator =='HOUR') selected @endif>@lang('servicetypes.HOUR')</option>
                            <option value="DISTANCE" @if($service->calculator =='DISTANCE') selected @endif>@lang('servicetypes.DISTANCE')</option>
                            <option value="DISTANCEMIN" @if($service->calculator =='DISTANCEMIN') selected @endif>@lang('servicetypes.DISTANCEMIN')</option>
                            <option value="DISTANCEHOUR" @if($service->calculator =='DISTANCEHOUR') selected @endif>@lang('servicetypes.DISTANCEHOUR')</option>
                        </select>
                        @if($errors->has('calculator')) 
                            <div class="error">{{$errors->first('calculator')}}</div>
                        @endif
                    </div>
                </div>

 

                <div class="form-group col-md-4 mb-4">
                    <label for="fixed" class="col-xs-2 col-form-label">@lang('admin.service.Base_Price') ({{ currency('') }})</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $service->fixed }}" name="fixed" required id="fixed" placeholder="Base Price">
                        @if($errors->has('fixed')) 
                            <div class="error">{{$errors->first('fixed')}}</div>
                        @endif
                    </div>
                </div> 
                
                {{--<!-- Base distance -->
                <div class="form-group col-md-4 mb-4">
                    <label for="distance" class="col-xs-2 col-form-label">@lang('admin.service.Base_Distance') ({{ distance() }})</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $service->distance }}" name="distance" required id="distance" placeholder="Base Distance">
                        @if($errors->has('distance')) 
                            <div class="error">{{$errors->first('distance')}}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group col-md-4 mb-4">
                    <label for="price" class="col-xs-2 col-form-label">@lang('admin.service.unit') ({{ distance() }})</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $service->price }}" name="price" required id="price" placeholder="Unit Distance Price">
                        @if($errors->has('price')) 
                            <div class="error">{{$errors->first('price')}}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group col-md-4 mb-4">
                    <label for="minute" class="col-xs-2 col-form-label">@lang('admin.service.unit_time') ({{ currency() }})</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $service->minute }}" name="minute" required id="minute" placeholder="Unit Time Pricing">
                        @if($errors->has('minute')) 
                            <div class="error">{{$errors->first('minute')}}</div>
                        @endif
                    </div>
                </div>
                 <!-- Set Hour Price -->
                 @if($service->calculator =='DISTANCEHOUR')
               
                  <div class="form-group col-md-4 mb-4" >
                    <label for="fixed" class="col-xs-2 col-form-label">@lang('admin.service.hourly_Price') ({{ currency('') }})</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $service->hour }}" name="hour"  id="hourly_price" placeholder="Set Hour Price">
                        @if($errors->has('hour')) 
                            <div class="error">{{$errors->first('hour')}}</div>
                        @endif
                    </div>
                </div>
                @else
                <div class="form-group col-md-4 mb-4" >
                    <label for="fixed" class="col-xs-2 col-form-label">@lang('admin.service.hourly_Price') ({{ currency('') }})</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="" name="hour"  id="hourly_price" placeholder="Set Hour Price (Only for DISTANCEHOUR)">
                        @if($errors->has('hour')) 
                            <div class="error">{{$errors->first('hour')}}</div>
                        @endif
                    </div>
                </div>
                @endif --}}

                 <div class="form-group col-md-4 mb-4">
                    <label for="capacity" class="col-xs-2 col-form-label">@lang('admin.service.Seat_Capacity')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number" value="{{ $service->capacity }}" name="capacity" required id="capacity" placeholder="Seat Capacity">
                        @if($errors->has('capacity')) 
                            <div class="error">{{$errors->first('capacity')}}</div>
                        @endif
                    </div>
                </div>



                 <div class="form-group col-md-12 mb-4">
                     <label for="description" class="col-xs-12 col-form-label" style="color: black;font-size: 25px;">Outstation Fare</label>
                </div>

                 <div class="form-group col-md-4 mb-4" id="outstation_price">
                    <label for="fixed" class="col-xs-2 col-form-label">@lang('admin.service.outstation_per_km') ({{ distance() }})</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text"  name="outstation_km"  value="{{$service->outstation_km}}" id="outstation_price" min="0" placeholder="Oneway Km Price">
                        @if($errors->has('outstation_km')) 
                            <div class="error">{{$errors->first('capoutstation_kmacity')}}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group col-md-4 mb-4" id="roundtrip_price">
                    <label for="fixed" class="col-xs-2 col-form-label">@lang('admin.service.roundtrip_per_km') ({{ distance() }})</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{$service->roundtrip_km}}" name="roundtrip_km"  id="roundtrip_price" min="0" placeholder="Roundtrip Km Price">
                        @if($errors->has('roundtrip_km')) 
                            <div class="error">{{$errors->first('roundtrip_km')}}</div>
                        @endif
                    </div>
                </div>


                 <div class="form-group col-md-4 mb-4" id="outstation_driver">
                    <label for="fixed" class="col-xs-2 col-form-label">@lang('admin.service.outstation_driverbata') ({{ currency() }})</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text"  name="outstation_driver"  value="{{$service->outstation_driver}}" id="outstation_driver" min="0" placeholder="Driver Bata per day">
                        @if($errors->has('outstation_driver')) 
                            <div class="error">{{$errors->first('outstation_driver')}}</div>
                        @endif
                    </div>
                </div>

                {{-- <div class="form-group col-md-12 mb-4">
                     <label for="description" class="col-xs-12 col-form-label" style="color: black;font-size: 25px;">Rental Fare</label>
                </div>


                 <div class="form-group col-md-4 mb-4" id="rental_fare">
                    <label for="fixed" class="col-xs-2 col-form-label">@lang('admin.service.rental_fare') ({{ currency() }})</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text"  name="rental_fare"  id="rental_fare" value="{{$service->rental_fare}}" placeholder="Set Hour Price">
                        @if($errors->has('rental_fare')) 
                            <div class="error">{{$errors->first('rental_fare')}}</div>
                        @endif
                    </div>
                </div> --}}

<div class="form-group col-md-12 mb-4">
                    <label for="description" class="col-xs-12 col-form-label" style="color: black;font-size: 25px;">@lang('admin.service.peak_title')
                        </label>
                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <!-- Set Peak Time -->
                                    <div class="col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>@lang('admin.service.peak_id')</th>
                                                        <th>@lang('admin.service.peak_time')</th>
                                                        <th>@lang('admin.service.peak_price')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($Peakhour as $index => $w)
                                                    <tr>
                                                        <td>{{$index + 1}}</td>
                                                        <td>{{ date('h:i A', strtotime($w->start_time)) }} - {{date('h:i A', strtotime($w->end_time))}}
                                                        </td>
                                                        <td> <input type="text" id="peak_price" name="peak_price[{{$w->id}}][id]"
                                                                value="@if($w->servicetimes){{ $w->servicetimes->min_price }}@endif" min="1">
                                                            <input type="hidden" name="peak_price[{{$w->id}}][status]"
                                                                value="@if($w->servicetimes)1 @else 0 @endif"> </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>@lang('admin.service.peak_id')</th>
                                                        <th>@lang('admin.service.peak_time')</th>
                                                        <th>@lang('admin.service.peak_price')</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                 <div class="form-group col-md-12 mb-4">
                     <label for="description" class="col-xs-12 col-form-label" style="color: black;font-size: 25px;">Rental Hour Pacakge</label>
                </div>
                 <div class="form-group col-md-4 mb-4" id="rental_fare">
                    <label for="rental_hour_price" class="col-xs-2 col-form-label">@lang('admin.service.hour_fare') ({{ currency() }})</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text"  name="rental_hour_price"  id="rental_hour_price" value="{{$service->rental_hour_price}}" placeholder="Set Hour Price">
                    </div>
                </div>
                 <div class="form-group col-md-4 mb-4" id="rental_fare">
                    <label for="rental_km_price" class="col-xs-2 col-form-label">@lang('admin.service.km_fare') ({{ currency() }})</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text"  name="rental_km_price"  id="rental_km_price" value="{{$service->rental_km_price}}" placeholder="Set KM Price">
                    </div>
                </div>
                <div class="form-group col-md-12 mb-4">
                    <label for="description" class="col-xs-12 col-form-label"
                        style="color: black;font-size: 25px;">@lang('admin.service.waiting_title')</label>
                </div>

                    <div class="form-group col-md-4 mb-4">
                        <label for="waiting_free_mins" class="col-xs-12 col-form-label">@lang('admin.service.waiting_wave')</label>
                        <div class="col-xs-10">
                        <input class="form-control" type="number" value="{{$service->waiting_free_mins}}" name="waiting_free_mins" id="waiting_free_mins" placehold="@lang('admin.service.waiting_wave')" min="0"></div>
                    </div>
                    
                    <div class="form-group col-md-4 mb-4">
                        <label for="waiting_min_charge" class="col-xs-12 col-form-label">@lang('admin.service.waiting_charge')</label>
                        <div class="col-xs-10">
                        <input class="form-control" type="number" value="{{$service->waiting_min_charge}}" name="waiting_min_charge" id="waiting_min_charge" placehold="@lang('admin.service.waiting_charge')" min="0"></div>
                    </div>
                </div>
                <div class="form-group col-md-12 mb-4">
                     <label for="description" class="col-xs-12 col-form-label" style="color: black;font-size: 25px;">Night Fare</label>
                </div>

                <!-- Set Night Fare -->
                <div class="form-group col-md-4 mb-4" id="hour_price">
                    <label for="night_fare" class="col-xs-2 col-form-label">@lang('admin.service.night_fare') (in %)</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ $service->night_fare ? $service->night_fare : 0.00  }}" name="night_fare"  id="night_fare" placeholder="Set percentage">
                    </div>
                </div>
 
                 
                <div class="form-group col-md-12 mb-4">
                     <label for="description" class="col-xs-12 col-form-label" style="color: black;font-size: 25px;">Clustured Price</label>
                </div>


                <div class="form-group col-md-12 mb-4" style="margin-right: 0px;margin-left: 0px;">
                                 <table class="table table-striped table-bordered dataTable" id="table-2">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>City Name</th>
                                        <th>Base Distance(0 KM)</th>
                                        <th>Distance Price (1 KM)</th>
                                        <th>City Limits(0KM)</th> 
                                        <th>Minute Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($geofencing as $index => $data)


                                <?php

                                    $service_fencing = \App\ServiceTypeGeoFencings::where('geo_fencing_id',$data->id)->where('service_type_id',$service->id)->first();
                                 ?>
                                    
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->city_name }}
                                         <input type="hidden" value="{{@$service_fencing->id ? @$service_fencing->id : 0 }}" name="geo_fencing[{{$data->id}}][id]"/> </td>
                                        

                                        <td><input class="form-control" type="number" value="{{@$service_fencing['distance']  ? @$service_fencing['distance'] : 0 }}" min="0" name="geo_fencing[{{$data->id}}][distance]" placeholder="Distance (0 KM)"/></td>
                                        

                                        <td><input class="form-control" type="number" value="{{@$service_fencing['price']  ? @$service_fencing['price'] : 0 }}" min="0" name="geo_fencing[{{$data->id}}][price]" placeholder="Distance Price"/></td>

                                        <td><input class="form-control" type="number" value="{{@$service_fencing['city_limits']  ? @$service_fencing['city_limits'] : 0 }}" min="0" name="geo_fencing[{{$data->id}}][city_limits]" placeholder="City Limits(0KM)"/></td> 

                                        <td><input class="form-control" type="number" value="{{@$service_fencing['minute']  ? @$service_fencing['minute'] : 0 }}" min="0" name="geo_fencing[{{$data->id}}][minute]" placeholder="Minutes Price"/></td> 
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                   <tr>
                                        <th>ID</th>
                                        <th>City Name</th>
                                        <th>Base Distance(0 KM)</th>
                                        <th>Distance Price (1 KM)</th>
                                        <th>City Limits(0KM)</th> 
                                        <th>Minute Price</th> 
                                    </tr>
                                </tfoot>
                            </table>
                </div>


                
                <div class="form-group col-md-12 mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{route('admin.service.index')}}" class="btn btn-danger btn-block">@lang('admin.cancel')</a>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary btn-block">@lang('admin.service.Update_Service_Type')</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
