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

@section('sb_below_search')
@yield_section

<!-- Text Widget -->
<h2 class="title bottom-2">Indie Web Series<span class="line"></span></h2>

<div class="about-project bottom">
	<p>Indie Web Series is a comprehensive authority on internet web series, covering many aspects of the growing web series industry and bringing you the latest updates, interviews with creators and stars, reviews of episodes, and even never-before-seen sneak peeks and previews of upcoming media.</p>
</div>

@section('sb_bottom')
@yield_section