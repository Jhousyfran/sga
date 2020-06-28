<?php

namespace App\Http\Requests\Api\Product;

use App\Http\Requests\Api\FormRequest;
use App\Provider;

class StoreProduct extends FormRequest
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
        $provider = Provider::getProviderLogged(TOKEN, true);

        return [
            'name' => [
                'required',
                'min:3',
                'max:250'
            ],
            'description' => [
                'required',
                'min:3',
                'max:800',
            ],
            'amount' => [
                'required',
                'numeric',
                'max:1000000',
                'min:0',
            ]
        ];
    }
}
