<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\PedidoRequest;
use App\Http\Resources\PedidoResource;
use Illuminate\Http\Response;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todos los pedidos de la base de datos y los devuelve en formato JSON.
        return PedidoResource::collection(Pedido::all());
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
    public function store(PedidoRequest $request)
    {
        // Crea un nuevo pedido con los datos que vienen en la solicitud y lo guarda en la base de datos.
        $pedido = Pedido::create($request->validated());
        return new PedidoResource($pedido);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        // Obtiene un pedido específico de la base de datos y lo devuelve en formato JSON.
        return new PedidoResource($pedido);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PedidoRequest $request, Pedido $pedido)
    {
        // Actualiza los datos de un pedido existente con los datos que vienen en la solicitud.
        $pedido->update($request->validated());
        return new PedidoResource($pedido);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        // Elimina un pedido específico de la base de datos.
        $pedido->delete();
        return response()->json(null, 204);
    }
}
