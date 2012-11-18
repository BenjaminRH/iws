@layout('layouts.main')

@section('content')
@foreach($posts as $post)
	<article class="post-teaser">
		<aside class="pt-infobox">
			<ul>
				<li class="category">{{ 'Category' }}</li>
				<li class="date">{{ $post->created_at }}</li>
			</ul>
		</aside>

		<a href="posts/{{ $post->slug }}"><h4>{{ $post->title }}</h4></a>
		<hr>
		{{ $post->body }}

		<ul class="tags">
			@foreach($post->tags() as $tag)
				<li><a href="tags/{{ $tag->slug }}">{{ $tag->name }}}</a></li>
			@endforeach
		</ul>
	</article>
@endforeach
@endsection