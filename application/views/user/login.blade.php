@layout('layouts.main')

@section('content')
<h3>Login</h3>
{{ Form::open() }}
	{{ Form::token() }}

	{{-- Email field --}}
	<div class="row">
		<div class="six columns">
			{{ Form::label('email', 'Email', array('class' => ($errors->has('email') ? 'error' : '') )) }}
			{{ Form::email('email', Input::old('email'), array('class' => ($errors->has('email') ? ' error' : '') )) }}
			@if($errors->has('email'))
			<small class="error">{{ $errors->first('email') }}</small>
			@endif
		</div>
	</div>

	{{-- Password field --}}
	<div class="row">
		<div class="six columns">
			{{ Form::label('password', 'Password', array('class' => ($errors->has('name') ? 'error' : '') )) }}
			{{ Form::password('password', array('class' => ($errors->has('password') ? ' error' : '') )) }}
			@if($errors->has('password'))
			<small class="error">{{ $errors->first('password') }}</small>
			@endif
		</div>
	</div>

	{{ Form::submit('Login', array('class' => 'button')) }}
{{ Form::close() }}
@endsection