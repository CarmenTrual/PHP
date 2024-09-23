<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;
use App\Http\Requests\NivelRequest;
use App\Http\Resources\NivelResource;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todos los niveles de la base de datos y los devuelve en formato JSON.
        return NivelResource::collection(Nivel::all());
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
    public function store(NivelRequest $request)
    {
        // Crea un nuevo nivel con los datos que vienen en la solicitud y lo guarda en la base de datos.
        $nivel = Nivel::create($request->validated());
        return new NivelResource($nivel);
    }

    /**
     * Display the specified resource.
     */
    public function show(Nivel $nivel)
    {
        // Obtiene un nivel específico de la base de datos y lo devuelve en formato JSON.
        return new NivelResource($nivel);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nivel $nivel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NivelRequest $request, Nivel $nivel)
    {
        // Actualiza los datos de un nivel existente con los datos que vienen en la solicitud.
        $nivel->update($request->validated());
        return new NivelResource($nivel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nivel $nivel)
    {
        // Elimina un nivel específico de la base de datos.
        $nivel->delete();
        return response()->json(null, 204);
    }
}
