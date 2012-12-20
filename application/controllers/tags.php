<?php

class Tags_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function get_index()
	{
		// PAGE - List of tags
		$tags = Tag::order_by('name', 'asc')->get();

		return View::make('tag.index')->with('tags', $tags)->with('page_title', 'Tags');
	}

	public function get_add()
	{
		// PAGE - Add a new tag
		$tag = new Tag; // Initiate for cleaner form view setup
		return View::make('tag.new')->with('tag', $tag)->with('page_title', 'Add a tag');
	}

	public function post_add()
	{
		// HANDLE - Add a new tag
		$input = Input::only(Tag::$accessible);
		Input::flash();
		$validation = Validator::make($input, Tag::$validation_rules);

		if($validation->fails()) {
			$tag = new Tag; // Initiate for cleaner form view setup
			return Redirect::back()->with_input()->with_errors($validation)->with('tag', $tag);
		}

		// Add tag to database
		$tag = Tag::create_tag($input);

		return Redirect::to('admin/tags')->with('status', 'Tag '.$tag->name.' has been saved!');
	}

	public function get_edit($tag_id)
	{
		// PAGE - Edit an existing tag
		$tag = Tag::find($tag_id);

		if(!$tag) {
			return Response::error('404');
		}

		return View::make('tag.edit')->with('tag', $tag)->with('page_title', 'Edit tag "'.$tag->name.'"');
	}

	public function post_edit($tag_id)
	{
		// HANDLE - Edit an existing tag
		$tag = Tag::find($tag_id);
		$input = Input::only(Tag::$accessible);
		Input::flash();
		$rules = Tag::$validation_rules;
		$rules['name'] .= ',' . $tag_id;
		$validation = Validator::make($input, $rules);

		if($validation->fails()) {
			return Redirect::back()->with_input()->with_errors($validation)->with('tag', $tag);
		}

		// Update tag database entry
		$tag->update_tag($input);

		return Redirect::to('admin/tags')->with('status', 'Your changes to tag '.$tag->name.' have been saved!');
	}

	public function get_delete($tag_id)
	{
		// PAGE - Confirm tag deletion
		$tag = Tag::find($tag_id);

		if(!$tag) {
			return Response::error('404');
		}

		if ($tag->posts()->count() > 0) {
			return Redirect::to('admin/tags')
				->with('status-error', 'You cannot delete tag '.$tag->name.' because it has posts tagged.');
		}

		return View::make('layouts.delete')->with('cancel_path', 'admin/tags')->with('page_title', 'Delete tag "'.$tag->name.'"');
	}

	public function post_delete($tag_id)
	{
		// HANDLE - Delete the tag if deletion is confirmed
		$input = Input::only(array('delete-confirm'));
		$rules = array('delete-confirm' => 'accepted');
		$validation = Validator::make($input, $rules);
		$tag = Tag::find($tag_id);

		if($validation->fails()) {
			return Redirect::back()->with_errors($validation)->with('cancel_path', 'admin/tags');
		}
		
		// Now delete the tag
		$tag_name = $tag->name;
		$tag->delete();
		return Redirect::to('admin/tags')->with('status', 'Tag '.$tag_name.' has been deleted.');
	}
}