@layout('layouts.main')

@section('content')
@foreach($posts as $post)
	@include('post.teaser')
@endforeach
@endsection