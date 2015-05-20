<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Resource;
use Nicolaslopezj\Searchable\SearchableTrait;

class Signature extends Model {
    
    use SoftDeletes;
    use SearchableTrait;

    protected $fillable = ['name', 'description', 'credits', 'semester', 'required'];

    protected $searchable = [
        'columns' => [
            'name'        => 10,
            'description' => 10,
            'semester'    => 2,
        ]
    ];

	public function resources()
    {
        return $this->hasMany('App\Resource');
    }

    public function links(){
        return $this->hasMany('App\Link');
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function teachers(){
    	return $this->belongsToMany('App\Teacher');
    }

    public function getTeacherResources(Teacher $teacher){
    	return Resource::where('teacher_id','=',$teacher->id)
    			->where('signature_id', '=', $this->id)
    			->get();
    }


}
