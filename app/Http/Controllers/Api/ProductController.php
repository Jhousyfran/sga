<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Product\StoreProduct;
use App\Product;
use DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Product::orderBy('id','DESC')->get();

        return response()->json($all,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $product = Product::where('name',$request->name)->first();
        if($product){
            return response()->json(['errors' => ['name'=> 'O nome já esta sendo utilizado']], 422);
        }

        DB::beginTransaction();
        
        try {
            $product = Product::create($request->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("Não foi possível salvar o dados. Erro: {$e->getMessage()} ", 422);
        }
        return response()->json($product, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if(!$product){
            return response()->json('Produto não encontrado', 404);
        }

        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if(!$product){
            return response()->json('Produto não encontrado', 404);
        }elseif(($product->name != $request->name) && ($productName = Product::where('name', $request->name)->first()) ){
            return response()->json(['errors' => ['name'=> 'O nome já esta sendo utilizado']], 422);
        }

        DB::beginTransaction();

        try {
            $product->update($request->all());
            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json("Não foi possível salvar o dados. Erro: {$e->getMessage()} ", 422);
        }

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        
        if(!$product){
            return response()->json('Produto não encontrado', 404);
        }
        $product->delete();

        return response()->json('Produto excluido com sucesso!', 200);
    }
}
