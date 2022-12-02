<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Book store </title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('source/assets/dest/css/css1.css')}}" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('source/assets/dest/css/css.css')}}" rel="stylesheet" type="text/css">

	<!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="{{URL::asset('source/assets/dest/css/bootstrap.min.css')}}">

	<link rel="stylesheet" href="admin_css/bower_components/bootstrap/dist/css/bootstrap.min.css">

	<link href="{{URL::asset('source/assets/dest/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{ URL::asset('source/assets/dest/vendors/colorbox/example3/colorbox.css')}}" rel="stylesheet">
	<link href="{{ URL::asset('source/assets/dest/rs-plugin/css/settings.css')}}" rel="stylesheet">
	<link href="{{ URL::asset('source/assets/dest/rs-plugin/css/responsive.css')}}" rel="stylesheet">
	<link title="style" href="{{ URL::asset('source/assets/dest/css/style.css')}}" rel="stylesheet">
	<link href="{{ URL::asset('source/assets/dest/css/animate.css')}}" rel="stylesheet">
	<link title="style" href="{{ URL::asset('source/assets/dest/css/huong-style.css')}}" rel="stylesheet">
</head>

<body>

	@include('header1')
	<div class="rev-slider">
		@yield('content1')
	</div> <!-- .container -->

	@include('foodter')


	<!-- include js files -->
	<script src="{{ URL::asset('source/assets/dest/js/jquery.js')}}" rel="script"></script>
	<script src="{{ URL::asset('admin_css/bower_components/jquery/dist/jquery.min.js')}}" rel="script"></script>
	<script src="{{ URL::asset('source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js')}}" rel="script"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js" rel="script"></script>
	<script src="{{ URL::asset('source/assets/dest/js/bootstrap.min.js')}}" rel="script"></script>
	<script src="{{ URL::asset('source/assets/dest/vendors/bxslider/jquery.bxslider.min.js')}}" rel="script"></script>
	<script src="{{ URL::asset('source/assets/dest/vendors/colorbox/jquery.colorbox-min.js')}}" rel="script"></script>
	<script src="{{ URL::asset('source/assets/dest/vendors/animo/Animo.js')}}" rel="script"></script>
	<script src="{{ URL::asset('source/assets/dest/vendors/dug/dug.js')}}" rel="script"></script>
	<script src="{{ URL::asset('source/assets/dest/js/scripts.min.js')}}" rel="script"></script>
	<script src="{{ URL::asset('source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js')}}" rel="script"></script>
	<script src="{{ URL::asset('source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js')}}" rel="script"></script>
	<script src="{{ URL::asset('source/assets/dest/js/waypoints.min.js')}}" rel="script"></script>
	<script src="{{ URL::asset('source/assets/dest/js/wow.min.js')}}" rel="script"></script>
	<!--customjs-->
	<script src="{{ URL::asset('source/assets/dest/js/custom2.js')}}" rel="script"></script>
	<script>
		$(document).ready(function($) {
			$(window).scroll(function() {
				if ($(this).scrollTop() > 150) {
					$(".header-bottom").addClass('fixNav')
				} else {
					$(".header-bottom").removeClass('fixNav')
				}
			})
		})
	</script>

	@yield('script')

</body>

</html>