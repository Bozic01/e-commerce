<?php

namespace App\Http\Requests;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','max:2000'],
            'images.*' => ['nullable','image'],
            'deleted_images.*' => ['nullable','int'],
            'price' => ['required','numeric'],
            'quantity' => ['nullable','numeric'],
            'description' => ['nullable','string'],
            'published' => ['required', 'boolean']
        ];
    }
}
