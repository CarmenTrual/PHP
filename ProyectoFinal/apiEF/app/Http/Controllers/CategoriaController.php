<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\CategoriaRequest;
use App\Http\Resources\CategoriaResource;
use Illuminate\Http\Response;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todas las categorías de la base de datos y las devuelve en formato JSON.
        return CategoriaResource::collection(Categoria::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        // Crea una nueva categoría con los datos de la solicitud y la guarda en la base de datos.
        $categoria = Categoria::create($request->validated());
        return new CategoriaResource($categoria);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        // Obtiene una categoría específica de la base de datos y la devuelve en formato JSON.
        return new CategoriaResource($categoria);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        // Actualiza los datos de una categoría existente con los datos 
        // que vienen en la solicitud.
        $categoria->update($request->validated());
        return new CategoriaResource($categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        // Elimina una categoría específica de la base de datos.
        $categoria->delete();
        return response()->json(null, 204);
    }
}
