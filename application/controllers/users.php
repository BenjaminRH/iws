<?php

class Users_Controller extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->filter('before', 'auth');
    }

    public function get_index()
    {
        // PAGE - List of users
        $users = User::order_by('email', 'asc')->get();

        return View::make('user.index')->with('users', $users)->with('page_title', 'Users');
    }

    public function get_add()
    {
        // PAGE - Add a new user
        $user = new User; // Initiate for cleaner form view setup
        return View::make('user.new')->with('user', $user)->with('page_title', 'Add a user');
    }

    public function post_add()
    {
        // HANDLE - Add a new user
        $input = Input::only(User::$accessible);
        Input::flash();
        $rules = User::$validation_rules;
        $rules['password'] .= '|required';
        $rules['password_confirmation'] .= '|required';
        $validation = Validator::make($input, $rules);

        if($validation->fails()) {
            $user = new User; // Initiate for cleaner form view setup
            return Redirect::back()->with_input()->with_errors($validation)->with('user', $user);
        }

        // Add user to database
        $user = User::create_user($input);

        return Redirect::to('admin/users')->with('status', 'User '.$user->name.' has been saved!');
    }

    public function get_edit($user_id)
    {
        // PAGE - Edit an existing user
        $user = User::find($user_id);

        if(!$user) {
            return Response::error('404');
        }

        return View::make('user.edit')->with('user', $user)->with('page_title', 'Edit user "'.$user->name.'"');
    }

    public function post_edit($user_id)
    {
        // HANDLE - Edit an existing user
        $user = User::find($user_id);
        $input = Input::only(User::$accessible);
        Input::flash();
        $rules = User::$validation_rules;
        $rules['email'] .= ','.$user_id;
        $validation = Validator::make($input, $rules);

        if($validation->fails()) {
            return Redirect::back()->with_input()->with_errors($validation)->with('user', $user);
        }

        // Update user database entry
        $user->update_user($input);

        return Redirect::to('admin/users')->with('status', 'Your changes to user '.$user->name.' have been saved!');
    }

    public function get_delete($user_id)
    {
        // PAGE - Confirm user deletion
        $user = User::find($user_id);

        if(!$user) {
            return Response::error('404');
        }

        if ($user->posts()->count() > 0) {
            return Redirect::to('admin/users')
                ->with('status-error', 'You cannot delete user '.$user->name.' because they has posts authored.');
        }

        return View::make('layouts.delete')->with('cancel_path', 'admin/users')->with('page_title', 'Delete user "'.$user->name.'"');
    }

    public function post_delete($user_id)
    {
        // HANDLE - Delete the user if deletion is confirmed
        $input = Input::only(array('delete-confirm'));
        $rules = array('delete-confirm' => 'accepted');
        $validation = Validator::make($input, $rules);
        $user = User::find($user_id);

        if($validation->fails()) {
            return Redirect::back()->with_errors($validation)->with('cancel_path', 'admin/users');
        }
        
        // Now delete the user
        $user_name = $user->name;
        $user->delete();
        return Redirect::to('admin/users')->with('status', 'User '.$user_name.' has been deleted.');
    }
}