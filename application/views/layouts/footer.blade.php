<hr>
<p>Copyright 2012 by Miriam Kalman and Benjamin Harris. All rights reserved.</p>

@if (Auth::guest())
<p>{{ HTML::link('login', 'Login') }}</p>
@else
<p>Currently logged in as <b>{{ Auth::user()->email }}</b> | {{ HTML::link('logout', 'Logout') }}</p>
@endif