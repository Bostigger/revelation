<!DOCTYPE html>
<html lang="en">
<head>
    <title>KT Hall Award Nomination</title>
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
            <form class="login100-form validate-form" method="POST" action="{{url('client/register')}}">
            {{ csrf_field() }}
            <!--<span class="login100-form-title p-b-49">
					</span>-->

            <!--<div class="text-center p-2">
                        <img src="{{url('img/umat.jpg')}}" alt="" width="100">
                    </div>-->
                <h3 class="text-center p-b-5">Sign Up</h3>
                <!--
                <div class="wrap-input100 validate-input m-b-23" data-validate = "Name is required">
                    <span class="label-input100">Full Name</span>
                    <input class="input100" type="text" name="name" placeholder="Type your name">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>
                -->

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') ?? '' }}. You can nominate people for the other categories.
                    </div>
                @endif

                <div class="wrap-input100 validate-input m-b-23 @if ($errors->has('email')) {{'alert-validate'}} @endif" data-validate="@if ($errors->has('email')) {{ $errors->first('email') }} @endif">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="text" value="{{ old('email') }}" name="email" placeholder="Email">
                    <span class="focus-input100" data-symbol="&#xf200;"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-23 @if ($errors->has('phone_number')) {{'alert-validate'}} @endif" data-validate="@if ($errors->has('phone_number')) {{ $errors->first('phone_number') }} @endif">
                    <span class="label-input100">Phone Number</span>
                    <input class="input100" type="text" value="{{ old('phone_number') }}" name="phone_number" placeholder="Phone Number">
                    <span class="focus-input100" data-symbol="&#xf202;"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-23 @if ($errors->has('password')) {{'alert-validate'}} @endif" data-validate="@if ($errors->has('password')) {{ $errors->first('password') }} @endif">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Password" required>
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
                <span class="text-center d-block">Already have an account? <a href="{{url('client/login')}}">Log In</a></span>
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
