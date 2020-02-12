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
				<form class="login100-form validate-form" method="POST" action="{{url('nomination/nominate')}}">
                    {{ csrf_field() }}
					<!--<span class="login100-form-title p-b-49">
					</span>-->

                    <div class="text-center p-2">
                        <img src="{{url('img/umat.jpg')}}" alt="" width="100">
                    </div>
                    <h3 class="text-center p-b-5">Dr Michael Tetteh Kofi Hall Excellence Awards</h3>
                    <span class="d-block text-center text-black m-b-30">Fill the form to nominate a KT Hall Member into a category. You can nominate <em>only once</em> for each category</span>
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

					<div class="wrap-input100 validate-input m-b-23 @if ($errors->has('code')) {{'alert-validate'}} @endif" data-validate="@if ($errors->has('code')) {{ $errors->first('code') }} @endif">
						<span class="label-input100">Access Code</span>
						<input class="input100" type="text" value="{{ old('code') }}" name="code" placeholder="Enter your access code">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-23 @if ($errors->has('category_id')) {{'alert-validate'}} @endif" data-validate="@if ($errors->has('category_id')) {{ $errors->first('category') }} @endif">
                        <span class="label-input100">Category</span>
                        <select class="input100" style="border: none; outline: none;" name="category_id" data-validate="Category is required" onchange="addNominee(this.value, this.options[this.selectedIndex].text)" required>
                            <option value="">Choose a Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if(old('category_id')==$category->id) {{'selected'}} @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" id="category_name" name="category" value="">
                        <span class="focus-input100" data-symbol="&#xf208;"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23 @if ($errors->has('nominee_id')) {{'alert-validate'}} @endif" data-validate="@if ($errors->has('nominee_id')) {{ $errors->first('nominee_id') }} @endif">
                        <span class="label-input100">Nominee</span>
                        <select onchange="setValueid(this.value, this.options[this.selectedIndex].text, '#nominee_id', '#nominee_name')" class="input100 select2" value="{{ old('nominee_id') }}" type="text" placeholder="Type a Nominee's name and select from the options">
                            <option value="">Select Nominee</option>
                            @foreach($kt_residents as $kt_resident)
                                <option value="{{$kt_resident->id}}" @if(old('nominee_id')==$kt_resident->id) {{'selected'}} @endif>{{ucfirst($kt_resident->name)}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" value="{{ old('nominee_id') }}" id="nominee_id" name="nominee_id">
                        <input type="hidden" value="{{ old('nominee_name') }}" id="nominee_name" name="nominee_name">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>
                    <div id="secondNominee"  class="wrap-input100 validate-input m-b-23 @if ($errors->has('nominee2_id')) {{'alert-validate'}} @endif @if(old('category_id')!=16 && old('category_id')!=11) {{'d-none'}} @endif" data-validate="@if ($errors->has('nominee2_id')) {{ $errors->first('nominee2_id') }} @endif">
                        <span class="label-input100">Nominee 2</span>
                        <select onchange="setValueid(this.value, this.options[this.selectedIndex].text, '#nominee2_id', '#nominee2_name')" class="input100 select2later" value="{{ old('nominee2_id') }}" type="text" placeholder="Type a Nominee's name and select from the options">
                            <option value="">Select Nominee</option>
                            @foreach($kt_residents as $kt_res)
                                <option value="{{$kt_res->id}}" @if(old('nominee2_id')==$kt_res->id) {{'selected'}} @endif>{{ucfirst($kt_res->name)}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" value="{{ old('nominee2_id') }}" id="nominee2_id" name="nominee2_id">
                        <input type="hidden" value="{{ old('nominee2_name') }}" id="nominee2_name" name="nominee2_name">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Submit
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
