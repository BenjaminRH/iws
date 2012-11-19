@layout('layouts.main')

@section('content')
<h3>Contact us</h3>

{{ Form::open() }}
	{{ Form::token() }}

	{{-- Name field --}}
	<div class="row">
		<div class="eight columns">
			{{ Form::label('name', 'Name', array('class' => ($errors->has('name') ? 'error' : '') )) }}
			{{ Form::text('name', Input::old('name'), array('class' => ($errors->has('name') ? ' error' : '') )) }}
			@if($errors->has('name'))
			<small class="error">{{ $errors->first('name') }}</small>
			@endif
		</div>
	</div>

	{{-- Email field --}}
	<div class="row">
		<div class="eight columns">
			{{ Form::label('email', 'Email', array('class' => ($errors->has('email') ? 'error' : '') )) }}
			{{ Form::text('email', Input::old('email'), array('class' => ($errors->has('email') ? ' error' : '') )) }}
			@if($errors->has('email'))
			<small class="error">{{ $errors->first('email') }}</small>
			@endif
		</div>
	</div>

	{{-- Subject field --}}
	<div class="row">
		<div class="twelve columns">
			{{ Form::label('subject', 'Subject', array('class' => ($errors->has('subject') ? 'error' : '') )) }}
			{{ Form::text('subject', Input::old('subject'), array('class' => ($errors->has('subject') ? ' error' : '') )) }}
			@if($errors->has('subject'))
			<small class="error">{{ $errors->first('subject') }}</small>
			@endif
		</div>
	</div>

	{{-- Message field --}}
	<div class="row">
		<div class="twelve columns">
			{{ Form::label('message', 'Message', array('class' => ($errors->has('message') ? 'error' : '') )) }}
			{{ Form::textarea('message', Input::old('message'), array('class' => ($errors->has('message') ? ' error' : '') )) }}
			@if($errors->has('message'))
			<small class="error">{{ $errors->first('message') }}</small>
			@endif
		</div>
	</div>

	{{ Form::submit('Send', array('class' => 'button')) }}
{{ Form::close() }}
@endsection