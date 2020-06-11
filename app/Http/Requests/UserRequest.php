<?php

namespace App\Http\Requests;


class UserRequest extends ApiRequest
{

	public function rules()
	{
		return [
			'name' => 'required|string',
			'email' => 'required|email|unique:users',
            'password' => 'required|min:8'

		];
	}

	public function messages()
	{
		return [
			'name.required' => 'Name required!',
			'email.required' => 'Email required!',
            'password.required' => 'Password required!'
		];
	}

}
