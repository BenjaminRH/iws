	<div class="post-meta bottom-2 transparent">
		<div class="meta halflings calendar"><i></i> {{ date("D M d, Y", strtotime($post->created_at)) }}</div><!-- Date -->
		<div class="meta halflings folder-open"><i></i> {{ HTML::link('categories/'.$post->category->id, $post->category->name) }}</div><!-- Category -->
		<div class="meta halflings user"><i></i> {{ $post->user->name }}</div><!-- Author -->
		<div class="meta halflings comments"><i></i> {{ HTML::link('#disqus_thread', '...') }}</div><!-- Comments -->
		<div class="meta"><span class="halflings tags"><i></i>Tags: </span>
			@foreach($post->tags as $tag)
			{{ HTML::link('tags/'.$tag->id, $tag->name) }}, 
			@endforeach
		</div><!-- Tags -->
		@if(Auth::check())
			<div class="meta halflings pencil"><i></i> {{ HTML::link('admin/posts/'.$post->slug.'/edit', 'Edit post') }}</div>
		@endif
	</div>


	{{ HTML::image('http://www.gravatar.com/avatar/'.md5(strtolower(trim($post->user->email))), 'author photo', array('class' => 'pic-2')) }}


			<h4 class="title">Author<span class="line"></span></h4>

		<div class="info-box">
			<h5>{{ $post->user->name }}</h5>
			<!-- <p>{{ $post->user->about }}</p> -->
			<hr class="top-3 bottom-2" />
		</div>