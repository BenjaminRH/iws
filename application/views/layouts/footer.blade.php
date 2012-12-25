<div class="eight columns">
	<div class="about">
		<h3 class="title">About Us<span class="line"></span></h3>
		<p>
			Consectetur adipiscing elit aeneane lorem lipsum, condimentum ultrices consequat eu, vehicula mauris lipsum adipiscing 
			lipsum aenean orci lorem Asequat. <br /> lorem ipsum dolor lorem sit amet, consectetur adipiscing dolor .
		</p>
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