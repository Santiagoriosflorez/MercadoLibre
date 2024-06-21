<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true ;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
			'category_id' => ['required', 'exists:categories,id'],
			'stock' => ['required', 'numeric'],
			'worth' => ['required', 'numeric',],
        ];
    }

	public function messages()
	{
		return
		[
			'name.required' => 'El nombre es requerido.',
			'name.string' => 'El nombre debe ser valido',
			'category_id.required' => 'La categoria es requerida',
			'category_id.exists' => 'La categoria no existe.',
			'stock.required' => 'La cantidad es requerida.',
			'stock.string' => 'La cantidad debe ser un numero valido',
			'worth.required' => 'El precio es requerido',
			'worth.string' => 'El precio debe ser un numero valido',
		];
	}

}
