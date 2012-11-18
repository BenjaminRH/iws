<?php

class Series extends Eloquent
{
	// Disable timestamps
	public static $timestamps = false;

	// Acceptable inputs
	public static $accessible = array('title', 'slug', 'description', 'channel', 'website');

	// Validation rules
	public static $validation_rules = array(
		'title' => 'required',
		'slug' => 'required',
		'description' => 'required',
		'channel' => 'required|active_url',
		'website' => 'active_url'
	);

	// Series has_many_and_belongs_to tag
	public function tags() {
		return $this->has_many_and_belongs_to('Tag');
	}

	// Find series by slug
	static function find_by_slug($slug)
	{
		return static::where_slug($slug)->first();
	}

	// Create a series
	public static function create_series($input) {
		$series = new Series;
		$series->title = $input['title'];
		$series->slug = $input['slug'];
		$series->description = $input['description'];
		$series->channel = $input['channel'];
		$series->website = $input['website'];
		$series->save();

		return $series;
	}

	// Update a series
	public function update_series($input) {
		$this->title = $input['title'];
		$this->slug = $input['slug'];
		$this->description = $input['description'];
		$this->channel = $input['channel'];
		$this->website = $input['website'];
		$this->save();

		return $this;
	}
}