<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Resource;
use App\Signature;
use Nicolaslopezj\Searchable\SearchableTrait;

class Teacher extends Model {

    use SoftDeletes;
    use SearchableTrait;

    protected $fillable = ['first_name', 'last_name', 'email', 'extension', 'cubicle', 'title'];

    protected $searchable = [
        'columns' => [
            'first_name' => 10,
            'last_name'  => 10,
            'email'      => 2,
        ]
    ];

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function favorites(){
        return $this->morphMany('App\Favorite', 'favoritable');
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
