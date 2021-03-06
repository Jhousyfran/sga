<?php

namespace App\Http\Requests\Api\Provider;

use App\Http\Requests\Api\FormRequest;
use App\Provider as ProviderModel;

class UpdateProvider extends FormRequest
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
        $provider = ProviderModel::getProviderLogged(TOKEN, true);

        return [
            'name' => [
                'required',
                'max:250',
                'min:3'
            ],
            'cnpj' => [
                'required',
                'size:14',
                'cnpj',
                "unique:providers,id,{$provider->id}"
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
        ];
    }
}
