<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Teacher;
use App\Resource;
use App\Bulletin;
use App\Signature;

class SearchesController extends Controller {

	/**
	 * Display a listing of the resources that use SearchableTrait.
	 *
	 * @return Response
	 */
	public function search(Request $request)
	{
		$query = $request->get('query');

		$teachers = Teacher::search($query)->get();
		$resources = Resource::search($query)->get();
		$bulletines = Bulletin::search($query)->get();
		$signatures = Signature::search($query)->get();

		return view('search.index', compact('teachers', 'resources', 'bulletines', 'signatures'));
	}
}
