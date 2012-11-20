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

	{{--<ul class="tags">--}}
</article>
@endsection