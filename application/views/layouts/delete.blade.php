@layout('layouts.main')

@section('content')
<h3>Delete confirmation</h3>
<hr>

{{ Form::open() }}
	{{ Form::token() }}
	{{ Form::checkbox('delete-confirm') }}
	<span><b>Are you sure you want to permanently delete this?</b></span>
	@if($errors->has('delete-confirm'))
	<small class="error" style="margin-top:4px">You must accept the confirmation to delete.</small>
	@endif

	<br><br><br>
	{{ Form::submit('Delete', array('class' => 'alert button')) }}
	<span style="margin-left:10px"><b>{{ HTML::link($cancel_path, 'NO! STOP!') }}</b></span>
{{ Form::close() }}
@endsection