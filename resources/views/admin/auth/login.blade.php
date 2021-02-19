<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="{{ config('constants.site_icon') }}">
    <link rel="shortcut icon" type="image/png" href="{{ config('constants.site_icon') }}">
    <!--===============================================================================================-->
    <link rel="apple-touch-icon" href="{{ config('constants.site_icon') }}">
    <link rel="shortcut icon" type="image/png" href="{{ config('constants.site_icon') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/new_login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/new_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/new_login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/new_login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/new_login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/new_login/css/util.css">
    <link rel="stylesheet" type="text/css" href="/new_login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="/new_login/images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ url('/admin/login') }}">
                    {{ csrf_field() }}
                    <span class="login100-form-title">
                        Admin Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" @if(Setting::get('demo_mode', 0)==1)
                            value="admin@dragon.com" @endif placeholder="email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('email'))
                        <p class="focus-input100">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" @if(Setting::get('demo_mode', 0)==1)
                            value="123456" @endif placeholder="password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('password'))
                        <p class="focus-input100">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">

                        <select class="input100" name="login_type" id="">
                            <option value="admin">Admin</option>
                            <option value="dispatcher">Dispatcher</option>
                            <option value="account">Account</option>
                            <option value="dispute">Dispute</option>
                        </select>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                        </span>
                        <a class="txt2" href="#">
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="#">
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="/new_login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/new_login/vendor/bootstrap/js/popper.js"></script>
    <script src="/new_login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/new_login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="/new_login/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
			scale: 1.1
		})
    </script>
    <!--===============================================================================================-->
    <script src="/new_login/js/main.js"></script>

</body>

</html>