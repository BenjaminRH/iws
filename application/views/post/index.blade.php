@layout('layouts.main')

@section('content')
<h3>
	Posts
	@if(Auth::check())
	 ({{ HTML::link('admin/posts/add', 'add') }})
	@endif
</h3>

@foreach($posts as $post)
	@include('post.teaser')
@endforeach

<hr>
<ul class="pagination color">
	<li><a href="#" class="prev">previous</a></li>
	<li><a href="#">1</a></li>
	<li><a href="#">2</a></li>
	<li><a href="#" class="current">3</a></li>
	<li><a href="#">4</a></li>
	<li><a href="#">5</a></li>
	<li><a href="#">6</a></li>
	<li><a href="#">7</a></li>
	<li><a href="#">8</a></li>
	<li><a href="#">9</a></li>
	<li>...</li>
	<li><a href="#">50</a></li>
	<li><a href="#">51</a></li>
	<li><a href="#">52</a></li>
	<li><a href="#" class="next">Next</a></li>
</ul><!-- End pagination color -->
@endsection