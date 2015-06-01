<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Signature;
use App\Teacher;
use App\Log;
use App\Favorite;

use App\Http\Requests\CreateSignatureRequest;
use App\Http\Requests\UpdateSignatureRequest;

class SignatureController extends Controller {

	protected $auth;

	public function __construct(Guard $auth){
		$this->auth = $auth;
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
		$signatures = Signature::paginate(5);
		return view('signature.index', compact('signatures'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$teachers = Teacher::get();
		return view('signature.create', compact('teachers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateSignatureRequest $request)
	{
		$signature = new Signature();
		$vars = $request->all();
		$signature->fill($vars);

		$signature->save();

		$teachers = $request->input('teachers');

		if ($teachers != null)
			$signature->teachers()->sync($teachers);

		$this->log($signature, 'create');

		\Session::flash('message', 'Se ha guardado una nueva materia ' . $signature->name);
		return redirect()->route('signature.show', $signature);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$signature = Signature::findOrFail($id);
		return view('signature.show', compact('signature'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$teachers = Teacher::get();
		$signature = Signature::findOrFail($id);
		return view('signature.edit', compact('signature', 'teachers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UpdateSignatureRequest $request)
	{
		$signature = Signature::findOrFail($id);
		$vars = $request->all();

		$signature->fill($vars);

		$teachers = $request->input('signatures');

		if ($teachers != null)
			$signature->teachers()->sync($teachers);

		$signature->save();

		$this->log($signature, 'update');

		\Session::flash('message', 'Se ha guardado los cambios para ' . $signature->name);
		return redirect()->route('signature.show', $signature);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$signature = Signature::findOrFail($id);
		$name =  $signature->name;

		$signature->delete();

		$this->log($signature, 'delete');

		\Session::flash('message', 'Se ha eliminado la asignatura: ' . $name);
		return redirect()->route('signature.index');
	}

	public function favorite($signature, Guard $auth){
		if (count( $signature->favorites()->where('user_id','=', $auth->user()->id)->get() ) > 0){
			\Session::flash('message', 'No ya habias agregado esta asignatura?');
			return redirect()->back();
		} else {
			$fav = new Favorite();
			$user = $auth->user();
			$signature = Signature::findOrFail($signature);

			$fav->user_id = $user->id;
			$fav->favoritable_id = $signature->id;
			$fav->favoritable_type = 'App\Signature';

			$fav->save();
			\Session::flash('message', 'Se ha agregado la materia: '.$signature->name.' a tus favoritos');
			return redirect()->back();
		}
	}

	public function log($signature, $action){
		$text = '';

		switch ($action) {
			case 'create':
				$text.= 'creada asignatura: ' . $signature->name;
				break;
			case 'update':
				$text.= 'actualizada asignatura: ' . $signature->name;
				break;
			case 'delete':
				$text.= 'borrada asignatura: ' . $signature->name;
				break;
		}

		$log = new Log();
		$log->setLog($this->auth->user(), $signature->id, 'App\Signature', $action, $text);
		$log->save();
	}

}
