<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'regex:/^[\p{Arabic}a-zA-Z\s]+$/u'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string','regex:/^[0-9a-zA-Z]{4,12}$/'],
            'phone'    => ['nullable', 'string', 'regex:/^(010|011|012|015)[0-9]{8}$/','unique:users'],
            'image'    => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'location' => ['nullable', 'string'],
            
            
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'يرجى إدخال الاسم',
            'name.regex'        => 'الاسم يجب أن يحتوي على حروف عربية فقط.',
            'email.required'    => 'يرجى إدخال البريد الإلكتروني',
            'email.email'       => 'برجاء كتابة بريد إلكتروني صحيح',
            'email.unique'      => 'هذا البريد الإلكتروني مسجل مسبقاً',
            'password.required' => 'يرجى إدخال كلمة المرور',
            'password.regex'      => 'كلمة المرور يجب أن تحتوي على حروف و أرقام وبطول  من 4 إلى 12 خانة',
            'image.image'       => 'الملف المرفق يجب أن يكون صورة',
            'image.mimes'       => 'الصورة يجب أن تكون بصيغة PNG أو JPG أو JPEG فقط',
            'image.max'         => 'حجم الصورة يجب ألا يتجاوز 2 ميجابايت'
        ];
    }
}