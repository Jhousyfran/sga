<?php

namespace App\Traits;

use App\Provider;
use Illuminate\Database\Eloquent\Builder;

trait MultiTenanTable
{

    protected static function bootMultitenantable()
    {

        if (defined('TOKEN')) {
            $provider = Provider::getProviderLogged(TOKEN, true);

            if ($provider) {
                static::creating(function ($model) use ($provider) {
                    $model->provider_id = $provider->id;
                });

                static::addGlobalScope('provider_id', function (Builder $builder) use ($provider) {
                    $builder->where('provider_id', $provider->id);
                });
            }
        }
    }

}
