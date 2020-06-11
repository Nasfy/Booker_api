<?php

namespace App\Http\Requests;


class BookRequest extends ApiRequest
{

	public function rules()
	{
		return [
            'title' => 'string',
            'pages' => 'integer',
            'annotation' => 'string',
            'cover' => 'string',
            'author' => 'string',

		];
	}

}
