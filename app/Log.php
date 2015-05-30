<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException; 

use App\Signature;
use App\Teacher;
use App\Resource;
use App\Rating;
use App\User;

class Log extends Model {

	public function user(){
		return $this->belogsTo('App\User');
	}

	public function logueable() {
		return $this->morphTo();
	}

	public function setLog($user, $id, $type, $action, $text){
		$this->user_id = $user->id;
		$this->logueable_id = $id;
		$this->logueable_type = $type;
		$this->action = $action;
		$this->text = $text;
	}

	public function getIsLinkValidAttribute(){
		try {
			switch ($this->logueable_type) {
				case 'App\Signature':
					$result = Signature::findOrFail($this->logueable_id);
					break;
				case 'App\User':
					$result = User::findOrFail($this->logueable_id);
					break;
				case 'App\Teacher':
					$result = Teacher::findOrFail($this->logueable_id);
					break;
				case 'App\Resource':
					$result = Resource::findOrFail($this->logueable_id);
					break;
				case 'App\Rating':
					$result = Rating::findOrFail($this->logueable_id);
					break;
			}
			return true;
		} catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
		    return false;
		}
	}

	public function getLinkAttribute(){
		$route = '';
		switch ($this->logueable_type) {
			case 'App\Signature':
				$result = Signature::findOrFail($this->logueable_id);
				return route('signature.show', $result);
				break;
			case 'App\User':
				$result = User::findOrFail($this->logueable_id);
				return route('user.show', $result);
				break;
			case 'App\Teacher':
				$result = Teacher::findOrFail($this->logueable_id);
				return route('teacher.show', $result);
				break;
			case 'App\Resource':
				$result = Resource::findOrFail($this->logueable_id);
				return route('resource.show', $result);
				break;
			case 'App\Rating':
				$result = Rating::findOrFail($this->logueable_id);
				return route('teacher.show', $result->teacher);
				break;
		}
		
	}

}
