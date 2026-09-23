<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'regex:/^[\p{Arabic}a-zA-Z0-9\s]{3,50}$/u'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'type' => ['required', 'regex:/^[\p{Arabic}0-9\s]{3,20}$/u'],
            'state' => ['required'],
            'status' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'يجب إدخال الاسم',
        ];
    }
}
