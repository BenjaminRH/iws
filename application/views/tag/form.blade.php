@include('layouts.error')

{{ Form::open() }}
	{{ Form::token() }}

	{{-- Name field --}}
	<div class="form-box">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', Input::old('name', $category->name), array('class' => 'text' )) }}
	</div>

	<div class="clearfix"></div>

	{{ Form::submit('Save Tag', array('class' => 'button medium color')) }}
{{ Form::close() }}