@layout('layouts.main')

@section('content')
<h3>
	Posts
	@if(Auth::check())
	 ({{ HTML::link('admin/posts/add', 'add') }})
	@endif
</h3>

@foreach($posts->results as $post)
	@include('post.teaser')
@endforeach

<hr>

{{ $posts->links() }}
@endsection