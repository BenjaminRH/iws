<p>Copyright 2012 by Miriam Kalman and Benjamin Harris. All rights reserved.</p>

@if (Auth::guest())
<p>{{ HTML::link('login', 'Login') }}</p>
@else
<p>Currently logged in as <b>{{ Auth::user()->email }}</b> | {{ HTML::link('logout', 'Logout') }}</p>
<p><b>Admin:</b> {{ HTML::link('admin', 'Dashboard') }} | {{ HTML::link('admin/users', 'Users') }} | {{ HTML::link('admin/posts', 'Posts') }} | {{ HTML::link('admin/series', 'Series') }} | {{ HTML::link('admin/categories', 'Categories') }} | {{ HTML::link('admin/tags', 'Tags') }}</p>
@endif