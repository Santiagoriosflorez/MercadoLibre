<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$rules = [
			'name' => ['required', 'string'],
			'last_name' => ['required', 'string'],
			'email' => ['required', 'email'],
			'password' => ['confirmed', 'string', 'min:8'],
		];

		if ($this->method() == 'POST') {
			array_push($rules['email'], 'unique:users,email');
			array_push($rules['password'], 'required');
		} else {
			array_push($rules['email'], 'unique:users,email' . $this->user->id);
			array_push($rules['password'], 'nullable');
		}

		return $rules;
	}
}
