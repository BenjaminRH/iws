@layout('layouts.main')

@section('content')
<h3>
	Posts
	@if(Auth::check())
	 ({{ HTML::link('admin/posts/add', 'add') }})
	@endif
</h3>

@foreach($posts as $post)
<article class="post-teaser">
	<aside class="pt-infobox">
		<ul>
			<li class="category">{{ $post->category->name }}</li>
			<li class="date">{{ $post->created_at }}</li>
		</ul>
	</aside>

	<h4>{{ HTML::link('posts/'.$post->slug, $post->title) }}</h4>
	<hr>
	{{ Str::limit($post->body, 300) . " " . HTML::link('posts/'.$post->slug, 'Read more') }}

	<ul class="tags">
	@foreach($post->tags as $tag)
		<li><a href="#">{{ $tag->name }}</a></li>
	@endforeach
	</ul>
</article>
@endforeach
@endsection