<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
	<meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
	<meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
	<meta name="author" content="PIXINVENT">
	<title>Mini POS</title>
	<link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

	<!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
	<!-- END: Vendor CSS-->

	<!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

	<!-- BEGIN: Page CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-sliders.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-wizard.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-number-input.css') }}">
	<!-- END: Page CSS-->

	<!-- BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	<!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

	<!-- BEGIN: Header-->
	<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
		<div class="navbar-container d-flex content">
			<div class="bookmark-wrapper d-flex align-items-center">
				<h4 class="mb-0">Majoo Teknologi Indonesia</h4>
			</div>
			<ul class="nav navbar-nav align-items-center ms-auto">
				<li class="nav-item dropdown dropdown-user">
					@guest
						<a href="/login" class="mr-2">Login</a>
					@endguest

					@auth
						<a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<div class="user-nav d-sm-flex d-none">
								<span class="user-name fw-bolder">{{ auth()->user()->name }}</span>
								<span class="user-status">Admin</span>
							</div>
							<span class="avatar">
								<img class="round" src="{{ asset('app-assets/images/portrait/small/avatar-s-11.jpg') }}" alt="avatar" height="40" width="40">
								<span class="avatar-status-online"></span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
							<a class="dropdown-item" href="/dashboard">
								<i class="me-50" data-feather="home"></i> Dashboard
							</a>
							<form action="/logout" method="POST">
								@csrf
								<button class="dropdown-item btn-block" type="submit" style="width: 100%">
									<i class="me-50" data-feather="power"></i> Logout
								</button>
							</form>
						</div>
					@endauth
				</li>
			</ul>
		</div>
	</nav>
	<!-- END: Header-->

	<!-- BEGIN: Content-->
	<div class="app-content content ecommerce-application ">
	  <div class="content-overlay"></div>
	  <div class="header-navbar-shadow"></div>

	  @yield('content')
	</div>
	<!-- END: Content-->

	<div class="sidenav-overlay"></div>
	<div class="drag-target"></div>

	<!-- BEGIN: Footer-->
	<footer class="footer footer-static footer-light">
		<p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ms-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
	</footer>
	<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
	<!-- END: Footer-->

	<!-- BEGIN: Vendor JS-->
	<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
	<!-- BEGIN Vendor JS-->

	<!-- BEGIN: Page Vendor JS-->
	<script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
	<script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
	<!-- END: Page Vendor JS-->

	<!-- BEGIN: Theme JS-->
	<script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
	<script src="{{ asset('app-assets/js/core/app.js') }}"></script>
	<!-- END: Theme JS-->

	<!-- BEGIN: Page JS-->
	
	<!-- END: Page JS-->

	<script>
		$(window).on('load', function() {
			if (feather) {
				feather.replace({
					width: 14,
					height: 14
				});
			}
		})
	</script>
	
	@yield('additional_jquery')
</body>
<!-- END: Body-->

</html>