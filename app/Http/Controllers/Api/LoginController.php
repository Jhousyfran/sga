<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Login;
use App\Provider;

class LoginController extends Controller
{
    public function login(Login $request)
    {
        $provider = Provider::login($request);

        if(!$provider){
            return response()->json(['errors' => ['generic' => 'CNPJ ou senha incorretos.']], 401);
        }

        return response()->json($provider, 200);
    }
}
