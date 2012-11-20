{{ Form::open() }}
	{{ Form::token() }}

	{{-- Name field --}}
	<div class="row">
		<div class="eight columns">
			{{ Form::label('name', 'Name', array('class' => ($errors->has('name') ? 'error' : '') )) }}
			{{ Form::text('name', Input::old('name', $category->name), array('class' => ($errors->has('name') ? ' error' : '') )) }}
			@if($errors->has('name'))
			<small class="error">{{ $errors->first('name') }}</small>
			@endif
		</div>
	</div>

	{{ Form::submit('Save', array('class' => 'button')) }}
{{ Form::close() }}