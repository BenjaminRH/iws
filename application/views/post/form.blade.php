{{ Form::open() }}
	{{ Form::token() }}

	{{-- Title field --}}
	<div class="row">
		<div class="eight columns">
			{{ Form::label('title', 'Title', array('class' => ($errors->has('title') ? 'error' : '') )) }}
			{{ Form::text('title', Input::old('title', $post->title), array('class' => ($errors->has('title') ? ' error' : '') )) }}
			@if($errors->has('title'))
			<small class="error">{{ $errors->first('title') }}</small>
			@endif
		</div>
	</div>

	{{-- Slug field --}}
	<div class="row">
		<div class="eight columns">
			{{ Form::label('slug', 'Slug', array('class' => ($errors->has('name') ? 'error' : '') )) }}
			{{ Form::text('slug', Input::old('slug', $post->slug), array('class' => ($errors->has('slug') ? ' error' : '') )) }}
			@if($errors->has('slug'))
			<small class="error">{{ $errors->first('slug') }}</small>
			@endif
		</div>
	</div>

	{{-- Body field --}}
	<div class="row">
		<div class="twelve columns">
			{{ Form::label('body', 'Content', array('class' => ($errors->has('name') ? 'error' : '') )) }}
			{{ Form::textarea('body', Input::old('body', $post->body), array('id' => 'post-body', 'class' => 'editor' . ($errors->has('body') ? ' error' : '') )) }}
			@if($errors->has('body'))
			<small class="error">{{ $errors->first('body') }}</small>
			@endif
		</div>
	</div>

	{{ Form::submit('Save', array('class' => 'button')) }}
{{ Form::close() }}

@include('layouts.editor')