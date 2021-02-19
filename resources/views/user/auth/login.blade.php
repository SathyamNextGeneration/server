@extends('user.layout.auth')

@section('content')

<div class="full-page-bg" style="background-image: url({{ asset('asset/img/login-user-bg.jpg') }});">
    <div class="log-overlay"></div>
    <div class="full-page-bg-inner">
        <div class="row no-margin">
            <div class="col-md-6 log-left">
                <span class="login-logo"><img src="{{ config('constants.site_logo', asset('logo-black.png'))}}"></span>
                <h2>Create your account and move in minutes</h2>
                <p>Welcome to Moovim, the easiest way to get around with the touch of a button.</p>
            </div>
            <div class="col-md-6 log-right">
                <div class="login-box-outer">
                <div class="login-box row no-margin">
                    <div class="col-md-12">
                        <a class="log-blk-btn" href="{{url('register')}}">CREATE AN ACCOUNT</a>
                        <h3>Enter your details</h3>
                    </div>
                    <form  role="form" method="POST" action="{{ url('/login') }}"> 
                    
                    {{ csrf_field() }}                      
                        <div class="col-md-12">
                        @if (\Session::has('message'))
                            <div class="alert alert-info">
                                {!! \Session::get('message') !!}
                            </div>
                        @endif
                             <input id="email" type="text" class="form-control" placeholder="Your email" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}><span> Do you remember me</span>
                        </div>
                       
                        <div class="col-md-12">
                            <button type="submit" class="log-teal-btn">LOG IN</button>
                        </div>
                    </form>

                    @if(config('constants.social_login', 0) == 1)
                    <div class="col-md-12">
                        <a href="{{ url('/auth/facebook') }}"><button type="submit" class="log-teal-btn fb"><i class="fa fa-facebook"></i>LOG IN WITH FACEBOOK</button></a>
                    </div>  
<!--                    <div class="col-md-12">
                        <a href="{{ url('/auth/google') }}"><button type="submit" class="log-teal-btn gp"><i class="fa fa-google-plus"></i>ENTRAR COM O GOOGLE+</button></a>
                    </div>-->
                    @endif

                    <div class="col-md-12">
                        <p class="helper"> <a href="{{ url('/password/reset') }}">Forgot password?</a></p>   
                    </div>
                </div>


                <div class="log-copy"><p class="no-margin">{{ config('constants.site_copyright', '&copy; '.date('Y').' Appoets') }}</p></div></div>
            </div>
        </div>
    </div>
</div>
@endsection