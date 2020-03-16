<!DOCTYPE html>
<html lang="en">
<head>
    <title>number 3| login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{url('img/umat.jpg')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('{{url('img/hall.jpg')}}');">
        <div class="wrap-login100 p-l-45 p-r-45 p-t-25 p-b-54">
            <form class="login100-form validate-form" method="POST" action="{{url('client/post-login')}}">
            {{ csrf_field() }}
                <h3 class="text-center p-b-5">Log In</h3>

                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') ?? '' }}.
                    </div>
                @endif


                <div class="wrap-input100 validate-input m-b-23 @if ($errors->has('email')) {{'alert-validate'}} @endif" data-validate="@if ($errors->has('email')) {{ $errors->first('email') }} @endif">
                    <span class="label-input100">Email/Membership ID</span>
                    <input class="input100" type="text" value="{{ old('email') }}" name="email" placeholder="Membership ID">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-23 @if ($errors->has('password')) {{'alert-validate'}} @endif" data-validate="@if ($errors->has('password')) {{ $errors->first('password') }} @endif">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                <div class="container-login100-form-btn p-b-20">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Submit
                        </button>
                    </div>
                </div>
                <span class="text-center d-block">Don't have an account? <a href="{{url('client/registration')}}">Sign Up</a></span>
            </form>
        </div>
    </div>
</div>
<style>
    .select2-selection__rendered {
        padding-left: 40px !important;
    }

    .select2-selection--single {
        border: none !important;
    }

</style>

<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{url('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{url('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{url('vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{url('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{url('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{url('vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{url('vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{url('vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{url('js/main.js')}}"></script>

</body>
</html>
