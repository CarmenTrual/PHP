<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\PedidoRequest;
use App\Http\Resources\PedidoResource;
use Illuminate\Http\Response;

class PedidoController extends Controller
{

    public function index()
    {
        // Obtiene todos los pedidos de la base de datos y los devuelve en formato JSON.
        return response()->json(PedidoResource::collection(Pedido::all()));
    }

    public function store(Request $request)
    {
        // Validación de los datos de la solicitud
        $validator = validator($request->all(), [
            'id_usuario' => 'required|exists:users,id',
            'id_curso' => 'required|exists:cursos,id',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'required|string|max:20',
            'fecha' => 'required|date',
        ]);

        // Si la validación falla, se devuelve una respuesta con los errores
        if ($validator->fails()) {
            return response()->json(['errores' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        // Crea un nuevo pedido con los datos que vienen en la solicitud y lo guarda en la base de datos.
        $pedido = Pedido::create([
            'id_usuario' => $request->id_usuario,
            'id_curso' => $request->id_curso,
            'cantidad' => $request->cantidad,
            'estado' => $request->estado,
            'fecha' => $request->fecha,
        ]);

        // Devuelve una respuesta JSON indicando que el pedido se creó correctamente
        return response()->json([
            'status' => true,
            'message' => 'Pedido creado correctamente',
            'data' => PedidoResource::make($pedido),
        ], 201);
    }

    public function show(string $id)
    {
        $pedido = Pedido::find($id);
        if (is_null($pedido)) {
            return response()->json(['message' => 'Pedido no encontrado'], Response::HTTP_NOT_FOUND);
        }

        // Obtiene un pedido específico de la base de datos y lo devuelve en formato JSON.
        return response()->json(PedidoResource::make($pedido));
    }


    public function update(Request $request, string $id)
    {

        $validator = validator($request->all(), [
            'id_usuario' => 'required|exists:users,id',
            'id_curso' => 'required|exists:cursos,id',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'required|max:20',
            'fecha' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errores' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $pedido = Pedido::find($id);
        if (is_null($pedido)) {
            return response()->json(['message' => 'Pedido no encontrado'], Response::HTTP_NOT_FOUND);
        }

        // Actualiza los datos de un pedido existente con los datos que vienen en la solicitud.
        $pedido->update([
            'id_usuario' => $request->id_usuario,
            'id_curso' => $request->id_curso,
            'cantidad' => $request->cantidad,
            'estado' => $request->estado,
            'fecha' => $request->fecha,
        ]);

        // Devuelve una respuesta JSON indicando que el pedido se actualizo correctamente
        return response()->json([
            'status' => true,
            'message' => 'Pedido actualizado correctamente',
            'data' => PedidoResource::make($pedido),
        ]);
    }

    public function destroy(string $id)
    {
        // Si no existe el pedido, se devuelve una respuesta con un mensaje de error
        $pedido = Pedido::find($id);
        if (is_null($pedido)) {
            return response()->json(['message' => 'Pedido no encontrado'], Response::HTTP_NOT_FOUND);
        }

        // Elimina el pedido de la base de datos y devuelve un mensaje en JSON
        $pedido->delete();
        return response()->json(['message' => 'Pedido eliminado correctamente']);
    }
}

