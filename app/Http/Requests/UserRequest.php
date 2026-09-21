<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>['required'],
            'email'=>['required','email','regex:/^[a-zA-Z0-9]+@[a-zA-Z]+\.(com|eg|edu)$/','unique:users,email'],
            'phone'=>['nullable','regex:/^(010|012|011|015)[0-9]{8}$/','unique:users,phone'],
            'password'=>['required'],
            'location'=>['nullable']
        ];
    }
}
