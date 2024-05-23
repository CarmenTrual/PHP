<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;
use App\Http\Requests\CursosRequest;
use App\Http\Resources\CursosResource;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todos los cursos de la base de datos y los devuelve en formato JSON.
        return CursosResource::collection(Cursos::all());
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
    public function store(CursosRequest $request)
    {
        // Crea un nuevo curso con los datos que vienen en la solicitud y lo guarda en la base de datos.
        $curso = Cursos::create($request->validated());
        return new CursosResource($curso);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cursos $cursos)
    {
        // Obtiene un curso específico de la base de datos y lo devuelve en formato JSON.
        return new CursosResource($cursos);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cursos $cursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursosRequest $request, Cursos $cursos)
    {
        // Actualiza los datos de un curso existente con los datos que vienen en la solicitud.
        $cursos->update($request->validated());
        return new CursosResource($cursos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cursos $cursos)
    {
        // Elimina un curso específico de la base de datos.
        $cursos->delete();
        return response()->json(null, 204);
    }
}
