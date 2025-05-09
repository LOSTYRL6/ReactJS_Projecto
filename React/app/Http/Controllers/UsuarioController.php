<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Clases\Utilidad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

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
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
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
    public function showLoginForm()
    {
        return view('Auth.iniciar');
    }
    public function logout(Request $request)
    {
        // Cierra la sesión del usuario
        Auth::logout();

        // Invalida la sesión actual y genera un nuevo token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige a la página de inicio o login
        return redirect('/Iniciar'); // Puedes cambiar la ruta según necesites
    }

    public function Logear(Request $request)
    {
        try {
            $UserCorreo = $request->input('UsernameCorreo');
            $contrasena = $request->input('contrasena');

            // Buscar el usuario por username o correo
            $usuario = Usuario::where('username', $UserCorreo)
                ->orWhere('correo', $UserCorreo)
                ->first();

            // Si no encuentra el usuario o la contraseña es incorrecta
            if (!$usuario || !Hash::check($contrasena, $usuario->contrasena)) {
                $request->session()->flash('error', 'Usuario o contraseña incorrectos.');
                return redirect()->action([UsuarioController::class, 'showLoginForm'])->withInput();
            }

            Auth::login($usuario);
            $request->session()->regenerate();

            return redirect('/');
        } catch (\Exception $ex) {
            $mensaje = Utilidad::errorMensaje($ex); // O simplemente $ex->getMessage();
            $request->session()->flash('error', $mensaje);

            return redirect()->action([UsuarioController::class, 'showLoginForm'])->withInput();
        }
    }
}
