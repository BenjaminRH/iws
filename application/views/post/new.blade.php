@layout('layouts.main')

@section('content')
{{ HTML::link('posts', '&crarr; back to posts') }}

<h3>New post</h3>
@include('post.form')
@endsection