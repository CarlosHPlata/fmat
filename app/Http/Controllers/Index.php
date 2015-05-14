<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Teacher;
use App\User;
use App\Signature;
use App\Bulletin;

class Index extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bulletins = Bulletin::take(3)->orderBy('date', 'DESC')->get();
		$teachers = $this->getBestTeachers();
		$signatures = $this->getBestSignatures();

		return view('index', compact('bulletins', 'teachers', 'signatures'));
	}


	private function getBestTeachers(){
		$teachers = Teacher::get();
		$arrayTeacher = array();

		foreach ($teachers as $teacher) {
			$arrayTeacher[$teacher->id] = $teacher->rating;
		}

		arsort($arrayTeacher);
		$final = array();

		$i =0;
		foreach ($arrayTeacher as $key => $value) {
			$final[] = Teacher::find($key);
			if($i == 10) break;
			else $i++;
		}

		return $final;
	}

	private function getBestSignatures(){
		$signatures = Signature::get();
		$arraySignature = array();

		foreach ($signatures as $signature) {
			$arraySignature[$signature->id] = count($signature->resources);
		}

		arsort($arraySignature);
		$final = array();

		$i = 0;
		foreach ($arraySignature as $key => $value) {
			$final[] = Signature::find($key);
			if($i == 10) break;
			else $i++;
		}

		return $final;
	}
}
