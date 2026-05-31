<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\CategoriaRequest;
use App\Http\Resources\CategoriaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoriaController extends Controller
{
    public function index()
    {
        // Obtiene todas las categorías de la base de datos y las devuelve en formato JSON.
        return response()->json(CategoriaResource::collection(Categoria::all()));
    }

    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'descripcion' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errores'=>$validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        // Crea una nueva categoría con los datos de la solicitud y la guarda en la base de datos.
        $categoria = Categoria::create([
            'descripcion' => $request->descripcion
        ]);
        
        // Devuelve una respuesta JSON indicando que la categoría se creó correctamente
        return response()->json([
            'status' => true,
            'message' => 'Categoría creada correctamente',
            'data' => CategoriaResource::make($categoria),
        ], 201);
    }

    public function show(string $id)
    {
        $categoria = Categoria::find($id);
        if (is_null($categoria)) {
            return response()->json(['message' => 'Categoría no encontrada'], Response::HTTP_NOT_FOUND);
        }
        // Obtiene una categoría específica de la base de datos y la devuelve en formato JSON.
        return response()->json(CategoriaResource::make($categoria));
    }

    public function update(Request $request, $id)
    {
        $validator = validator($request->all(), [
            'descripcion' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errores'=>$validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $categoria = Categoria::find($id);
        if (is_null($categoria)) {
            return response()->json(['message' => 'Categoría no encontrada'], Response::HTTP_NOT_FOUND);
        }
        // Actualiza una categoría existente con los datos de la solicitud.
        $categoria->update(['descripcion' => $request->descripcion]);
        return response()->json([
            'status' => true,
            'message' => 'Categoría actualizada correctamente',
            'data' => CategoriaResource::make($categoria),
        ]);
    }

    public function destroy(string $id)
    {
        // Elimina una categoría específica de la base de datos.
        $categoria = Categoria::find($id);
        if (is_null($categoria)) {
            return response()->json(['message' => 'Categoría no encontrada'], Response::HTTP_NOT_FOUND);
        }
        try {
            $categoria->delete();
            return response()->json(['message' => 'Categoría eliminada correctamente']);
        }
        catch (\Illuminate\Database\QueryException $e) {
            // Error si la categoría tiene cursos asociados
            return response()->json(['message' => 'No se puede eliminar la categoría porque tiene cursos asociados'], 409);}
    }
}
