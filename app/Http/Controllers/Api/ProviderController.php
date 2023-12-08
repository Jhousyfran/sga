<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Provider\StoreProvider;
use App\Http\Requests\Api\Provider\UpdateProvider;
use App\Provider;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProviderController extends Controller
{
    public function info($id)
    {
        $provider = Provider::find($id);
        if (!$provider) {
            return response()->json('Fornecedor não encontrado', 404);
        }
        $provider->load('products');
        return response()->json([
            'quantityOfproducts' => count($provider->products),
            'totalAmountProducts' => $provider->products->sum('amount'),
        ], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Provider::all();

        return response()->json($all, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProvider $request)
    {
        DB::beginTransaction();

        try {

            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            $provider = Provider::create($data);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("Não foi possível salvar o dados. Erro: {$e->getMessage()} ", 422);
        }

        Log::info("Nova empresa crida", ["name" => $provider->name, "city" => $provider->address_city]);

        return response()->json($provider, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider = Provider::find($id);

        if (!$provider) {
            return response()->json('Fornecedor não encontrado', 404);
        }

        return response()->json($provider, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProvider $request, $id)
    {
        $provider = Provider::find($id);

        if (!$provider) {
            return response()->json('Fornecedor não encontrado', 404);
        }

        DB::beginTransaction();
        try {
            $provider->update($request->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("Não foi possível salvar o dados. Erro: {$e->getMessage()} ", 422);
        }

        return response()->json($provider, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
