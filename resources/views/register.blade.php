<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	 <!-- Bootstrap CSS -->
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
	
	<div class="limiter" >
		<div class="container-login100" >
			<div class="wrap-login100" style="width: 500px;">
				<form class="login100-form validate-form" method="post" >
				@csrf
					<span class="login100-form-title p-b-26">
						<img src="images/logo.jpeg" alt="">
					</span>
					
					<div class="mb-4">
						<h3>Daftar</h3>
					</div>
					<div class="wrap-input100 validate-input p-0  mt-5 mb-0" data-validate = "Masukkan nama">
						<input class="input100 @error('nama') is-invalid @enderror" type="text" name="nama" >
						<span class="focus-input100" data-placeholder="Nama"></span>
					</div>
						<div class="d-block">
							@error('nama')
								<div class="invalid-feedback d-block">
									{{ $message }}
								</div> 
							@enderror
						</div>

					<div class="wrap-input100 validate-input p-0  mt-5 mb-0" data-validate = "Masukkan Format Email yang sesuai">
						<input class="input100 @error('email') is-invalid @enderror" type="text" name="email"  >
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>
						<div class="d-block">
							@error('email')
								<div class="invalid-feedback d-block">
									{{ $message }}
								</div> 
							@enderror
						</div>

					<div class="wrap-input100 validate-input p-0  mt-5 mb-0 " data-validate = "Masukkan nomor induk siswa">
						<input class="input100 @error('nis') is-invalid @enderror" type="number" name="nis" >
						<span class="focus-input100" data-placeholder="Nomor Induk Siswa"></span>
					</div>
						<div class="d-block">
							@error('nis')
								<div class="invalid-feedback d-block">
									{{ $message }}
								</div> 
							@enderror
						</div>

					<div class="wrap-input100 validate-input p-0  mt-5 mb-0" data-validate="Masukkan Password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input name="password" class="input100" type="password"  >
						<span class="focus-input100 @error('password') is-invalid @enderror" data-placeholder="Password"></span>
					</div>
						<div class="d-block">
							@error('password')
								<div class="invalid-feedback d-block">
									{{ $message }}
								</div> 
							@enderror
						</div>
						
					<div class="wrap-input100 validate-input p-0  mt-5 mb-0 " data-validate="Password tidak sesuai">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100 @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" >
						<span class="focus-input100" data-placeholder="Konfirmasi password"></span>
					</div>
						<div class="d-block">
							@error('password_confirmation')
								<div class="invalid-feedback d-block">
									{{ $message }}
								</div> 
							@enderror
						</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Daftar
							</button>
						</div>
					</div>
				
				</form>
					<div class="text-center p-t-50">
						<span class="txt1">
							Sudah punya akun?
						</span>

						<a class="txt2" href="/login">
							Sign In
						</a>
					</div>
					
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
</body>
</html>