<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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
use App\Models\Juego;

Route::get('/', function () {
    return view('home');
});
Route::get('/Registrar', function () {
    return view('Auth.register');
});
Route::get('/Iniciar', [UsuarioController::class, 'showLoginForm']);
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');
Route::post('/Login', [UsuarioController::class, 'Logear']);

Route::get('/juegos/{id}', function ($id) {
    $juego = Juego::findOrFail($id);
    return view('CadaJuego', ['juego' => $juego]);
});
