<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateSignatureRequest extends Request {
	protected $route;

	public function __construct(Route $route){
		$this->route = $route;
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name'			=> 'required|unique:signatures,name,'. $this->route->getParameter('signature'),
			'description' 	=> 'required',
			'credits'		=> 'required',
			'semester'		=> 'required'
		];
	}

}
