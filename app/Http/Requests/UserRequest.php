<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'name' => ['required', 'regex:/^[\p{Arabic}a-zA-Z]{2,15}$/u'],
            'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9]+@[a-zA-Z]+\.(com|eg|edu)$/', 'unique:users,email,' . $id],
            'phone' => ['nullable', 'regex:/^(010|012|011|015)[0-9]{8}$/', 'unique:users,phone,' . $id],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'location' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب إدخال الاسم',
            'phone.regex' => 'الرقم غير صالح',
        ];
    }
}

