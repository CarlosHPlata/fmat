<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model {

	protected $fiilable = ['title', 'description', 'date'];

	public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function getDateAttribute(){
    	return date_format(date_create($this->attributes['date']), 'd F, Y');
    }

    public function setDateAttribute($value){
        $date = date_create_from_format('d F, Y', $value);
    	$this->attributes['date'] = date_format($date, 'Y-m-d');
    }

}
