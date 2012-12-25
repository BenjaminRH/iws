<article class="post bottom">
	<h2 class="title bottom top-2">{{ HTML::link('posts/'.$post->slug, $post->title) }} <span class="line"></span></h2>
	
	<div class="image-post bottom left"> 
		{{ HTML::image($post->image, $post->title, array('style' => 'max-width:100px;max-height:65px')) }}
	</div><!-- End slider image-post -->

	<div class="post-content">
		<p>{{ Str::limit(strip_tags($post->body), 300) }}</p>
	</div>

	<hr class="bottom-2">

	<div class="post-meta bottom-2 transparent">
		<div class="meta halflings calendar"><i></i> {{ date("D M d, Y", strtotime($post->created_at)) }}</div><!-- Date -->
		<div class="meta halflings folder-open"><i></i> {{ HTML::link('#', $post->category->name) }}</div><!-- Category -->
		<div class="meta halflings user"><i></i> {{ $post->user->name }}</div><!-- Author -->
		<div class="meta halflings comments"><i></i> {{ HTML::link('posts/'.$post->slug.'#disqus_thread', '...') }}</div><!-- Comments -->
		<div class="meta halflings plus"><i></i> {{ HTML::link('posts/'.$post->slug, 'Read More') }}</div><!-- Read More -->
	</div><!-- End post-meta -->
</article>