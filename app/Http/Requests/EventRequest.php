<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'availablePlaces' => 'required',
            'date' => 'required|date|after_or_equal:' . now()->toDateString(),
            'category_id' => 'required|numeric',
            'user_id' => 'required',
            'ReservationType' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ];
    }
}
