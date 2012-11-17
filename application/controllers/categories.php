<?php

class Categories_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function get_index()
	{
		// PAGE - List of categories
		$categories = Category::order_by('name', 'asc')->get();

		return View::make('category.index')->with('categories', $categories);
	}

	public function get_add()
	{
		// PAGE - Add a new category
		return View::make('category.new');
	}

	public function post_add()
	{
		// HANDLE - Add a new category
		$input = Input::only(Category::$accessible);
		Input::flash();
		$validation = Validator::make($input, Category::$validation_rules);

		if($validation->fails()) {
			return Redirect::back()->with_input()->with_errors($validation);
		}

		// Add category to database
		$category = Category::create_category($input);

		return Redirect::to('category.index')->with('status', 'Category '.$category->name.' has been saved!');
	}

	public function get_edit($category_id)
	{
		// PAGE - Edit an existing category
		$category = Category::find($category_id);

		if(!$category) {
			return Response::error('404');
		}

		return View::make('category.edit')->with('category', $category);
	}

	public function post_edit($category_id)
	{
		// HANDLE - Edit an existing category
		$category = Category::find($category_id);
		$input = Input::only(Category::$accessible);
		Input::flash();
		$validation = Validator::make($input, Category::$validation_rules);

		if($validation->fails()) {
			return Redirect::back()->with_input()->with_errors($validation)->with('category', $category);
		}

		// Update category database entry
		$category->update_category($input);

		return Redirect::to('category.index')->with('status', 'Your changes to category '.$category->name.' have been saved!');
	}

	public function get_delete($category_id)
	{
		// PAGE - Confirm category deletion
		$category = Category::find($category_id);

		if(!$category) {
			return Response::error('404');
		}

		return View::make('category.delete')->with('category', $category);
	}

	public function post_delete($category_id)
	{
		// HANDLE - Delete the category if deletion is confirmed
		$input = Input::only(array('delete-confirm'));
		$rules = array('delete-confirm' => 'accepted');
		$validation = Validator::make($input, $rules);
		$category = Category::find($category_id);

		if($validation->fails()) {
			return Redirect::back()->with_errors($validation)->with('category', $category);
		}
		
		// Now delete the category
		$category_name = $category->name;
		$category->delete();
		return Redirect::to('category.index')->with('status', 'Category '.$category_name.' has been deleted.');
	}
}