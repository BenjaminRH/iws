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

		return View::make('tag.index')->with('tags', $tags);
	}

	public function get_add()
	{
		// PAGE - Add a new tag
		return View::make('tag.new');
	}

	public function post_add()
	{
		// HANDLE - Add a new tag
		$input = Input::only(Tag::$accessible);
		Input::flash();
		$validation = Validator::make($input, Tag::$validation_rules);

		if($validation->fails()) {
			return Redirect::back()->with_input()->with_errors($validation);
		}

		// Add tag to database
		$tag = Tag::create_tag($input);

		return Redirect::to('tag.index')->with('status', 'Tag '.$tag->name.' has been saved!');
	}

	public function get_edit($tag_id)
	{
		// PAGE - Edit an existing tag
		$tag = Tag::find($tag_id);

		if(!$tag) {
			return Response::error('404');
		}

		return View::make('tag.edit')->with('tag', $tag);
	}

	public function post_edit($tag_id)
	{
		// HANDLE - Edit an existing tag
		$tag = Tag::find($tag_id);
		$input = Input::only(Tag::$accessible);
		Input::flash();
		$validation = Validator::make($input, Tag::$validation_rules);

		if($validation->fails()) {
			return Redirect::back()->with_input()->with_errors($validation)->with('tag', $tag);
		}

		// Update tag database entry
		$tag->update_tag($input);

		return Redirect::to('tag.index')->with('status', 'Your changes to tag '.$tag->name.' have been saved!');
	}

	public function get_delete($tag_id)
	{
		// PAGE - Confirm tag deletion
		$tag = Tag::find($tag_id);

		if(!$tag) {
			return Response::error('404');
		}

		return View::make('tag.delete')->with('tag', $tag);
	}

	public function post_delete($tag_id)
	{
		// HANDLE - Delete the tag if deletion is confirmed
		$input = Input::only(array('delete-confirm'));
		$rules = array('delete-confirm' => 'accepted');
		$validation = Validator::make($input, $rules);
		$tag = Tag::find($tag_id);

		if($validation->fails()) {
			return Redirect::back()->with_errors($validation)->with('tag', $tag);
		}
		
		// Now delete the tag
		$tag_name = $tag->name;
		$tag->delete();
		return Redirect::to('tag.index')->with('status', 'Tag '.$tag_name.' has been deleted.');
	}
}