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

Route::get('/', 'Index@index');



Route::get('/template', function(){
	return view('example.indexview');
});



Route::resource('teacher', 'TeacherController');



Route::get('/prueba', 'Index@prueba');


Route::get('/rate/{rating}/{teacher}', [
	'as' 	=> 'rating',
	'uses' 	=> 'TeacherController@rate'
]);



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

