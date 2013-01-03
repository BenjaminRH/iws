<div class="one-third column">
	<div class="logo">
		<a href="{{ URL::home() }}">
			{{ HTML::image('images/logo.png', 'Indie Web Series', array('title' => '')) }}
		</a>
	</div>
</div><!-- End Logo -->

<div class="two-thirds column">
	<nav id="menu" class="navigation">
		<ul id="nav">
			<li>{{ HTML::link('/', 'Home', array('class' => URI::current() == '/' ? 'active' : '')) }}</li>
			<li>{{ HTML::link('posts', 'Posts', array('class' => URI::is('posts*') && URI::segment(1) !== 'admin' ? 'active' : '')) }}</li>
			{{--
			<li>{{ HTML::link('web-series', 'Web Series', array('class' => URI::current() == 'web-series' ? 'active' : '')) }}</li>
			--}}
			<li>{{ HTML::link('about', 'About', array('class' => URI::current() == 'about' ? 'active' : '')) }}</li>
			<li>{{ HTML::link('contact', 'Contact', array('class' => URI::current() == 'contact' ? 'active' : '')) }}</li>
			@if(Auth::check())
			<li>
				{{ HTML::link('admin', 'Admin', array('class' => URI::is('admin*') ? 'active' : '')) }}
				<ul>
					<li>{{ HTML::link('admin/posts/add', 'New post') }}</li>
					<li>{{ HTML::link('admin/tags', 'Manage tags') }}</li>
					<li>{{ HTML::link('admin/categories', 'Manage categories') }}</li>
					<li>{{ HTML::link('admin/users', 'Manage users') }}</li>
					<li>{{ HTML::link('logout', 'Logout') }}</li>
				</ul>
			</li>
			@endif
		</ul>
	</nav>
</div><!-- End Menu -->

<div class="sixteen columns"><hr></div>