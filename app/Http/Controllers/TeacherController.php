<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\Rating;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class TeacherController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$teachers = Teacher::orderBy('first_name')->get();
		return view('teacher.index' ,compact('teachers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view();
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
		$teacher = Teacher::findOrFail($id);
		return view('teacher.show', compact('teacher'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$teacher = Teacher::findOrFail($id);
		return view('teacher.edit', compact('teacher'));
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

	public function rate($rate, $teacher, Guard $auth){
		if(!$auth->guest()){
			$user = $auth->user();
			$ratings =  Rating::where('user_id', '=', $user->id)->where('teacher_id', '=', $teacher)->get();

			if (count($ratings) == 0){
				$rating = new Rating();
				$rating->rate = $rate;
				$rating->user_id = $user->id;
				$rating->teacher_id = $teacher;
				$rating->save();

				$msg = 'Gracias por calificar';

			} else $msg = '¿No ya habias calificado a este maestro?';

		} else $msg = 'Necesitas estar logueado para calificar a un maestro';

		\Session::flash('message', $msg);
		return redirect()->back();
	}

}
