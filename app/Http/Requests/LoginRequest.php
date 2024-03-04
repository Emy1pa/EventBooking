<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'loginemail' => 'required|email',
            'loginpassword' => 'required|min:8|max:200'
        ];
    }

    public function messages(): array
    {
        return [
            'loginemail.required' => 'The login email field is required.',
            'loginemail.email' => 'The login email must be a valid email address.',
            
            'loginpassword.required' => 'The login password field is required.',
            'loginpassword.min' => 'The login password must be at least :min characters.',
            'loginpassword.max' => 'The login password may not be greater than :max characters.',
        ];
    }
}
