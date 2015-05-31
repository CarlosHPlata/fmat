<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;

use Illuminate\Http\Request;

use App\Signature;
use App\Teacher;

class ProfileController extends Controller {

	protected $auth;

	public function __construct(Guard $auth){
		$this->middleware('auth');
		$this->auth = $auth;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = $this->auth->user();
		return view('profile.index', compact('user'));
	}

	public function resources(){
		$user = $this->auth->user();
		return view('profile.resources', compact('user'));
	}

	public function favorites(){
		$user = $this->auth->user();

		$signaturesfav = $user->favorites()->where('favoritable_type','=', 'App\Signature')->get();
		$signatures = array();

		foreach ($signaturesfav as $fav) {
			$signatures[] = Signature::findOrFail($fav->favoritable_id);
		}

		$teachersfav = $user->favorites()->where('favoritable_type','=', 'App\Teacher')->get();
		$teachers = array();

		foreach ($teachersfav as $fav) {
			$teachers[] = Teacher::findOrFail($fav->favoritable_id);
		}

		//return dd($teachers, $signatures);
		return view('profile.favorites', compact('user', 'signatures', 'teachers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
