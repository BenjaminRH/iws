<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|       Route::get('hello', function()
|       {
|           return 'Hello World!';
|       });
|
| You can even respond to more than one URI:
|
|       Route::any(array('hello', 'world'), function()
|       {
|           return 'Hello World!';
|       });
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|       Route::put('hello/(:any)', function($name)
|       {
|           return "Welcome, $name.";
|       });
|
*/
// Main
Route::get('/', 'main@index');
Route::get('home', function() {
	return Redirect::to('/');
});
Route::get('about', 'main@about');
Route::any('contact', 'main@contact');
Route::get('search', 'main@search');

// Auth
Route::any('login', 'auth@login');
Route::get('logout', 'auth@logout');

// User
Route::get('admin/users', 'users@index');
Route::any('admin/users/add', 'users@add');
Route::any('admin/users/edit/(:num)', 'users@edit');
Route::any('admin/users/delete/(:num)', 'users@delete');

// Post
Route::get('posts', 'posts@index');
Route::get('posts/(:any)', 'posts@show');
Route::any('admin/posts/add', 'posts@add');
Route::any('admin/posts/(:any)/edit', 'posts@edit');
Route::any('admin/posts/(:any)/delete', 'posts@delete');

// Series
Route::get('series', 'series@index');
Route::get('series/(:any)', 'series@show');
Route::any('admin/series/add', 'series@add');
Route::any('admin/series/(:any)/edit', 'series@edit');
Route::any('admin/series/(:any)/delete', 'series@delete');

// Tag
Route::get('admin/tags', 'tags@index');
Route::get('tags/(:num)', 'tags@show');
Route::any('admin/tags/add', 'tags@add');
Route::any('admin/tags/(:num)/edit', 'tags@edit');
Route::any('admin/tags/(:num)/delete', 'tags@delete');

// Category
Route::get('admin/categories', 'categories@index');
Route::get('categories/(:num)', 'categories@show');
Route::any('admin/categories/add', 'categories@add');
Route::any('admin/categories/(:num)/edit', 'categories@edit');
Route::any('admin/categories/(:num)/delete', 'categories@delete');

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|       Route::filter('filter', function()
|       {
|           return 'Filtered!';
|       });
|
| Next, attach the filter to a route:
|
|       Router::register('GET /', array('before' => 'filter', function()
|       {
|           return 'Hello World!';
|       }));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...

	// For page redirection upon login and logout
	if(URI::current() !== 'login') {
		Session::put('destination', url(URI::current()));
	}

	/*
	|
	| Maintenance Mode settings
	|
	*/

	if(Config::get('application.maintenance_mode')) {
		if(Auth::guest() && URI::current() !== 'login') {
			return Redirect::to('login', '403');
		}
	}
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) {
		Session::reflash(); // For messages
		return Redirect::to('login');
	}
});