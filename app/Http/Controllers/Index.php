<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Teacher;
use App\User;

class Index extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Teacher::findOrFail(8);
		

		return dd(
			$user->resources->toarray(), 
			$user->signatures->toarray(),
			$user->signatures->first()->toarray(),
			$user->getSignaturesResources($user->signatures->first())->toarray()
		);
	}
}
