@extends('layouts.admin')

@section('title', 'Dispatcher')

@section('content')

<div className="col-md-12 hidden" id="user_search" style="display:none ;position: absolute;top: 117px;/* margin-bottom: 20px; */">
  <div class="form-group">
      <label for="namesearch" class="col-md-2 col-form-label">User Name</label>
      <div class="input-group">
      <input class="form-control" type="text" name="name" required id="namesearch" placeholder="Search by Name" required="" aria-describedby="basic-addon2" />
      <span class="input-group-addon fa fa-search"  id="basic-addon2"></span>
       </div>
  </div>
</div>
</div>
<div class="page">
  <div class="message" id="message">
  </div>
<div class="content-area py-1" id="dispatcher-panel">
</div>
</div>
@endsection


@section('style')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style type="text/css">
div#dispatcher-panel {
    padding-left: 20px;
}
#namesearch {
    margin-top: -41px;
}
input#namesearch {
    margin-top: -19px;
}

div#user_search {
    float: left;
    margin-left: 5px;
}

/* .navbar-nav .nav-item
{
  margin:0px !important;
  padding-left:15px;
}
ul.nav.navbar-nav.float-xs-right {
    padding-right: 651px;
} */
.navbar-nav .nav-item {
    float: left !important;
   margin:20px;
}
input#namesearch {
    width: 200px;
    margin-left: 173px;
}
div#process-filters {
    display: block;
    float: right;
}
.hidden  {
  display: none;
}
    .my-card input{
        margin-bottom: 10px;
    }
    .my-card label.checkbox-inline{
        margin-top: 10px;
        margin-right: 5px;
        margin-bottom: 0;
    }
    .my-card label.checkbox-inline input{
        position: relative;
        top: 3px;
        margin-right: 3px;
    }
    .my-card .card-header .btn{
        font-size: 10px;
        padding: 3px 7px;   
    }
    .tag.my-tag{
        padding: 10px 15px;
        font-size: 11px;
    }

    .add-nav-btn{
        padding: 5px 15px;
        min-width: 0;
    }

    .dispatcher-nav li span {
        background-color: transparent;
        color: #000!important;
        padding: 5px 12px;
    }

    .dispatcher-nav li span:hover,
    .dispatcher-nav li span:focus,
    .dispatcher-nav li span:active {
        background-color: #20b9ae;
        color: #fff!important;
        padding: 5px 12px;
    }

    .dispatcher-nav li.active span,
    .dispatcher-nav li span:hover,
    .dispatcher-nav li span:focus,
    .dispatcher-nav li span:active {
        background-color: #20b9ae;
        color: #fff!important;
        padding: 5px 12px;
    }
    h6.media-heading {
        color: #565658;
    }
    @media (min-width: 768px)
    {
      .navbar-nav {
          float: left;
          margin: 0;
          margin-top: 0px;
      }
    }
    .navbar-nav
    {
      display:block;
    }


    @media (max-width:767px){
        .navbar-nav {
            display: inline-block;
            float: none!important;
            margin-top: 10px;
            width: 100%;
        }
        .navbar-nav .nav-item {
            display: block;
            width: 100%;
            float: none;
        }
        .navbar-nav .nav-item .btn {
            display: block;
            width: 100%;
        }
        .navbar .navbar-toggleable-sm {
            padding-top: 0;
        }
    }

    .items-list {
        height: 450px;
        overflow-y: scroll;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" />
<link rel="stylesheet" type="text/css" href="{{asset('asset/css/jquery-ui.css')}}" />
@endsection

@section('script')    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.5.0/react.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.5.0/react-dom.js"></script>
<script src="https://unpkg.com/babel-standalone@6.24.0/babel.min.js"></script>

<script type="text/javascript">
    window.Moob = {!! json_encode([
        "minDate" => \Carbon\Carbon::today()->format('Y-m-d\TH:i'),
        "maxDate" => \Carbon\Carbon::today()->addDays(30)->format('Y-m-d\TH:i'),
        "map" => false,
    ]) !!}
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("body").addClass("compact-sidebar");
    });
</script>

<script type="text/javascript" src="{{ asset('asset/js/dispatcher-map-admin.js') }}"></script>
<script type="text/babel" src="{{ asset('asset/js/dispatcher-admin.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ Config::get('constants.map_key') }}&libraries=places&callback=initMap" async defer></script>
<script type="text/javascript" src="{{ asset('asset/js/jquery-ui.js') }}"></script>
<script src="{{asset('main/vendor/maskmoney/jquery.maskMoney.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
var sflag = '{{$type}}';
$('#namesearch').autocomplete({
    source: function (request, response) {
        $.ajax
                ({
                    type: "GET",
                    url: '{{ route("admin.usersearch") }}',
                    data: {stext: request.term, sflag: sflag},
                    dataType: "json",
                    success: function (responsedata, status, xhr)
                    {
                        if (!responsedata.data.length) {
                            var data = [];
                            data.push({
                                id: 0,
                                label: "Sem registros"
                            });
                            response(data);
                        } else {
                            response($.map(responsedata.data, function (item) {
                                if (sflag == 1)
                                    var name_alias = item.first_name + " " +item.last_name + " - " + item.id;
                                else
                                    var name_alias = item.first_name + " - " + item.id;

                                return {
                                    value: name_alias,
                                    id: item.id,
                                    first_name: item.first_name,
                                    last_name: item.last_name,
                                    email: item.email,
                                    mobile: item.mobile
                                }
                            }));
                        }
                    }
                });
    },
    minLength: 2,
    change: function (event, ui)
    {
        if (ui.item == null) {
            $("#namesearch").val('');
            $("#namesearch").focus();
            $("#wallet_balance").text("-");
        } else {
            if (ui.item.id == 0) {
                $("#namesearch").val('');
                $("#namesearch").focus();
                $("#wallet_balance").text("-");
            }
        }
    },
    select: function (event, ui) {

      document.getElementById('first_name').value=ui.item.first_name;
      document.getElementById('last_name').value=ui.item.last_name;
      document.getElementById('email').value=ui.item.email;
      document.getElementById('mobile').value=ui.item.mobile;
        $("#from_id").val(ui.item.id);
        $("#wallet_balance").text(ui.item.bal);
    }
});

$('#amount').maskMoney()

</script>
<script type="text/javascript">

/*var _registration = null;
function registerServiceWorker() {
  return navigator.serviceWorker.register("{{ asset('js/service-worker.js') }}")
  .then(function(registration) {
    console.log('Service worker successfully registered.');
    _registration = registration;
    return registration;
  })
  .catch(function(err) {
    console.error('Unable to register service worker.', err);
  });
}

function askPermission() {
  return new Promise(function(resolve, reject) {
    const permissionResult = Notification.requestPermission(function(result) {
      resolve(result);
    });

    if (permissionResult) {
      permissionResult.then(resolve, reject);
    }
  })
  .then(function(permissionResult) {
    if (permissionResult !== 'granted') {
      throw new Error('We weren\'t granted permission.');
    }
    else{
      subscribeUserToPush();
    }
  });
}

function urlBase64ToUint8Array(base64String) {
  const padding = '='.repeat((4 - base64String.length % 4) % 4);
  const base64 = (base64String + padding)
    .replace(/\-/g, '+')
    .replace(/_/g, '/');

  const rawData = window.atob(base64);
  const outputArray = new Uint8Array(rawData.length);

  for (let i = 0; i < rawData.length; ++i) {
    outputArray[i] = rawData.charCodeAt(i);
  }
  return outputArray;
}

function getSWRegistration(){
  var promise = new Promise(function(resolve, reject) {
  // do a thing, possibly async, then…

  if (_registration != null) {
    resolve(_registration);
  }
  else {
    reject(Error("It broke"));
  }
  });
  return promise;
}

function subscribeUserToPush() {
  getSWRegistration()
  .then(function(registration) {
    console.log(registration);
    const subscribeOptions = {
      userVisibleOnly: true,
      applicationServerKey: urlBase64ToUint8Array(
        "{{env('VAPID_PUBLIC_KEY')}}"
      )
    };
    return registration.pushManager.subscribe(subscribeOptions);
  })
  .then(function(pushSubscription) {
    console.log('Received PushSubscription: ', JSON.stringify(pushSubscription));
    sendSubscriptionToBackEnd(pushSubscription);
    return pushSubscription;
  });
}

function sendSubscriptionToBackEnd(subscription) {
    $.ajax({
            url: "/save-subscription/{{Auth::user()->id}}/admin",
            headers: {'Content-Type': 'application/json'},
            type: 'post',
            data: JSON.stringify(subscription),
            success:function(data, textStatus, jqXHR) {
                console.log(data);
            }
        });
}


  askPermission();

  registerServiceWorker();*/

</script>

@endsection