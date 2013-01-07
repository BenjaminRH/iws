@section('sb_top')
@yield_section

<!-- NEW Search Widget -->
@if(Auth::check())
<div class="search top bottom">
	<input type="hidden" class="bigdrop" id="site-search" style="width:100%;height:auto">
</div>
@else
<!-- OLD Search Widget -->
<div class="search top bottom">
	<input type="text" class="search" value="Search (coming soon...)" style="color:#888" disabled>
	<input type="submit" value="" class="submit-search" style="cursor:default" disabled>
</div>
<!-- End -->
@endif
<!-- End -->

<h2 class="title bottom-2">Follow us<span class="line"></span></h2>
<div class="social-section bottom">
	<a href="https://www.facebook.com/indiewebseries" target="_blank" class="glyphicons facebook"><i></i></a>
	<a href="https://twitter.com/indiewebseries" target="_blank" class="glyphicons twitter"><i></i></a>
	<a href="https://plus.google.com/u/0/109477545180424617862" target="_blank" class="glyphicons google_plus"><i></i></a>
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