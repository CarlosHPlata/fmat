<?php namespace App\Http\Middleware;

class IsSuperAdmin extends IsType {

	public function getType(){
		return 'superadmin';
	}

}
