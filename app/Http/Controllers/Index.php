<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Teacher;
use App\User;
use App\Rating;

class Index extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \View::make('index');
	}

	public function prueba(){
		$rating = Rating::find(2);
		$teacher = $rating->teacher;
		$teacher->rating;

		return dd($rating->toArray(), $teacher->rating);
	}
}
