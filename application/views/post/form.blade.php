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
			{{ Form::label('slug', 'Slug', array('class' => ($errors->has('slug') ? 'error' : '') )) }}
			{{ Form::text('slug', Input::old('slug', $post->slug), array('class' => ($errors->has('slug') ? ' error' : '') )) }}
			@if($errors->has('slug'))
			<small class="error">{{ $errors->first('slug') }}</small>
			@endif
		</div>
	</div>

	{{-- Category field --}}
	<div class="row" style="margin-bottom:12px">
		<div class="eight columns">
			{{ Form::label('category', 'Category', array('class' => ($errors->has('category') ? 'error' : '') )) }}
			{{ Form::select('category', Category::data_array(), Input::old('category', $post->category_id), array('class' => 'chzn-select' . ($errors->has('category') ? ' error' : ''), 'data-placeholder' => 'Select a category' )) }}
			@if($errors->has('category'))
			<small style="margin-top:1px" class="error">{{ $errors->first('category') }}</small>
			@endif
		</div>
	</div>

	{{-- Tags field --}}
	<div class="row" style="margin-bottom:12px">
		<div class="eight columns">
			{{ Form::label('tags', 'Tags', array('class' => ($errors->has('tags') ? 'error' : '') )) }}
			{{ Form::select('tags[]', Tag::data_array(), Input::old('tags', Tag::id_array($post->tags)), array('multiple' => 'multiple', 'class' => 'chzn-select' . ($errors->has('tags') ? ' error' : ''), 'data-placeholder' => 'Select tags' )) }}
			@if($errors->has('tags'))
			<small style="margin-top:1px" class="error">{{ $errors->first('tags') }}</small>
			@endif
		</div>
	</div>

	{{-- Body field --}}
	<div class="row">
		<div class="twelve columns">
			{{ Form::label('body', 'Content', array('class' => ($errors->has('body') ? 'error' : '') )) }}
			{{ Form::textarea('body', Input::old('body', $post->body), array('id' => 'post-body', 'class' => 'editor' . ($errors->has('body') ? ' error' : '') )) }}
			@if($errors->has('body'))
			<small class="error">{{ $errors->first('body') }}</small>
			@endif
		</div>
	</div>

	{{-- Tags field --}}

	{{ Form::submit('Save', array('class' => 'button')) }}
{{ Form::close() }}

@include('layouts.editor')