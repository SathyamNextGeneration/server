@extends('layouts.admin')

@section('style')
<link rel="stylesheet" href="{{ asset('admin-new/global/vendor/c3/c3.css')}}">
<style>
  .h-450 {
    height: 450px !important;
    overflow: hidden;
  }
</style>
@endsection
@section('content')
<!-- Page -->
<div class="page">
  <div class="page-content container-fluid">

    <div class="row" data-plugin="matchHeight" data-by-row="true">
      <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea One-->
        <div class="card card-shadow" id="widgetLineareaOne">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10">
                <i class="icon md-car grey-600 font-size-24 vertical-align-bottom mr-5"></i>
                @lang('admin.dashboard.Rides')
              </div>
              <span class="float-right grey-700 font-size-30">
                @if (!is_null($totalRides))
                {{$totalRides}}
                @endif
              </span>
            </div>
            {{-- <div class="mb-20 grey-500">
              <i class="icon md-long-arrow-up green-500 font-size-16"></i>
              15% From this yesterday
            </div>
            <div class="ct-chart h-50"></div> --}}
          </div>
        </div>
        <!-- End Widget Linearea One -->
      </div>
      <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea Two -->
        <div class="card card-shadow" id="widgetLineareaTwo">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10">
                <i class="icon md-flash grey-600 font-size-24 vertical-align-bottom mr-5"></i>
                @lang('admin.dashboard.Revenue')
              </div>
              <span class="float-right grey-700 font-size-30">{{str_replace(',','.',currency($revenue))}}</span>
            </div>
            {{-- <div class="mb-20 grey-500">
              <i class="icon md-long-arrow-up green-500 font-size-16"></i>
              34.2% From this week
            </div>
            <div class="ct-chart h-50"></div> --}}
          </div>
        </div>
        <!-- End Widget Linearea Two -->
      </div>
      <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea Three -->
        <div class="card card-shadow" id="widgetLineareaThree">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10">
                <i class="icon md-chart grey-600 font-size-24 vertical-align-bottom mr-5"></i>
                @lang('admin.dashboard.passengers')
              </div>
              <span class="float-right grey-700 font-size-30">{{$users}}</span>
            </div>
            {{-- <div class="mb-20 grey-500">
              <i class="icon md-long-arrow-down red-500 font-size-16"></i>
              15% From this yesterday
            </div>
            <div class="ct-chart h-50"></div> --}}
          </div>
        </div>
        <!-- End Widget Linearea Three -->
      </div>
      <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea Four -->
        <div class="card card-shadow" id="widgetLineareaFour">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10">
                <i class="icon md-view-list grey-600 font-size-24 vertical-align-bottom mr-5"></i>
                @lang('admin.dashboard.scheduled')
              </div>
              <span class="float-right grey-700 font-size-30">{{$scheduled_rides}}</span>
            </div>
            {{-- <div class="mb-20 grey-500">
              <i class="icon md-long-arrow-up green-500 font-size-16"></i> 18.4% From this yesterday
            </div>
            <div class="ct-chart h-50"></div> --}}
          </div>
        </div>
        <!-- End Widget Linearea Four -->

      </div>
    </div>
    <div class="row" data-plugin="matchHeight" data-by-row="true">
      <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea One-->
        <div class="card card-shadow" id="cancel_count">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10">
                <i class="icon wb-close-mini grey-600 font-size-24 vertical-align-bottom mr-5"></i>
                @lang('admin.dashboard.cancel_count')
              </div>
              <span class="float-right grey-700 font-size-30">
                {{$user_cancelled}}
              </span>
            </div>
            {{-- <div class="mb-20 grey-500">
              <i class="icon md-long-arrow-up red-500 font-size-16"></i>
              15% From this yesterday
            </div>
            <div class="ct-chart h-50"></div> --}}
          </div>
        </div>
        <!-- End Widget Linearea One -->
      </div>
      <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea Two -->
        <div class="card card-shadow" id="provider_cancel_count">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10">
                <i class="icon wb-close-mini grey-600 font-size-24 vertical-align-bottom mr-5"></i>
                @lang('admin.dashboard.provider_cancel_count')
              </div>
              <span class="float-right grey-700 font-size-30">{{$provider_cancelled}}</span>
            </div>
            {{-- <div class="mb-20 grey-500">
              <i class="icon md-long-arrow-up green-500 font-size-16"></i>
              34.2% From this week
            </div>
            <div class="ct-chart h-50"></div> --}}
          </div>
        </div>
        <!-- End Widget Linearea Two -->
      </div>
      <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea Three -->
        <div class="card card-shadow" id="providers">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10">
                <i class="icon md-chart grey-600 font-size-24 vertical-align-bottom mr-5"></i>
                @lang('admin.dashboard.providers')
              </div>
              <span class="float-right grey-700 font-size-30">{{$provider}}</span>
            </div>
            {{-- <div class="mb-20 grey-500">
              <i class="icon md-long-arrow-down red-500 font-size-16"></i>
              15% From this yesterday
            </div>
            <div class="ct-chart h-50"></div> --}}
          </div>
        </div>
        <!-- End Widget Linearea Three -->
      </div>
      <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea Four -->
        <div class="card card-shadow" id="fleets">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10">
                <i class="icon md-view-list grey-600 font-size-24 vertical-align-bottom mr-5"></i>
                @lang('admin.dashboard.fleets')
              </div>
              <span class="float-right grey-700 font-size-30">{{$fleet}}</span>
            </div>
            {{-- <div class="mb-20 grey-500">
              <i class="icon md-long-arrow-up green-500 font-size-16"></i> 18.4% From this yesterday
            </div>
            <div class="ct-chart h-50"></div> --}}
          </div>
        </div>
        <!-- End Widget Linearea Four -->
      </div>


      <div class="col-xxl-7 col-lg-7">
        <!-- Widget Jvmap -->
        <div class="card card-shadow">
          <div class="card-block p-0">
            <div id="widgetJvmap" class="h-450"></div>
          </div>
        </div>
        <!-- End Widget Jvmap -->
      </div>

      <div class="col-xxl-5 col-lg-5">
        <!-- Widget Current Chart -->
        <div class="card card-shadow" style="height: 450px;">
          <!-- Example C3 Spline -->
          <div class="example-wrap">
            <h4 class="panel-title">Open & Close Request</h4>
            <div class="example">
              <div id="exampleC3SimpleLine"></div>
            </div>
          </div>
          <!-- End Example C3 Spline -->
        </div>
        <!-- End Widget Current Chart -->
      </div>
      <div class="col-xxl-7 col-lg-6">
        <!-- Panel Projects Status -->
        <div class="panel" id="projects-status">
          <div class="panel-heading">
            <h3 class="panel-title">
              @lang('admin.dashboard.Recent_Rides')
            </h3>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
                @if (is_null($rides))
                <tr>
                  <th>Selecione uma cidade</th>
                </tr>
                @else
                @foreach($rides as $index => $ride)
                <tr>
                  <th scope="row">{{$index + 1}}</th>
                  <td>{{$ride->user->first_name}} {{$ride->user->last_name}}</td>

                  <td>
                    <span scope="row">{{$ride->created_at->diffForHumans()}}</span>
                  </td>
                  <td>
                    @if($ride->status == "COMPLETED")
                    <span class="badge badge-success">DONE</span>
                    @elseif($ride->status == "CANCELLED")
                    @if ($ride->cancelled_by == "NONE")
                    <span class="badge badge-danger">UNASSIGNED</span>
                    @else
                    <span class="badge badge-danger">CANCELLED ({{$ride->cancelled_by}})</span>
                    @endif
                    @elseif($ride->status == "ARRIVED")
                    <span class="badge badge-info">IN PROGRESS</span>
                    @elseif($ride->status == "SEARCHING")
                    <span class="badge badge-info">SEARCHING</span>
                    @elseif($ride->status == "ACCEPTED")
                    <span class="badge badge-info">DRIVER ON THE WAY</span>
                    @elseif($ride->status == "STARTED")
                    <span class="badge badge-info">ACCEPTED TRIP</span>
                    @elseif($ride->status == "DROPPED")
                    <span class="badge badge-info">IN DESTINY</span>
                    @elseif($ride->status == "PICKEDUP")
                    <span class="badge badge-info">STARTED</span>
                    @elseif($ride->status == "SCHEDULED")
                    <span class="badge badge-info">SCHEDULED</span>
                    @endif
                  </td>
                  <td>
                    <a class="text-primary" href="{{route('admin.requests.show',$ride->id)}}"><span
                        class="underline">@lang('admin.dashboard.View_Ride_Details')</span></a>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
        <!-- End Panel Projects Stats -->
      </div>
      <div class="col-xxl-5 col-lg-6">

        <!-- Panel Projects -->
        <div class="panel" id="projects">
          <div class="panel-heading">
            <h3 class="panel-title">@lang('admin.dashboard.wallet_summary')</h3>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
                @php($total=$wallet['admin'])
                <tr>
                  <th scope="row">@lang('admin.dashboard.wallet_summary_admin_credit')</th>
                  <td><span data-plugin="peityPie" data-skin="green">9/10</span></td>
                  <td class="text-success">{{currency($wallet['admin'])}}</td>
                </tr>
                <tr>
                  <th scope="row">@lang('admin.dashboard.wallet_summary_provider_credit')</th>
                  @if($wallet['provider_credit'])
                  @php($total=$total-$wallet['provider_credit'][0]['total_credit'])
                  <td><span data-plugin="peityPie" data-skin="green">9/10</span></td>
                  <td class="text-success">
                    {{currency($wallet['provider_credit'][0]['total_credit'])}}</td>
                  @else
                  <td><span data-plugin="peityPie" data-skin="green">9/10</span></td>
                  <td class="text-success">{{currency()}}</td>
                  @endif
                </tr>

                <tr>
                  <th scope="row">@lang('admin.dashboard.wallet_summary_provider_debit')</th>
                  @if($wallet['provider_debit'])
                  <td><span data-plugin="peityPie" data-skin="red">9/10</span></td>
                  <td class="text-danger">{{currency($wallet['provider_debit'][0]['total_debit'])}}</td>
                  @else
                  <td><span data-plugin="peityPie" data-skin="red">9/10</span></td>
                  <td class="text-danger">{{currency()}}</td>
                  @endif
                </tr>


                <tr>
                  <th scope="row">@lang('admin.dashboard.wallet_summary_commission')</th>
                  <td><span data-plugin="peityPie" data-skin="green">9/10</span></td>
                  <td class="text-success">{{currency($wallet['admin_commission'])}}</td>
                </tr>


                <tr>
                  <th scope="row">@lang('admin.dashboard.wallet_summary_tips')</th>
                  <td><span data-plugin="peityPie" data-skin="red">9/10</span></td>
                  <td class="text-danger">{{currency($wallet['tips'])}}</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>

        <!-- End Panel Projects -->
      </div>


    </div>
  </div>
</div>
<!-- End Page -->
@endsection
@section('script')
<script type="text/javascript">
  (function (global, factory) {
  if (typeof define === "function" && define.amd) {
    define("/dashboard/v1", ["jquery", "Site"], factory);
  } else if (typeof exports !== "undefined") {
    factory(require("jquery"), require("Site"));
  } else {
    var mod = {
      exports: {}
    };
    factory(global.jQuery, global.Site);
    global.dashboardV1 = mod.exports;
  }
})(this, function (_jquery, _Site) {
  "use strict";

  _jquery = babelHelpers.interopRequireDefault(_jquery);
  (0, _jquery.default)(document).ready(function ($$$1) {
    (0, _Site.run)(); // Widget Linearea One
    // ---------------------
    // ----------------------

  (function () {
    var simple_line_chart = c3.generate({
      bindto: '#exampleC3SimpleLine',
      data: {
        columns: [<?php echo $jsondata['open']; ?>, <?php echo $jsondata['close']; ?>]
      },
      color: {
        pattern: [Config.colors("green", 600), Config.colors("red", 600)]
      },
      axis: {
        x: {
          tick: {
            outer: false
          }
        },
        y: {
          max: 300,
          min: 0,
          tick: {
            outer: false,
            count: 7,
            values: [0, 50, 100, 150, 200, 250, 300]
          }
        }
      },
      grid: {
        x: {
          show: false
        },
        y: {
          show: true
        }
      }
    });
  })(); // Example C3 Line Regions
  // -----------------------


    (function () {
      //chart-linearea-one
      new Chartist.Line('#fleets .ct-chart', {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8'],
        series: [<?php echo $jsondata['totalCancelledGraph'];?>]
      }, {
        low: 0,
        showArea: true,
        showPoint: false,
        showLine: false,
        fullWidth: true,
        chartPadding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
        axisX: {
          showLabel: false,
          showGrid: false,
          offset: 0
        },
        axisY: {
          showLabel: false,
          showGrid: false,
          offset: 0
        }
      });
    })(); // Widget Linearea Two
    // ---------------------



    (function () {
      //chart-linearea-one
      new Chartist.Line('#providers .ct-chart', {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8'],
        series: [<?php echo $jsondata['totalprovidergraph'];?>]
      }, {
        low: 0,
        showArea: true,
        showPoint: false,
        showLine: false,
        fullWidth: true,
        chartPadding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
        axisX: {
          showLabel: false,
          showGrid: false,
          offset: 0
        },
        axisY: {
          showLabel: false,
          showGrid: false,
          offset: 0
        }
      });
    })(); // Widget Linearea Two
    // ---------------------


    (function () {
      //chart-linearea-one
      new Chartist.Line('#provider_cancel_count .ct-chart', {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8'],
        series: [<?php echo $jsondata['totalprovider_cancelledgraph'];?>]
      }, {
        low: 0,
        showArea: true,
        showPoint: false,
        showLine: false,
        fullWidth: true,
        chartPadding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
        axisX: {
          showLabel: false,
          showGrid: false,
          offset: 0
        },
        axisY: {
          showLabel: false,
          showGrid: false,
          offset: 0
        }
      });
    })(); // Widget Linearea Two
    // ---------------------



    (function () {
      //chart-linearea-one
      new Chartist.Line('#cancel_count .ct-chart', {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8'],
        series: [<?php echo $jsondata['user_cancelledgraph'];?>]
      }, {
        low: 0,
        showArea: true,
        showPoint: false,
        showLine: false,
        fullWidth: true,
        chartPadding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
        axisX: {
          showLabel: false,
          showGrid: false,
          offset: 0
        },
        axisY: {
          showLabel: false,
          showGrid: false,
          offset: 0
        }
      });
    })(); // Widget Linearea Two
    // ---------------------


    (function () {
      //chart-linearea-one
      new Chartist.Line('#widgetLineareaOne .ct-chart', {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8'],
        series: [<?php echo $jsondata['totalRidesGraph']; ?>]
      }, {
        low: 0,
        showArea: true,
        showPoint: false,
        showLine: false,
        fullWidth: true,
        chartPadding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
        axisX: {
          showLabel: false,
          showGrid: false,
          offset: 0
        },
        axisY: {
          showLabel: false,
          showGrid: false,
          offset: 0
        }
      });
    })(); // Widget Linearea Two
    // ---------------------


    (function () {
      //chart-linearea-two
      new Chartist.Line('#widgetLineareaTwo .ct-chart', {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9'],
        series: [<?php echo $jsondata['totalrevenuegraph'];?>]
      }, {
        low: 0,
        showArea: true,
        showPoint: false,
        showLine: false,
        fullWidth: true,
        chartPadding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
        axisX: {
          showLabel: false,
          showGrid: false,
          offset: 0
        },
        axisY: {
          showLabel: false,
          showGrid: false,
          offset: 0
        }
      });
    })(); // Widget Linearea Three
    // ---------------------


    (function () {
      //chart-linearea-three
      new Chartist.Line('#widgetLineareaThree .ct-chart', {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8'],
        series: [<?php echo $jsondata['PassengerstotalcountGraphData']; ?>]
      }, {
        low: 0,
        showArea: true,
        showPoint: false,
        showLine: false,
        fullWidth: true,
        chartPadding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
        axisX: {
          showLabel: false,
          showGrid: false,
          offset: 0
        },
        axisY: {
          showLabel: false,
          showGrid: false,
          offset: 0
        }
      });
    })(); // Widget Linearea Four
    // ---------------------


    (function () {
      //chart-linearea-four
      new Chartist.Line('#widgetLineareaFour .ct-chart', {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9'],
        series: [<?php echo $ScheduledGraph; ?>]
      }, {
        low: 0,
        showArea: true,
        showPoint: false,
        showLine: false,
        fullWidth: true,
        chartPadding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
        axisX: {
          showLabel: false,
          showGrid: false,
          offset: 0
        },
        axisY: {
          showLabel: false,
          showGrid: false,
          offset: 0
        }
      });
    })(); // Widget VectorMap
    // ----------------


    (function () {
      var defaults = Plugin.getDefaults('vectorMap');
      var options = $$$1.extend({}, defaults, {
        markers: <?php echo json_encode($mapdata); ?>,
        
      }, true);
      $$$1('#widgetJvmap').vectorMap(options);
    })(); // Widget Current Chart
    // --------------------


    (function () {
      //chart-bar-withfooter
      new Chartist.Bar('#widgetCurrentChart .ct-chart', {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        series: [[160, 390, 280, 440, 410, 360, 200], [600 - 160, 600 - 390, 600 - 280, 600 - 440, 600 - 410, 600 - 360, 600 - 200]]
      }, {
        stackBars: true,
        fullWidth: true,
        seriesBarDistance: 0,
        axisX: {
          showLabel: true,
          showGrid: false,
          offset: 30
        },
        axisY: {
          showLabel: true,
          showGrid: false,
          offset: 30,
          labelOffset: {
            x: 0,
            y: 15
          }
        }
      });
    })();

    Waves.attach('.page-content .btn-floating', ['waves-light']);
  });
});

        var _registration = null;
        var rota = "{{ route('admin.dashboard') }}";

        $('#city').on("change", function () {
            if($(this).val() === ""){
                window.location.href = rota;
            }else{
               window.location.href = rota + "?city="+$(this).val(); 
            }
           
        });

        function registerServiceWorker() {
            return navigator.serviceWorker.register("{{ asset('js/service-worker.js') }}")
                .then(function (registration) {
                    _registration = registration;
                    return registration;
                })
                .catch(function (err) {
                    console.error('Unable to register service worker.', err);
                });
        }

        function askPermission() {
            return new Promise(function (resolve, reject) {
                const permissionResult = Notification.requestPermission(function (result) {
                    resolve(result);
                });

                if (permissionResult) {
                    permissionResult.then(resolve, reject);
                }
            })
                .then(function (permissionResult) {
                    if (permissionResult !== 'granted') {
                        throw new Error('We weren\'t granted permission.');
                    } else {
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
            //const rawData = new Blob([base64], {type: 'text/plain'})
            const outputArray = new Uint8Array(rawData.length);

            for (let i = 0; i < rawData.length; ++i) {
                outputArray[i] = rawData.charCodeAt(i);
            }
            return outputArray;
        }

        function getSWRegistration() {
            return new Promise(function (resolve, reject) {
                if (_registration != null) {
                    resolve(_registration);
                } else {
                    reject(Error("It broke"));
                }
            });
        }

        function subscribeUserToPush() {
            getSWRegistration()
                .then(function (registration) {
                    const subscribeOptions = {
                        userVisibleOnly: true,
                        applicationServerKey: urlBase64ToUint8Array('BCBsViMBVOOYATOaY4AjZOl1XCwiBqXbQtMcp4RXRmyfR927SqcCUt2SYwiF3iy3yxf3n60jVf8XF9vDE2ShVtM')
                    };
                    return registration.pushManager.subscribe(subscribeOptions);

                })
                .then(function (pushSubscription) {
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
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                }
            });
        }


        registerServiceWorker();

        askPermission();

</script>

@endsection