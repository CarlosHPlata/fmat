<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	Route::get('/', [
		'as' 	=> 'index', 
		'uses' 	=> 'Index@index'
	]);

	Route::resource('teacher', 'TeacherController');

	Route::resource('signature', 'SignatureController');

	Route::resource('bulletin', 'BulletinController');

	Route::resource('resource', 'ResourceController');

	Route::resource('user', 'UserController');

	Route::resource('comment', 'CommentController');

	Route::post('/report/{user}', [
		'as'	=> 'report',
		'uses'	=> 'UserController@report'
	]);

	Route::get('/profile', [
		'as'	=> 'profile',
		'uses'	=> 'ProfileController@index'
	]);

	Route::get('/profile/resources', [
		'as'	=> 'profile.resources',
		'uses'	=>	'ProfileController@resources'
	]);

	Route::get('/profile/favorites', [
		'as'	=> 'profile.favorites',
		'uses'  => 'ProfileController@favorites'
	]);

	Route::get('/profile/reports', [
		'as'	=> 'profile.reports',
		'uses'	=> 'ProfileController@reports'
	]);

	Route::get('/rate/{rating}/{teacher}', [
		'as' 	=> 'rating',
		'uses' 	=> 'TeacherController@rate'
	]);

	Route::get('/favorite/teacher/{teacher}',[
		'as'	=> 'favorite.teacher',
		'uses'	=> 'TeacherController@favorite'
	]);

	Route::get('/favorite/signature/{signature}',[
		'as'	=> 'favorite.signature',
		'uses'	=> 'SignatureController@favorite'
	]);

	Route::post('/resource/remove/{resource}', [
		'as'	=> 'resource.remove.file',
		'uses'	=> 'ResourceController@removeFile'
	]);

	Route::get('/data/users', [
		'as'	=> 'data.users',
		'uses'  => 'UserController@data'
	]);


	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);

	Route::post('search', [
		'as' => 'search',
		'uses' => 'SearchesController@search'
	]);

