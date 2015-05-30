<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Http\Request;

use App\Resource;
use App\User;
use App\Signature;
use App\Teacher;
use App\Log;

class ResourceController extends Controller {


	protected $DESTINATION_PATH;

	public function __construct(){
		$this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy'] ]);
		$this->DESTINATION_PATH = public_path().'\\uploads\\resources\\';
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$signatures = Signature::get();
		$teachers = Teacher::get();
		return view('resource.create', compact('signatures', 'teachers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, Guard $auth)
	{
		$resource = new Resource();
		$user =  $auth->user();

		$resource->name 		= $request->input('name');
		$resource->description 	= $request->input('description');
		$resource->type 		= $request->input('type');
		$resource->user_id 		= $user->id;
		$resource->signature_id = $request->input('signature');
		$resource->teacher_id 	= $request->input('teacher');

		$resource->save();

		if ( $request->hasFile('file') && $request->file('file')->isValid() ){
			$file = $request->file('file');
			$file_name = $resource->id . '_' . $user->id . '.' . $file->getClientOriginalExtension();
			
			$file->move($this->DESTINATION_PATH, $file_name);

			$resource->path = $file_name;

			$resource->save();
		}

		$resource->delete($resource, $auth->user(), 'create');

		\Session::flash('message', 'Se ha subido su recurso con exito');
		return redirect()->route('resource.show', $resource);
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$signatures = Signature::get();
		$teachers = Teacher::get();
		$resource = Resource::findOrFail($id);

		return view('resource.edit', compact('resource', 'signatures', 'teachers'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request, Guard $auth)
	{ 
		$resource = Resource::findOrFail($id);
		$user =  $auth->user();

		$resource->name 		= $request->input('name');
		$resource->description 	= $request->input('description');
		$resource->type 		= $request->input('type');
		$resource->user_id 		= $user->id;
		$resource->signature_id = $request->input('signature');
		$resource->teacher_id 	= $request->input('teacher');

		$resource->save();

		if ( $request->hasFile('file') && $request->file('file')->isValid() ){
			$file = $request->file('file');
			$file_name = $resource->id . '_' . $user->id . '.' . $file->getClientOriginalExtension();
			
			$file->move($this->DESTINATION_PATH, $file_name);

			$resource->path = $file_name;

			$resource->save();
		}

		$resource->delete($resource, $auth->user(), 'update');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Guard $auth)
	{
		$resource = Resource::findOrFail($id);

		if ( \File::exist($this->DESTINATION_PATH . $resource->path) ){
			\File::delete($this->DESTINATION_PATH . $resource->path);
		}

		$this->log();

		$resource->delete($resource, $auth->user(), 'delete');

	}

	public function removeFile($id, Request $request){
		if ($request->ajax()){

			$resource = Resource::findOrFail($id);

			if ( \File::exists($this->DESTINATION_PATH . $resource->path) ) {
				\File::delete($this->DESTINATION_PATH . $resource->path);
				$resource->path = null;
				$resource->save();
				return "done";
			} else {
				abort(500);
			}

		}
	}

	public function log($resource, $user, $action){
		$text = '';

		switch ($action) {
			case 'create':
				$text.= 'creado recurso: ' . $resource->name .', 10 puntos exp';
				break;
			case 'update':
				$text.= 'actualizado recurso: ' . $resource->name;
				break;
			case 'delete':
				$text.= 'borrado recurso: ' . $resource->name .', -10 puntos exp';
				break;
		}

		$log = new Log();
		$log->setLog($user, $resource->id, 'App\Resource', $action, $text);
		$log->save();
	}

}
