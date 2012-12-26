@section('sb_top')
@yield_section

<!-- Search Widget -->
<div class="search top bottom">
	{{ Form::open('search', 'GET') }}
		{{ Form::text('q', 'Search', array('class' => 'search')) }}
		{{ Form::submit('', array('class' => 'submit-search')) }}
	{{ Form::close() }}
</div>
<!-- End -->

<h2 class="title bottom-2">Follow us<span class="line"></span></h2>
<div class="social-section bottom">
	<a href="https://www.facebook.com/indiewebseries" target="_blank" class="glyphicons facebook"><i></i></a>
	<a href="https://twitter.com/indiewebseries" target="_blank" class="glyphicons twitter"><i></i></a>
	<a href="https://plus.google.com/u/0/109477545180424617862" target="_blank" class="glyphicons google_plus"><i></i></a>
	<a href="http://flic.kr/ps/2oQydB" target="_blank" class="glyphicons flickr"><i></i></a>
</div>

@section('sb_below_search')
@yield_section

<div style="padding: 5px 0"></div>

{{--
<!-- Text Widget -->
<h2 class="title bottom-2">Indie Web Series<span class="line"></span></h2>

<div class="about-project bottom">
	<p>Indie Web Series is a comprehensive authority on internet web series, covering many aspects of the growing web series industry and bringing you the latest updates, interviews with creators and stars, reviews of episodes, and even never-before-seen sneak peeks and previews of upcoming media.</p>
</div>
<!-- End text widget -->
--}}

<!-- Twitter Feed -->
<h2 class="title">Twitter<span class="line"></span></h2>
<div class='tweet query'></div><!-- Tweets Code -->
<!-- End twitter feed -->

@section('sb_bottom')
@yield_section