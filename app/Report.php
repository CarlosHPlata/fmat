<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model {

	public function user(){
		return $this->belogsTo('App\User');
	}

	public function getAdminAttribute(){
		return User::findOrFail($this->admin_id);
	}

}
