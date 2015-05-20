<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Signature;
use App\Teacher;
use App\Rating;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class TeacherController extends Controller {

	public function __construct(){
		$this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy'] ]);
		$this->middleware('is_admin', ['only' => ['create', 'store', 'edit', 'update', 'destroy'] ]);
	}

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
		$signatures = Signature::get();
		return view('teacher.create', compact('signatures'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$teacher = new Teacher();
		$vars = $request->all();
		$teacher->fill($vars);

		$teacher->save();

		$signatures = $request->signatures;

		if ($signatures != null) 
			$teacher->signatures()->sync($signatures);

		\Session::flash('message', 'Se ha guardado un nuevo maestro: '.$teacher->full_name);
		return redirect()->route('teacher.show', $teacher);
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
		$signatures = Signature::get();
		return view('teacher.edit', compact('teacher', 'signatures'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$teacher = Teacher::findOrFail($id);
		$vars = $request->all();

		$teacher->fill($vars);

		$signatures = $request->input('signatures');

		if ($signatures != null) 
			$teacher->signatures()->sync($signatures);

		$teacher->save();

		\Session::flash('message', 'Se han guardado los cambios para: '.$teacher->full_name);
		return redirect()->route('teacher.show', $teacher);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$teacher = Teacher::findOrFail($id);
		$full_name = $teacher->full_name;
		$teacher->delete();

		\Session::flash('message', 'Se ha eliminado el maestro: '.$full_name);
		return redirect()->route('teacher.index');
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
