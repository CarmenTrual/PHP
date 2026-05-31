<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;
use App\Http\Resources\CursoResource;
use Illuminate\Http\Response;

class CursoController extends Controller
{
    public function index()
    {
        // Obtiene todos los cursos de la base de datos y los devuelve en formato JSON.
        return response()->json (CursoResource::collection(Curso::all()));
    }
        public function store(Request $request)
    {
        // Validación de los datos de la solicitud
        $validator = validator($request->all(), [
            'id_categoria' => 'required|exists:categorias,id',
            'id_nivel' => 'required|exists:niveles,id',
            'nombre_curso' => 'required|max:30',
            'descripcion' => 'required',
            'precio' => 'required|numeric|min:0',
        ]);

        // Si la validación falla, se devuelve una respuesta con los errores
        if ($validator->fails()) {
            return response()->json(['errores' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    
        // Crea un nuevo curso con los datos de la solicitud y lo guarda en la base de datos.
        $curso = Curso::create([
            'id_categoria' => $request->id_categoria,
            'id_nivel' => $request->id_nivel,
            'nombre_curso' => $request->nombre_curso,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
        ]);
    
        // Devuelve una respuesta JSON indicando que el curso se creó correctamente
        return response()->json([
            'status' => true,
            'message' => 'Curso creado correctamente',
            'data' => CursoResource::make($curso),
        ], 201);
    }

    public function show(string $id)
    {
        $curso = Curso::find($id);
        if (is_null($curso)) {
            return response()->json(['message' => 'Curso no encontrado'], Response::HTTP_NOT_FOUND);
        }

        // Obtiene un curso específico de la base de datos y lo devuelve en formato JSON.
        return response()->json(CursoResource::make($curso));
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos de la solicitud
        $validator = validator($request->all(), [
            'id_categoria' => 'required|exists:categorias,id',
            'id_nivel' => 'required|exists:niveles,id',
            'nombre_curso' => 'required|max:30',
            'descripcion' => 'required',
            'precio' => 'required|numeric|min:0',
        ]);

        // Si la validación falla, se devuelve una respuesta con los errores
        if ($validator->fails()) {
            return response()->json(['errores' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    
        // Obtiene un curso específico de la base de datos.
        $curso = Curso::find($id);
        if (is_null($curso)) {
            return response()->json(['message' => 'Curso no encontrado'], Response::HTTP_NOT_FOUND);
        }
    
        // Actualiza los datos de un curso existente con los datos que vienen en la solicitud.
        $curso->update([
            'id_categoria' => $request->id_categoria,
            'id_nivel' => $request->id_nivel,
            'nombre_curso' => $request->nombre_curso,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
        ]);
    
        // Devuelve una respuesta JSON indicando que el curso se actualizo correctamente
        return response()->json([
            'status' => true,
            'message' => 'Curso actualizado correctamente',
            'data' => CursoResource::make($curso),
        ]);
    }

    public function destroy(string $id)
    {
        // Elimina un curso específico de la base de datos.
        $curso = Curso::find($id);
        if (is_null($curso)) {
            return response()->json(['message' => 'Curso no encontrado'], Response::HTTP_NOT_FOUND);
        }
        $curso->delete();
            return response()->json(['message' => 'Curso eliminado correctamente']);
    }
}
