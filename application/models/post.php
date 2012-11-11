<?php

class Post extends Eloquent
{
	// Disable timestamps
	public static $timestamps = false;

	// Acceptable inputs
	public static $accessible = array('title', 'slug', 'body');

	// Validation rules
	public static $validation_rules = array(
		'title' => 'required',
		'slug' => 'required',
		'body' => 'required|min:100'
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
		$post->body = $input['body'];
		$post->save();

		return $post;
	}

	// Update a post
	public function update_post($input) {
		$this->title = $input['title'];
		$this->slug = $input['slug'];
		$this->body = $input['body'];
		$this->save();

		return $this;
	}
}