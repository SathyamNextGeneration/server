@extends('user.layout.app')

@section('content')
<div class="banner row no-margin" style="background-image: url('{{ asset('asset/img/banner-bg.jpg') }}');">
    <div class="banner-overlay"></div>
    <div class="container pad-60">
        <div class="col-md-8">
            <h2 class="banner-head"><span class="strong">Extra work or income?</span><br>Be a driver and increase your earnings</h2>
        </div>
        <div class="col-md-4">
            <div class="banner-form">
                <div class="row no-margin fields">
                    <div class="left">
                    	<img src="{{asset('asset/img/taxi-app.png')}}">
                    </div>
                    <div class="right">
                        <a href="{{url('provider/login')}}">
                            <h3>I want to be a driver</h3>
                            <h5>REGISTER <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>
                
                <div class="row no-margin fields">
                    <div class="left">
                    	<img src="{{asset('asset/img/taxi-app.png')}}">
                    </div>
                    <div class="right">
                        <a href="{{url('login')}}">
                            <h3>I'm a Passenger</h3>
                            <h5>REGISTER <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>
                <!-- <p class="note-or">Or <a href="{{ url('login') }}">sign in</a> with your rider account.</p> -->
            </div>
        </div>
    </div>
</div>

<div class="row white-section pad-60 no-margin">
    <div class="container">
        
        <div class="col-md-4 content-block small">
             <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/driving-license.png')}}"></div>
            <h2>You own is your time</h2>
            <div class="title-divider"></div>
            <p>You can drive with Moovim anytime, day or night, 365 days a year. The trips do not interfere with your routine, you make your schedules, stay offline at any time.</p>
        </div>
    </div>

        <div class="col-md-4 content-block small">
             <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/destination.png')}}"></div>
            <h2>Do more each shift</h2>
            <div class="title-divider"></div>
            <p>Travel fares start at a base rate and increase over time and distance. And when demand is higher than normal, drivers earn more.</p>
        </div>
    </div>

        <div class="col-md-4 content-block small">
             <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/taxi-app.png')}}"></div>
            <h2>Download the app and enjoy</h2>
            <div class="title-divider"></div>
            <p>You will receive step-by-step instructions, tools to help you earn more, and 24/7 support, all available directly in the app.</p>
        </div>
    </div>

    </div>
</div>

<div class="row gray-section no-margin full-section">
    <div class="container">                
        <div class="col-md-6 content-block">
            <div class="icon"><img src="{{asset('asset/img/taxi-car.png')}}"></div>
            <h3>About the application</h3>
            <h2>Designed for drivers</h2>
            <div class="title-divider"></div>
            <p>When you want to make money, just open the app, go online and start receiving travel requests. You will receive information about the passenger and the routes to their location and destination. When the trip is over, you can receive another request nearby. When you want to rest, you can disconnect at any time.</p>
            <a class="content-more more-btn" href="{{url('login')}}">DOWNLOAD THE APP AND START NOW <i class="fa fa-chevron-right"></i></a>
        </div>
        <div class="col-md-6 full-img text-center" style="background-image: url({{ asset('asset/img/driver-car.jpg') }});"> 
            <!-- <img src="img/anywhere.png"> -->
        </div>
    </div>
</div>

<div class="row white-section pad-60 no-margin">
    <div class="container">
        
        <div class="col-md-4 content-block small">
            <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/budget.png')}}"></div>
            <h2>Rewards</h2>
            <div class="title-divider"></div>
            <p>You're in the driver's seat. So, reward yourself with discounts on fuel, vehicle maintenance, cell phone bills and more. Reduce your daily expenses and take more money home.</p>
        </div></div>

        <div class="col-md-4 content-block small">
            <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/driving-license.png')}}"></div>
            <h2>Requirements</h2>
            <div class="title-divider"></div>
            <p>Know that you are ready to drive. It doesn't matter if you are driving your own vehicle or a commercially licensed one, it is necessary to meet the minimum requirements and perform a safety screening online.</p>
        </div></div>

        <div class="col-md-4 content-block small">
            <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/seat-belt.png')}}"></div>
            <h2>Safety</h2>
            <div class="title-divider"></div>
            <p>When you drive with Moovim, you get 24/7 support. All runners are verified with your personal information and phone number. This way, you will know who is traveling and so will we.</p>
        </div></div>

    </div>
</div>
            
<!--<div class="row find-city no-margin">
    <div class="container">
        <div class="col-md-12 center content-block">
            <div class="box-shadow">
                <div class="pad-60 ">
        <h2>Começe a ganhar dinheiro</h2>
        <p>Pronto para ganhar dinheiro? O primeiro passo é se cadastrar.</p>
<a class="content-more more-btn" href="{{url('login')}}">COMEÇE A DIRIGIR AGORA <i class="fa fa-chevron-right"></i></a>
         <button type="submit" class="full-primary-btn drive-btn">START DRIVE NOW</button> 
    </div>
</div>
</div>
    </div>
</div>-->

<!-- <div class="footer-city row no-margin" style="background-image: url({{ asset('asset/img/footer-city.png') }});"></div> -->
@endsection