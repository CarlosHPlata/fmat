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

	Route::get('/profile', [
		'as'	=> 'profile',
		'uses'	=> 'ProfileController@index'
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


	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);

	Route::post('search', [
		'as' => 'search',
		'uses' => 'SearchesController@search'
	]);

