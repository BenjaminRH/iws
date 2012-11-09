<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>      <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>      <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width" />

	<title>Indie Web Series</title>

	<!-- Droid Serif and Sans fonts from Google -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet'>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet'>
	
	<!-- Included CSS Files (Compressed) -->
	<link rel="stylesheet" href="css/foundation.min.css">
	<link rel="stylesheet" href="css/main.css">

	<script src="js/modernizr.foundation.js"></script>
</head>
<body>

	<header class="row">
		{{ render('layouts.header') }}
	</header>

	<div class="row">
		<div class="eight columns">
			@yield('content')
		</div>

		<div class="four columns sidebar">
			{{ render('layouts.sidebar') }}
		</div>
	</div>

	<footer class="row">
		{{ render('layouts.footer') }}
	</footer>
	
	<!-- Included JS Files (Compressed) -->
	<script src="js/foundation.min.js"></script>
	
	<!-- Initialize JS Plugins -->
	<script src="js/init.js"></script>
</body>
</html>
