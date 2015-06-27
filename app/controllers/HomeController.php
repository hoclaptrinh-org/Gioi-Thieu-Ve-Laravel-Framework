<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function secrete($username, $password)
	{
		if ($username !== 'admin') {
			$error = 'Tên đăng nhập không đúng';
			return View::make('error_page')->withError($error);
		} else if ($password != 'secrete') {
			$error = 'Mật khẩu không đúng';
			return View::make('error_page')->withError($error);
		} else {
			return View::make('restrict_page')->withUsername($username);
		}
	}

}
