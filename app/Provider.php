<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
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
        'password'
    ];
}
