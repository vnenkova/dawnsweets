<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCakeRequest extends FormRequest
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
            'name'              => 'required|string|max:100',
            'price'             => 'required|numeric|min:10|max:100',
            'grams'             => 'required|numeric|min:250|max:800',
        ];
    }

    public function messages(): array 
    {
        return [
            'name.required'  => 'The Name field is required.',
            'name.string'    => 'Please, enter a valid cake name.',
            'name.max'       => 'The cake name must be maximum 100 characters.',
            // 'name.unique'    => 'Such cake already exists.',
            'price.required' => 'The Price field is required.',
            'price.numeric'  => 'Please, enter a valid cake price.',
            'price.min'      => 'The cake price must be at least 10 €.',
            'price.max'      => 'The cake price can be max 100 €.',
            'grams.required' => 'The Grams field is required.',
            'grams.min'      => 'The cake must be at least 250 grams.',
            'grams.max'      => 'The cake can be at max 800 grams.',
        ];
    }
}
