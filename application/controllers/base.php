<?php

class Base_Controller extends Controller {

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */

	public $restful = true;

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'csrf')->on('post');
	}

	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}