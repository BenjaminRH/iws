<nav id="menu" class="navigation">
	<ul id="nav">
		<li>{{ HTML::link('/', 'Home', array('class' => URI::current() == '/' ? 'active' : '')) }}</li>
		<li>{{ HTML::link('posts', 'Posts', array('class' => URI::is('posts*') || URI::is('admin/posts/*') ? 'active' : '')) }}</li>
		<!-- <li>{{ HTML::link('web-series', 'Web Series', array('class' => URI::current() == 'web-series' ? 'active' : '')) }}</li> -->
		<li>{{ HTML::link('about', 'About', array('class' => URI::current() == 'about' ? 'active' : '')) }}</li>
		<li>{{ HTML::link('contact', 'Contact', array('class' => URI::current() == 'contact' ? 'active' : '')) }}</li>
	</ul>
</nav>