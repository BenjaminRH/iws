<?php

class Post extends Eloquent
{
	// Enable timestamps
	public static $timestamps = true;

	// Acceptable inputs
	public static $accessible = array(
		'title',
		'slug',
		'image',
		'body',
		'category',
		'tags'
	);

	// Validation rules
	public static $validation_rules = array(
		'title' => 'required',
		'slug' => 'required|slug',
		'image' => 'required|url',
		'body' => 'required|min:100',
		'category' => 'required|integer',
		'tags' => 'required'
	);

	// Post belongs_to user
	public function user() {
		return $this->belongs_to('User');
	}

	// Post belongs_to category
	public function category() {
		return $this->belongs_to('Category');
	}

	// Post has_many_and_belongs_to tag
	public function tags() {
		return $this->has_many_and_belongs_to('Tag');
	}

	// Find post by slug
	static function find_by_slug($slug)
	{
		return static::where_slug($slug)->first();
	}

	// Create a post
	public static function create_post($input) {
		$post = new Post;
		$post->title = $input['title'];
		$post->slug = $input['slug'];
		$post->image = $input['image'];
		$post->body = $input['body'];
		$post->category_id = $input['category'];
		$post->user_id = Auth::user()->id;
		$post->save();

		$post->tags()->sync($input['tags']);

		return $post;
	}

	// Update a post
	public function update_post($input) {
		$this->title = $input['title'];
		$this->slug = $input['slug'];
		$this->image = $input['image'];
		$this->body = $input['body'];
		$this->category_id = $input['category'];
		$this->tags()->sync($input['tags']);
		$this->save();

		return $this;
	}
}