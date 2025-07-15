<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ __('labels.project_name') }} :  @yield('title', 'My Laravel App')</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Bootstrap Template created by UxDT division, National Informatics Centre">
  	<meta name="keywords" content="HTML, Bootstrap, CSS, JS">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="{{ asset('public_assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <!-- Custom styles for this template -->
    <!-- <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/base-responsive.css" /> -->
	<link rel="stylesheet" href="{{ asset('application_assets/css/base.css') }}" />
	<link rel="stylesheet" href="{{ asset('application_assets/css/base-responsive.css') }}" />
    <!-- <link rel="stylesheet" href="css/animate.min.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" /> -->
	<link rel="stylesheet" href="{{ asset('application_assets/css/animate.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('application_assets/css/slicknav.min.css') }}" />
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css" /> -->
	<link rel="stylesheet" href="{{ asset('application_assets/css/font-awesome.min.css') }}" />
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
	<link rel="stylesheet" href="{{ asset('application_assets/vendor/fontawesome-free/css/all.min.css') }}" />
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- 
    <script src="vendor/charts/Chart.js"></script>
    <script src="vendor/charts/moment.min.js"></script>
	<script src="vendor/charts/Chart.min.js"></script>
	<script src="vendor/charts/utils.js"></script> -->
	<script src="{{ asset('application_assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('application_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	
	<link rel="stylesheet" href="{{ asset('public_assets/vendor/charts/Chart.js') }}" />
	<link rel="stylesheet" href="{{ asset('public_assets/vendor/charts/moment.min.js') }}" />
	<link rel="stylesheet" href="{{ asset('public_assets/vendor/charts/Chart.min.js') }}" />
	<link rel="stylesheet" href="{{ asset('public_assets/vendor/charts/utils.js') }}" />

    <style>
    	body {
			background-color: #fff;
		}

		.b-leftmenu ul {
			list-style: none;
			margin: 0;
			padding: 0;
		}
		.b-leftmenu ul li {
		  /* Sub Menu */
		}
		.b-leftmenu ul li a {
			display: block;
			background: #ebebeb;
			padding: 10px 15px;
			color: #333;
			text-decoration: none;
			-webkit-transition: 0.2s linear;
			-moz-transition: 0.2s linear;
			-ms-transition: 0.2s linear;
			-o-transition: 0.2s linear;
			transition: 0.2s linear;
		}
		.b-leftmenu ul li a:hover {
			background: #f8f8f8;
			color: #515151;
		}
		.b-leftmenu ul li a .fa {
			width: 16px;
			text-align: center;
			margin-right: 5px;
			float:right;
		}
		.b-leftmenu ul ul {
			background-color:#ebebeb;
		}
		.b-leftmenu .sub-menu ul li a {
			background: #f8f8f8;
			border-left: 4px solid transparent;
			padding: 10px 25px;
		}
		.b-leftmenu .sub-sub-menu ul li a {
			padding: 10px 20px 10px 40px;
		}
		.b-leftmenu a.b-newpage:hover {
			background: #ebebeb;
			border-left: 4px solid #3498db;
		}
    </style>
</head>

<body>
	<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    
	<!-- @include('application_layouts.left_sidebar') -->
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
		{{--@include('application_layouts.header')--}}
		@include('public_layouts.header_right')
		@yield('content')
            
		@include('public_layouts.application_footer')
		
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->



  <!-- Bootstrap core JavaScript -->
  <!-- <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/jquery.slicknav.min.js"></script>
  <script src="js/dashboard.js"></script> -->


	
	<script src="{{ asset('application_assets/js/jquery.slicknav.min.js') }}"></script>
	<script src="{{ asset('application_assets/js/dashboard.js') }}"></script>

  <!-- <link rel="stylesheet" href="{{ asset('application_assets/vendor/jquery/jquery.min.js') }}" />
  <link rel="stylesheet" href="{{ asset('application_assets/vendor/bootstrap/js/bootstrap.min.js') }}" />
  <link rel="stylesheet" href="{{ asset('application_assets/js/jquery.slicknav.min.js') }}" />
  <link rel="stylesheet" href="{{ asset('application_assets/js/dashboard.js') }}" /> -->

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

 
  <script>
  	$(document).ready(function(){ 
	    $('#backtotop').click(function(){ 
	        $("html, body").animate({ scrollTop: 0 }, 600); 
	        return false; 
	    }); 
	});
  </script>


  <script>
  	$('.sub-menu ul').hide();
  	$('.sub-sub-menu ul').hide();
	$(".sub-menu a").click(function () {
		$(this).parent(".sub-menu").children("ul").slideToggle("100");
		$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
	});

	$(".sub-sub-menu a").click(function () {
		$(this).parent(".sub-sub-menu").children("ul").slideToggle("100");
		$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
	});
  </script>


    
    <!-- Signup Modal -->
	<div class="modal fade" id="signout-modal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header text-center d-block p-5 border-bottom-0">
					<h3 class="modal-title">Sign Out?</h3>
					<button type="button" class="close position-absolute" style="right: 15px; top: 8px;" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<p class="text-center">Are you sure you want to Sign Out?</p>
					<div class="text-center py-4">
						<form action="index.html">
							<button type="submit" class="btn btn-primary b-btn mx-1">Sign Out</button>
							<button class="btn btn-secondary mx-3" data-dismiss="modal">Cancel</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>



	  <!-- <script src="vendor/jquery-ui/jquery-ui.js"></script> -->

	  <script src="{{ asset('application_assets/vendor/jquery-ui/jquery-ui.js') }}"></script>

	  <script>
		  $( function() {
	        $( "#sortable-menu").sortable();
	        $( "#sortable-menu").disableSelection();

	        $( "#sortable-cards").sortable();
	        $( "#sortable-cards").disableSelection();
	      });
	  </script>


	  <script>
	  $(function() {
	    $("#one-item-row").on("click", function() {
	    	$(".b-customize").addClass("col-lg-12", 300);
	    	$(".b-customize").removeClass("col-lg-4", 300);
	    	$(".b-customize").removeClass("col-lg-6", 300);
	        
	    });

	    $("#two-item-row").on("click", function() {
	    	$(".b-customize").addClass("col-lg-6", 300);
	    	$(".b-customize").removeClass("col-lg-4", 300);
	    	$(".b-customize").removeClass("col-lg-12", 300);
	        
	    });

	    $("#three-item-row").on("click", function() {
	    	$(".b-customize").addClass("col-lg-4", 300);
	    	$(".b-customize").removeClass("col-lg-6", 300);
	    	$(".b-customize").removeClass("col-lg-12", 300);
	        
	    });
	 
	  });
	  </script>

	
</body>
</html>