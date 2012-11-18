{{ Form::open() }}
	{{ Form::token() }}

	{{-- Name field --}}
	<div class="row">
		<div class="eight columns">
			{{ Form::label('name', 'Name', array('class' => ($errors->has('name') ? 'error' : '') )) }}
			{{ Form::text('name', Input::old('name', $user->name), array('class' => ($errors->has('name') ? ' error' : '') )) }}
			@if($errors->has('name'))
			<small class="error">{{ $errors->first('name') }}</small>
			@endif
		</div>
	</div>

	{{-- Email field --}}
	<div class="row">
		<div class="eight columns">
			{{ Form::label('email', 'Email', array('class' => ($errors->has('email') ? 'error' : '') )) }}
			{{ Form::email('email', Input::old('email', $user->email), array('class' => ($errors->has('email') ? ' error' : '') )) }}
			@if($errors->has('email'))
			<small class="error">{{ $errors->first('email') }}</small>
			@endif
		</div>
	</div>

	@if(URI::segment(3) !== 'add')
	<fieldset>
		<legend>Password (leave blank to keep current password)</legend>
	@endif

		<div class="row">
			<div class="eight columns">
					{{-- Password field --}}
					{{ Form::label('password', 'Password', array('class' => ($errors->has('password') ? 'error' : '') )) }}
					{{ Form::password('password', array('class' => ($errors->has('password') ? ' error' : '') )) }}
					@if($errors->has('password'))
					<small class="error">{{ $errors->first('password') }}</small>
					@endif

					{{-- Confirm Password field --}}
					{{ Form::label('password_confirmation', 'Confirm password', array('class' => ($errors->has('password_confirmation') ? 'error' : '') )) }}
					{{ Form::password('password_confirmation', array('class' => ($errors->has('password_confirmation') ? ' error' : '') )) }}
					@if($errors->has('password_confirmation'))
					<small class="error">{{ $errors->first('password_confirmation') }}</small>
					@endif
			</div>
		</div>
	@if(URI::segment(3) !== 'add')
	</fieldset>
	@endif

	{{ Form::submit('Save', array('class' => 'button')) }}
{{ Form::close() }}