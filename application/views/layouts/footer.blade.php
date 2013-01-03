<div class="eight columns">
	<div class="about">
		<h3 class="title">About Us<span class="line"></span></h3>
		<p>Indie Web Series is a comprehensive authority on internet web series, covering many aspects of the growing web series industry and bringing you the latest updates, interviews with creators and stars, reviews of episodes, and even never-before-seen sneak peeks and previews of upcoming media.</p>
	</div>
</div><!-- End about -->

@if(Auth::check())
	<div class="eight columns">
		<div class="about">
			<h3 class="title">Website Status<span class="line"></span></h3>
			<h5 style="color:white;text-shadow:none;">Future features</h5>
			<ul class="star-list"><li>Feeds (RSS, Atom)</li></ul> <!-- Working on currently -->
			<ul class="plus-list"> <!-- Upcoming features -->
				<li>Admin dashboard</li>
				<li>Advanced posts search/filtering</li>
				<li>Post title and slug helpers</li>
				<li>Add image and video features to editor</li>
				<li>Improved admin backend</li>
			</ul>
		</div>
	</div><!-- End updates -->
@endif

<div class="sixteen columns"><hr class="bottom" /></div>

<div class="sixteen columns">
	<span class="copyright">
		Copyright &copy; 2012 by Miriam Kalman and Benjamin Harris. All rights reserved. 
		@if(Auth::guest())
			{{ HTML::link('login', 'Login') }}
		@else
			Logged in as <strong>{{ Auth::user()->email }}</strong>. {{ HTML::link('logout', 'Logout') }}
		@endif
	</span>
</div>