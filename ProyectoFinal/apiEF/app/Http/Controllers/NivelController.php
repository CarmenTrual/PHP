<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;
use App\Http\Requests\NivelRequest;
use App\Http\Resources\NivelResource;
use Illuminate\Http\Response;

class NivelController extends Controller
{

    public function index()
    {
        // Obtiene todos los niveles de la base de datos y los devuelve en formato JSON.
        return response()->json(NivelResource::collection(Nivel::all()));
    }

    public function store(Request $request)
    {
        // Validación de los datos de la solicitud
        $validator = validator($request->all(), [
            'nivel' => 'required|max:30',
        ]);

        // Si la validación falla, se devuelve una respuesta con los errores
        if ($validator->fails()) {
            return response()->json(['errores' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // Crea un nuevo nivel con los datos que vienen en la solicitud y lo guarda en la base de datos.
        $nivel = Nivel::create([
            'nivel' => $request->nivel,
        ]);

        // Devuelve una respuesta JSON indicando que el nivel se creó correctamente
        return response()->json([
            'status' => true,
            'message' => 'Nivel creado correctamente',
            'data' => NivelResource::make($nivel),
        ], 201);
    }

    public function show(string $id)
    {
        $nivel = Nivel::find($id);
        if (is_null($nivel)) {
            return response()->json(['message' => 'Nivel no encontrado'], Response::HTTP_NOT_FOUND);
        }
        // Obtiene un nivel específico de la base de datos y lo devuelve en formato JSON.
        return response()->json(NivelResource::make($nivel));
    }


    public function update (Request $request, $id)
    {
        // Validación de los datos de la solicitud
        $validator = validator($request->all(), [
            'nivel' => 'required|max:20',
        ]);

        // Si la validación falla, se devuelve una respuesta con los errores
        if ($validator->fails()) {
            return response()->json(['errores' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $nivel = Nivel::find($id);
        if (is_null($nivel)) {
            return response()->json(['message' => 'Nivel no encontrado'], Response::HTTP_NOT_FOUND);
        }

        // Actualiza los datos de un nivel existente con los datos que vienen en la solicitud.
        $nivel->update([
            'nivel' => $request->nivel,
        ]);

        // Devuelve una respuesta JSON indicando que el nivel se actualizo correctamente
        return response()->json([
            'status' => true,
            'message' => 'Nivel actualizado correctamente',
            'data' => NivelResource::make($nivel),
        ]);
    }

    public function destroy(string $id)
    {
        // Elimina un nivel específico de la base de datos.
        $nivel = Nivel::find($id);

        // Si no existe el nivel, se devuelve una respuesta con un mensaje de error
        if (is_null($nivel)) {
            return response()->json(['message' => 'Nivel no encontrado'], Response::HTTP_NOT_FOUND);
        }

        // Elimina el nivel de la base de datos y devuelve un mensaje en JSON
        $nivel->delete();
        return response()->json(['message' => 'Nivel eliminado correctamente']);
    }
}
