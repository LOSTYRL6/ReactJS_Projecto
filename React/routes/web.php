<?php

use App\Models\Juego;
use App\Models\Pagina;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ComentarioController;

Route::get('/', function () {
    return view('home');
});

Route::get('/Registrar', function () {
    return view('Auth.register');
});
Route::get('/Iniciar', [UsuarioController::class, 'showLoginForm']);
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');
Route::post('/Login', [UsuarioController::class, 'Logear']);
Route::post('/comentarios/reply', [ComentarioController::class, 'storeReply'])->name('comentarios.reply');
Route::get('/juegos/{id_juego}/{id_pagina}', function ($id_juego, $id_pagina) {
    $juego = Juego::with('paginas')->findOrFail($id_juego);
    $pagina = Pagina::where('id_pagina', $id_pagina)
        ->where('id_juego', $id_juego)
        ->firstOrFail();

    return view('CadaJuego', compact('juego', 'pagina'));
});
Route::get('/pagina/{id}', [PaginaController::class, 'show'])->name('paginas.show');
