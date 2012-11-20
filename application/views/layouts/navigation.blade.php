<ul class="navigation inline-list">
	<li class="{{ URI::current() == '/' ? 'active' : '' }}">{{ HTML::link('/', 'Home') }}</li>
	<li class="{{ URI::is('posts*') || URI::is('admin/posts/*') ? 'active' : '' }}">{{ HTML::link('posts', 'Posts') }}</li>
	<!-- <li class="{{ URI::current() == 'web-series' ? 'active' : '' }}">{{ HTML::link('web-series', 'Web Series') }}</li> -->
	<!-- <li class="{{ URI::current() == 'search' ? 'active' : '' }}">{{ HTML::link('search', 'Search') }}</li> -->
	<li class="{{ URI::current() == 'about' ? 'active' : '' }}">{{ HTML::link('about', 'About') }}</li>
	<li class="{{ URI::current() == 'contact' ? 'active' : '' }}">{{ HTML::link('contact', 'Contact') }}</li>
</ul>