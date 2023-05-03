<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentStoreRequest extends FormRequest
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
            'user_id' => 'nullable|integer', 
            'doctor_id' => 'required|integer|exists:doctors,id', 
            'name' => 'required|string', 
            'email' => 'nullable|email', 
            'phone' => 'required|string', 
            'date' => 'required|date', 
            'message' => 'required|string', 
            'status' => 'nullable|string|in:Pending,Approved,Cancelled'
        ];
    }
}