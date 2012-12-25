@include('layouts.error')

{{ Form::open() }}
	{{ Form::token() }}

	{{-- Name field --}}
	<fieldset>
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Input::old('name', $user->name), array('class'=>'text')) }}
	</fieldset>

	{{-- Email field --}}
	<fieldset>
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', Input::old('email', $user->email), array('class'=>'text')) }}
	</fieldset>

	<fieldset>
		@if(URI::segment(3) !== 'add')
			<h3>Password (leave blank to keep current password)</h3>
		@endif

		{{-- Password field --}}
		<fieldset>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', array('class'=>'text')) }}
		</fieldset>

		{{-- Confirm Password field --}}
		<fieldset>
			{{ Form::label('password_confirmation', 'Confirm password') }}
			{{ Form::password('password_confirmation', array('class'=>'text')) }}
		</fieldset>
	</fieldset>

	{{ Form::submit('Save', array('class' => 'button small color')) }}
{{ Form::close() }}