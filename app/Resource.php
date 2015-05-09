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

}
