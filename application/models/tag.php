<?php

class Tag extends Eloquent
{
	// Disable timestamps
	public static $timestamps = false;

	// Acceptable inputs
	public static $accessible = array('name');

	// Validation rules
	public static $validation_rules = array('name' => 'required');

	// Tag has_many_and_belongs_to post
	public function tags() {
		return $this->has_many_and_belongs_to('Post');
	}

	// Tag has_many_and_belongs_to series
	public function tags() {
		return $this->has_many_and_belongs_to('Series');
	}

	// Create a tag
	public static function create_tag($input) {
		$tag = new Tag;
		$tag->name = $input['name'];
		$tag->save();

		return $tag;
	}

	// Update a tag
	public function update_tag($input) {
		$this->name = $input['name'];
		$this->save();

		return $this;
	}
}