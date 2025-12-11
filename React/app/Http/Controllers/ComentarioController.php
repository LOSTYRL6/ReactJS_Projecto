<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
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
    public function storeReply(Request $request)
    {
        $request->validate([
            'comentario' => 'required|string',
            'parent_id' => 'required|integer|exists:comentarios,id_comentario',
            'id_pagina' => 'required|integer|exists:paginas,id_pagina',
        ]);

        $comentario = new Comentario();
        $comentario->comentario = $request->input('comentario');
        $comentario->parent_id = $request->input('parent_id');
        $comentario->id_pagina = $request->input('id_pagina');
        // Si usas autenticación Laravel:
        $comentario->id_usuario = auth()->check() ? auth()->id() : null;

        try {
            $comentario->save();
            // Puedes hacer un redirect o devolver una respuesta JSON si quieres
            return redirect()->back();
        } catch (QueryException $ex) {
            // Log o manejo personalizado del error
            // Aquí podrías devolver un error 400 con mensaje
            return redirect()->back()->withErrors(['error' => 'Error al guardar el comentario.']);
        }
    }
}
