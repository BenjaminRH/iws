@layout('layouts.main')

@section('content')
@foreach($posts->results as $post)
	@include('post.teaser')
@endforeach

<hr>

{{ $posts->links() }}
@endsection