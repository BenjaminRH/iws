@layout('layouts.main')

@section('sb_top')
<div class="info-box">
	<h4>Post info</h4>
	<hr class="bottom-2">
	<p class="glyphicons calendar"><i></i> {{ date("D M d, Y", strtotime($post->created_at)) }}</p><!-- Date -->
	<br>
	<p class="glyphicons user"><i></i> {{ $post->user->name }}</p><!-- Author -->
	<br>
	<p class="glyphicons folder_open"><i></i> {{ HTML::link('categories/'.$post->category->id, $post->category->name) }}</p><!-- Category -->
	<br>
	<p><span class="glyphicons tags"><i></i>Tags: </span> 
		@foreach($post->tags as $tag)
		{{ HTML::link('tags/'.$tag->id, $tag->name) }}, 
		@endforeach
	</p><!-- Tags -->
	<br>
	<p class="glyphicons comments"><i></i> {{ HTML::link('#disqus_thread', '...') }}</p><!-- Comments -->
	@if(Auth::check())
		<br>
		<p class="glyphicons pencil"><i></i> {{ HTML::link('admin/posts/'.$post->slug.'/edit', 'Edit post') }}</p>
		<br>
		<p class="glyphicons bin"><i></i> {{ HTML::link('admin/posts/'.$post->slug.'/delete', 'Delete post') }}</p>
	@endif
</div><!-- End post-meta -->
@endsection

@section('content')
<div class="post bottom">
	<div class="image-post bottom"> 
		{{ HTML::image($post->image, $post->title, array('style' => 'width:600px;max-height:400px')) }}
	</div>

	<div class="image-post bottom">

		<div class="post-content bottom">
			{{ $post->body }}
		</div><!-- End post-content -->


		<hr class="bottom-2"/>

		<br />
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