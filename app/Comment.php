<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Signature;
use App\Teacher;

class Comment extends Model {

	protected $fillable = ['comment'];

	public function commentable() {
		return $this->morphTo();
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function setUserAttribute($user){
		$this->user_id = $user->id;
	}

}
