<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Signature;
use App\Teacher;
use App\Rating;
use App\Log;
use App\Favorite;

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
		$teachers = Teacher::orderBy('first_name')->paginate(5);
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
	public function store(Request $request, Guard $auth)
	{
		$teacher = new Teacher();
		$vars = $request->all();
		$teacher->fill($vars);

		$teacher->save();

		$signatures = $request->signatures;

		if ($signatures != null)
			$teacher->signatures()->sync($signatures);

		$this->log($teacher, $auth->user(), 'create');

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
	public function update($id, Request $request, Guard $auth)
	{
		$teacher = Teacher::findOrFail($id);
		$vars = $request->all();

		$teacher->fill($vars);

		$signatures = $request->input('signatures');

		if ($signatures != null)
			$teacher->signatures()->sync($signatures);

		$teacher->save();

		$this->log($teacher, $auth->user(), 'update');

		\Session::flash('message', 'Se han guardado los cambios para: '.$teacher->full_name);
		return redirect()->route('teacher.show', $teacher);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Guard $auth)
	{
		$teacher = Teacher::findOrFail($id);
		$full_name = $teacher->full_name;
		$teacher->delete();

		$this->log($teacher, $auth->user(), 'delete');

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

				$log = new Log();
				$log->setLog($user, $rating->id, 'App\Rating', 'create', 
					'calificado maestro : ' . Teacher::find($teacher)->full_name . ' con ' . $rate . ' estrellas');
				$log->save();

				$msg = 'Gracias por calificar';

			} else $msg = '¿No ya habias calificado a este maestro?';

		} else $msg = 'Necesitas estar logueado para calificar a un maestro';

		\Session::flash('message', $msg);
		return redirect()->back();
	}

	public function favorite($teacher, Guard $auth){
		if (count( $teacher->favorites()->where('user_id','=', $auth->user()->id)->get() ) > 0){
			\Session::flash('message', 'No ya habias agregado este maestro?');
			return redirect()->back();
		} else {
			$fav = new Favorite();
			$user = $auth->user();
			$teacher = Teacher::findOrFail($teacher);

			$fav->user_id = $user->id;
			$fav->favoritable_id = $teacher->id;
			$fav->favoritable_type = 'App\Teacher';

			$fav->save();
			\Session::flash('message', 'Se ha agregado al maestro: '.$teacher->full_name.' a tus favoritos');
			return redirect()->back();
		}
	}

	public function log($teacher, $user, $action){
		$text = '';

		switch ($action) {
			case 'create':
				$text.= 'creado maestro: ' . $teacher->full_name;
				break;
			case 'update':
				$text.= 'actualizado maestro: ' . $teacher->full_name;
				break;
			case 'delete':
				$text.= 'borrado maestro: ' . $teacher->full_name;
				break;
		}

		$log = new Log();
		$log->setLog($user, $teacher->id, 'App\Teacher', $action, $text);
		$log->save();
	}

}
