<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello', ['course' => 'Laravel']);
});

// Route::get('/{username}/{password}', 'HomeController@secrete');

Route::get('/checkDB', function ()
{
	dd(DB::connection()->getDatabaseName());
});

Route::get('/users/', function ()
{
	$users = User::all();
	$numberOfUsers = count($users);
	dd($users);
});

Route::get('/users/create', function () {
	$user = new User;
	$user->firstname= 'Sơn';
	$user->lastname= 'Tùng';
	$user->username = 'sontungmtp';
	$user->password = 'emcuangayhomqua';
	$user->save();
});

Route::get('/users/{id}', function ($id)
{
	$users = User::where('username', '=', 'sontungmtp')->get();
	return $users[0]->username;
});

Route::get('/users/{id}/update', function ($id)
{
	$user = User::find(1);
	$user->username= 'tungmtp2015';
	$user->save();
	$newuser = User::find(1);
	return $newuser->username;
});

Route::get('/users/{id}/delete', function ($id)
{
	$user = User::find(1);
	$user->delete();
	$users= User::all();
	return count($users);
});