<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id=$this->route('id');
        return [
            'name'=>['required','regex:/^[p{Arabic}a-zA-Z]{2,15}$/'],
            'email'=>['required','email','regex:/^[a-zA-Z0-9]+@[a-zA-Z]+\.(com)$/','unique:users,email,'.$id],
            'password'=>['required','regex:/^[a-zA-z0-9]{3,15}$/'],
            'phone'=>['regex:/^(010|012|011|015)[0-9]{8}$/','unique:users,phone'.$id],
            'image'=>['nullable','image','mimes:png,jpg.jpeg'],
            'location'=>['string','required']

        ];

    }

    public function mesaages(){
        return [
        'name.required'=> 'يجب إدخال الاسم',
        'phone.regex'=>'الرقم غير صالح',
  
    ];
    }
}
