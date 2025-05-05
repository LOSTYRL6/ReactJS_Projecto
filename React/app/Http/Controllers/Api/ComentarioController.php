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
    public function index()
    {
        $comentario = Comentario::all();
        return ComentarioResources::collection($comentario);
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
