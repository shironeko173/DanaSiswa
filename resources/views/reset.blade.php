<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/bootstrap/css/bootstrap.min.css') !!}}">
	<link rel="stylesheet" type="text/css" href="{!! asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('fonts/iconic/css/material-design-iconic-font.min.css')!!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/animate/animate.css')!!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/css-hamburgers/hamburgers.min.css')!!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/animsition/css/animsition.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/select2/select2.min.css')!!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('vendor/daterangepicker/daterangepicker.css')!!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/util.css')!!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/main.css')!!}">
	<link rel="stylesheet" href="{!! asset('css/coba.css')!!}">
	<style>
		
	</style>
</head>	
<body>
	 
	<div class="limiter">
		<div class="container-login100">

			<div class="wrap-login100" style="width: 500px;">

				@if (session()->has('success'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{ session('success') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			 	</div>
				@endif

				@if (session()->has('info'))
				<div class="alert alert-info alert-dismissible fade show" role="alert">
					{{ session('info') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			 	</div>
				@endif

				@if (session()->has('Error'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					{{ session('Error') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			 	</div>
				@endif
			
				<form action="{{ route('password.reset') }}" class="login100-form validate-form" method="post">
					@csrf
					<input type="hidden" name="token" value="{{ $token }}">
					<span class="login100-form-title p-b-26">
						<img src="images/logo.jpeg" alt="">
					</span>
					<div class="mb-4">
						<h3>Reset Password</h3>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Email yg valid: a@b.c" >
						<input class="input100" type="text" name="email" value="" required>
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="New password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" required>
						<span class="focus-input100" data-placeholder="New Password"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Confirm password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password_confirmation" required>
						<span class="focus-input100" data-placeholder="Confirm Password"></span>
					</div>

				
					

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Reset
							</button>
						</div>
					</div>
				</form>
				<div class="form-group d-md-flex">
					<div class="w-50 text-left">
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Sudah Punya akun?Login</a>
								</div>
				</div>
					<div class="text-center p-t-50">
						<span class="txt1">
							Belum punya akun?
						</span>

						<a class="txt2" href="/register">
							Sign Up
						</a>
					</div>
				
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="{!! asset('vendor/jquery/jquery-3.2.1.min.js')!!}"></script>
	<script src="{!! asset('vendor/animsition/js/animsition.min.js')!!}"></script>
	<script src="{!! asset('vendor/bootstrap/js/popper.js')!!}"></script>
	<script src="{!! asset('vendor/bootstrap/js/bootstrap.min.js')!!}"></script>
	<script src="{!! asset('vendor/select2/select2.min.js')!!}"></script>
	<script src="{!! asset('vendor/daterangepicker/moment.min.js')!!}"></script>
	<script src="{!! asset('vendor/daterangepicker/daterangepicker.js')!!}"></script>
	<script src="{!! asset('vendor/countdowntime/countdowntime.js')!!}"></script>
	<script src="{!! asset('js/main.js')!!}"></script>

</body>
</html>