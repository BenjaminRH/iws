<?php

class Posts_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth')->except(array('index, show'));
	}

	public function get_index()
	{
		// PAGE - List of posts
		$posts = Post::order_by('name', 'asc')->get();

		return View::make('post.index')->with('posts', $posts);
	}

	public function get_show($post_slug)
	{
		// PAGE - Show a single post
		$post = Post::find_by_slug($post_slug);

		if(!$post) {
			return Response::error('404');
		}

		return View::make('post.show')->with('post', $post);
	}

	public function get_add()
	{
		// PAGE - Add a new post
		return View::make('post.new');
	}

	public function post_add()
	{
		// HANDLE - Add a new post
		$input = Input::only(Post::$accessible);
		Input::flash();
		$validation = Validator::make($input, Post::$validation_rules);

		if($validation->fails()) {
			return Redirect::back()->with_input()->with_errors($validation);
		}

		// Add post to database
		$post = Post::create_post($input);

		return Redirect::to('post.index')->with('status', 'Post '.$post->title.' has been saved!');
	}

	public function get_edit($post_slug)
	{
		// PAGE - Edit an existing post
		$post = Post::find_by_slug($post_slug);

		if(!$post) {
			return Response::error('404');
		}

		return View::make('post.edit')->with('post', $post);
	}

	public function post_edit($post_slug)
	{
		// HANDLE - Edit an existing post
		$post = Post::find_by_slug($post_slug);
		$input = Input::only(Post::$accessible);
		Input::flash();
		$validation = Validator::make($input, Post::$validation_rules);

		if($validation->fails()) {
			return Redirect::back()->with_input()->with_errors($validation)->with('post', $post);
		}

		// Update post database entry
		$post->update_post($input);

		return Redirect::to('post.index')->with('status', 'Your changes to post '.$post->title.' have been saved!');
	}

	public function get_delete($post_slug)
	{
		// PAGE - Confirm post deletion
		$post = Post::find_by_slug($post_slug);

		if(!$post) {
			return Response::error('404');
		}

		return View::make('post.delete')->with('post', $post);
	}

	public function post_delete($post_slug)
	{
		// HANDLE - Delete the post if deletion is confirmed
		$input = Input::only(array('delete-confirm'));
		$rules = array('delete-confirm' => 'accepted');
		$validation = Validator::make($input, $rules);
		$post = Post::find_by_slug($post_slug);

		if($validation->fails()) {
			return Redirect::back()->with_errors($validation)->with('post', $post);
		}
		
		// Now delete the post
		$post_title = $post->title;
		$post->delete();
		return Redirect::to('post.index')->with('status', 'Post '.$post_title.' has been deleted.');
	}
}