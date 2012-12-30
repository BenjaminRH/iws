<?php

class Posts_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth')->only(array('add', 'edit', 'delete'));
	}

	public function get_index()
	{
		// PAGE - List of posts
		$posts = Post::order_by('created_at', 'desc')->paginate(10);

		return View::make('post.index')->with('posts', $posts)->with('page_title', 'Posts');
	}

	public function get_show($post_slug)
	{
		// PAGE - Show a single post
		$post = Post::find_by_slug($post_slug);

		if(!$post) {
			return Response::error('404');
		}

		return View::make('post.show')->with('post', $post)->with('page_title', $post->title);
	}

	public function get_add()
	{
		// PAGE - Add a new post
		$post = new Post; // Initiate for cleaner form view setup
		return View::make('post.new')->with('post', $post)->with('page_title', 'Add a post');
	}

	public function post_add()
	{
		// HANDLE - Add a new post
		$input = Input::only(Post::$accessible);
		Input::flash();
		$validation = Validator::make($input, Post::$validation_rules);

		if($validation->fails()) {
			$post = new Post; // Initiate for cleaner form view setup
			return Redirect::back()->with_input()->with_errors($validation)->with('post', $post);
		}

		// Add post to database
		$post = Post::create_post($input);

		return Redirect::to('posts/'.$post->slug)->with('status', 'Post '.$post->title.' has been saved!');
	}

	public function get_edit($post_slug)
	{
		// PAGE - Edit an existing post
		$post = Post::find_by_slug($post_slug);

		if(!$post) {
			return Response::error('404');
		}

		return View::make('post.edit')->with('post', $post)->with('page_title', 'Edit post "'.$post->title.'"');
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

		return Redirect::to('posts/'.$post->slug)->with('status', 'Your changes to post '.$post->title.' have been saved!');
	}

	public function get_delete($post_slug)
	{
		// PAGE - Confirm post deletion
		$post = Post::find_by_slug($post_slug);

		if(!$post) {
			return Response::error('404');
		}

		return View::make('layouts.delete')->with('cancel_path', 'posts/'.$post_slug)->with('page_title', 'Delete post "'.$post->title.'"');
	}

	public function post_delete($post_slug)
	{
		// HANDLE - Delete the post if deletion is confirmed
		$input = Input::only(array('delete-confirm'));
		$rules = array('delete-confirm' => 'accepted');
		$validation = Validator::make($input, $rules);
		$post = Post::find_by_slug($post_slug);

		if($validation->fails()) {
			return Redirect::back()->with_errors($validation)->with('cancel_path', 'posts/'.$post_slug);
		}
		
		// Now delete the post
		$post_title = $post->title;
		$post->tags()->delete();
		$post->delete();
		return Redirect::to('posts')->with('status', 'Post '.$post_title.' has been deleted.');
	}
}