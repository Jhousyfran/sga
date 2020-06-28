<?php

namespace App\Http\Requests\Api\Provider;

use App\Http\Requests\Api\FormRequest;


class StoreProvider extends FormRequest
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
            'name' => [
                'required',
                'max:250',
                'min:3'
            ],
            'cnpj' => [
                'required',
                'unique:providers',
                'max:20', //TODO: Validar o max
            ],
            'address_postal_code' => [
                'required',
                'max:9'
            ],
            'address_state' => [
                'required',
                'size:2'
            ],
            'address_city' => [
                'required',
                'max:250',
                'min:3',
            ],
            'address_district' => [
                'required',
                'max:250',
                'min:3',
            ],
            'address_street' => [
                'required',
                'max:250',
            ],
            'address_number' => [
                'required',
                'max:50',
            ],
            'password' => [
                'required',
                'max:250',
                'min:6'
            ],
        ];
    }
}
