<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
    {   $id=$this->route('id');
        return [
            'title'=>['required','regex:/^[\p{Arabic}a-zA-Z0-9\s]{3,50}$/u'],
            'image'=>['required','image','mimes:png,jpg,jpeg'],
            'type'=>['nullable','regex:/^[\p{Arabic}0-9\s]{3,20}$/u']
        ];
    }
    public function messages(){
        return [
        'title.required'=> 'يجب إدخال الاسم', ];}

}   
