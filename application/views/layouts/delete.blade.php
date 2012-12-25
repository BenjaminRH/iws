@layout('layouts.main')

@section('content')
@include('layouts.error')

{{ Form::open() }}
	{{ Form::token() }}

	<fieldset>
		{{ Form::checkbox('delete-confirm') }} <strong>Are you sure you want to permanently delete this?</strong>
	</fieldset>

	{{ Form::submit('Delete', array('class' => 'button large color')) }}
	{{ HTML::link($cancel_path, 'CANCEL!', array('class' => 'button small gray')) }}
{{ Form::close() }}
@endsection