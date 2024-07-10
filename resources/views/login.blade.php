<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>{{ $title }}</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="/assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/azzara.min.css">

	<!-- PWA  -->
	<meta name="theme-color" content="#6777ef"/>
	<link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
	<link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>
<body class="login" style="background-color: lightblue">
	
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Login Toko Ayu</h3>
            <form method="POST" action="">
            @csrf
			<div class="login-form">
				<div class="form-group form-floating-label">
					<input id="email" value="{{ old('email') }}" name="email" type="email" class="form-control input-border-bottom" required>
					<label for="email" class="placeholder">Email</label>
				</div>
				<div class="form-group form-floating-label">
					<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
					<label for="password" class="placeholder">Password</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
				</div>
				<div class="form-action mb-3">
					<button type="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
				</div>
			</div>
            </form>
		</div>
	</div>
	<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/assets/js/core/popper.min.js"></script>
	<script src="/assets/js/core/bootstrap.min.js"></script>
	<script src="/assets/js/ready.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script src="{{ asset('/sw.js') }}"></script>
	<script>
	if ("serviceWorker" in navigator) {
		// Register a service worker hosted at the root of the
		// site using the default scope.
		navigator.serviceWorker.register("/sw.js").then(
		(registration) => {
			console.log("Service worker registration succeeded:", registration);
		},
		(error) => {
			console.error(`Service worker registration failed: ${error}`);
		},
		);
	} else {
		console.error("Service workers are not supported.");
	}
	</script>

@if (session()->has('loginGagal'))
<script>
	swal("Login Gagal","{{ session('loginGagal') }}", "error");
</script>
@endif
</body>
</html>