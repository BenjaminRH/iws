<!-- Search Widget -->
<div class="search top bottom">
	{{ Form::open('search', 'GET') }}
		{{ Form::text('q', 'Search', array('class' => 'search')) }}
		{{ Form::submit('', array('class' => 'submit-search')) }}
	{{ Form::close() }}
</div>
<!-- End -->

<!-- Text Widget -->
<h2 class="title bottom-2">Bla bla<span class="line"></span></h2>

<div class="about-project bottom">
	<p>
		Donec seid odio dui. Nullalit libero, alea pharetra augue. Nullam id dolor ideacto vehicula SockMonkee lorem dolor.
		Donec seid odio dui. Nullalit libero, alea pharetra augue. Nullam id dolor ideacto vehicula SockMonkee lorem dolor.
	</p>
</div>