<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model {

	protected $fiilable = ['title', 'description'];

	public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }

}
