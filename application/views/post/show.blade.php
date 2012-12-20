@layout('layouts.main')

@section('content')
{{ HTML::link('posts', '&crarr; back to posts') }}

<br>
<br>

<article class="post">
	<aside class="pt-infobox">
		<ul>
			<li class="category">{{ $post->category->name }}</li>
			<li class="date">{{ $post->created_at }}</li>
			<li class="comments">{{ HTML::link("#disqus_thread", "Comments") }}</li>
		</ul>
	</aside>

	<h4>
		{{ $post->title }}
		@if(Auth::check())
		({{ HTML::link('admin/posts/'.$post->slug.'/edit', 'edit') }}/{{ HTML::link('admin/posts/'.$post->slug.'/delete', 'delete') }})
		@endif
	</h4>
	<hr>
	{{ $post->body }}

	<ul class="tags">
	@foreach($post->tags as $tag)
		<li><a href="#">{{ $tag->name }}</a></li>
	@endforeach
	</ul>
</article>

<br><hr><br>

<div id="disqus_thread"></div>
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