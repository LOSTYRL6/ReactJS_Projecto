<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubPaginaResource;
use App\Models\SubPagina;
use Illuminate\Http\Request;

class SubPaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subPagina = SubPagina::all();
        return SubPaginaResource::collection($subPagina);
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
    public function show(SubPagina $subPagina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubPagina $subPagina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubPagina $subPagina)
    {
        //
    }
}
