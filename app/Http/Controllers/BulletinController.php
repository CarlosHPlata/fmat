<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Contracts\Auth\Guard;

use App\Bulletin;
use Carbon\Carbon;

use App\Http\Requests\CreateBulletinRequest;

class BulletinController extends Controller {

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
		$bulletins = Bulletin::paginate(5);
		return view('bulletin.index', compact('bulletins'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('bulletin.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateBulletinRequest $request, Guard $auth)
	{
		if(!$auth->guest()){
			$bulletin = new Bulletin();
			$vars = $request->all();

			$bulletin->title = $vars['title'];
			$bulletin->content = $vars['content'];
			$bulletin->date = $vars['date'];
			$bulletin->user_id = $auth->user()->id;

			$bulletin->save();

			\Session::flash('message', 'Se ha guardado una nueva nota:' . $bulletin->title);
			return redirect()->route('bulletin.show', $bulletin);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bulletin = Bulletin::findOrFail($id);
		return view('bulletin.show', compact('bulletin'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bulletin = Bulletin::findOrFail($id);
		return view('bulletin.edit', compact('bulletin'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CreateBulletinRequest $request)
	{
		$bulletin = Bulletin::findOrFail($id);
		$vars = $request->all();

		$bulletin->title = $vars['title'];
		$bulletin->content = $vars['content'];
		$bulletin->date = $vars['date'];

		$bulletin->save();

		\Session::flash('message', 'Se han guardado los cambios para la noticia: ' . $bulletin->title);
		return redirect()->route('bulletin.show', $bulletin);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$bulletin = Bulletin::findOrFail($id);
		$bulletin->delete();

		\Session::flash('message', 'Se ha eliminado la noticia: ' . $bulletin->title);
		return redirect()->route('bulletin.index');
	}

}
