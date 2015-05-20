<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

abstract class IsType {

	protected $auth;

	public function __construct(Guard $auth){
		$this->auth =  $auth;
	}

	abstract public function getTYpe();

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
	
		if ( !$this->auth->user()->isLevel( $this->getTYpe() ) ){
			if ($request->ajax()){
				return response('Unautorized.', 401);
			} else {
				\Session::flash('message', 'No puedes acceder a esta seccion intenta loguearte con el usuario correcto.');
				return redirect()->route('index');
			}
		}

		return $next($request);
	}

}
