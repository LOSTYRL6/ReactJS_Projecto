<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ObjetoResource;
use App\Models\Objeto;
use Illuminate\Http\Request;

class ObjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objeto = Objeto::all();
        return ObjetoResource::collection($objeto);
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
    public function show(Objeto $objeto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Objeto $objeto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Objeto $objeto)
    {
        //
    }
}
