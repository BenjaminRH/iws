@layout('layouts.main')

@section('content')
	<div class="container">
		<div class="row" style="text-align:center">
			<h2>{{ __('main.contact') }}</h2>
		</div>
	</div>
	<div class="container">
		<div class="contact-form">
			@if (Session::has('status'))
				{{ Alert::success(Session::get('status')) }}
			@elseif (Session::has('status-error'))
				{{ Alert::error(Session::get('status-error')) }}
			@endif
			<div>
				{{ Form::vertical_open() }}
					{{ Form::token() }}
					<?php echo 
						Form::control_group(
							Form::label('name', __('main.name')),
							Form::text('name', Input::old('name')),
							($errors->has('name') ? 'error' : ''),
							Form::block_help($errors->first('name'))
						);
					?>
					<?php echo 
						Form::control_group(
							Form::label('email', __('main.email')),
							Form::text('email', Input::old('email')),
							($errors->has('email') ? 'error' : ''),
							Form::block_help($errors->first('email'))
						);
					?>
					<?php echo 
						Form::control_group(
							Form::label('subject', __('main.subject')),
							Form::xlarge_text('subject', Input::old('subject')),
							($errors->has('subject') ? 'error' : ''),
							Form::block_help($errors->first('subject'))
						);
					?>
					<?php echo 
						Form::control_group(
							Form::label('message', __('main.message')),
							Form::xlarge_textarea('message', Input::old('message'), array('rows'=>5)),
							($errors->has('message') ? 'error' : ''),
							Form::block_help($errors->first('message'))
						);
					?>
					{{ Form::submit(__('main.send')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
@endsection