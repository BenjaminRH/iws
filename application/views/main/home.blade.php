@layout('layouts.main')

@section('meta_page_title')<title>Indie Web Series</title>@endsection
@section('page_title')@endsection

@section('content')
<div id="slider">
	<div class="flex-container">
		<div class="flexslider">
			<ul class="slides">
				@foreach($slider_posts as $post)
				<li>
					<a href="{{ URL::to('posts/'.$post->slug) }}">{{ HTML::image($post->image, $post->title) }}</a>
					<p class="flex-caption"><span>{{ $post->title }}</span></p>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div><!-- End Slider -->

<h1 class="title bottom top">Recent Posts<span class="line"></span></h1>
@foreach($posts as $post)
	@include('post.teaser')
@endforeach
@endsection