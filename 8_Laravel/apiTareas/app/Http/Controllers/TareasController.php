<?php

namespace App\Http\Controllers;

use App\Http\Requests\TareasRequest;
use App\Http\Resources\TareasResource;
use App\Models\Tareas;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class TareasController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index():JsonResource
  {
    $tareas = Tareas::all();

    return TareasResource::collection($tareas);
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
  public function store(Request $request)
  {
    $tareas = new Tareas();
    $tareas->titulo = $request->titulo;
    $tareas->descripcion = $request->descripcion;
    $tareas->save();

    $tareas->etiquetas()->attach($request->tareas);

    return new TareasResource($tareas);
  }

  /**
   * Display the specified resource.
   */
  public function show($id):JsonResource
  {
    $tareas = Tareas::find($id);
    return new TareasResource($tareas);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Tareas $tareas)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id):JsonResource
  {
    $tareas = Tareas::find($id);
    $tareas->titulo = $request->titulo;
    $tareas->descripcion = $request->descripcion;
    $tareas->etiquetas()->detach();
    $tareas->etiquetas()->attach($request->etiquetas);
    $tareas->save();
    return new TareasResource($tareas);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Request $request, $id):JsonResponse
  {
    $tareas = Tareas::find($id);
    $tareas->delete();
    return response()->json(['message' => 'Tarea eliminada'], 200);
  }
}


