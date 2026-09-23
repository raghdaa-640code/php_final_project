<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('id');
    
        return [
            'email'=>['required','email'],
            'password'=>['required','string','regex:/^[0-9a-zA-Z]{4,12}$/']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'يرجى ادخال البريد الإلكتروني',
            'email.email' => 'صيغة البريد الإلكتروني',
            'password.required' => 'يرجى ادخال كلمة المرور',
            'password.regex' => 'كلمة المرور يجب أن تحتوي على حروف و أرقام وبطول  من 4 إلى 12 خانة',

        ];
    }
}