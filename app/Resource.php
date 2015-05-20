<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Resource extends Model {

	use SearchableTrait;

	protected $fillable = ['name', 'description', 'path', 'type'];

	protected $searchable = [
		'columns' => [
			'name'        => 10,
			'description' => 10,
		]
	];


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
