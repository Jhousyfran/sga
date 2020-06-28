<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class Provider extends Model
{
    use Traits\Provider;

    protected $fillable = [
        'name',
        'cnpj',
        'address_postal_code',
        'address_state',
        'address_city',
        'address_district',
        'address_street',
        'address_number',
        'password',
    ];

    protected $hidden = [ 
        'password',
        'created_at',
        'deleted_at',
        'updated_at',
    ];


    /**
     *  Metodos de Ações 
    **/

    static public function login($request)
    {

        $provider = Provider::where('cnpj', $request->cnpj)->first();
        if(!$provider) return false;
        
        if (!Hash::check($request->password, $provider->password)) return false;

        if(!$provider){
            return false;
        }

        $provider->token = $provider->generateToken();

        return $provider;
    }
}
