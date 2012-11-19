<div class="side-section">
	<h4 class="ribbon"><span>Our Favorites</span></h4>
	<div class="side-pane">
		<p>This is a complete placeholder for whatever is going to be in the right side bar. But we know it's going to be awesome, so stay tuned!</p>
	</div>
</div>

<div class="side-section">
	<h4 class="ribbon"><span>Recent Posts</span></h4>
	<div class="side-pane">
		@foreach(Post::order_by('created_at', 'desc')->take(5)->get() as $post)
		<p>{{ HTML::link('posts/'.$post->slug, $post->title) }}</p>
		@endforeach
	</div>
</div>