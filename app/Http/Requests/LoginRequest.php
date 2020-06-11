<?php

namespace App\Http\Requests;


class LoginRequest extends ApiRequest
{

	public function rules()
	{
		return [
			'email' => 'required|email',
            'password' => 'required|min:8'
		];
	}

	public function messages()
	{
		return [
			'email.required' => 'Email required!',
            'password.required' => 'Password required!'
		];
	}

}
