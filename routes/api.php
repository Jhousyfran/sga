<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('fornecedores', 'Api\\ProviderController@store');
Route::post('login', 'Api\\LoginController@login');

Route::middleware("JWT")->group(function() {
    Route::apiResource('produtos','Api\\ProductController');
    Route::get('fornecedores','Api\\ProviderController@index');
    Route::get('fornecedores/{id}','Api\\ProviderController@show');
    Route::put('fornecedores/{id}','Api\\ProviderController@update');
    Route::get('fornecedores/{id}/info', 'Api\\ProviderController@info');
});

Route::get('/cep/{cep}', function(Request $request) {
    $cep = $request->cep;
    $url = "https://viacep.com.br/ws/$cep/json/";
    $json = json_decode(file_get_contents($url), true);

    return $json;
});