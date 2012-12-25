@layout('layouts.main')

@section('content')
@include('layouts.error')

{{ Form::open() }}
	{{ Form::token() }}

	{{-- Name field --}}
	<div class="form-box">
		{{ Form::label('name', 'Name *') }}
		{{ Form::text('name', Input::old('name'), array('class'=>'text')) }}
	</div>

	{{-- Email field --}}
	<div class="form-box">
		{{ Form::label('email', 'Email *') }}
		{{ Form::text('email', Input::old('email'), array('class'=>'text')) }}
	</div>

	{{-- Subject field --}}
	<div class="form-box last">
		{{ Form::label('subject', 'Subject *') }}
		{{ Form::text('subject', Input::old('subject'), array('class'=>'text')) }}
	</div>

	{{-- Message field --}}
	<div class="form-box big">
		{{ Form::label('message', 'Message *') }}
		{{ Form::textarea('message', Input::old('message')) }}
	</div>

	{{ Form::submit('Send Message', array('class' => 'button small color')) }}
{{ Form::close() }}
@endsection