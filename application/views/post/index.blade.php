@layout('main')

@section('content')
@foreach($posts->results as $post)
	<article class="post-teaser">
		<aside class="pt-infobox">
			<ul>
				<li class="category"><a href="#">News</a></li>
				<li class="date">{{ $post->date }}</li>
			</ul>
		</aside>

		<a href="#"><h4>A post about stuff</h4></a>
		<hr>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

		<ul class="tags">
			@foreach($post->tags() as $tag)
				<li><a href="#">News</a></li>
			@endforeach
		</ul>
	</article>
@endforeach
@endsection