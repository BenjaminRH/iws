<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<title>{{ $page_title }} - Indie Web Series</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS Style -->
	{{ HTML::style('css/style.css') }}
	
	<!-- Color Skins -->
	{{ HTML::style('css/green.css') }}
	
	<!-- Layout Style -->
	{{ HTML::style('css/boxed.css') }}
	
	<!-- Small Icons -->
	{{ HTML::style('css/halflings.css') }}
	
	<!-- Start JavaScript -->
	
	{{ HTML::script('js/jquery-1.8.3.min.js') }} <!-- jQuery library -->
	{{ HTML::script('js/jquery.easing.1.3.min.js') }} <!-- jQuery Easing -->
	{{ HTML::script('js/jquery-ui.min.js') }} <!-- jQuery Ui -->
	{{ HTML::script('js/jquery.cookie.js') }} <!-- jQuery cookie -->
	{{ HTML::script('js/jquery.uniform.min.js') }} <!-- jQuery Uniform -->
	{{ HTML::script('js/ddsmoothmenu.js') }} <!-- Nav Menu ddsmoothmenu -->
	{{ HTML::script('js/jquery.flexslider.js') }} <!-- Flex Slider  -->
	{{ HTML::script('js/jquery.eislideshow.js') }} <!-- Elastic Slider  -->
	{{ HTML::script('js/jquery.iconmenu.js') }} <!-- Sliding Text and Icon Menu Style  -->
	{{ HTML::script('js/colortip.js') }} <!-- Colortip Tooltip Plugin  -->
	{{ HTML::script('js/tytabs.js') }} <!-- jQuery Plugin tytabs  -->
	{{ HTML::script('js/carousel.js') }} <!-- jQuery Carousel  -->
	{{ HTML::script('js/jquery.prettyPhoto.js') }} <!-- jQuery Prettyphoto  -->
	{{ HTML::script('js/jquery.isotope.min.js') }} <!-- Isotope Filtering  -->
	{{ HTML::script('js/selectnav.js') }} <!-- Responsive Navigation Menu by SelectNav -->
	{{ HTML::script('js/jquery.ui.totop.js') }} <!-- UItoTop plugin  -->
	{{ HTML::script('js/custom.js') }} <!-- Custom Js file for javascript in html -->
	
	<!-- End JavaScript -->

	<!--[if lt IE 9]>
			{{ HTML::script('js/html5.js') }}
			<![endif]-->

			<!-- Favicons -->
	{{--
	{{ HTML::style('images/favicon/favicon.ico') }}
	{{ HTML::style('images/favicon/apple-touch-icon.png') }}
	{{ HTML::style('images/favicon/apple-touch-icon-72x72.png') }}
	{{ HTML::style('images/favicon/apple-touch-icon-114x114.png') }}
	--}}

</head>
<body>

	@section('main')

	<div id="wrap" class="boxed">

		<header>
			<div class="container clearfix">
				@include('layouts.header')
			</div><!-- End Container -->
		</header><!-- <<< End Header >>> -->

		<div class="container clearfix">

			<div class="sixteen columns">
				<h1 class="page-title">
					{{ $page_title }}
					<span class="line"></span>
				</h1>
			</div><!-- Page Title -->


			<!-- Start Main Content -->
			<div class="eleven columns top bottom">
				@yield('content')
			</div><!-- End Main Content -->  


			<!-- Start Sidebar -->
			<div class="five columns bottom">
				@include('layouts.sidebar')
			</div><!-- End Sidebar -->

			<div class="clearfix"></div>
		</div><!-- <<< End Container >>> -->

		<footer>
			<div class="container">
				@include('layouts.footer')
			</div>
		</footer><!-- <<< End Footer >>> -->

	</div><!-- End wrap -->

	<script type="text/javascript">
		/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
		var disqus_shortname = 'indiewebseries'; // required: replace example with your forum shortname

		/* * * DON'T EDIT BELOW THIS LINE * * */
		(function () {
			var s = document.createElement('script'); s.async = true;
			s.type = 'text/javascript';
			s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
			(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
		}());
	</script>

	@yield_section

</body>
</html>