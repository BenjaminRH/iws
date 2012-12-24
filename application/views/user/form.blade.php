@include('layouts.error')

{{ Form::open() }}
	{{ Form::token() }}

	{{-- Name field --}}
	<div class="form-box">
		{{ Form::label('name', 'Name')) }}
		{{ Form::text('name', Input::old('name', $user->name), array('class' => 'text')) }}
		
	</div>

	{{-- Email field --}}
	<div class="form-box last">
		{{ Form::label('email', 'Email')) }}
		{{ Form::email('email', Input::old('email', $user->email), array('class' => 'text')) }}
	</div>

	@if(URI::segment(3) !== 'add')
	<fieldset>
		<legend>Password (leave blank to keep current password)</legend>
	@endif

		<div class="form-box">	
			{{-- Password field --}}
			{{ Form::label('password', 'Password')) }}
			{{ Form::password('password', array('class' => 'text')) }}
			

			{{-- Confirm Password field --}}
			{{ Form::label('password_confirmation', 'Confirm password')) }}
			{{ Form::password('password_confirmation', array('class' => 'text')) }}
		</div>

	@if(URI::segment(3) !== 'add')
	</fieldset>
	@endif

	<div class="clearfix"></div>

	{{ Form::submit('Save', array('class' => 'button medium color')) }}
{{ Form::close() }}