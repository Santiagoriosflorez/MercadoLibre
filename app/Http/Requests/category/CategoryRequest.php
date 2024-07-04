<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'stock' => ['required', 'numeric'],
            'worth' => ['required', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'name.string' => 'El nombre debe ser válido',
            'category_id.required' => 'La categoría es requerida',
            'category_id.exists' => 'La categoría no existe.',
            'stock.required' => 'La cantidad es requerida.',
            'stock.numeric' => 'La cantidad debe ser un número válido',
            'worth.required' => 'El precio es requerido',
            'worth.numeric' => 'El precio debe ser un número válido',
        ];
    }
}

