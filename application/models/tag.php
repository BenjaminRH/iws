<?php

class Tag extends Eloquent
{
	// Disable timestamps
	public static $timestamps = false;

	// Acceptable inputs
	public static $accessible = array(
		'name',
		'email',
		'password',
		'password_confirmation'
	);

	// Validation rules
	public static $validation_rules = array(
		'name' => 'required',
		'email' => 'required|email|unique:users,email',
		'password' => 'min:5',
		'password_confirmation' => 'same:password'
	);
	
	// Find a user by email address
	public static function find_by_email($email)
	{
		return Tag::where_email($email)->first();
	}

	// Create a user
	public static function create_user($input) {
		$user = new Tag;
		$user->name = $input['name'];
		$user->email = $input['email'];
		$user->password = Hash::make($input['password']);
		$user->save();

		return $user;
	}

	// Update a user
	public function update_user($input) {
		$user->name = $input['name'];
		$this->email = $input['email'];
		if($input['password']) {
			$this->password = Hash::make($input['password']);
		}
		$this->save();

		return $this;
	}
}