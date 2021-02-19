<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title','Admin')</title>

  <link rel="apple-touch-icon" href="{{ config('constants.site_icon') }}">
  <link rel="shortcut icon" type="image/png" href="{{ config('constants.site_icon') }}">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset('admin-new/global/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-new/global/css/bootstrap-extend.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-new/global/css/site.min.css')}}">

  <!-- Plugins -->
  <link rel="stylesheet" href="{{ asset('admin-new/global/vendor/animsition/animsition.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-new/global/vendor/asscrollable/asScrollable.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-new/global/vendor/switchery/switchery.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-new/global/vendor/intro-js/introjs.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-new/global/vendor/slidepanel/slidePanel.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-new/global/vendor/flag-icon-css/flag-icon.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-new/global/vendor/waves/waves.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-new/global/vendor/chartist/chartist.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-new/global/vendor/jvectormap/jquery-jvectormap.css')}}">
  <link rel="stylesheet"
    href="{{ asset('admin-new/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css')}}">
  {{-- <link rel="stylesheet" href="{{ asset('admin-new/global/examples/css/dashboard/v1.css')}}"> --}}
  <link rel="stylesheet" href="{{ asset('admin-new/global/vendor/dropify/dropify.css')}}">

  <!-- Fonts -->
  <link rel="stylesheet" href="{{ asset('admin-new/global/fonts/material-design/material-design.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-new/global/fonts/brand-icons/brand-icons.min.css')}}">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

  <link rel="stylesheet" href="{{ asset('admin-new/global/fonts/web-icons/web-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-new/global/fonts/material-design/material-design.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-new/global/fonts/brand-icons/brand-icons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin-new/global/vendor/c3/c3.css')}}">

  @yield('style')
  <style>
    .buttons-copy,
    .buttons-excel,
    .buttons-csv {
      display: none !important;
    }

    tfoot {
      display: none;
    }

    .page-content {
      padding: 22px 31px;
      padding-left: 39px;
    }

    /* .site-menubar{
      width: 152px !important;
    } */
    .site-menubar-body {
      z-index: 999999 !important;
      /* position: fixed; */
      /* overflow: scroll; */
    }

    .animsition,
    .animsition-overlay {
      opacity: 1;
    }

    .navbar-inverse {
      z-index: 999999 !important;
    }

    .site-menubar {
      position: fixed;
      top: 66.01px;
      z-index: 1400;
      height: 100%;
      height: calc(100% - 66.01px);
      font-family: Roboto, sans-serif;
      color: rgba(163, 175, 183, .9);
      background: #263238;
      box-shadow: 0 2px 4px rgba(0, 0, 0, .08);
    }

    .site-menu>.site-menu-item.active {
      background: #242f35;
      border-top: 1px solid rgba(0, 0, 0, .04);
      border-bottom: 1px solid rgba(0, 0, 0, .04);
    }

    .site-menu-item a {
      display: block;
      color: rgba(163, 175, 183, .9);
    }

    .site-menu>.site-menu-item.active {
      background: #242f35;
      border-top: 1px solid rgba(0, 0, 0, .04);
      border-bottom: 1px solid rgba(0, 0, 0, .04);
    }

    .site-menu>.site-menu-item.active {
      background: #242f35;
      border-top: 1px solid rgba(0, 0, 0, .04);
      border-bottom: 1px solid rgba(0, 0, 0, .04);
    }

    .site-menu>.site-menu-item.active>a {
      color: #f1e6e6;
      background: 0 0;
    }

    .site-menu>.site-menu-item.hover>a,
    .site-menu>.site-menu-item:hover>a {
      color: #f1e6e6;
    }

    .navbar-fixed-top {
      /* top: 15px; */
      height: 66px !important;
      border-width: 0 0 1px;
    }

    .site-menu>.site-menu-item.open>a {
      color: #fff;
    }

    .site-menu .site-menu-sub .site-menu-item.hover>a,
    .site-menu .site-menu-sub .site-menu-item:hover>a {
      color: #fff;
    }
  </style>
  <script src="{{ asset('admin-new/global/vendor/breakpoints/breakpoints.js')}}"></script>
  <script>
    Breakpoints();
  </script>
  <script>
    window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
                ]); ?>
  </script>
</head>

<body class="dashboard">

  <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse bg-indigo-600"
    role="navigation">

    <div class="navbar-header">
      <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
        data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
        <i class="icon wb-more-horizontal" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center">
        <!-- <img class="navbar-brand-logo" src="{{url('main/assets/img/logo.png')}}" title="Admin"> -->
        <span class="navbar-brand-text hidden-xs-down"> Admin Dashboard </span>

      </div>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search" data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon wb-search" aria-hidden="true"></i>
      </button>
    </div>

    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">

          <li class="nav-item dropdown">
            <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
              data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="{{url('main/avatar.jpg')}}" alt="..." with="38px;" height="40px;">
                <i></i>
              </span>
            </a>

            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="{{url('admin/profile')}}" role="menuitem"><i class="icon wb-user"
                  aria-hidden="true"></i> Profile</a>

              <a class="dropdown-item" href="{{url('admin/password')}}" role="menuitem"><i class="icon wb-settings"
                  aria-hidden="true"></i> Change Password</a>

              {{-- <a class="dropdown-item" href="{{ route('admin.settings.payment') }}" role="menuitem"><i
                class="icon wb-payment" aria-hidden="true"></i> @lang('admin.include.payment_settings')</a>

              <a class="dropdown-item" href="{{ route('admin.settings') }}" role="menuitem"><i class="icon wb-desktop"
                  aria-hidden="true"></i> @lang('admin.include.site_settings')</a>
              --}}
              @can('cms-pages')
              <a class="dropdown-item" href="{{url('admin/pages')}}" role="menuitem">
                <i class="icon wb-folder" aria-hidden="true"></i>Cms Pages
              </a>
              @endcan
              <a class="dropdown-item" href="{{url('admin/help')}}" role="menuitem"><i class="icon wb-help"
                  aria-hidden="true"></i>Help</a>
              {{-- <div class="dropdown-divider" role="presentation"></div>
                <a class="dropdown-item" href="javascript:document.getElementById('logout-form').submit();" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a> --}}
            </div>
          </li>
          @if(Session::has('flash_error'))
          <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_error')
              !!}</em>
          </div>
          @endif
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->

      <!-- Site Navbar Seach -->
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon wb-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="site-search" placeholder="Search...">
              <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                data-toggle="collapse" aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>
  </nav>
  <div class="site-menubar site-menubar-light">
    <div class="site-menubar-body">
      @include('layouts.navbar')
    </div>
    <div class="site-menubar-footer">
      <a style="background-color:#1c2529;" href="{{ route('admin.settings') }}" class="fold-show" data-placement="top"
        data-toggle="tooltip" data-original-title="Settings">
        <span class="icon wb-settings" aria-hidden="true"></span>
      </a>
      <a style="background-color:#1c2529;" href="{{ route('admin.settings.payment') }}" data-placement="top"
        data-toggle="tooltip" data-original-title="Payment">
        <span class="icon wb-payment" aria-hidden="true"></span>
      </a>

      <a style="background-color:#1c2529;" href="javascript:document.getElementById('logout-form').submit();"
        data-placement="top" data-toggle="tooltip" data-original-title="Logout">
        <span class="icon wb-power" aria-hidden="true"></span>
      </a>
    </div>
  </div>

  @yield('content')

  <!-- Footer -->
  <footer class="site-footer">
    <div class="site-footer-right">
      {{ config('constants.site_copyright', '&copy; '.date('Y').'Thinkin Cab') }}
      <!-- <i class="red-600 wb wb-heart"></i> by <a href="#">Creation Studio</a> -->
    </div>
  </footer>
  <!-- Core  -->
  <script src="{{ asset('admin-new/global/vendor/babel-external-helpers/babel-external-helpers.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/jquery/jquery.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/popper-js/umd/popper.min.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/bootstrap/bootstrap.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/animsition/animsition.js')}}"></script>
  <script type="text/javascript" src="{{asset('main/vendor/moment/moment.js')}}"></script>
  <script type="text/javascript" src="{{asset('main/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/mousewheel/jquery.mousewheel.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/asscrollbar/jquery-asScrollbar.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/asscrollable/jquery-asScrollable.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/ashoverscroll/jquery-asHoverScroll.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/waves/waves.js')}}"></script>

  <!-- Plugins -->
  <script src="{{ asset('admin-new/global/vendor/switchery/switchery.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/intro-js/intro.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/screenfull/screenfull.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/slidepanel/jquery-slidePanel.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/chartist/chartist.min.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/jvectormap/jquery-jvectormap.min.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/matchheight/jquery.matchHeight-min.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/peity/jquery.peity.min.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/dropify/dropify.min.js')}}"></script>

  <!-- Scripts -->
  <script src="{{ asset('admin-new/global/js/Component.js')}}"></script>
  <script src="{{ asset('admin-new/global/js/Plugin.js')}}"></script>
  <script src="{{ asset('admin-new/global/js/Base.js')}}"></script>
  <script src="{{ asset('admin-new/global/js_old/Base.js')}}"></script>
  <script src="{{ asset('admin-new/global/js/Config.js')}}"></script>

  <script src="{{ asset('admin-new/global/js/Section/Menubar.js')}}"></script>
  <script src="{{ asset('admin-new/global/js/Section/Sidebar.js')}}"></script>
  <script src="{{ asset('admin-new/global/js/Section/PageAside.js')}}"></script>
  <script src="{{ asset('admin-new/global/js/Plugin/menu.js')}}"></script>

  <!-- Config -->
  <script src="{{ asset('admin-new/global/js/config/colors.js')}}"></script>
  <script src="{{ asset('admin-new/global/js/config/tour.js')}}"></script>
  <script>
    Config.set('assets', 'assets');
  </script>

  <!-- Page -->
  <script src="{{ asset('admin-new/global/js/Site.js')}}"></script>
  <script src="{{ asset('admin-new/global/js_old/Site.js')}}"></script>
  <script src="{{ asset('admin-new/global/js/Plugin/asscrollable.js')}}"></script>
  <script src="{{ asset('admin-new/global/js/Plugin/slidepanel.js')}}"></script>
  <script src="{{ asset('admin-new/global/js/Plugin/switchery.js')}}"></script>
  <script src="{{ asset('admin-new/global/js/Plugin/matchheight.js')}}"></script>
  <script src="{{ asset('admin-new/global/js/Plugin/jvectormap.js')}}"></script>
  <script src="{{ asset('admin-new/global/js/Plugin/peity.js')}}"></script>

  <script src="{{ asset('admin-new/global/examples/js/dashboard/v1.js')}}"></script>
  <!-- Plugins -->
  <script src="{{ asset('admin-new/global/vendor/d3/d3.min.js')}}"></script>
  <script src="{{ asset('admin-new/global/vendor/c3/c3.min.js')}}"></script>
  <script src="{{ asset('admin-new/global/examples/js/charts/c3.js')}}"></script>
  @yield('script')
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
        series: [<?php echo $jsondata['totalCancelledGraph']; ?>] //working
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
        series: [<?php echo $jsondata['totalprovidergraph']; ?>] //working not
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
        series: [<?php echo $jsondata['totalprovider_cancelledgraph']; ?>] //working not
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
        series: [<?php echo $jsondata['user_cancelledgraph'];?>] //working not
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

</body>

</html>