@extends('layouts.admin')

@section('title', 'Map View ')
@section('content')
<div class="page">
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
        <li class="breadcrumb-item active">Map View</li>
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
            <h5 class="example-title">Map View</h5>
            <div class="row">
                <div class="col-md-12">
                    <div id="map"></div>
                    <div id="legend" class="showlegent"><h3>Note: </h3></div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>
</div>
@endsection

@section('style')
<style type="text/css">
div#legend {
    left: 0px;
    right: 80% !important;
}
    #map {
        height: 100%;
        min-height: 500px;
    }
    div#map {
    position: inherit !important;
}
    
    #legend {
        font-family: Arial, sans-serif;
        background: rgba(255,255,255,0.8);
        padding: 10px;
        margin: 10px;
        border: 2px solid #f3f3f3;
    }


    #legend h3 {
        margin-top: 0;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
    }

    #legend img {
        vertical-align: middle;
        margin-bottom: 5px;
    }
</style>
@endsection

@section('script')

<script>
 
 
    var map;
    var users;
    var providers;
    var ajaxMarkers = [];
    var googleMarkers = [];
    var mapIcons = {
        user: 'https://phplaravel-341895-1350219.cloudwaysapps.com/asset/img/marker-user.png',
        active: 'https://phplaravel-341895-1350219.cloudwaysapps.com/asset/img/marker-car.png',
        riding: 'https://phplaravel-341895-1350219.cloudwaysapps.com/asset/img/marker-car.png',
        offline: 'https://phplaravel-341895-1350219.cloudwaysapps.com/asset/img/marker-home.png',
        unactivated: 'https://phplaravel-341895-1350219.cloudwaysapps.com/asset/img/marker-plus.png'
    }

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 0, lng: 0},
            zoom: 2,
            minZoom: 1
        });

        setInterval(ajaxMapData, 3000);

        var legend = document.getElementById('legend');

        var div = document.createElement('div');
        div.innerHTML = '<img src="' + mapIcons['user'] + '"> ' + 'User';
        legend.appendChild(div);

        // var div = document.createElement('div');
        // div.innerHTML = '<img src="' + mapIcons['offline'] + '"> ' + 'Driver in Rest';
        // legend.appendChild(div);
        
        var div = document.createElement('div');
        div.innerHTML = '<img src="' + mapIcons['active'] + '"> ' + 'Driver Available';
        legend.appendChild(div);
        
        // var div = document.createElement('div');
        // div.innerHTML = '<img src="' + mapIcons['unactivated'] + '"> ' + 'Inactive Driver';
        // legend.appendChild(div);
        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
        
        google.maps.Map.prototype.clearOverlays = function() {
            for (var i = 0; i < googleMarkers.length; i++ ) {
                googleMarkers[i].setMap(null);
            }
            googleMarkers.length = 0;
        }

    }
    $( window ).load(function() {
        $('#legend').css({ "right": "auto" });
    });

    function ajaxMapData() {
        map.clearOverlays();
        $.ajax({
            url: '/admin/map/ajax',
            dataType: "JSON",
            headers: {'X-CSRF-TOKEN': window.Laravel.csrfToken },
            type: "GET",
            success: function(data) {
                console.log('Ajax Response', data);
                ajaxMarkers = data;
            }
        });

        ajaxMarkers ? ajaxMarkers.forEach(addMarkerToMap) : '';
    }

    function addMarkerToMap(element, index) {
        
        marker = new google.maps.Marker({
            position: {
                lat: element.latitude,
                lng: element.longitude
            },
            id: element.id,
            map: map,
            title: element.first_name + " " +element.last_name,
            icon : mapIcons[element.service ? element.service.status : element.status],
        });

        googleMarkers.push(marker);

        google.maps.event.addListener(marker, 'click', function() {
            window.location.href = '/admin/' + element.service ? 'provider' : 'user' + '/' +element.user_id;
        });
    }
   
</script>
<script src="//maps.googleapis.com/maps/api/js?key={{ Config::get('constants.map_key') }}&libraries=places&callback=initMap" async defer></script>
@endsection