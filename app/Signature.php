<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Resource;

class Signature extends Model {

    use SoftDeletes;

    protected $fillable = ['name', 'description', 'credits', 'semester', 'required'];

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
