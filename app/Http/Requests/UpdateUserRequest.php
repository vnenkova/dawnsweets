<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
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
            'username'              => 'sometimes|required|string|max:50|unique:users,username,' . Auth::user()->id . '|regex:/[a-zA-Z].*/',
            'telephone'             => 'sometimes|digits:10',
            'address'               => 'sometimes|string',
            'password'              => 'sometimes|nullable|string|min:8|confirmed',
            // 'password_confirmation' => 'required' 
        ];
    }

    public function messages(): array 
    {
        return [
            'username.required'  => 'The Username field is required.',
            'username.string'    => 'Please, enter a valid username.',
            'username.max'       => 'The username must be maximum 50 characters.',
            'username.unique'    => 'Such username already exists.',
            'username.regex'     => 'Please, enter a valid username.',
            'telephone.digits'   => 'Enter a valid telephone number.',
            'telephone.max'      => 'Maximum 15 digits allowed for a phone number.',
            'address.string'     => 'Please, enter a valid address.',
            // 'password.required'  => 'The Password field is required.',
            'password.string'    => 'Please, enter a valid password.',
            'password.min'       => 'The password must be minimum 8 characters.',
            'password.confirmed' => 'Please, repeat your new password.'
        ];
    }
}
