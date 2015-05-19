<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Signature;
use App\Teacher;

class SignatureController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$signatures = Signature::get();
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
	public function store(Request $request)
	{
		$signature = new Signature();
		$vars = $request->all();
		$signature->fill($vars);

		$signature->save();

		$teachers = $request->input('teachers');

		if ($teachers != null)
			$signature->teachers()->sync($teachers);

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
	public function update($id,Request $request)
	{
		$signature = Signature::findOrFail($id);
		$vars = $request->all();

		$signature->fill($vars);

		$teachers = $request->input('signatures');

		if ($teachers != null)
			$signature->teachers()->sync($teachers);

		$signature->save();

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

		\Session::flash('message', 'Se ha eliminado el maestro: ' . $name);
		return redirect()->route('signature.index');
	}

}
