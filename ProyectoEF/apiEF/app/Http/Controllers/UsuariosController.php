<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Http\Requests\UsuariosRequest;
use App\Http\Resources\UsuariosResource;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todos los usuarios de la base de datos y los devuelve en formato JSON.
        return UsuariosResource::collection(Usuarios::all());
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
    public function store(UsuariosRequest $request)
    {
        // Crea un nuevo usuario con los datos de la solicitud y lo guarda en la base de datos.
        $usuario = Usuarios::create($request->validated());
        return new UsuariosResource($usuario);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuarios $usuarios)
    {
        // Obtiene un usuario específico de la base de datos y lo devuelve en formato JSON.
        return new UsuariosResource($usuarios);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuariosRequest $request, Usuarios $usuarios)
    {
        // Actualiza los datos de un usuario existente con los datos que vienen en la solicitud.
        $usuarios->update($request->validated());
        return new UsuariosResource($usuarios);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuarios $usuarios)
    {
        // Elimina un usuario específico de la base de datos.
        $usuarios->delete();
        return response()->json(null, 204);
    }
}
