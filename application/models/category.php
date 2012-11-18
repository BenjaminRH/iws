<?php

class Category extends Eloquent
{
	// Disable timestamps
	public static $timestamps = false;

	// Acceptable inputs
	public static $accessible = array('name');

	// Validation rules
	public static $validation_rules = array('name' => 'required');

	// Category has_many posts
	public function posts() {
		return $this->has_many('Post');
	}

	// Create a category
	public static function create_category($input) {
		$category = new Category;
		$category->name = $input['name'];
		$category->save();

		return $category;
	}

	// Update a category
	public function update_category($input) {
		$this->name = $input['name'];
		$this->save();

		return $this;
	}
}