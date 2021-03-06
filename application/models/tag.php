<?php

class Tag extends Eloquent
{
	// Disable timestamps
	public static $timestamps = false;

	// Acceptable inputs
	public static $accessible = array('name');

	// Validation rules
	public static $validation_rules = array('name' => 'required|unique:tags,name');

	// Tag has_many_and_belongs_to post
	public function posts() {
		return $this->has_many_and_belongs_to('Post');
	}

	// Tag has_many_and_belongs_to series
	public function series() {
		return $this->has_many_and_belongs_to('Series');
	}

	// Return all tags in array as id=>name
	static function data_array() {
		$results = [];
		foreach(Tag::get() as $tag)
		{
			$results[$tag->id] = $tag->name;
		}
		return $results;
	}

	// Return all tag ids in passed array of models
	static function id_array($models) {
		$results = [];
		foreach($models as $tag)
		{
			array_push($results, $tag->id);
		}
		return $results;
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