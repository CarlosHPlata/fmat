<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {

	protected $fillable = ["rate"];

	protected $hidden = ["user_id", "teacher_id"];

	public function teacher(){
		return $this->belongsTo('App\Teacher');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function setUserAttribute($user){
		$this->user_id = $user->id;
	}

	public function setTeacherAttribute($teacher){
		$this->teacher_id = $teacher->id;
	}

}
