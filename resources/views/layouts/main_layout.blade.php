
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>SIM ASET PTPNIX</title>

	<!-- Global stylesheets -->
	<link rel="shortcut icon" href="{{ asset('exa_assets/img/ptpn9.png')}}" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap_limitless.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
	<!-- /global stylesheets -->

	<script type="text/javascript" src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('global_assets/js/plugins/ui/slinky.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('global_assets/js/demo_pages/form_inputs.js') }}"></script>
	<script type="text/javascript" src="{{ asset('global_assets/js/jquery-number/jquery.number.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
	<!-- <script type="text/javascript" src="{{ asset('global_assets/js/demo_pages/form_floating_labels.js') }}"></script> -->
    <!-- Core JS files -->
    <!-- /core JS files -->
    <!-- Theme JS files -->
 	<script src="{{ asset('global_assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>

	<!-- /theme JS files -->

		
	@yield('css')
	@yield('js-top')
</head>

<body>

	@include('sweetalert::alert')
	@include('layouts.includes.main-navbar')
	@include('layouts.includes.navbar')


	<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content header-elements-md-inline">
			<br>
		</div>
	</div>
	<!-- /page header -->
	<!-- Page content -->
	<div class="page-content pt-0">
		<!-- Main content -->
		<div class="content-wrapper">
			<!-- Content area -->
			<div class="content">

				<!-- Basic card -->
				@yield('content')
			</div>
			<!-- /content area -->
		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->
	<!-- Footer -->
	<div class="navbar navbar-expand-lg navbar-light">
		<div class="text-center d-lg-none w-100">
			<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
				<i class="icon-unfold mr-2"></i>
				Footer
			</button>
		</div>

		<div class="navbar-collapse collapse" id="navbar-footer">
			<span class="navbar-text">
				&copy; 2019. <a href="http://ptpnix.co.id">IT PTPN IX</a> built with <a href="http://ptpnix.co.id" target="_blank">Love</a>
			</span>

		
		</div>
	</div>
	<!-- /footer -->
		@yield('js-bottom')
</body>
</html>
