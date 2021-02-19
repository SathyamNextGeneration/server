<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="{{ config('constants.site_icon') }}">
    <link rel="shortcut icon" type="image/png" href="{{ config('constants.site_icon') }}">
    <title>{{ config('constants.site_title','Thinkin Cab') }}</title>
    <!--
Page One Template
https://templatemo.com/tm-504-page-one
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="/home/font-awesome-4.7.0/css/font-awesome.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="/home/css/bootstrap.min.css"> <!-- Bootstrap style -->
    <link rel="stylesheet" href="/home/css/magnific-popup.css"> <!-- Magnific Popup -->
    <link rel="stylesheet" href="/home/css/templatemo-style.css"> <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>

<body>

    <div class="container-fluid" id="main">

        <!-- Home -->
        <section class="parallax-window tm-section tm-section-home" id="home" data-parallax="scroll"
            data-image-src="{{url('/home/img/bg-01.jpg')}}">
            <div class="tm-page-content-width tm-padding-b">
                <div class="text-center tm-site-title-wrap">
                </div>
                <div class="tm-textbox tm-white-bg">
                    <h2 class="tm-green-text tm-section-title">Welcome! to
                        {{ config('constants.site_title','Thinkin Cab') }}</h2>
                    <p>Page One is a parallax clean layout with beautiful images from website. You can download and use
                        this template for your sites.</p>
                    <p></p>
                    @if(config('constants.store_link_android_user') != "" || config('constants.store_link_android_user')
                    != "#")
                    <a target="_blank" href="{{config('constants.store_link_android_user','#')}}" class="tm-btn">Android
                        User</a>
                    @endif
                    @if(config('constants.store_link_android_provider') != "" ||
                    config('constants.store_link_android_user') != "#")
                    <a target="_blank" href="{{config('constants.store_link_android_provider','#')}}"
                        class="tm-btn">Android Driver</a>
                    @endif
                    {{-- <a href="{{ config('constants.site_title','Thinkin Cab') }}" class="tm-btn">Android User</a>
                    <a href="{{ config('constants.site_title','Thinkin Cab') }}" class="tm-btn">Android Driver</a> --}}
                </div>
            </div>
        </section>
    </div>

    <!-- load JS files -->
    <script src="/home/js/jquery-1.11.3.min.js"></script> <!-- https://jquery.com/download/ -->
    <script src="/home/js/isotope.pkgd.min.js"></script> <!-- https://isotope.metafizzy.co/ -->
    <script src="/home/js/imagesloaded.pkgd.min.js"></script> <!-- https://imagesloaded.desandro.com/ -->
    <script src="/home/js/jquery.magnific-popup.min.js"></script> <!-- http://dimsemenov.com/plugins/magnific-popup/ -->
    <script src="/home/js/parallax.min.js"></script>
</body>

</html>