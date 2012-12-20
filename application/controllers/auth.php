<?php

class Auth_Controller extends Base_Controller
{
	private $validation_rules = array(
		'email' => 'required|email|exists:users,email',
		'password' => 'required|min:5'
	);

	private $accessible = array(
		'email',
		'password'
	);

	public function get_login()
	{
		// PAGE - Login
		if (Auth::guest()) {
			return View::make('user.login')->with('page_title', 'Login');
		} else {
			return Redirect::home()->with('status-error', 'You are already logged in.');
		}
	}

	public function post_login()
	{
		// HANDLE - Login
		$input = Input::only($this->accessible);
		Input::flash();
		$rules = $this->validation_rules;
		$validation = Validator::make($input, $rules);
		$credentials = array(
			'username' => $input['email'],
			'password' => $input['password']
		);

		if($validation->fails()) {
			return Redirect::back()->with_input()->with_errors($validation);
		} elseif (Auth::attempt($credentials)) {
			// User is logged in
			$destination = Session::get('destination');
			return Redirect::to($destination)->with('status', 'You have been logged in.');
		} else {
			return Redirect::back()->with_input()->with('status-error', 'You have not provided valid login details.');
		}
	}

	public function get_logout()
	{
		// HANDLE - Logout
		if(Auth::check()) {
			Auth::logout();
			return Redirect::back()->with('status', 'You have been logged out.');
		} else {
			return Redirect::to('login');
		}
	}
}