@layout('layouts.main')

@section('content')
{{ HTML::link('admin/users', '&crarr; back to users') }}

<h3>Delete user {{ $user->name }}</h3>
<hr>

{{ Form::open() }}
	{{ Form::token() }}
	{{ Form::checkbox('delete-confirm') }}
	<span><b>Are you sure you want to permanently delete this user?</b></span>

	<br><br><br>
	{{ Form::submit('Delete', array('class' => 'alert button')) }}
	<span style="margin-left:10px"><b>{{ HTML::link('admin/users', 'NO! STOP!') }}</b></span>
{{ Form::close() }}
@endsection