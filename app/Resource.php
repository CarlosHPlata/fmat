<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model {

	protected $fillable = ['name', 'description', 'path', 'type'];


	public function teacher(){
		return $this->belongsTo('APP\Teacher');
	}

	public function signature(){
		return $this->belongsTo('APP\Signature');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function setTeacherAttribute($teacher){
		$this->teacher_id = $teacher->id;
	}

	public function setSignatureAttribute($signature){
		$this->signature_id = $signature->id;
	}

}
