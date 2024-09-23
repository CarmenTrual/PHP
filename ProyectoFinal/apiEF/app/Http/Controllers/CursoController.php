<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;
use App\Http\Resources\CursoResource;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todos los cursos de la base de datos y los devuelve en formato JSON.
        return CursoResource::collection(Curso::all());
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
    public function store(CursoRequest $request)
    {
        // Crea un nuevo curso con los datos que vienen en la solicitud y lo guarda en la base de datos.
        $curso = Curso::create($request->validated());
        return new CursoResource($curso);
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        // Obtiene un curso específico de la base de datos y lo devuelve en formato JSON.
        return new CursoResource($curso);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursoRequest $request, Curso $curso)
    {
        // Actualiza los datos de un curso existente con los datos que vienen en la solicitud.
        $curso->update($request->validated());
        return new CursoResource($curso);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        // Elimina un curso específico de la base de datos.
        $curso->delete();
        return response()->json(null, 204);
    }
}
