@layout('layouts.main')

@section('content')
<div class="post bottom">
	<div class="post-meta bottom-2 transparent">
		<div class="meta halflings calendar"><i></i> {{ date("D M d, Y", strtotime($post->created_at)) }}</div><!-- Date -->
		<div class="meta halflings folder-open"><i></i> {{ HTML::link('#', $post->category->name) }}</div><!-- Category -->
		<div class="meta halflings user"><i></i> {{ $post->user->name }}</div><!-- Author -->
		<div class="meta halflings comments"><i></i> {{ HTML::link('#disqus_thread', '...') }}</div><!-- Comments -->
		<div class="meta"><span class="halflings tags"><i></i>Tags: </span> 
			@foreach($post->tags as $tag)
			{{ HTML::link('#', $tag->name) }}, 
			@endforeach
		</div><!-- Tags -->
	</div><!-- End post-meta -->

	<div class="image-post bottom"> 
		{{ HTML::image($post->image, $post->title, array('style' => 'width:640px;height:300px')) }}
	</div>

	<div class="image-post bottom">

		<div class="post-content bottom">
			{{ $post->body }}
		</div><!-- End post-content -->


		<hr class="bottom-2"/>

		<br />

		<h4 class="title">About The Author<span class="line"></span></h4>

		<div class="info-box">
			<h5>{{ $post->user->name }}</h5>
			<p>{{ $post->user->about }}</p>
			<hr class="top-3 bottom-2" />
		</div>
	</div>

	<div id="disqus_thread"></div>
</div>

<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'indiewebseries'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
@endsection