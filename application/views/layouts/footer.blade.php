<div class="eight columns">
	<div class="about">
		<h3 class="title">About Us<span class="line"></span></h3>
		<p>Indie Web Series is a comprehensive authority on internet web series, covering many aspects of the growing web series industry and bringing you the latest updates, interviews with creators and stars, reviews of episodes, and even never-before-seen sneak peeks and previews of upcoming media.</p>
	</div>
</div><!-- End about -->

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