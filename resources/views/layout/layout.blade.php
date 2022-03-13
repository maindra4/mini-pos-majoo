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
	<title>{{ $title }} - Mini POS</title>
	<link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
	<link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

	<!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Inconsolata&amp;family=Roboto+Slab&amp;family=Slabo+27px&amp;family=Sofia&amp;family=Ubuntu+Mono&amp;display=swap">
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
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
	<!-- END: Page CSS-->

	<!-- BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	<!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

	<!-- BEGIN: Header-->
	<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
		<div class="navbar-container d-flex content">
			<div class="bookmark-wrapper d-flex align-items-center">
				<ul class="nav navbar-nav d-xl-none">
					<li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li class="nav-item d-none d-lg-block">
						<div class="bookmark-input search-input">
							<div class="bookmark-input-icon"><i data-feather="search"></i></div>
							<input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
							<ul class="search-list search-list-bookmark"></ul>
						</div>
					</li>
				</ul>
			</div>
			<ul class="nav navbar-nav align-items-center ms-auto">
				<li class="nav-item dropdown dropdown-user">
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
						<a class="dropdown-item" href="/">
							<i class="me-50" data-feather="home"></i> Front Page
						</a>
						<form action="/logout" method="POST">
							@csrf
							<button class="dropdown-item btn-block" type="submit" style="width: 100%">
								<i class="me-50" data-feather="power"></i> Logout
							</button>
						</form>
					</div>
				</li>
			</ul>
		</div>
	</nav>
	<ul class="main-search-list-defaultlist-other-list d-none">
		<li class="auto-suggestion justify-content-between">
			<a class="d-flex align-items-center justify-content-between w-100 py-50">
				<div class="d-flex justify-content-start">
					<span class="me-75" data-feather="alert-circle"></span>
					<span>No results found.</span>
				</div>
			</a>
		</li>
	</ul>
	<!-- END: Header-->


	<!-- BEGIN: Main Menu-->
	<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
		<div class="navbar-header">
			<ul class="nav navbar-nav flex-row">
				<li class="nav-item me-auto">
					<a class="navbar-brand" href="html/ltr/vertical-menu-template/index.html">
						<span class="brand-logo">
							<svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
								<defs>
									<lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
										<stop stop-color="#000000" offset="0%"></stop>
										<stop stop-color="#FFFFFF" offset="100%"></stop>
									</lineargradient>
									<lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
										<stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
										<stop stop-color="#FFFFFF" offset="100%"></stop>
									</lineargradient>
								</defs>
								<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<g id="Artboard" transform="translate(-400.000000, -178.000000)">
										<g id="Group" transform="translate(400.000000, 178.000000)">
											<path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
											<path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
											<polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
											<polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
											<polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
										</g>
									</g>
								</g>
							</svg>
						</span>
						<h2 class="brand-text">Mini Pos</h2>
					</a>
				</li>
				<li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
			</ul>
		</div>
		<div class="shadow-bottom"></div>
		<div class="main-menu-content">
			<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
				<li class="{{ ($active_menu == 'dashboard') ? 'active' : '' }} nav-item">
					<a class="d-flex align-items-center" href="/dashboard">
						<i data-feather="home"></i>
						<span class="menu-title text-truncate" data-i18n="Email">Dashboard</span>
					</a>
				</li>
				<li class="{{ ($active_menu == 'product') ? 'active' : '' }} nav-item">
					<a class="d-flex align-items-center" href="/product">
						<i data-feather='shopping-bag'></i>
						<span class="menu-title text-truncate" data-i18n="Email">Master Produk</span>
					</a>
				</li>
				<li class="{{ ($active_menu == 'user') ? 'active' : '' }} nav-item">
					<a class="d-flex align-items-center" href="/user">
						<i data-feather='users'></i>
						<span class="menu-title text-truncate" data-i18n="Email">Master User</span>
					</a>
				</li>
				<li class="{{ ($active_menu == 'supplier') ? 'active' : '' }} nav-item">
					<a class="d-flex align-items-center" href="/supplier">
						<i data-feather='truck'></i>
						<span class="menu-title text-truncate" data-i18n="Email">Master Supplier</span>
					</a>
				</li>
				<li class="{{ ($active_menu == 'pelanggan') ? 'active' : '' }} nnav-item">
					<a class="d-flex align-items-center" href="/pelanggan">
						<i data-feather='user-check'></i>
						<span class="menu-title text-truncate" data-i18n="Email">Master Pelanggan</span>
					</a>
				</li>
				<li class="{{ ($active_menu == 'transaksi_pembelian') ? 'active' : '' }} nav-item">
					<a class="d-flex align-items-center" href="/transaksi_pembelian">
						<i data-feather='bar-chart'></i>
						<span class="menu-title text-truncate" data-i18n="Email">Transaksi Pembelian</span>
					</a>
				</li>
				<li class="{{ ($active_menu == 'transaksi_penjualan') ? 'active' : '' }} nav-item">
					<a class="d-flex align-items-center" href="/transaksi_penjualan">
						<i data-feather='bar-chart-2'></i>
						<span class="menu-title text-truncate" data-i18n="Email">Transaksi Penjualan</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- END: Main Menu-->

	<!-- BEGIN: Content-->
	<div class="app-content content ">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		
		@yield('content')
	</div>
	<!-- END: Content-->

	<div class="sidenav-overlay"></div>
	<div class="drag-target"></div>

	<!-- BEGIN: Footer-->
	<footer class="footer footer-static footer-light">
		<p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">
			COPYRIGHT &copy; 2021
			<a class="ms-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a>
			<span class="d-none d-sm-inline-block">, All rights Reserved</span></span>
			<span class="float-md-end d-none d-md-block">
				Hand-crafted & Made with <i data-feather="heart"></i>
			</span>
		</p>
	</footer>
	<button class="btn btn-primary btn-icon scroll-top" type="button">
		<i data-feather="arrow-up"></i>
	</button>
	<!-- END: Footer-->

	<!-- BEGIN: Vendor JS-->
	<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
	<!-- BEGIN Vendor JS-->

	<!-- BEGIN: Page Vendor JS-->
	<script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
	<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
	<script src="{{ asset('app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
	<script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
	<script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
	<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
	<script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
	<script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
	<script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<!-- END: Page Vendor JS-->

	<!-- BEGIN: Theme JS-->
	<script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
	<script src="{{ asset('app-assets/js/core/app.js') }}"></script>
	<!-- END: Theme JS-->

	<!-- BEGIN: Page JS-->
	<script src="{{ asset('app-assets/js/scripts/tables/table-datatables-basic.js') }}"></script>
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