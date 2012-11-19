@layout('layouts.main')

@section('content')
{{ HTML::link('posts', '&crarr; back to posts') }}

<h3>Edit post {{ $post->title }}</h3>
@include('post.form')
@endsection