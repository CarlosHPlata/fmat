<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resource;
use App\Signature;

class Teacher extends Model {

    protected $fillable = ['first_name', 'last_name', 'email', 'extension', 'cubicle', 'title'];

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

    public function ratings(){
        return $this->hasMany('App\Rating');
    }

    public function getSignaturesResources(Signature $signature){
    	return Resource::where('teacher_id','=',$this->id)
    			->where('signature_id', '=', $signature->id)
    			->get();
    }

    public function getFullNameAttribute(){
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getRatingAttribute(){
        $count = 0;
        $value = 0;
        foreach ($this->ratings as $rating) {
            $value += $rating->rate;
            $count++;
        }
        $final = ($count == 0)?0:$value/$count;
        $final = number_format($final, 1, '.', '');
        return $final;
    }

}
