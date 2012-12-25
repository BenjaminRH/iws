@include('layouts.error')

{{ Form::open() }}
	{{ Form::token() }}

	{{-- Name field --}}
	<fieldset>
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', Input::old('name', $tag->name), array('class'=>'text')) }}
	</fieldset>

	{{ Form::submit('Save Tag', array('class' => 'button small color')) }}
{{ Form::close() }}