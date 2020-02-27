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
    <link rel="stylesheet" type="text/css" href="{{url('vendor/bootstrap/css/bootstrap-image-checkbox.css')}}">

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
            @if(!\Illuminate\Support\Facades\Session::has('kth_id'))
                <form class="login100-form validate-form" method="POST" action="{{url('voting/login')}}">
            @else
                <form class="login100-form validate-form" method="POST" action="{{url('voting/vote')}}">
            @endif
            {{ csrf_field() }}
            <!--<span class="login100-form-title p-b-49">
					</span>-->

                <div class="text-center p-2">
                    <img src="{{url('img/umat.jpg')}}" alt="" width="100">
                </div>
                <h3 class="text-center p-b-5">Dr Michael Tetteh Kofi Hall Excellence Awards</h3>
                @if(!\Illuminate\Support\Facades\Session::has('kth_id'))
                    <span class="d-block text-center text-black m-b-30">Enter your access code to login</span>
                @else
                    <span class="d-block text-center text-black m-b-30"></span>
                @endif

                <!--
                <div class="wrap-input100 validate-input m-b-23" data-validate = "Name is required">
                    <span class="label-input100">Full Name</span>
                    <input class="input100" type="text" name="name" placeholder="Type your name">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>
                -->

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') ?? '' }}. Select your preferred nominee and click on <b>confirm</b> to vote.
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-success">
                        {{ session()->get('error') ?? '' }}.
                    </div>
                @endif

                @if(!\Illuminate\Support\Facades\Session::has('kth_id'))
                <div class="wrap-input100 validate-input m-b-23 @if ($errors->has('code')) {{'alert-validate'}} @endif" data-validate="@if ($errors->has('code')) {{ $errors->first('code') }} @endif">
                    <span class="label-input100">Access Code</span>
                    <input class="input100" type="text" value="{{ old('code') }}" name="code" placeholder="Enter your access code">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>
                @else
                    <div class="form">
                        <h3 class="text-center">{{$category->name}}</h3>
                        <input type="hidden" name="category_id" value="{{$category->id}}">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        <input type="hidden" name="kt_resident_id" value="{{\Illuminate\Support\Facades\Session::get('kth_id')}}">
                        <div class="row plan cf">

                            @foreach($nominees as $nominee)
                                <div class="col-sm-4 text-center m-b-50">
                                    <input type="radio" name="nominee_id" id="free{{$nominee->id}}" value="{{$nominee->id}}">
                                    <label style="background: url(data:image/png;base64,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) no-repeat; background-position: center;background-size: cover; " class="free-label" for="free{{$nominee->id}}"></label>
                                    <h5>{{$nominee->name}}</h5>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <style>
                        .wrap-login100 {
                            max-width: 1024px;
                            width: 100%;
                        }
                    </style>
                @endif


                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            @if(!\Illuminate\Support\Facades\Session::has('kth_id'))
                            Login
                                @else
                                Confirm
                            @endif
                        </button>
                    </div>
                </div>
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
