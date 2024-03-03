<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtiquetaRequest;
use App\Http\Resources\EtiquetasResource;
use App\Models\Etiquetas;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class EtiquetasController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $etiquetas = Etiquetas::all();
    return EtiquetasResource::collection($etiquetas);
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
  public function store(EtiquetaRequest $request)
  {
    $etiquetas = new Etiquetas();
    $etiquetas->nombre = $request->nombre;
    $etiquetas->save();
    return new EtiquetasResource($etiquetas);
  }

  /**
   * Display the specified resource.
   */
  public function show($id):JsonResource
  {
    $etiquetas = Etiquetas::find($id);
    return new EtiquetasResource($etiquetas);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Etiquetas $etiquetas)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id):JsonResource
  {
    $etiquetas = Etiquetas::find($id);
    $etiquetas->nombre = $request->nombre;
    $etiquetas->save();
    return new EtiquetasResource($etiquetas);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Request $request, $id):JsonResponse
  {
    $etiquetas = Etiquetas::find($id);
    $etiquetas->delete();
    return response()->json(['message' => 'Etiqueta eliminada'], 200);// el código 200 es para saber que todo ha salido bien.
  }
}


