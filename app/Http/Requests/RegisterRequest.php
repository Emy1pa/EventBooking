<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstname' => ['required', 'min:3', 'max:10', Rule::unique('users', 'firstname')],
            'lastname' => ['required', 'min:3', 'max:10', Rule::unique('users', 'lastname')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200', 'confirmed'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'phone' => ['required', 'numeric'],
            'role' => ['required', Rule::in(['utilisateur', 'organisateur', 'admin'])],
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.required' => 'The firstname field is required.',
            'firstname.min' => 'The firstname must be at least :min characters.',
            'firstname.max' => 'The firstname may not be greater than :max characters.',
            'firstname.unique' => 'The firstname has already been taken.',
            
            'lastname.required' => 'The lastname field is required.',
            'lastname.min' => 'The lastname must be at least :min characters.',
            'lastname.max' => 'The lastname may not be greater than :max characters.',
            'lastname.unique' => 'The lastname has already been taken.',
            
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least :min characters.',
            'password.max' => 'The password may not be greater than :max characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be a file of type: :values.',
            'image.max' => 'The image may not be greater than :max kilobytes.',
            
            'phone.required' => 'The phone field is required.',
            'phone.numeric' => 'The phone must be a number.',
            
            'role.required' => 'The role field is required.',
            'role.in' => 'The selected role is invalid.',
        ];
    }
}
