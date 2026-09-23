<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'nullable|boolean',
            'sort' => 'integer',
            'count' => 'integer',
            'description' => 'required|string',
            'price' => 'integer|min:0',
            'delivery' => 'string',

            ];



    }
    public function messages(): array
    {
        return [
            'name.required' => 'Название обязательно',
            'description.required' => 'Описание обязательно',
            'price.required' => 'Цена обязательно',
            'price.min' => 'Цена не может быть отрицательной',
                ];
    }
}
