<?php

namespace App\Http\Controllers\Api;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ComentarioResources;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $idPagina = $request->query('id_pagina');

        if (!$idPagina) {
            return response()->json([
                'error' => 'id_pagina es requerido'
            ], 400);
        }

        $comentarios = Comentario::with([
            'usuario',
            'respuestas.usuario',
            'respuestas.parent.usuario'
        ])
            ->where('id_pagina', $idPagina)
            ->whereNull('parent_id')
            ->get();

        return response()->json($comentarios);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comentarioTexto = $request->input('comentario');
        $idUsuario = $request->input('id_usuario');
        $idPagina = $request->input('id_pagina');

        // Validación manual básica
        if (!$comentarioTexto || !$idUsuario) {
            return response()->json(['error' => 'Faltan campos obligatorios'], 400);
        }

        $comentario = new Comentario();
        $comentario->comentario = $comentarioTexto;
        $comentario->id_usuario = $idUsuario;
        $comentario->id_pagina = $idPagina;
        $comentario->save();

        return response()->json(['message' => 'Comentario guardado con éxito']);
    }


    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
