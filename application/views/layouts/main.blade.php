<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	@section('meta_page_title')
	<title>{{ $page_title }} - Indie Web Series</title>
	@yield_section
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Droid Serif and Sans fonts from Google -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet'>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet'>

	<!-- CSS Style -->
	{{ HTML::style('css/css.min.css') }}
	{{ HTML::style('css/custom.css') }}
	
	<!-- Start JavaScript -->
	{{ HTML::script('js/jquery-1.8.3.min.js') }} <!-- jQuery library -->
	{{ HTML::script('js/jquery-ui.min.js') }} <!-- jQuery Ui -->
	{{ HTML::script('js/js.min.js') }} <!-- All other js crap compressed -->
	{{ HTML::script('js/custom.js') }} <!-- Custom Js file for javascript in html -->
	
	<!-- End JavaScript -->

	<!--[if lt IE 9]>
			{{ HTML::script('js/html5.js') }}
	<![endif]-->

	<!-- Favicons -->
	<link rel="shortcut icon" href="{{ URL::to_asset('images/favicon/favicon.ico') }}">
	<link rel="apple-touch-icon" href="{{ URL::to_asset('images/favicon/apple-touch-icon.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ URL::to_asset('images/favicon/apple-touch-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ URL::to_asset('images/favicon/apple-touch-icon-114x114.png') }}">

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

			@include('layouts.messages')

			@section('page_title')
			<div class="sixteen columns">
				<h1 class="page-title">
					{{ $page_title }}
					<span class="line"></span>
				</h1>
			</div><!-- Page Title -->
			@yield_section


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