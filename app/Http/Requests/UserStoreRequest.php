<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name'      => 'required|string|min:3|max:255',
            'email'     => 'required|email|max:255|unique:users,email',
            'password'  => 'required|min:6|max:255|confirmed',
            'phone'  => 'nullable', 
            'address' => 'nullable|string', 
            'user_type' => 'required|integer|in:0,1'
        ];
    }
}
