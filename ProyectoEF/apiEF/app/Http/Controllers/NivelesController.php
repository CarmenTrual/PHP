<?php

namespace App\Http\Controllers;

use App\Models\Niveles;
use Illuminate\Http\Request;
use App\Http\Requests\NivelesRequest;
use App\Http\Resources\NivelesResource;

class NivelesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todos los niveles de la base de datos y los devuelve en formato JSON.
        return NivelesResource::collection(Niveles::all());
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
    public function store(NivelesRequest $request)
    {
        // Crea un nuevo nivel con los datos que vienen en la solicitud y lo guarda en la base de datos.
        $nivel = Niveles::create($request->validated());
        return new NivelesResource($nivel);
    }

    /**
     * Display the specified resource.
     */
    public function show(Niveles $niveles)
    {
        // Obtiene un nivel específico de la base de datos y lo devuelve en formato JSON.
        return new NivelesResource($niveles);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Niveles $niveles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NivelesRequest $request, Niveles $niveles)
    {
        // Actualiza los datos de un nivel existente con los datos que vienen en la solicitud.
        $niveles->update($request->validated());
        return new NivelesResource($niveles);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Niveles $niveles)
    {
        // Elimina un nivel específico de la base de datos.
        $niveles->delete();
        return response()->json(null, 204);
    }
}
