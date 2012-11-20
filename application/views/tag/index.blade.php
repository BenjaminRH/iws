@layout('layouts.main')

@section('content')
<h3>Tags ({{ HTML::link('admin/tags/add', 'add') }})</h3>
<hr>

@foreach($tags as $tag)
<p>
	<b>Name:</b> {{ $tag->name }}
	<br>
	<b>Actions:</b> {{ HTML::link('admin/tags/'.$tag->id.'/edit', 'Edit') }} | {{ HTML::link('admin/tags/'.$tag->id.'/delete', 'Delete') }}
</p>
<hr width="50px">
@endforeach
@endsection