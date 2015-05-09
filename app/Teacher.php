<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resource;
use App\Signature;

class Teacher extends Model {

    protected $fillable = ['first_name', 'last_name'];

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }

	public function resources()
    {
        return $this->hasMany('App\Resource');
    }

    public function signatures(){
    	return $this->belongsToMany('App\Signature');
    }

    public function getSignaturesResources(Signature $signature){
    	return Resource::where('teacher_id','=',$this->id)
    			->where('signature_id', '=', $signature->id)
    			->get();
    }

}
