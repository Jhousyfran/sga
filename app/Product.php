<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MultiTenanTable;

class Product extends Model
{
    use MultiTenanTable;

    protected $fillable = [
        'name',
        'amount',
        'description',
        'provider_id'
    ];
    
}
