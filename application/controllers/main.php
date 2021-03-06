<?php

class Main_Controller extends Base_Controller
{
	private $contact_rules = array(
		'name' => 'required',
		'email' => 'required|email',
		'subject' => 'required',
		'message' => 'required'
	);

	private $input_accepts = array(
		'name',
		'email',
		'subject',
		'message'
	);

	public function get_index()
	{
		// PAGE - Homepage - list of recent posts
		$posts = Post::with(array('tags', 'category'))->where('published', '=', 1)->order_by('created_at', 'desc')->take(5)->get();

		return View::make('main.home')->with('posts', $posts)->with('slider_posts', array_slice($posts, 0, 3))->with('page_title', 'Home');
	}

	public function get_search()
	{
		// JSON - Search results
		$query = Input::get('q');
		$posts = Post::where('title', 'LIKE', '%'.$query.'%')->where('published', '=', 1)->get();
		return Response::eloquent($posts);
	}

	public function get_about()
	{
		// PAGE - About us
		return View::make('main.about')->with('page_title', 'About');
	}

	public function get_contact()
	{
		// PAGE - Contact us
		return View::make('main.contact')->with('page_title', 'Contact');
	}

	public function post_contact()
	{
		// HANDLE - Contact us
		$input = Input::only($this->input_accepts);
		Input::flash();
		$rules = $this->contact_rules;
		$validation = Validator::make($input, $rules);

		if($validation->fails()) {
			return Redirect::back()->with_input()->with_errors($validation);
		} else {
			// Send contact form

			// Get the Swift Mailer instance
			$mailer = IoC::resolve('mailer');

			// Construct the message
			$message = Swift_Message::newInstance($input['subject'])
			    ->setFrom(array($input['email']=>$input['name']))
			    ->setTo(array('info@indiewebseries.com'=>'Indie Web Series'))
			    ->setBody($input['message'],'text/plain');

			// Send the email
			$mailer->send($message);

			return Redirect::home()->with('status', 'Your message has been sent!');
		}
	}
}