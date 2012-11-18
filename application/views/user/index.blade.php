@layout('layouts.main')

@section('content')
<h3>Users ({{ HTML::link('admin/users/add', 'add') }})</h3>
<hr>

@foreach($users as $user)
<p>
	<b>Name:</b> {{ $user->name }}
	<br>
	<b>Email:</b> {{ $user->email }}
	<br>
	<b>Actions:</b> {{ HTML::link('admin/users/edit/'.$user->id, 'Edit') }} | {{ HTML::link('admin/users/delete/'.$user->id, 'Delete') }}
</p>
<hr width="50px">
@endforeach
@endsection