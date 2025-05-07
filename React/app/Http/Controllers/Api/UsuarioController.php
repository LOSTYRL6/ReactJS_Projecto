<?php

namespace App\Http\Controllers\Api;

use App\Models\Usuario;
use App\Clases\Utilidad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UsuarioResource;
use Illuminate\Database\QueryException;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = Usuario::all();
        return UsuarioResource::collection($usuario);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuarios = new Usuario();
        $usuarios->nombre = $request->input('nombre');
        $usuarios->apellido = $request->input('apellido');
        $usuarios->correo = $request->input('correo');
        $usuarios->contrasena = Hash::make($request->input('contrasena'));
        $usuarios->username = $request->input('username');
        $usuarios->id_rol = $request->input('id_rol');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('',$fileName, 'public');
            $usuarios->imagen_icono = 'imagen/media/' . $fileName;
        }

        try {
            $usuarios->save();
            $response = (new UsuarioResource($usuarios))->response()->setStatusCode(201);
        } catch (QueryException $ex) {
            $mensaje = Utilidad::errorMensaje($ex);
            $response = \response()->json(["error" => $mensaje], 400);
        }
        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
