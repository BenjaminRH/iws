<?php

class Category extends Eloquent
{
	// Disable timestamps
	public static $timestamps = false;

	// Acceptable inputs
	public static $accessible = array('name');

	// Validation rules
	public static $validation_rules = array('name' => 'required|unique:categories,name');

	// Category has_many posts
	public function posts() {
		return $this->has_many('Post');
	}

	// Return all categories in array as id=>name
	static function data_array() {
		$results = [];
		foreach(Category::get() as $category)
		{
			$results[$category->id] = $category->name;
		}
		return $results;
	}

	// Create a category
	public static function create_category($input) {
		$category = new Category;
		$category->name = Str::title($input['name']);
		$category->save();

		return $category;
	}

	// Update a category
	public function update_category($input) {
		$this->name = Str::title($input['name']);
		$this->save();

		return $this;
	}
}