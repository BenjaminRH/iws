@include('layouts.error')

{{ Form::open() }}
	{{ Form::token() }}

	{{-- Title field --}}
	<div class="form-box">
		{{ Form::label('title', 'Title') }}
		{{ Form::text('title', Input::old('title', $post->title), array('class'=>'text')) }}
	</div>

	{{-- Slug field --}}
	<div class="form-box last">
		{{ Form::label('slug', 'Slug') }}
		{{ Form::text('slug', Input::old('slug', $post->slug), array('class'=>'text')) }}
	</div>

	<div class="clearfix"></div>

	{{-- Image field --}}
	<fieldset>
		{{ Form::label('image', 'Image') }}
		{{ Form::text('image', Input::old('image', $post->image), array('class'=>'text')) }}
	</fieldset>

	<div class="clearfix"></div>

	{{-- Category field --}}
	<div class="form-box">
		{{ Form::label('category', 'Category') }}
		{{ Form::select('category', Category::data_array(), Input::old('category', $post->category_id), array('class' => 'chzn-select', 'data-placeholder' => 'Select a category' )) }}
	</div>

	{{-- Tags field --}}
	<div class="form-box">
		{{ Form::label('tags', 'Tags') }}
		{{ Form::select('tags[]', Tag::data_array(), Input::old('tags', Tag::id_array($post->tags)), array('multiple' => 'multiple', 'class' => 'chzn-select', 'data-placeholder' => 'Select tags' )) }}
	</div>

	{{-- Body field --}}
	<div class="form-box big">
		{{ Form::label('body', 'Content') }}
		{{ Form::textarea('body', Input::old('body', $post->body), array('id' => 'post-body', 'class' => 'editor')) }}
	</div>

	<div class="clearfix"></div>

	{{-- Published field --}}
	<fieldset>
		{{ Form::checkbox('published', Input::old('published', $post->published)) }} Publish
	</fieldset>

	<div class="clearfix"></div>

	{{ Form::submit('Save', array('class' => 'button medium color')) }}
{{ Form::close() }}

@include('layouts.editor')