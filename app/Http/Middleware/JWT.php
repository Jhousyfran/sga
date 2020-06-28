<?php

namespace App\Http\Middleware;

use Closure;
use App\Provider;

class JWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('USER-TOKEN');
        if(empty($token)){ return response()->json(["error"=>"Sem permissão de acesso"],403);}

        $provider = Provider::getProviderLogged($token,true);

        if( !$provider)
            return response()->json(["error"=>"Sem permissão de acesso"],403);
        else 
            define('TOKEN',$token);

        return $next($request);
    }

}
