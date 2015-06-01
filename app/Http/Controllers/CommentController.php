<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Carbon\Carbon;

use App\Comment;
use App\Log;

class CommentController extends Controller {

	public function __construct(){
		$this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy'] ]);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, Guard $auth)
	{
		$comment = new Comment();
		$comment->fill($request->all());
		if ($request->has('anonymous'))
			$comment->anonymous = false;
		else
			$comment->anonymous = true;
		$comment->date = Carbon::now();
		$comment->user_id = $auth->user()->id;
		$comment->commentable_id = $request->input('idtype');
		$comment->commentable_type = $request->input('type');

		$comment->save();

		$this->log($comment, $auth->user(), 'create');

		return $comment->id;
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
	public function update($id, Request $request, Guard $auth)
	{
		$comment = Comment::findOrFail($id);
		$comment->fill($request->all());
		if ($request->has('anonymous'))
			$comment->anonymous = false;
		else
			$comment->anonymous = true;
		$comment->date = Carbon::now();
		$comment->user_id = $auth->user()->id;
		$comment->commentable_id = $request->input('idtype');
		$comment->commentable_type = $request->input('type');

		$comment->save();

		$this->log($comment, $auth->user(), 'update');

		return $comment->id;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Guard $auth)
	{
		$comment = Comment::findOrFail($id);
		$comment->delete();

		$this->log($comment, $auth->user(), 'delete');

		return 'true';
	}

	public function log($comment, $user, $action){
		$text = '';

		switch ($action) {
			case 'create':
				$text.= 'has comentado una pagina con: <br>'.$comment->comment;
				break;
			case 'update':
				$text.= 'has actualizado un comentairo';
				break;
			case 'delete':
				$text.= 'has borrado un comentario';
				break;
		}

		$log = new Log();
		$log->setLog($user, $comment->id, 'App\Comment', $action, $text);
		$log->save();
	}

}
