<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoResource;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResource
    {
        $productos = Producto::all();
       // return response()->json($productos,200);
        return ProductoResource::collection($productos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request):JsonResource
    {
        
        $producto=new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->save();

        $producto->categorias()->attach($request->categorias);
       // return response()->json($producto,201);
       return new ProductoResource($producto);
    }

    /**
     * Display the specified resource.
     */
    public function show($id):JsonResource
    {
        $producto = Producto::find($id);
       // return response()->json($producto,200);
       return new ProductoResource($producto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, $id):JsonResource
    {
        $producto = Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->categorias()->detach();

        $producto->categorias()->attach($request->categorias) ;
        $producto->save();

        
        //return response()->json($producto,200);
        return new ProductoResource($producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Producto::find($id)->delete();
        return response()->json(['success' => true],200);
    }
}
