<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;

use App\User;

use Illuminate\Support\Collection;
use Datatables;

use App\Report;

class UserController extends Controller {

	public function __construct(){
		$this->middleware('auth', ['only' => ['index', 'show','edit', 'update', 'destroy', 'report'] ]);
		$this->middleware('is_admin', ['only' => ['index', 'show','report'] ]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::where('type', '=', 'user')->get();
		return view('user.index', compact('users'));
	}

	public function report($id, Request $request, Guard $auth){
		$report = new Report();

		$report->reason = $request->input('reason');
		$report->user_id = $id;
		$report->admin_id = $auth->user()->id;

		$report->save();

		if ($request->ajax()){
			return "done";	
		} else {
			return redirect()->back();
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request, Guard $auth)
	{
		$user = new User();
		$user->fill($request->all());

		if (!$request->has('type')){
			$user->type = 'user';
		}

		$user->save();

		if (!$auth->guest() && $auth->user()->isLevel('admin'))
			return redirect()->route('user.index');
		else
			return redirect('auth/login');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);
		return view('user.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		return view('user.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditUserRequest $request, Guard $auth)
	{
		$user = User::findOrFail($id);
		$user->fill($request->all());

		if (!$request->has('type')){
			$user->type = 'user';
		}

		$user->save();

		if (!$auth->guest() && $auth->user()->isLevel('admin'))
			return redirect()->route('user.index');
		else
			return redirect()->route('profile');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);

		$full_name = $user->user_name;

		$user->delete();

		\Session::flash('message', 'Se ha baneado el usuario: '.$full_name);
		return redirect()->route('user.index');
	}

	public function data(Guard $auth) {
		if ($auth->user()->isLevel('superadmin')) {
			$users = User::where('type', '!=', 'superadmin')->get();
		} else {
			$users = User::where('type', '=', 'user')->get();
		}
		$data = [];

		if (count($users)>0){
			foreach ($users as $user) {
				$data[] = array(
					'nombreusuario'		=> $user->user_name,
					'nombre'			=> $user->full_name,
					'puntos'			=> $user->points,
					'actividad'			=> count($user->logs),
					'reportes'			=> count($user->reports),
					'acciones'			=> view('user.partials.actions', compact('user'))->render(),
				);
			}
		} else {
			$data[] = array(
				'nombreusuario'		=> 'no hay registros',
				'nombre'			=> 'no hay registros',
				'puntos'			=> 'no hay registros',
				'actividad'			=> 'no hay registros',
				'reportes'			=> 'no hay registros',
				'acciones'			=> 'no hay registros',
			);
		}

		$users = new Collection($data);

		return Datatables::of($users)->make(true);
	}

}
