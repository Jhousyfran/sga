<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\FormRequest;


class Login extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cnpj' => [
                'required',
                'cnpj',
                'size:14'
            ],
            'password' =>[
                'required',
                'min:6',
                'max:250'
            ]
        ];
    }
}
