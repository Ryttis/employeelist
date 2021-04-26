<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required', 'string'
            ],
            'email' => [
                'required','email','regex:/^\S+@\S+\.\S+$/'
            ],
            'phone' => [
                'required','regex:/(3706)(\d{7})$/'
            ],
            'company_id' => [
                'required', 'numeric'
            ],
        ];
    }
}
