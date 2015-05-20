<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Bulletin extends Model {

    use SearchableTrait;

	protected $fiilable = ['title', 'content', 'date'];

    protected $searchable = [
        'columns' => [
            'title'       => 10,
            'content' => 10,
        ]
    ];

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
