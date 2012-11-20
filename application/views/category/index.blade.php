@layout('layouts.main')

@section('content')
<h3>Categories ({{ HTML::link('admin/categories/add', 'add') }})</h3>
<hr>

@foreach($categories as $category)
<p>
	<b>Name:</b> {{ $category->name }}
	<br>
	<b>Actions:</b> {{ HTML::link('admin/categories/'.$category->id.'/edit', 'Edit') }} | {{ HTML::link('admin/categories/'.$category->id.'/delete', 'Delete') }}
</p>
<hr width="50px">
@endforeach
@endsection