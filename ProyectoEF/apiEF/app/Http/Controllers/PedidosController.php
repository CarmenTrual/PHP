<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;
use App\Http\Requests\PedidosRequest;
use App\Http\Resources\PedidosResource;
use Illuminate\Http\Response;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todos los pedidos de la base de datos y los devuelve en formato JSON.
        return PedidosResource::collection(Pedidos::all());
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
    public function store(PedidosRequest $request)
    {
        // Crea un nuevo pedido con los datos que vienen en la solicitud y lo guarda en la base de datos.
        $pedido = Pedidos::create($request->validated());
        return new PedidosResource($pedido);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedidos $pedidos)
    {
        // Obtiene un pedido específico de la base de datos y lo devuelve en formato JSON.
        return new PedidosResource($pedidos);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedidos $pedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PedidosRequest $request, Pedidos $pedidos)
    {
        // Actualiza los datos de un pedido existente con los datos que vienen en la solicitud.
        $pedidos->update($request->validated());
        return new PedidosResource($pedidos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedidos $pedidos)
    {
        // Elimina un pedido específico de la base de datos.
        $pedidos->delete();
        return response()->json(null, 204);
    }
}
